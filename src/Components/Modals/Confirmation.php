<?php

namespace ControlUIKit\Components\Modals;

use Illuminate\View\Component;

class Confirmation extends Component
{
    /** @var string */
    public $id;

    /** @var string */
    public $maxWidth;

    public function __construct(?string $id = null, string $maxWidth = '2xl')
    {
        $this->id = $id;
        $this->maxWidth = $maxWidth;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.modals.confirmation');
    }
}
