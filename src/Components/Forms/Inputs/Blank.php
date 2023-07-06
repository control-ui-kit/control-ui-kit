<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

class Blank extends Input
{
    protected string $component = 'input-blank';

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.blank');
    }
}
