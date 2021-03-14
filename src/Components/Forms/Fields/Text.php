<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use ControlUIKit\Traits\UseLanguageString;
use Illuminate\View\Component;

class Text extends Component
{
    use UseLanguageString;
//
    public string $name;
//    public string $id;
//    public string $value;
    public string $label;
    public string $placeholder;
    public string $help;

    public function __construct(
        string $name,
//        string $id = null,
//        string $value = null,
        string $label = null,
        string $placeholder = null,
        string $help = null
    ) {
        $this->name = $name;
//        $this->id = $id ?? $name;
//        $this->value = old($name, $value ?? '');
        $this->label = $label ?? $this->getLanguageString('label');
        $this->placeholder = $placeholder ?? $this->getLanguageString('placeholder');
        $this->help = $help ?? $this->getLanguageString('help');
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.text');
    }
}
