<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Row extends Component
{
    use UseThemeFile;

    protected string $component = 'table-row';

    public string $rowStyle;

    private array $styles = [
        'default',
        'brand',
        'danger',
        'info',
        'success',
        'muted',
        'warning',
    ];

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $hover = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $rowStyle = null,
        string $shadow = null,
        bool $default = false,
        bool $brand = false,
        bool $danger = false,
        bool $info = false,
        bool $success = false,
        bool $muted = false,
        bool $warning = false
    ) {
        $this->rowStyle = $this->rowStyle($rowStyle, [
            'default' => $default,
            'brand' => $brand,
            'danger' => $danger,
            'info' => $info,
            'success' => $success,
            'muted' => $muted,
            'warning' => $warning,
        ]);

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'hover' => $hover,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ], ['background', 'hover', 'color'], $this->component. '.' . $this->rowStyle);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.tables.row');
    }

    private function rowStyle($rowStyle, $styles, $default = 'default'): string
    {
        if ($this->validStyle($rowStyle)) {
            return $rowStyle;
        }

        foreach ($styles as $style => $enable) {
            if ($enable) {
                return $style;
            }
        }

        return 'default';
    }

    private function validStyle($style): bool
    {
        return in_array($style, $this->styles, true);
    }
}
