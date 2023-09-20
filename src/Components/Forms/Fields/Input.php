<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $name;
    public string $label;
    public string $help;
    public string $value;

    public function __construct(
        string $name = null,
        string $label = null,
        string $help = null,
        string $value = null
    ) {
        $this->name = $name ?? '';
        $this->label = $label ?? '';
        $this->value = $value ?? '';
        $this->help = $help ?? '';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.input');
    }
}
