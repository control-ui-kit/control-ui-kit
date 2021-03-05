<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

class Search extends Input
{
    protected string $component = 'input-search';

    protected function init(): void
    {
        $this->type = 'search';
        $this->iconLeft = $this->iconLeft ?? 'icon.search';
        $this->iconBorder = $this->iconBorder ?? 'none';
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.input');
    }
}
