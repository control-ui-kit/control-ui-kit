<?php

namespace ControlUIKit\Components\Tabs;

use Illuminate\View\Component;

class Tabs extends Component
{
    /** @var string */
    public $selected;

    /** @var string */
    public $name;

    public function __construct(string $selected, string $name = 'tabs') {
        $this->selected = $selected;
        $this->name = $name;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tabs.tabs');
    }
}
