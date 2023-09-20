<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\Contracts\View\View;

class PercentField extends InputField
{
    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.percent');
    }
}
