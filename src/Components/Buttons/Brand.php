<?php

namespace ControlUIKit\Components\Buttons;

use Illuminate\View\Component;

class Brand extends Component
{
    /** @var string */
    public $href;

    /** @var string */
    public $icon;

    public function __construct(string $href = '', string $icon = '')
    {
        $this->href = $href;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.buttons.brand');
    }
}
