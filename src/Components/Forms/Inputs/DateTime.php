<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\DateInputFunctions;
use ControlUIKit\Traits\UseInputTheme;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateTime extends Component
{
    use UseInputTheme, DateInputFunctions;

    protected string $component = 'input-datetime';

    public string $name;
    public string $id;
    public ?string $format;
    public string $dataFormat;
    public ?bool $showSeconds;
    public ?string $clockType;
    public ?string $hourStep;
    public ?string $minuteStep;
    public ?string $icon;
    public ?string $linkedTo;
    public ?string $linkedFrom;
    public string $yearsBefore;
    public string $yearsAfter;

    public function __construct(
        string $name,
        string $id = null,
        string $format = null,
        string $data = null,
        bool $showSeconds = null,
        string $clockType = null,
        string $hourStep = null,
        string $minuteStep = null,
        string $icon = null,
        string $linkedFrom = null,
        string $linkedTo = null,
        string $yearsBefore = null,
        string $yearsAfter = null,
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->dataFormat = $this->pickerConvert($this->style($this->component, 'data', $data));
        $this->format = $this->pickerConvert($this->style($this->component, 'format', $format));
        $this->showSeconds = $this->style($this->component, 'show-seconds', $showSeconds);
        $this->clockType = $this->style($this->component, 'clock-type', $clockType);
        $this->hourStep = $this->style($this->component, 'hour-step', $hourStep);
        $this->minuteStep = $this->style($this->component, 'minute-step', $minuteStep);
        $this->yearsBefore = $this->style($this->component, 'years-before', $yearsBefore);
        $this->yearsAfter = $this->style($this->component, 'years-after', $yearsAfter);
        $this->icon = $this->style($this->component, 'icon', $icon);
        $this->linkedTo = $linkedTo;
        $this->linkedFrom = $linkedFrom;
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.datetime');
    }
}
