<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormField extends Component
{
    protected string $component = 'field';

    public ?string $input;
    public string $layout;

    public function __construct(
        string $layout,
        string $input = null
    ) {
        if ($input === 'input') {
            $this->input = 'input';
        } else {
            $this->input = $input ? 'input-' . $input : null;
        }

        $this->layout = 'form-layouts-' . $layout;
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.form-field');
    }
}
