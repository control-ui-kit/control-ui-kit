<?php

namespace ControlUIKit\Components\Tabs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Panel extends Component
{
    use UseThemeFile;

    public string $id;
    public string $background;
    public string $border;
    public string $color;
    public string $padding;
    public string $rounded;
    public string $shadow;
    public ?string $dynamicComponent;

    public function __construct(
        string $id,
        string $background = null,
        string $border = null,
        string $color = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $component = null
    ) {
        $this->id = $id;
        $this->background = $this->style('tabs.panel', 'background', $background);
        $this->border = $this->style('tabs.panel', 'border', $border);
        $this->color = $this->style('tabs.panel', 'color', $color);
        $this->padding = $this->style('tabs.panel', 'padding', $padding);
        $this->rounded = $this->style('tabs.panel', 'rounded', $rounded);
        $this->shadow = $this->style('tabs.panel', 'shadow', $shadow);
        $this->dynamicComponent = $component;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tabs.panel');
    }
}
