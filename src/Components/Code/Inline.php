<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Code;

use Illuminate\View\Component;

class Inline extends Component
{
    protected string $component = 'code';

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.code.inline');
    }
}
