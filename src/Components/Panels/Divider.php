<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Panels;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Divider extends Component
{
    use UseThemeFile;

    protected string $component = 'panel-divider';

    public function __construct(string $border = null) {
        $this->setConfigStyles(['border' => $border]);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.panels.divider');
    }
}
