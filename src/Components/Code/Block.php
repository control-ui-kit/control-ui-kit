<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Code;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Block extends Component
{
    protected string $component = 'code-block';

    public string $language;

    public function __construct(
        string $language = 'html'
    ) {
        $this->language = $language;
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.code.block');
    }
}
