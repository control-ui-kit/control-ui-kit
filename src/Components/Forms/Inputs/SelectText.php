<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\View\Component;

class SelectText extends Component
{
    public string $value;
    public ?string $subtext;
    public string $text;
    public array $styles;

    public function __construct(
        string $value,
        string $text,
        array $styles,
        string $subtext = null
    ) {
        $this->value = $value;
        $this->subtext = $subtext;
        $this->text = $text;
        $this->styles = $styles;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.select.text');
    }
}
