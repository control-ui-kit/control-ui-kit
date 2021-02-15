<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Panels;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Divider extends Component
{
    use UseThemeFile;

    public string $border;

    public function __construct(
        string $border = null
    ) {
        $this->border = $this->style('panel-divider', 'border', $border);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.panels.divider');
    }
}
