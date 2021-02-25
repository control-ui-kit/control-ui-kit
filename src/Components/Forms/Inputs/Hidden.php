<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Hidden extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-hidden';

    public string $name;
    public string $id;
    public string $value;

    public function __construct(
        string $name,
        string $other = null,
        string $padding = null,
        string $id = null,
        ?string $value = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');

        $this->setConfigStyles([
            'other' => $other,
            'padding' => $padding,
        ]);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.hidden');
    }
}
