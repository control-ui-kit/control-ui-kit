<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Number extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-number';

    public string $name;
    public string $id;
    public ?string $value;
    public ?string $placeholder;

    public function __construct(
        string $name,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $id = null,
        string $type = 'text',
        string $value = null,
        string $placeholder = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
        $this->placeholder = $placeholder ?? $this->getLanguageString('placeholder');

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);
    }
    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.number');
    }
}
