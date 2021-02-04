<?php

namespace ControlUIKit\Components\Tabs;

use Illuminate\View\Component;

class Heading extends Component
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    public function __construct(string $id, string $name = 'tabs')
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tabs.heading');
    }
}
