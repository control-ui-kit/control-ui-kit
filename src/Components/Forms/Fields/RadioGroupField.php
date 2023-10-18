<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\Contracts\View\View;

class RadioGroupField extends InputField
{
    public array|string $options;

    public function __construct(
        array|string $options,
        string $name = null,
        string $label = null,
        string $help = null,
        string $value = null,
        string $layout = null
    ) {
        parent::__construct($name, $label, $help, $value, $layout);

        $this->options = $options;
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.radio-group');
    }
}
