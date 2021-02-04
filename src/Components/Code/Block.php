<?php

namespace ControlUIKit\Components\Code;

use Illuminate\View\Component;

class Block extends Component
{
    public $language;

    public function __construct(string $language = 'html') {
        $this->language = $language;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.code.block');
    }
}
