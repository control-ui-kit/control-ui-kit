<?php

declare(strict_types=1);

namespace ControlUIKit;

class ThemeStubParser
{
    private const GREY_SHADES = ['50', '100', '150', '200', '250', '300', '350', '400', '450', '500', '550', '600', '650', '700', '750', '800', '850', '900', '950', '1000'];
    private const BRAND_SHADES = ['50', '100', '200', '300', '400', '500', '600', '700', '800', '900'];

    public function parse(string $stubPath): array
    {
        $lines = explode("\n", $this->resolveStub(file_get_contents($stubPath)));

        return [
            'root' => $this->parseSection($lines, 'root'),
            'light' => $this->parseSection($lines, 'light'),
            'dark' => $this->parseSection($lines, 'dark'),
        ];
    }

    public function getPaletteVariableNames(): array
    {
        return array_merge(
            array_map(static fn ($s) => "--gray-$s", self::GREY_SHADES),
            array_map(static fn ($s) => "--brand-$s", self::BRAND_SHADES),
        );
    }

    private function resolveStub(string $content): string
    {
        $greyLines = implode("\n", array_map(static fn ($s) => "    --gray-$s: 0 0 0;", self::GREY_SHADES));
        $brandLines = implode("\n", array_map(static fn ($s) => "    --brand-$s: 0 0 0;", self::BRAND_SHADES));

        return str_replace(
            ['{{ gray-colors }}', '{{ brand-colors }}', '{{ theme-name }}'],
            [$greyLines, $brandLines, '__THEME__'],
            $content,
        );
    }

    private function parseSection(array $lines, string $type): array
    {
        [$start, $end] = $this->findSectionBounds($lines, $type);

        if ($start === null) {
            return [];
        }

        $entries = [];

        for ($i = $start + 1; $i < $end; $i++) {
            $line = $lines[$i];
            $trimmed = trim($line);

            if ($trimmed === '') {
                $entries[] = ['type' => 'blank', 'content' => $line];
            } elseif ($this->isSectionComment($trimmed)) {
                $entries[] = ['type' => 'comment', 'content' => $line, 'text' => $trimmed];
            } elseif (preg_match('/^(--[\w-]+)\s*:/', $trimmed, $m)) {
                $entries[] = ['type' => 'variable', 'name' => $m[1], 'content' => $line];
            }
        }

        return $entries;
    }

    private function isSectionComment(string $trimmed): bool
    {
        return str_starts_with($trimmed, '/*')
            && str_ends_with($trimmed, '*/')
            && ! preg_match('/--[\w-]+/', $trimmed);
    }

    private function findSectionBounds(array $lines, string $type): array
    {
        $start = null;
        $depth = 0;

        foreach ($lines as $i => $line) {
            $trimmed = trim($line);

            if ($start === null) {
                if ($this->matchesSectionType($trimmed, $type)) {
                    $start = $i;
                    $depth = 1;
                }
            } else {
                $depth += substr_count($line, '{');
                $depth -= substr_count($line, '}');

                if ($depth === 0) {
                    return [$start, $i];
                }
            }
        }

        return [null, null];
    }

    private function matchesSectionType(string $line, string $type): bool
    {
        return match ($type) {
            'root' => (bool) preg_match('/^:root\s*\{$/', $line),
            'light' => str_contains($line, '[data-mode="light"]'),
            'dark' => str_contains($line, '[data-mode="dark"]'),
            default => false,
        };
    }
}
