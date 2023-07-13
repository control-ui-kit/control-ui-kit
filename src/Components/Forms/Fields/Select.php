<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public string $label;
    public string $placeholder;
    public string $help;
    public mixed $options;

    public function __construct(
        string $name,
        mixed $options,
        string $label = null,
        string $placeholder = null,
        string $help = null
    ) {
        $this->name = $name;
        $this->options = $options;
        $this->label = $label ?? '';
        $this->placeholder = $placeholder ?? '';
        $this->help = $help ?? '';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.select');
    }
}
