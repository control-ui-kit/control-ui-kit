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
    public ?string $showSeconds;
    public ?string $clockType;

    public function __construct(
        string $name,

        string $format = null,
        string $data = null,
        string $id = null,
        string $showSeconds = null,
        string $clockType = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->dataFormat = $this->style($this->component, 'data', $data);
        $this->format = $this->style($this->component, 'format', $format);
        $this->showSeconds = $this->style($this->component, 'show-seconds', $showSeconds);
        $this->clockType = $this->style($this->component, 'clock-type', $clockType);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.datetime');
    }
}
