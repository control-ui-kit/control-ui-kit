<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms;

use Illuminate\View\Component;

class Form extends Component
{
    protected string $component = 'form';

    public string $action;
    public string $method;
    public bool $uploads;

    public function __construct(
        string $action,
        string $method = 'POST',
        bool $uploads = false
    ) {
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->uploads = $uploads;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.form');
    }
}
