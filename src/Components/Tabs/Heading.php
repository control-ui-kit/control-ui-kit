<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tabs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Heading extends Component
{
    use UseThemeFile;

    protected string $component = 'tabs-heading';

    public string $id;
    public string $name;
    public ?string $icon;
    public string $size;

    public string $active;
    public string $inactive;

    public function __construct(
        string $id,
        string $name = 'tabs',

        string $icon = null,
        string $iconSize = null,

        string $active = null,
        string $inactive = null,

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
        $this->name = $name;
        $this->icon = $icon;

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

        $this->active = $this->style($this->component, 'active', $active);
        $this->inactive = $this->style($this->component, 'inactive', $inactive);
        $this->size = $this->style($this->component, 'icon-size', $iconSize);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.tabs.heading');
    }
}
