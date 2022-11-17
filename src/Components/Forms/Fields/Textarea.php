<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\View\Component;

class Textarea extends Component
{
    public string $name;
    public string $label;
    public string $placeholder;
    public string $help;

    public function __construct(
        string $name,
        string $label = null,
        string $placeholder = null,
        string $help = null
    ) {
        $this->name = $name;
        $this->label = $label ?? '';
        $this->placeholder = $placeholder ?? '';
        $this->help = $help ?? '';
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.textarea');
    }
}
