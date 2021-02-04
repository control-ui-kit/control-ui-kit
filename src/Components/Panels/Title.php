<?php

namespace ControlUIKit\Components\Panels;

use Illuminate\View\Component;

class PanelTitleComponent extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.panels.title');
    }
}
