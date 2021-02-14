<?php

namespace ControlUIKit\Components\Panels;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Panel extends Component
{
    use UseThemeFile;

    public ?string $title;
    public string $background;
    public string $border;
    public string $color;
    public string $padding;
    public string $rounded;
    public string $shadow;
    public ?string $dynamicComponent;

    public function __construct(
        $title = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $component = null
    ) {
        $this->title = $title;
        $this->background = $this->style('panel', 'background', $background);
        $this->border = $this->style('panel', 'border', $border);
        $this->color = $this->style('panel', 'color', $color);
        $this->padding = $this->style('panel', 'padding', $padding);
        $this->rounded = $this->style('panel', 'rounded', $rounded);
        $this->shadow = $this->style('panel', 'shadow', $shadow);
        $this->dynamicComponent = $component;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.panels.panel');
    }
}
