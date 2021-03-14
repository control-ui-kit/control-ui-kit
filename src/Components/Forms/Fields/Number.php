<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use ControlUIKit\Traits\UseLanguageString;
use Illuminate\View\Component;

class Number extends Component
{
    use UseLanguageString;

    public string $name;
    public string $label;
    public string $placeholder;
    public ?string $help;

    public function __construct(
        string $name,
        string $label = null,
        string $placeholder = null,
        string $help = null
    ) {
        $this->name = $name;
        $this->label = $label ?? $this->getLanguageString('label');
        $this->placeholder = $placeholder ?? $this->getLanguageString('placeholder');
        $this->help = $help ?? $this->getLanguageString('help');
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.number');
    }
}
