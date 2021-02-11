<?php

namespace ControlUIKit\Components\Tabs;

use Illuminate\View\Component;

class Tabs extends Component
{
    public ?string $selected;

    public string $name;

    public function __construct(string $selected = null, string $name = 'tabs') {
        $this->selected = $selected;
        $this->name = $name;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tabs.tabs');
    }
}
