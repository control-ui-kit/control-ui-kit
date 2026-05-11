<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;

class Link extends Blank
{
    protected string $component = 'input-link';

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.link');
    }
}
