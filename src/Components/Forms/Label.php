<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Label extends Component
{
    use UseThemeFile;

    protected string $component = 'label';

    public ?string $for;

    public function __construct(
        string $for = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        array $styles = null,
    ) {
        $this->for = $for;

        $background = $styles['background'] ?? $background;
        $border = $styles['border'] ?? $border;
        $color = $styles['color'] ?? $color;
        $font = $styles['font'] ?? $font;
        $other = $styles['other'] ?? $other;
        $padding = $styles['padding'] ?? $padding;
        $rounded = $styles['rounded'] ?? $rounded;
        $shadow = $styles['shadow'] ?? $shadow;

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow
        ]);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.label');
    }

    public function fallback(): string
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
