<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Modals;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Confirmation extends Component
{
    public ?string $id;
    public string $maxWidth;

    public function __construct(
        string $id = null,
        string $maxWidth = '2xl'
    ) {
        $this->id = $id;
        $this->maxWidth = $maxWidth;
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.modals.confirmation');
    }
}
