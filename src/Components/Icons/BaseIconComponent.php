<?php

namespace ControlUIKit\Components\Icons;

use Illuminate\View\Component;

class BaseIconComponent extends Component
{
    public string $class;

    public function __construct()
    {
        $this->class = config('control-ui-kit.icon_class');
    }

    public function render() {}
}
