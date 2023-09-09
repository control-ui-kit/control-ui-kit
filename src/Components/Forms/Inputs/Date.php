<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Carbon\Carbon;
use ControlUIKit\Traits\DateInputFunctions;
use ControlUIKit\Traits\UseInputTheme;
use DateTimeZone;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Date extends Component
{
    use UseInputTheme, DateInputFunctions;

    protected string $component = 'input-date';

    public string $name;
    public string $id;
    public ?string $value;
    public ?string $format;
    public string $dataFormat;
    public ?string $displayFormat;
    public ?string $min;
    public ?string $max;
    public ?string $weekNumbers;
    public ?string $showTime;
    public ?string $showSeconds;
    public ?string $clockType;

    public ?string $timeOnly;
    public ?string $hourStep;
    public ?string $minuteStep;

    public ?string $lang;
    public bool $langOverride = false;
    public ?string $icon;

    public array $iconStyles = [];
    public ?string $iconSize;
    public ?string $linkedTo;
    public ?string $linkedFrom;
    public string $today;
    public string $close;
    public string $now;
    public string $clear;
    public array $timezones;
    public int $offset;

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
        string $width = null,

        string $iconBackground = null,
        string $iconBorder = null,
        string $iconColor = null,
        string $iconOther = null,
        string $iconPadding = null,
        string $iconRounded = null,
        string $iconShadow = null,
        string $iconSize = null,

        string $format = null,
        string $data = null,
        string $min = null,
        string $max = null,
        string $weekNumbers = null,
        string $showTime = null,
        string $showSeconds = null,
        string $clockType = null,
        string $timeOnly = null,
        string $hourStep = null,
        string $minuteStep = null,
        string $icon = null,
        string $lang = null,
        string $id = null,
        mixed $value = null,
        string $linkedFrom = null,
        string $linkedTo = null,
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->dataFormat = $this->pickerConvert($this->style($this->component, 'data', $data));
        $this->format = $this->pickerConvert($this->style($this->component, 'format', $format));
        $this->value = old($name, $value);
        $this->displayFormat = $this->displayDateFormat($this->format);
        $this->min = $min;
        $this->max = $max;
        $this->iconSize = $iconSize;
        $this->today = 'Today';
        $this->close = 'Close';
        $this->now = 'Now';
        $this->clear = 'Clear';

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => 'w-full',
        ]);

        $this->setInputStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => $this->style($this->component, 'width', $width),
        ], $this->component, 'wrapperStyles', 'input', 'wrapper-');

        $this->setInputStyles([
            'background' => $iconBackground,
            'border' => $iconBorder,
            'color' => $iconColor,
            'other' => $iconOther,
            'padding' => $iconPadding,
            'rounded' => $iconRounded,
            'shadow' => $iconShadow,
            'size' => $iconSize,
        ], $this->component, 'iconStyles', 'input-date', 'icon-');

        $this->weekNumbers = $this->style($this->component, 'week-numbers', $weekNumbers);
        $this->showTime = $this->style($this->component, 'show-time', $showTime);
        $this->showSeconds = $this->style($this->component, 'show-seconds', $showSeconds);
        $this->clockType = $this->style($this->component, 'clock-type', $clockType);
        $this->timeOnly = $this->style($this->component, 'time-only', $timeOnly);
        $this->hourStep = $this->style($this->component, 'hour-step', $hourStep);
        $this->minuteStep = $this->style($this->component, 'minute-step', $minuteStep);
        $this->linkedTo = $linkedTo;
        $this->linkedFrom = $linkedFrom;
        $this->lang = $lang ?: config('app.locale');
        $this->langOverride = $lang !== null;
        $this->icon = $this->style($this->component, 'icon', $icon);

        $this->setTimeFromFormat();
        $this->setTimeZones();
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.date');
    }

    public function locale(): string
    {
        return match ($this->lang) {
            'en_GB', 'en_US' => 'default',
            default => $this->lang,
        };
    }

    private function setTimeFromFormat(): void
    {
        if (! $this->showTime && $this->timeFormatExists($this->format)) {
            $this->showTime = 'true';
        }

        if (! $this->showSeconds && str_contains($this->format, ':S')) {
            $this->showSeconds = 'true';
        }

        if ($this->clockType === '24' && str_contains($this->format, 'K')) {
            $this->clockType = '12';
        }
    }

    private function timeFormatExists(string $format): bool
    {
        $chars = ['H', 'h', 'i', 's', 'S', 'g', 'G', 'a', 'K'];

        foreach ($chars as $char) {
            if (str_contains($format, $char)) {
                return true;
            }
        }

        return false;
    }

    private function setTimeZones(): void
    {
        $i = 0;

        foreach (DateTimeZone::listIdentifiers() as $timezone) {
            $carbon = Carbon::now($timezone);
            $offset = $carbon->offset / 3600;  // Convert seconds to hours
            $formattedOffset = ($offset < 0 ? '-' : '+') . abs($offset);
            $this->timezones[$i]['name'] = str($timezone)->replace('_', ' ');
            $this->timezones[$i]['offset'] = $offset;
            $this->timezones[$i]['formatted'] = $formattedOffset;

            if ($timezone === config('control-ui-kit.user_timezone')) {
                $this->offset = $i;
            }

            $i++;
        }
    }
}
