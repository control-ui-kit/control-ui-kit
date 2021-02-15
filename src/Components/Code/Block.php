<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Code;

use Illuminate\View\Component;

class Block extends Component
{
    public string $language;

    public function __construct(
        string $language = 'html'
    ) {
        $this->language = $language;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.code.block');
    }
}
