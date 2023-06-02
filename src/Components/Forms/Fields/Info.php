<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\View\Component;

class Info extends Component
{
    public string $label;
    public string $help;
    public string $value;

    public function __construct(
        string $label = null,
        string $help = null,
        string $value = null
    ) {
        $this->label = $label ?? '';
        $this->help = $help ?? '';
        $this->value = $value ?? '';
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.info');
    }
}
