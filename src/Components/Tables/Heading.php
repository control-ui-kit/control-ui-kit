<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use Illuminate\View\Component;

class Heading extends Component
{
    protected string $component = 'table.heading';

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.heading');
    }
}
