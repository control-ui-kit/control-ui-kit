<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use Illuminate\View\Component;

class Base extends Component
{
    use UseLanguageString;

    public string $name;
    public string $id;
    public string $type;
    public string $value;
    public string $placeholder;

    public function __construct(
        string $name,
        string $id = null,
        string $type = 'text',
        ?string $value = null,
        ?string $placeholder = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value ?? '');
        $this->placeholder = $placeholder ?? $this->getLanguageString('placeholder');
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.text');
    }
}
