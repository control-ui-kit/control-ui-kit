<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    public string $name;
    public string $label;
    public string $help;

    public function __construct(
        string $name,
        string $label = null,
        string $help = null
    ) {
        $this->name = $name;

        $this->label = $label ?? '';
        $this->help = $help ?? '';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.checkbox');
    }
}
