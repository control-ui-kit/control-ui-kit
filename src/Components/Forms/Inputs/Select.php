<?php

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\View\Component;

class Select extends Component
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var string */
    public $value;

    public $options;
    public $optionValue;
    public $optionText;

    public function __construct(string $name, string $id = null, $options = [], ?string $value = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
        $this->options = $options;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.select', [
//            'selected' => $this->selected()
        ]);
    }

    public function selected($option)
    {
        if ($this->value === 'all') {
            return false;
        }

        return $option === $this->value ? 'selected=selected' : '';
    }
}