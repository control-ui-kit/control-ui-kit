<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Layouts;

use Illuminate\View\Component;

class Inline extends Component
{
    public string $name;
    public string $label;
    public string $help;

    public function __construct(
        string $name,
        string $label,
        string $help
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->help = $help;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.layouts.inline');
    }
}
