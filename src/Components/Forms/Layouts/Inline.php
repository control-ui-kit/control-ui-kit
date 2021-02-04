<?php

namespace ControlUIKit\Components\Forms\Layouts;

use Illuminate\View\Component;

class Inline extends Component
{
    /** @var string */
    public $name;

    /** @var string */
    public $label;

    /** @var bool */
    public $help;

    public function __construct(string $name, string $label, string $help)
    {
        $this->name = $name;
        $this->label = $label;
        $this->help = $help;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.layouts.inline');
    }
}
