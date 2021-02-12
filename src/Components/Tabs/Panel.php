<?php

namespace ControlUIKit\Components\Tabs;

use Illuminate\View\Component;

class Panel extends Component
{
    public string $id;

    public ?string $component;

    public function __construct(string $id, string $component = null)
    {
        $this->id = $id;
        $this->component = $component;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tabs.panel');
    }
}
