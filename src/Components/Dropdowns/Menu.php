<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Dropdowns;

use ControlUIKit\Traits\UseInputTheme;
use Illuminate\View\Component;

class Menu extends Component
{
    use UseInputTheme;

    protected string $component = 'dropdown-menu';

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
        return view('control-ui-kit::control-ui-kit.dropdowns.menu');
    }
}
