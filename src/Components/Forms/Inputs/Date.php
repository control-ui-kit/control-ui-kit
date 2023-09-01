<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\DateInputFunctions;
use ControlUIKit\Traits\UseInputTheme;
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
    public ?string $start;
    public ?string $end;
    public ?string $weekNumbers;
    public ?string $showTime;
    public ?string $showSeconds;
    public ?string $clockType;

    public ?string $timeOnly;
    public ?string $hourStep;
    public ?string $minuteStep;

    public ?string $lang;
    public ?string $icon;

    public array $iconStyles = [];
    public ?string $iconSize;

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
        string $start = null,
        string $end = null,
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
        string $value = null,
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->dataFormat = $this->flatConvert($this->style($this->component, 'data', $data));
        $this->format = $this->flatConvert($this->style($this->component, 'format', $format));
        $this->value = old($name, $value);

        $this->displayFormat = $this->flatConvert($this->displayDateFormat($this->format));
        $this->start = $start;
        $this->end = $end;
        $this->iconSize = $iconSize;

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
        $this->lang = $this->style($this->component, 'lang', $lang);
        $this->icon = $this->style($this->component, 'icon', $icon);
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

//    public function locale(): string
//    {
//        return json_encode(trans('date-calendar'));
//
//        return match ($this->lang) {
//            'en_GB', 'en_US' => 'default',
//            default => $this->lang,
//        };
//    }
}
