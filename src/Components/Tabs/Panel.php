<?php

namespace ControlUIKit\Components\Tabs;

use Illuminate\View\Component;

class Panel extends Component
{
    /** @var string */
    public $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tabs.panel');
    }
}
