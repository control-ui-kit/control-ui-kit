<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class ColorPicker extends Component
{
    use UseThemeFile;

    protected string $component = 'input-color-picker';

    public string $name;
    public string $id;
    public ?string $placeholder;
    public ?string $value;

    public function __construct(
        string $name,
        string $placeholder = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $id = null,
        string $value = '1'
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
        $this->placeholder = $placeholder ?? '';

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
        return view('control-ui-kit::control-ui-kit.forms.inputs.color-picker');
    }
}
