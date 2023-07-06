<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Field extends Component
{
    public string $name;
    public string $label;
    public string $help;
    public bool $required;

    public function __construct(
        string $name = null,
        string $label = null,
        string $help = null,
        bool $required = false
    ) {
        $this->name = $name ?? '';
        $this->label = $label ?? '';
        $this->required = $required;
        $this->help = $help ?? '';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.field');
    }
}
