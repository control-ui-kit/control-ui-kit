<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Layouts;

use Illuminate\View\Component;

class Body extends Component
{
    protected string $component = 'body';

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.layouts.body');
    }
}
