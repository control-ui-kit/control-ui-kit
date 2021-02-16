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
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $size = null
    ) {
        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'size' => $size,
        ]);
    }

    public function render() {}
}
