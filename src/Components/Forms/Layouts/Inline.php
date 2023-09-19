<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Layouts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Inline extends Component
{
    public ?string $name;
    public ?string $for;
    public ?string $input;
    public ?string $label;
    public ?string $help;
    public bool $required = false;

    public function __construct(
        string $name = null,
        string $for = null,
        string $label = null,
        string $input = null,
        string $help = null,
        bool $required = false
    ) {
        $this->name = $name;
        $this->for = $for;
        $this->input = $input;
        $this->label = $label;
        $this->help = $help;
        $this->required = $required;
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.layouts.inline');
    }
}
