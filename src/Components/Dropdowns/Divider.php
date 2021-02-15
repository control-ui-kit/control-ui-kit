<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Dropdowns;

use Illuminate\View\Component;

class Divider extends Component
{
    protected string $component = 'dropdown.divider';

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.dropdowns.divider');
    }
}
