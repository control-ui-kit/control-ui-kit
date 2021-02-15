<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Icons;

use Illuminate\View\Component;

class BaseIconComponent extends Component
{
    public string $class;

    public function __construct(
        string $size = 'w-5 h-5'
    ) {
        $this->class = "fill-current {$size}";
    }

    public function render() {}
}
