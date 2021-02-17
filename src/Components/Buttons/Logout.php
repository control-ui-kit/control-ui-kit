<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Buttons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logout extends Component
{
    public string $action;

    public function __construct(string $action = null)
    {
        $this->action = $action ?? route('logout');
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.buttons.logout');
    }
}
