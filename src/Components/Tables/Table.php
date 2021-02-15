<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use Illuminate\View\Component;

class Table extends Component
{
    public string $shadow;
    public string $rounded;
    public string $padding;
    public string $margin;
    public string $border;

    public function __construct(
        string $shadow = 'shadow',
        string $rounded = 'sm:rounded',
        bool $paddingless = false,
        bool $marginless = false,
        bool $borderless = false
    ) {
        $this->shadow = $shadow;
        $this->rounded = $rounded;
        $this->padding = $paddingless ? '' : 'p-6';
        $this->margin = $marginless ? '' : 'sm:mx-6';
        $this->border = $borderless ? '' : 'border border-table';
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.table');
    }
}
