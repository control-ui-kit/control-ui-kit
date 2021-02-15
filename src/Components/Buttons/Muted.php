<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Buttons;

use Illuminate\View\Component;

class Muted extends Component
{
    protected string $component = 'button-muted';

    public string $href;
    public string $icon;

    public function __construct(
        string $href = '',
        string $icon = ''
    ) {
        $this->href = $href;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.buttons.muted');
    }
}
