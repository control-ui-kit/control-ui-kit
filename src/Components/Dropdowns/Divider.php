<?php

namespace ControlUIKit\Components\Dropdowns;

use Illuminate\View\Component;

class Divider extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.dropdowns.divider');
    }
}
