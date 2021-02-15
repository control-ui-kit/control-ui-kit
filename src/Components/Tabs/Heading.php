<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tabs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Heading extends Component
{
    use UseThemeFile;

    public string $id;
    public string $name;
    public ?string $icon;
    public string $size;
    public string $shadow;
    public string $rounded;
    public string $padding;
    public string $border;
    public string $font;
    public string $active;
    public string $inactive;

    public function __construct(
        string $id,
        string $name = 'tabs',
        string $icon = null,
        string $iconSize = null,
        string $shadow = null,
        string $rounded = null,
        string $padding = null,
        string $border = null,
        string $font = null,
        string $active = null,
        string $inactive = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->border = $this->style('tabs.heading', 'border', $border);
        $this->font = $this->style('tabs.heading', 'font', $font);
        $this->padding = $this->style('tabs.heading', 'padding', $padding);
        $this->rounded = $this->style('tabs.heading', 'rounded', $rounded);
        $this->shadow = $this->style('tabs.heading', 'shadow', $shadow);
        $this->active = $this->style('tabs.heading', 'active', $active);
        $this->inactive = $this->style('tabs.heading', 'inactive', $inactive);
        $this->size = $this->style('tabs.heading', 'icon-size', $iconSize);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tabs.heading');
    }
}
