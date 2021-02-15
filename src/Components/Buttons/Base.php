<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Buttons;

use Illuminate\View\Component;

class Base extends Component
{
    protected string $component = 'button-base';

    public string $href;
    public ?string $icon;
    public string $version;
    public string $element;

    public function __construct(
        string $href = null,
        string $icon = null,
        string $version = 'default'
    ) {
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
