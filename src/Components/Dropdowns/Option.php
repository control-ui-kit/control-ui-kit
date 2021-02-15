<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Dropdowns;

use Illuminate\View\Component;

class Option extends Component
{
    protected string $component = 'dropdown.option';

    public ?string $url;

    public function __construct(
        string $url = null
    ) {
        $this->url = $url;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.dropdowns.option', [
            'href' => $this->href()
        ]);
    }

    private function href(): string
    {
        return ($this->url && $this->url !== '#') ? 'href="' . $this->url . '"' : '';
    }
}
