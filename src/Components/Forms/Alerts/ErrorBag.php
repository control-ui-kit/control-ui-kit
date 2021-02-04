<?php

namespace ControlUIKit\Components\Forms\Alerts;

use ControlUIKit\Traits\UseLanguageString;
use Illuminate\View\Component;

class ErrorBag extends Component
{
    use UseLanguageString;

    public function __construct() {}

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.alerts.error-bag');
    }
}
