<?php

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\View\Component;

class Hidden extends Component
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var string */
    public $value;

    public function __construct(string $name, string $id = null, ?string $value = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.hidden');
    }
}
