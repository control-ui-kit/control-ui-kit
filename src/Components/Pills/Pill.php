<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Pills;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Pill extends Component
{
    use UseThemeFile;

    protected string $component = 'pill';

    public string $pillStyle;
    public ?string $name;

    private array $styles = [
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
        string $name = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $pillStyle = null,
        string $shadow = null,
        array $styles = null,
        bool $brand = false,
        bool $danger = false,
        bool $default = false,
        bool $info = false,
        bool $success = false,
        bool $muted = false,
        bool $warning = false
    ) {
        $this->name = $name;

        if ($pillStyle) {

            $this->pillStyle = $pillStyle;

        } elseif ($this->name && $this->customStyleExists()) {

            $this->pillStyle = $this->nameFormat();

        } else {

            $this->pillStyle = $this->pillStyle($pillStyle, [
                'brand' => $brand,
                'danger' => $danger,
                'default' => $default,
                'info' => $info,
                'success' => $success,
                'muted' => $muted,
                'warning' => $warning,
            ]);

        }

        $this->setConfigStyles([
            'background' => $styles['background'] ?? $background,
            'border' => $styles['border'] ?? $border,
            'color' => $styles['color'] ?? $color,
            'font' => $styles['font'] ?? $font,
            'other' => $styles['other'] ?? $other,
            'padding' => $styles['padding'] ?? $padding,
            'rounded' => $styles['rounded'] ?? $rounded,
            'shadow' => $styles['shadow'] ?? $shadow,
        ], ['background', 'color'], $this->component. '.' . $this->pillStyle);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.pills.pill');
    }

    private function pillStyle($pillStyle, $styles): string
    {
        if ($this->validStyle($pillStyle)) {
            return $pillStyle;
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

    private function nameFormat(): string
    {
        return (string) Str::of($this->name)->kebab();
    }

    private function customStyleExists(): bool
    {
        return $this->customStyle('color') !== null;
    }

    private function customStyle($element): ?string
    {
        return config($this->theme() . '.' . $this->component . '.' . $this->nameFormat() . '.' . $element);
    }


}
