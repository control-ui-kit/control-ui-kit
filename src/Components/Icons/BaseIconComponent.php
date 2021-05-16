<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Icons;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class BaseIconComponent extends Component
{
    use UseThemeFile;

    protected string $component = 'icon';

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $size = null,
        array $styles = null
    ) {
        $this->setConfigStyles([
            'background' => $styles['background'] ?? $background,
            'border' => $styles['border'] ?? $border,
            'color' => $styles['color'] ?? $color,
            'other' => $styles['other'] ?? $other,
            'padding' => $styles['padding'] ?? $padding,
            'rounded' => $styles['rounded'] ?? $rounded,
            'shadow' => $styles['shadow'] ?? $shadow,
            'size' => $styles['size'] ?? $size,
        ]);
    }

    public function render() {}
}
