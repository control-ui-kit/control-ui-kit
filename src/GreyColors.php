<?php

declare(strict_types=1);

namespace ControlUIKit;

class GreyColors
{
    protected array $greys = ['slate', 'gray', 'classic', 'neutral', 'stone', 'green'];

    public function getScale(string $grey = 'classic'): string
    {
        return match ($grey) {
            'slate' => $this->formatData($this->slateData()),
            'gray' => $this->formatData($this->grayData()),
            'classic' => $this->formatData($this->classicData()),
            'neutral' => $this->formatData($this->neutralData()),
            'stone' => $this->formatData($this->stoneData()),
            'green' => $this->formatData($this->greenData()),
            default => '',
        };
    }

    public function getData(string $grey): array
    {
        return match ($grey) {
            'slate' => $this->slateData(),
            'gray' => $this->grayData(),
            'classic' => $this->classicData(),
            'neutral' => $this->neutralData(),
            'stone' => $this->stoneData(),
            'green' => $this->greenData(),
            default => [],
        };
    }

    public function slate(): string
    {
        return $this->formatData($this->slateData());
    }

    public function classic(): string
    {
        return $this->formatData($this->classicData());
    }

    public function gray(): string
    {
        return $this->formatData($this->grayData());
    }

    public function neutral(): string
    {
        return $this->formatData($this->neutralData());
    }

    public function stone(): string
    {
        return $this->formatData($this->stoneData());
    }

    public function green(): string
    {
        return $this->formatData($this->greenData());
    }

    private function formatData(array $data): string
    {
        $lines = [];

        foreach ($data as $shade => $rgb) {
            $hex = sprintf('#%02X%02X%02X', ...$rgb);
            $lines[] = "--gray-{$shade}: {$rgb[0]} {$rgb[1]} {$rgb[2]};  /* {$hex} */";
        }

        return implode("\n", $lines);
    }

    private function slateData(): array
    {
        return [
            '50' => [248, 250, 252],
            '100' => [241, 245, 249],
            '150' => [234, 239, 245],
            '200' => [226, 232, 240],
            '250' => [215, 223, 233],
            '300' => [203, 213, 225],
            '350' => [176, 188, 205],
            '400' => [148, 163, 184],
            '450' => [124, 140, 162],
            '500' => [100, 116, 139],
            '550' => [86, 101, 122],
            '600' => [71, 85, 105],
            '650' => [61, 75, 95],
            '700' => [51, 65, 85],
            '750' => [41, 53, 72],
            '800' => [30, 41, 59],
            '850' => [23, 32, 51],
            '900' => [15, 23, 42],
            '950' => [10, 15, 28],
            '1000' => [5, 8, 14],
        ];
    }

    private function classicData(): array
    {
        return [
            '50' => [250, 250, 250],
            '100' => [244, 244, 245],
            '150' => [236, 236, 238],
            '200' => [228, 228, 231],
            '250' => [220, 220, 224],
            '300' => [212, 212, 216],
            '350' => [187, 187, 193],
            '400' => [161, 161, 170],
            '450' => [137, 137, 146],
            '500' => [113, 113, 122],
            '550' => [98, 98, 107],
            '600' => [82, 82, 91],
            '650' => [73, 73, 81],
            '700' => [63, 63, 70],
            '750' => [51, 51, 56],
            '800' => [39, 39, 42],
            '850' => [32, 32, 35],
            '900' => [24, 24, 27],
            '950' => [16, 16, 18],
            '1000' => [8, 8, 9],
        ];
    }

    private function grayData(): array
    {
        return [
            '50' => [249, 250, 251],
            '100' => [243, 244, 246],
            '150' => [236, 238, 241],
            '200' => [229, 231, 235],
            '250' => [219, 222, 227],
            '300' => [209, 213, 219],
            '350' => [183, 188, 197],
            '400' => [156, 163, 175],
            '450' => [132, 139, 152],
            '500' => [107, 114, 128],
            '550' => [91, 100, 114],
            '600' => [75, 85, 99],
            '650' => [65, 75, 90],
            '700' => [55, 65, 81],
            '750' => [43, 53, 68],
            '800' => [31, 41, 55],
            '850' => [24, 33, 47],
            '900' => [17, 24, 39],
            '950' => [11, 16, 26],
            '1000' => [6, 8, 13],
        ];
    }

    private function neutralData(): array
    {
        return [
            '50' => [250, 250, 250],
            '100' => [245, 245, 245],
            '150' => [237, 237, 237],
            '200' => [229, 229, 229],
            '250' => [221, 221, 221],
            '300' => [212, 212, 212],
            '350' => [188, 188, 188],
            '400' => [163, 163, 163],
            '450' => [139, 139, 139],
            '500' => [115, 115, 115],
            '550' => [99, 99, 99],
            '600' => [82, 82, 82],
            '650' => [73, 73, 73],
            '700' => [64, 64, 64],
            '750' => [51, 51, 51],
            '800' => [38, 38, 38],
            '850' => [31, 31, 31],
            '900' => [23, 23, 23],
            '950' => [15, 15, 15],
            '1000' => [8, 8, 8],
        ];
    }

    private function stoneData(): array
    {
        return [
            '50' => [250, 250, 249],
            '100' => [245, 245, 244],
            '150' => [238, 237, 236],
            '200' => [231, 229, 228],
            '250' => [223, 220, 219],
            '300' => [214, 211, 209],
            '350' => [191, 187, 184],
            '400' => [168, 162, 158],
            '450' => [144, 138, 133],
            '500' => [120, 113, 108],
            '550' => [104, 98, 93],
            '600' => [87, 83, 78],
            '650' => [78, 74, 69],
            '700' => [68, 64, 60],
            '750' => [55, 51, 48],
            '800' => [41, 37, 36],
            '850' => [35, 31, 30],
            '900' => [28, 25, 23],
            '950' => [19, 17, 15],
            '1000' => [9, 8, 8],
        ];
    }

    private function greenData(): array
    {
        return [
            '50' => [248, 251, 248],
            '100' => [242, 246, 242],
            '150' => [234, 239, 234],
            '200' => [227, 232, 227],
            '250' => [218, 224, 218],
            '300' => [207, 213, 207],
            '350' => [181, 189, 181],
            '400' => [154, 163, 154],
            '450' => [130, 139, 130],
            '500' => [109, 117, 109],
            '550' => [93, 101, 93],
            '600' => [78, 86, 78],
            '650' => [68, 75, 68],
            '700' => [56, 63, 56],
            '750' => [45, 51, 45],
            '800' => [34, 40, 34],
            '850' => [28, 33, 28],
            '900' => [21, 25, 21],
            '950' => [13, 16, 13],
            '1000' => [7, 9, 7],
        ];
    }
}
