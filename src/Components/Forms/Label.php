<?php

namespace ControlUIKit\Components\Forms;

use Illuminate\View\Component;

class Label extends Component
{
    /** @var string */
    public $for;

    public function __construct(string $for) {
        $this->for = $for;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.label');
    }
}
