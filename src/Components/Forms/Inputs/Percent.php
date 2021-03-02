<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Exceptions\InputNumberException;
use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Percent extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-percent';

    public string $name;
    public string $id;
    public ?string $icon = null;
//    public string $icon = 'icon.percent';
//    public string $iconPosition = 'right';
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
        return view('control-ui-kit::control-ui-kit.forms.inputs.percent');
    }

    private function validateValue(): void
    {
        if (is_null($this->value)) {
            return;
        }

        if ($this->value < 0) {
            throw (new InputNumberException)::make('valueLowerSolution', 'Value cannot be lower than specified min');
        }

        if ($this->value > 100) {
            throw (new InputNumberException)::make('valueHigherSolution', 'Value cannot be higher than specified max');
        }
    }
}
