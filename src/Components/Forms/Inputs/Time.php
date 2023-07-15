<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Time extends Component
{
    use UseThemeFile;

    protected string $component = 'input-time';

    public string $name;
    public string $id;
    public ?string $value;
    public null|string $format;
    public null|string $output;
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
        string $output = 'H:i:s',
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
        $this->output = $output;
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

    private function setHours(mixed $hours = null): array
    {
        if (is_string($hours)) {
            return $this->setKeys(explode(',', $hours));
        }

        if (is_array($hours)) {
            return $this->setKeys($hours);
        }

        if ($this->showAmPm) {
            return $this->setKeys(range(0, 11));
        }

        return $this->setKeys(range(0, 23));
    }

    private function setMinutes(mixed $minutes = null): array
    {
        if (is_string($minutes)) {
            return $this->setKeys(explode(',', $minutes));
        }

        if (is_array($minutes)) {
            return $this->setKeys($minutes);
        }

        return $this->setKeys([0, 15, 30, 45]);
    }

    private function setSeconds(mixed $seconds = null): array
    {
        if (is_string($seconds)) {
            return $this->setKeys(explode(',', $seconds));
        }

        if (is_array($seconds)) {
            return $this->setKeys($seconds);
        }

        return $this->setKeys(range(0, 59));
    }

    private function setKeys(array $array): array
    {
        return collect($array)->mapWithKeys(function ($item) {
            return [(int) $item => str_pad((string) $item, 2, '0', STR_PAD_LEFT)];
        })->toArray();
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
            $hour -= 12;
        }

        $this->hour = (int) $hour;
        $this->minute = (int) $minute;
        $this->second = $this->showSeconds ? (int) $second : 0;
    }

    private function setFromFormat(): void
    {
        $this->showAmPm = str_contains($this->format, 'A');
        $this->hours = $this->setHours();
        $this->minutes = $this->setMinutes();
        $this->seconds = $this->setSeconds();
    }
}
