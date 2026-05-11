<?php

declare(strict_types=1);

namespace ControlUIKit;

class ThemeCssParser
{
    public function parse(string $filePath): array
    {
        $lines = explode("\n", file_get_contents($filePath));

        return [
            'lines' => $lines,
            'sections' => [
                'root' => $this->parseSection($lines, 'root'),
                'light' => $this->parseSection($lines, 'light'),
                'dark' => $this->parseSection($lines, 'dark'),
            ],
        ];
    }

    private function parseSection(array $lines, string $type): array
    {
        [$start, $end] = $this->findSectionBounds($lines, $type);

        if ($start === null) {
            return ['start' => null, 'end' => null, 'variables' => [], 'comments' => []];
        }

        $variables = [];
        $comments = [];

        for ($i = $start + 1; $i < $end; $i++) {
            $trimmed = trim($lines[$i]);

            if (preg_match('/^(--[\w-]+)\s*:/', $trimmed, $m)) {
                $variables[$m[1]] = $i;
            } elseif ($this->isSectionComment($trimmed)) {
                $comments[$trimmed] = $i;
            }
        }

        return ['start' => $start, 'end' => $end, 'variables' => $variables, 'comments' => $comments];
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
