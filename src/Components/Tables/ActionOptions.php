<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionOptions extends Component
{
    use UseThemeFile;

    protected string $component = 'table-action-options';

    public string $icon;

    public function __construct(
        string $icon = null

//        string $background = null,
//        string $border = null,
//        string $color = null,
//        string $font = null,
//        string $other = null,
//        string $padding = null,
//        string $rounded = null,
//        string $shadow = null
    ) {
//        $this->setConfigStyles([
//            'background' => $background,
//            'border' => $border,
//            'color' => $color,
//            'font' => $font,
//            'other' => $other,
//            'padding' => $padding,
//            'rounded' => $rounded,
//            'shadow' => $shadow,
//        ]);

        $this->icon = $icon ?: 'icon-options';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.tables.action-options');
    }
}
