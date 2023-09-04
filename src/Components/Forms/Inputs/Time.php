<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\DateInputFunctions;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Time extends Component
{
    use UseThemeFile, DateInputFunctions;

    protected string $component = 'input-time';

    public string $name;
    public string $id;
    public ?string $format;
    public string $dataFormat;
    public ?string $showSeconds;
    public ?string $clockType;
    public ?string $hourStep;
    public ?string $minuteStep;
    public ?string $icon;

    public function __construct(
        string $name,
        string $format = null,
        string $data = null,
        string $id = null,
        string $showSeconds = null,
        string $clockType = null,
        string $hourStep = null,
        string $minuteStep = null,
        string $icon = null,
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->dataFormat = $this->pickerConvert($this->style($this->component, 'data', $data));
        $this->format = $this->pickerConvert($this->style($this->component, 'format', $format));
        $this->showSeconds = $this->style($this->component, 'show-seconds', $showSeconds);
        $this->clockType = $this->style($this->component, 'clock-type', $clockType);
        $this->hourStep = $this->style($this->component, 'hour-step', $hourStep);
        $this->minuteStep = $this->style($this->component, 'minute-step', $minuteStep);
        $this->icon = $this->style($this->component, 'icon', $icon);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.time');
    }
}
