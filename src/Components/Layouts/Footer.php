<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Layouts;

use Illuminate\View\Component;

class Footer extends Component
{
    protected string $component = 'footer';

    public string $padding;
    public string $border;

    public function __construct(
        bool $paddingless = false,
        bool $borderless = false
    ) {
        $this->padding = $paddingless ? '' : 'py-6';
        $this->border = $borderless ? '' : 'border border-footer';
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.layouts.footer');
    }
}
