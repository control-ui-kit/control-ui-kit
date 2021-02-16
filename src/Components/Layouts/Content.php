<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Layouts;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Content extends Component
{
    use UseThemeFile;

    protected string $component = 'layout-content';

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null
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
        ]);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.layouts.content');
    }
}
