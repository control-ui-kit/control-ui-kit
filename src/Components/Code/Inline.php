<?php

namespace ControlUIKit\Components\Code;

use Illuminate\View\Component;

class Inline extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.code.inline');
    }
}
