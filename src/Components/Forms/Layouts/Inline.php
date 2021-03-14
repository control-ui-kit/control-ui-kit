<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Layouts;

use Illuminate\View\Component;

class Inline extends Component
{
    public string $name;
    public string $input;
    public string $label;
    public ?string $help;

    public function __construct(
        string $name,
        string $input,
        string $label,
        string $help = null
    ) {
        $this->name = $name;
        $this->input = $input;
        $this->label = $label;
        $this->help = $help;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.layouts.inline');
    }
}
