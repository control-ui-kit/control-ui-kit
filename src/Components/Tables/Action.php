<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Action extends Component
{
    use UseThemeFile;

    protected string $component = 'table-action';

    public string $icon;

    public function __construct(
        string $icon = null,

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

        $this->icon = $icon ?: 'icon-question';
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.action');
    }
}
