<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms;

use Illuminate\View\Component;

class FormField extends Component
{
    protected string $component = 'field';

    public string $input;
    public string $layout;

    public function __construct(
        string $input,
        string $layout
    ) {
        $this->input = 'input-' . $input;
        $this->layout = 'form-layouts-' . $layout;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.form-field');
    }
}
