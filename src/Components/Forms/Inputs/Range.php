<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Range extends Component
{
    use UseThemeFile;

    protected string $component = 'input-range';

    public string $name;
    public string $id;
    public string $min;
    public string $max;
    public ?string $value;

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
        string $min = null,
        string $max = null,
        string $id = null,
        string $value = '1'
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');

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

        $this->min = $this->style($this->component, 'min', $min);
        $this->max = $this->style($this->component, 'max', $max);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.range');
    }
}
