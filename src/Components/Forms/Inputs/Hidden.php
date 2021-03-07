<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\View\Component;

class Hidden extends Component
{
    protected string $component = 'input-hidden';

    public string $name;
    public string $id;
    public string $value;

    public function __construct(
        string $name,
        string $id = null,
        ?string $value = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? $name);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.hidden');
    }
}
