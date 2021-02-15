<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use Illuminate\View\Component;

class EmptyRow extends Component
{
    protected string $component = 'table.empty';

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.empty');
    }
}
