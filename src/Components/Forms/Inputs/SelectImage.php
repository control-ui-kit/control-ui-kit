<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\View\Component;

class SelectImage extends Component
{
    public ?string $src;

    public function __construct(string $src = null) {
        $this->src = $src;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.select.image');
    }
}
