<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Dropdowns;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Divider extends Component
{
    protected string $component = 'dropdown-divider';

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.dropdowns.divider');
    }
}
