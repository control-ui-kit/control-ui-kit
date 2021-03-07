<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class DateRange extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-date-range';

    public string $name;
    public string $id;
    public ?string $value;

    public ?string $format;
    public ?string $start;
    public ?string $end;

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
        string $start = null,
        string $end = null,

        string $id = null,
        string $value = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');

        $this->format = is_null($format) ? 'DD/MM/YYYY' : $format;
        $this->start = $start;
        $this->end = $end;

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
        return view('control-ui-kit::control-ui-kit.forms.inputs.date-range');
    }
}
