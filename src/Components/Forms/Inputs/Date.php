<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Carbon\Carbon;
use ControlUIKit\Traits\LiteDateFunctions;
use ControlUIKit\Traits\UseInputTheme;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Date extends Component
{
    use UseInputTheme, LiteDateFunctions;

    protected string $component = 'input-date';

    public string $name;
    public string $id;
    public ?string $value;
    public ?string $format;
    public string $dataFormat;
    public ?string $liteFormat;
    public ?string $start;
    public ?string $end;
    public ?string $resetButton;
    public ?string $firstDay;
    private ?string $mobileFriendly;
    private ?string $keyboardNavigation;
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
        string $resetButton = null,
        string $start = null,
        string $end = null,
        string $firstDay = null,
        string $icon = null,
        string $mobileFriendly = null,
        string $keyboardNavigation = null,
        string $lang = null,
        string $id = null,
        string $value = null,
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->dataFormat = $this->style($this->component, 'data', $data);
        $this->format = $this->style($this->component, 'format', $format);
        $this->value = old($name, $this->convertDate($value) ?? '');
        $this->liteFormat = $this->litePickerFormat($this->format);
        $this->start = $start;
        $this->end = $end;
        $this->resetButton = $this->style($this->component, 'reset-button', $resetButton);
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
            'width' => $width,
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

        $this->mobileFriendly = $this->style($this->component, 'mobile-friendly', $mobileFriendly);
        $this->keyboardNavigation = $this->style($this->component, 'keyboard-navigation', $keyboardNavigation);
        $this->firstDay = $this->style($this->component, 'first-day', $firstDay);
        $this->lang = $this->style($this->component, 'lang', $lang);
        $this->icon = $this->style($this->component, 'icon', $icon);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.date');
    }

    public function convertDate(string $date = null): ?string
    {
        if (is_null($date)) {
            return null;
        }

        return Carbon::createFromFormat($this->dataFormat, $date)->format($this->format);
    }
}
