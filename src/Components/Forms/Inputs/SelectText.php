<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\View\Component;

class SelectText extends Component
{
    public string $value;
    public string $text;
    public ?string $subtext;
    public $option;

    public function __construct(
        string $value,
        string $text,
        string $subtext = null,
        $option = null
    ) {
        $this->value = $value;
        $this->text = $text;
        $this->option = $option;
        $this->subtext = $subtext;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.select.text');
    }

    public function usingOptionArray(): bool
    {
        return is_array($this->option);
    }
}
