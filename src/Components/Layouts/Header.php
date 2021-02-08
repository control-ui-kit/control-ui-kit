<?php

namespace ControlUIKit\Components\Layouts;

use Illuminate\View\Component;

class Header extends Component
{
    public string $padding;

    public string $border;

    public function __construct(
        bool $paddingless = false,
        bool $borderless = false
    ) {
        $this->padding = $paddingless ? '' : 'py-8';
        $this->border = $borderless ? '' : 'border border-header';
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.layouts.header');
    }
}
