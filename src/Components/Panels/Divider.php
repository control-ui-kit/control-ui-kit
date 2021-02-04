<?php

namespace ControlUIKit\Components\Panels;

use Illuminate\View\Component;

class PanelDividerComponent extends Component
{
    public function __construct() {}

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.panels.divider');
    }
}
