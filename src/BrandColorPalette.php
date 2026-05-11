<?php

declare(strict_types=1);

namespace ControlUIKit;

use InvalidArgumentException;

class BrandColorPalette
{
    private array $rgb;

    private array $shades = [
        '50'  => 200,
        '100' => 160,
        '200' => 120,
        '300' => 80,
        '400' => 40,
        '500' => 0,
        '600' => -40,
        '700' => -80,
        '800' => -120,
        '900' => -140,
    ];

    public function __construct(string $color)
    {
        $this->rgb = $this->parse($color);
    }

    public function getPalette(): array
    {
        return array_map(function ($diff) {
            return $this->applyDiff($this->rgb, $diff);
        }, $this->shades);
    }

    public function getBaseRgb(): array
    {
        return $this->rgb;
    }

    public function getBaseHex(): string
    {
        return sprintf('#%02X%02X%02X', ...$this->rgb);
    }

    private function parse(string $color): array
    {
        $color = trim($color);

        if (str_contains($color, ',')) {
            return $this->parseRgb($color);
        }

        return $this->parseHex($color);
    }

    private function parseRgb(string $color): array
    {
        $parts = array_map('trim', explode(',', $color));

        if (count($parts) !== 3) {
            throw new InvalidArgumentException('RGB color must have exactly 3 comma-separated values (e.g. 173,40,255).');
        }

        foreach ($parts as $part) {
            if (! ctype_digit($part)) {
                throw new InvalidArgumentException("Invalid RGB value '$part'. Each value must be an integer between 0 and 255.");
            }
        }

        $rgb = array_map('intval', $parts);

        foreach ($rgb as $value) {
            if ($value < 0 || $value > 255) {
                throw new InvalidArgumentException('RGB values must be between 0 and 255.');
            }
        }

        return $rgb;
    }

    private function parseHex(string $color): array
    {
        $hex = ltrim($color, '#');

        if (strlen($hex) === 3) {
            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
        }

        if (strlen($hex) !== 6 || ! ctype_xdigit($hex)) {
            throw new InvalidArgumentException("Invalid color '$color'. Provide a hex code (e.g. #AD28FF) or comma-separated RGB (e.g. 173,40,255).");
        }

        $pairs = str_split($hex, 2);

        return [hexdec($pairs[0]), hexdec($pairs[1]), hexdec($pairs[2])];
    }

    private function applyDiff(array $rgb, int $diff): array
    {
        return [
            max(0, min(255, $rgb[0] + $diff)),
            max(0, min(255, $rgb[1] + $diff)),
            max(0, min(255, $rgb[2] + $diff)),
        ];
    }
}
