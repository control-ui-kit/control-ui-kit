<?php

declare(strict_types=1);

namespace ControlUIKit;

use ControlUIKit\Exceptions\InvalidColorException;

class ColorPalette
{
    public string $color;

    public function __construct($color)
    {
        $this->color = $this->setColor($color);
        $this->validateColor();
    }

    public function createPalette(): array
    {
        $colorPalette['brand-50'] = $this->colorMod($this->color, 200);
        $colorPalette['brand-100'] = $this->colorMod($this->color, 160);
        $colorPalette['brand-200'] = $this->colorMod($this->color, 120);
        $colorPalette['brand-300'] = $this->colorMod($this->color, 80);
        $colorPalette['brand-400'] = $this->colorMod($this->color, 40);
        $colorPalette['brand-500'] = '#' . $this->color;
        $colorPalette['brand-600'] = $this->colorMod($this->color, -40);
        $colorPalette['brand-700']= $this->colorMod($this->color, -80);
        $colorPalette['brand-800'] = $this->colorMod($this->color, -120);
        $colorPalette['brand-900'] = $this->colorMod($this->color, -140);

        return $colorPalette;
    }

    private function validateColor(): void
    {
        if (! ctype_xdigit($this->color) || strlen($this->color) !== 6) {
            throw new InvalidColorException($this->color . ' is not a valid color');
        }
    }

    private function setColor($color): string
    {
        $color = preg_replace( '/[^0-9a-f]/i', '', $color);

        if (strlen($color) === 3) {
            return $color[0] . $color[0] . $color[1] . $color[1] . $color[2] . $color[2];
        }

        return $color;
    }

    private function colorMod($hex, $diff): string
    {
        [$red, $blue, $green] = str_split(trim($hex, '# '), 2);

        $newColor[] = $this->updateColor($red, $diff);
        $newColor[] = $this->updateColor($blue, $diff);
        $newColor[] = $this->updateColor($green, $diff);

        return '#' . strtoupper(implode($newColor));
    }

    private function updateColor($color, $diff): string
    {
        $dec = hexdec($color);

        if ($diff >= 0) {
            $dec += $diff;
        }
        else {
            $dec -= abs($diff);
        }

        $dec = max(0, min(255, $dec));

        return str_pad(dechex($dec), 2, '0', STR_PAD_LEFT);
    }
}
