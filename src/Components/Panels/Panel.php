<?php

namespace ControlUIKit\Components\Panels;

use Illuminate\View\Component;

class Panel extends Component
{
    public ?string $title;

    public string $shadow;

    public string $rounded;

    public bool $padding;

    public bool $margin;

    public bool $border;

    public function __construct(
        $title = null,
        string $shadow = 'shadow',
        string $rounded = 'sm:rounded',
        bool $paddingless = false,
        bool $marginless = false,
        bool $borderless = false
    ) {
        $this->title = $title;
        $this->shadow = $shadow;
        $this->rounded = $rounded;
        $this->padding = $paddingless ? '' : 'p-6';
        $this->margin = $marginless ? '' : 'sm:mx-6';
        $this->border = $borderless ? '' : 'border border-panel';
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.panels.panel');
    }
}
