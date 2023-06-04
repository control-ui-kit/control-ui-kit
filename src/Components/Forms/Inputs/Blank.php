<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

class Blank extends Input
{
    protected string $component = 'input-blank';

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.blank');
    }
}
