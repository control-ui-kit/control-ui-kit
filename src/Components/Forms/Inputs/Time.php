<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\TimeFunctions;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Time extends Component
{
    use UseThemeFile, TimeFunctions;

    protected string $component = 'input-time';

    public string $name;
    public string $id;
    public ?string $value;
    public ?string $format;
    public ?string $output;
    public mixed $hours;
    public mixed $minutes;
    public mixed $seconds;
    public bool $showAmPm = false;
    public bool $showSeconds = false;
    public int $hour;
    public int $minute;
    public int $second;
    public string $am_pm = 'am';

    public function __construct(
        string $name,
        string $id = null,
        string $spacing = null,
        string $value = null,
        string $format = null,
        string $output = null,
        mixed $hours = null,
        mixed $minutes = null,
        mixed $seconds = null,
        bool $showAmPm = false,
        bool $showSeconds = false
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
        $this->format = $format;
        $this->output = $this->style($this->component, 'output', $output);
        $this->showSeconds = $showSeconds;

        if ($this->format) {
            $this->setFromFormat();
        } else {
            $this->showAmPm = $showAmPm;
            $this->hours = $this->setHours($hours);
            $this->minutes = $this->setMinutes($minutes);
            $this->seconds = $this->setSeconds($seconds);
        }

        $this->setConfigStyles([
            'spacing' => $spacing,
        ]);

        $this->setTime();
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.time');
    }

    private function setTime(): void
    {
        if ($this->value !== '') {
            if (count(explode(':', $this->value)) === 2) {
                $this->value .= ':00';
            }

            [$hour, $minute, $second] = explode(':', $this->value);
        } else {
            $hour = collect($this->hours)->first();
            $minute = collect($this->minutes)->first();
            $second = collect($this->seconds)->first();
        }

        if ($this->showAmPm && $hour > 12) {
            $this->am_pm = 'pm';
            $hour -= 12;
        }

        $this->hour = (int) $hour;
        $this->minute = (int) $minute;
        $this->second = $this->showSeconds ? (int) $second : 0;

    }
}
