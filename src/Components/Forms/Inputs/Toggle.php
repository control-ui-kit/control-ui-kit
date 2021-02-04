<?php

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\View\Component;

class Toggle extends Component
{
    public string $name;

    public string $id;

    public string $on;

    public string $off;

    public string $value;

    public function __construct(string $name, string $on = '1', string $off = '0', string $value = null, string $id = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->on = $on;
        $this->off = $off;
        $this->value = old($name, $this->validValue($value ?? $off));
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.toggle');
    }

    private function validValue($value): string
    {
        return !in_array($value, [$this->on, $this->off], true) ? $this->off : $value;
    }
}
