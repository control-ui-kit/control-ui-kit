<?php

namespace ControlUIKit\Components\Tabs;

use Illuminate\View\Component;

class Heading extends Component
{
    public string $id;

    public string $name;

    public ?string $icon;

    public string $size;

    public function __construct(string $id, string $name = 'tabs', ?string $icon = null, string $iconSize = 'w-4 h-4')
    {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->size = $iconSize;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tabs.heading');
    }
}
