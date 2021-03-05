<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Integer extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-integer';

    public string $name;
    public string $id;
    public ?string $value;
    public ?string $placeholder;
    public ?string $step;
    public ?string $min;
    public ?string $max;

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
        string $step = null,
        string $min = null,
        string $max = null,
        string $id = null,
        string $value = null,
        string $placeholder = null
    ) {
        if (!is_null($min) && !is_null($max) && $min > $max) {
            $old = $min;
            $min = $max;
            $max = $old;
            unset($old);
        }

        if (!is_null($min) && !is_null($value) && $value < $min) {
            $value = $min;
        }

        if (!is_null($max) && !is_null($value) && $value > $max) {
            $value = $max;
        }

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

        $this->step = $this->style($this->component, 'step', $step);
        $this->min = $this->style($this->component, 'min', $min);
        $this->max = $this->style($this->component, 'max', $max);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.integer');
    }
}
