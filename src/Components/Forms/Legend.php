<?php

namespace ControlUIKit\Components\Forms;

use Illuminate\View\Component;

class Legend extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.legend');
    }
}
