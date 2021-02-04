<?php

namespace ControlUIKit\Components\Forms;

use Illuminate\View\Component;

class Form extends Component
{
    /** @var string */
    public $route;

    /** @var string */
    public $method;

    /** @var bool */
    public $uploads;

    public function __construct(string $route, string $method = 'POST', bool $uploads = false)
    {
        $this->route = $route;
        $this->method = strtoupper($method);
        $this->uploads = $uploads;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.form');
    }
}
