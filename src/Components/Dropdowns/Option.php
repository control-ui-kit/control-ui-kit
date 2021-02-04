<?php

namespace ControlUIKit\Components\Dropdowns;

use Illuminate\View\Component;

class Option extends Component
{
    public ?string $url;

    public function __construct(string $url = null) {
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
