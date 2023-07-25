<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Carbon\Carbon;
use ControlUIKit\Traits\LiteDateFunctions;
use ControlUIKit\Traits\TimeFunctions;
use ControlUIKit\Traits\UseInputTheme;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateTime extends Component
{
    use UseInputTheme, TimeFunctions, LiteDateFunctions;

    protected string $component = 'input-datetime';

    public string $name;
    public string $id;
    public ?string $value;
    public ?string $format;
    public ?string $dataFormat;

    public ?string $dateFormat;
    public ?string $timeFormat;
    public ?string $liteFormat;

    public ?string $start;
    public ?string $end;
    public ?string $reset;
    public ?string $firstDay;
    private ?string $mobileFriendly;
    private ?string $keyboardNavigation;
    public ?string $lang;
    public ?string $icon;

    public array $iconStyles = [];
    public ?string $iconSize;

    public mixed $date;
    public mixed $time;
    public mixed $hours;
    public mixed $minutes;
    public mixed $seconds;
    public bool $showAmPm = false;
    public bool $showSeconds = false;
    public int $year;
    public int $month;
    public int $day;
    public int $hour;
    public int $minute;
    public int $second;
    public string $am_pm = 'am';
    public array $dateStyles;
    public array $timeStyles;

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
        string $spacing = null,
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
        string $reset = null,
        string $start = null,
        string $end = null,
        string $firstDay = null,
        string $icon = null,
        string $mobileFriendly = null,
        string $keyboardNavigation = null,
        string $lang = null,
        string $id = null,
        string $value = null,

        mixed $hours = null,
        mixed $minutes = null,
        mixed $seconds = null,
        bool $showAmPm = null,
        bool $showSeconds = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->format = $this->style('input-datetime', 'format', $format);
        $this->dateFormat = $this->setDateFormat();
        $this->timeFormat = $this->setTimeFormat();
        $this->liteFormat = $this->litePickerFormat($this->dateFormat);
        $this->dataFormat = $this->style($this->component, 'data', $data);
        $this->value = old($name, $value ?? '');
        $this->start = $start;
        $this->end = $end;
        $this->reset = is_null($reset) ? 'false' : 'true';
        $this->iconSize = $iconSize;
        $this->showAmPm = is_null($showAmPm) ? str_contains($this->format, 'A') : $showAmPm;
        $this->showSeconds = is_null($showSeconds) ? str_contains($this->format, 's') : $showSeconds;
        $this->hours = $this->setHours($hours);
        $this->minutes = $this->setMinutes($minutes);
        $this->seconds = $this->setSeconds($seconds);

        $this->setInputStyles([
            'spacing' => $spacing,
        ], 'input-time', 'timeStyles', 'input-time');

        $this->setInputStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => 'w-full',
        ], 'input-date', 'dateStyles', 'input');

        $this->setInputStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => $width ?? 'w-40',
        ], 'input-date', 'wrapperStyles', 'input', 'wrapper-');

        $this->setInputStyles([
            'background' => $iconBackground,
            'border' => $iconBorder,
            'color' => $iconColor,
            'other' => $iconOther,
            'padding' => $iconPadding,
            'rounded' => $iconRounded,
            'shadow' => $iconShadow,
            'size' => $iconSize,
        ], 'input-date', 'iconStyles', 'input-date', 'icon-');

        $this->mobileFriendly = $this->style('input-date', 'mobile-friendly', $mobileFriendly);
        $this->keyboardNavigation = $this->style('input-date', 'keyboard-navigation', $keyboardNavigation);
        $this->firstDay = $this->style('input-date', 'first-day', (string) (int) $firstDay);
        $this->lang = $this->style('input-date', 'lang', $lang);
        $this->icon = $this->style('input-date', 'icon', $icon);

        $this->setDateTime();
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.datetime');
    }

    private function setDateTime(): void
    {
        if (str_contains($this->value, ' ')) {

            $date = Carbon::createFromFormat($this->dataFormat, $this->value);

            $year = $date->format('Y');
            $month = $date->format('m');
            $day = $date->format('d');
            $hour = $date->format('H');
            $minute = $date->format('i');
            $second = $date->format('s');
            $this->date = $date->format($this->dateFormat);
            $this->time = $date->format('H:i:s');

        } else {

            $this->date = null;
            $this->time = null;
            $year = 0;
            $month = 0;
            $day = 0;
            $hour = collect($this->hours)->first();
            $minute = collect($this->minutes)->first();
            $second = collect($this->seconds)->first();

        }

        if ($this->showAmPm && $hour > 12) {
            $this->am_pm = 'pm';
            $hour -= 12;
        }

        $this->year = (int) $year;
        $this->month = (int) $month;
        $this->day = (int) $day;
        $this->hour = (int) $hour;
        $this->minute = (int) $minute;
        $this->second = $this->showSeconds ? (int) $second : 0;
    }

    public function dateClasses(): array
    {
        $classList = $this->classList($this->dateStyles);

        return $classList ? ['class' => $classList] : [];
    }

    public function timeClasses(): array
    {
        $classList = $this->classList($this->timeStyles);

        return $classList ? ['class' => $classList] : [];
    }

    private function setDateFormat(): string
    {
        return str_replace(['H', 'h', 'i', 's', ':', ' ', 'g', 'G', 'A'], '', $this->format);
    }

    private function setTimeFormat(): string
    {
        return trim(str_replace($this->dateFormat, '', $this->format));
    }
}
