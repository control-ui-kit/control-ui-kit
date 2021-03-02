<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Exceptions\InputNumberException;
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
    public ?string $min;
    public ?string $max;
    public ?string $step;

    public function __construct(
        string $name,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $min = null,
        string $max = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $step = null,
        string $id = null,
        string $value = null,
        string $placeholder = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->min = $this->validateNumber($min, 'Min');
        $this->max = $this->validateNumber($max, 'Max');
        $this->step = $this->validateNumber($step, 'Step');
        $this->value = old($name, $value ?? '');
        $this->placeholder = $placeholder ?? $this->getLanguageString('placeholder');

        $this->validateMinMax();
        $this->validateValue();

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

    private function validateMinMax(): void
    {
        if ($this->min > $this->max) {
            throw (new InputNumberException)::make('minMaxSolution', 'Specified min cannot be higher than specified max');
        }
    }

    private function validateValue(): void
    {
        if (is_null($this->value)) {
            return;
        }

        if (! is_null($this->min) && $this->value < $this->min) {
            throw (new InputNumberException)::make('valueLowerSolution', 'Value cannot be lower than specified min');
        }

        if (! is_null($this->max) && $this->value > $this->max) {
            throw (new InputNumberException)::make('valueHigherSolution', 'Value cannot be higher than specified max');
        }
    }

    private function validateNumber($number, $type): ?string
    {
        if (is_null($number)) {
            return null;
        }

        if (is_numeric($number)) {
            return $number;
        }

        throw (new InputNumberException)::make("nonNumeric{$type}Solution", 'Number not numeric ['.$type.']');
    }
}
