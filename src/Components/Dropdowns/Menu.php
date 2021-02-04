<?php

namespace ControlUIKit\Components\Dropdowns;

use Illuminate\View\Component;

class Menu extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.dropdowns.menu');
    }
}
