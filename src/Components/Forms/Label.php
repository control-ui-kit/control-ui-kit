<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Label extends Component
{
    protected string $component = 'label';

    public string $for;

    public function __construct(
        string $for
    ) {
        $this->for = $for;
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.label');
    }

    public function fallback(): string
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
