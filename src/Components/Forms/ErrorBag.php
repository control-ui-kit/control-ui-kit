<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms;

use ControlUIKit\Traits\UseLanguageString;
use Illuminate\View\Component;

class ErrorBag extends Component
{
    use UseLanguageString;

    public $bag;
    public string $type;

    public function __construct(
        $bag = null,
        string $type = 'danger'
    ) {
        $this->bag = $bag;
        $this->type = $type;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.alerts.error-bag');
    }
}
