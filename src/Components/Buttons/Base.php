<?php

namespace ControlUIKit\Components\Buttons;

use Illuminate\View\Component;

class Base extends Component
{
    /** @var string */
    public $href;

    /** @var string */
    public $icon;

    /** @var string */
    public $version;

    /** @var string */
    public $element;

    public function __construct(string $href = null, string $icon = null, string $version = 'default')
    {
        $this->href = $href ?? 'href="' . $href . '"';
        $this->icon = $icon;
        $this->version = $version;
        $this->element = $this->href ? 'a' : 'button';
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.buttons.base');
    }
}
