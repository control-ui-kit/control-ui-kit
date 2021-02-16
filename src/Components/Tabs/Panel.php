<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tabs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Panel extends Component
{
    use UseThemeFile;

    protected string $component = 'tabs-panel';

    public string $id;
    public ?string $dynamicComponent;

    public function __construct(
        string $id,
        string $component = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null
    ) {
        $this->id = $id;
        $this->dynamicComponent = $component;

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

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tabs.panel');
    }
}
