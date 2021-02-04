<?php

namespace ControlUIKit\Components\Tables;

use Illuminate\View\Component;

class Row extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.row');
    }
}
