<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\View\Component;

class SelectCheckedIcon extends Component
{
    public string $value;
    public string $selectedIcon;
    public string $selectedIconSize;

    public function __construct(string $value, string $selectedIcon, string $selectedIconSize) {
        $this->value = $value;
        $this->selectedIcon = $selectedIcon;
        $this->selectedIconSize = $selectedIconSize;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.select.checked-icon');
    }
}
