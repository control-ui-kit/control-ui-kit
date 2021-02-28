<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Date extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-date';

    public string $name;
    public string $id;
    public ?string $value;
    public ?string $format;
    public ?string $minDate;
    public ?string $maxDate;

    public ?string $range;
    public ?string $rangeEndName;
    public ?string $rangeEndId;
    public ?string $rangeEndValue;


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
        string $format = null,

        string $minDate = null,
        string $maxDate = null,

        string $range = null,
        string $rangeEndName = null,
        string $rangeEndId = null,
        string $rangeEndValue = null,

        string $id = null,
        string $value = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
        $this->format = is_null($format) ? 'DD/MM/YYYY' : $format;

        $this->minDate = $minDate;
        $this->maxDate = $maxDate;

        $this->range = $range;
        $this->rangeEndName = is_null($rangeEndName) ? "{$this->name}_to" : $rangeEndName;
        $this->rangeEndId = !is_null($rangeEndId) ? $rangeEndId : $this->rangeEndName;
        $this->rangeEndValue = !is_null($rangeEndValue) ? $rangeEndValue : $value;

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
        return view('control-ui-kit::control-ui-kit.forms.inputs.date');
    }
}
