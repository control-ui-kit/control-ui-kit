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
    public ?string $reset;
    public ?string $split;
    public ?string $tooltip;
    public ?string $firstDay;
    private ?string $mobileFriendly;
    private ?string $predefinedRanges;
    private ?string $keyboardNavigation;
    public ?string $columns;
    public ?string $months;
    public ?string $lang;

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
        string $reset = null,
        string $split = null,
        string $tooltip = null,
        string $firstDay = null,
        string $mobileFriendly = null,
        string $predefinedRanges = null,
        string $keyboardNavigation = null,
        string $format = null,
        string $start = null,
        string $end = null,
        string $columns = null,
        string $months = null,
        string $lang = null,
        string $id = null,
        string $value = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
        $this->format = is_null($format) ? 'DD/MM/YYYY' : $format;
        $this->start = $start;
        $this->end = $end;
        $this->reset = is_null($reset) ? 'false' : 'true';
        $this->split = is_null($split) ? 'false' : 'true';
        $this->tooltip = is_null($tooltip) ? 'false' : 'true';

        $this->columns = is_null($columns) ? "2" : (string)intval($columns);
        $this->months = is_null($months) ? "2" : (string)intval($months);

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

        $this->mobileFriendly = $this->style($this->component, 'mobile-friendly', $mobileFriendly);
        $this->predefinedRanges = $this->style($this->component, 'predefined-ranges', $predefinedRanges);
        $this->keyboardNavigation = $this->style($this->component, 'keyboard-navigation', $keyboardNavigation);
        $this->reset = $this->style($this->component, 'reset', $reset);
        $this->split = $this->style($this->component, 'split', $split);
        $this->tooltip = $this->style($this->component, 'tooltip', $tooltip);
        $this->firstDay = $this->style($this->component, 'first-day', (string)intval($firstDay));
        $this->lang = $this->style($this->component, 'lang', $lang);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.date-range');
    }

    public function minDate($date_only = false): string
    {
        if ($this->start) {
            return $date_only ? $this->start : "moment(\"{$this->start}\", \"{$this->format}\")";
        }

        return "null";
    }

    public function maxDate(): string
    {
        if ($this->end) {
            return "moment(\"{$this->end}\", \"{$this->format}\")";
        }

        return "null";
    }

    public function minYear(): int
    {
        if ($this->start) {
            return (int)$this->getYearFromFormat($this->start);
        }

        return date('Y') - 10;
    }

    public function maxYear(): int
    {
        if ($this->end) {
            return (int)$this->getYearFromFormat($this->end);
        }

        return date('Y') + 10;
    }

    public function getYearFromFormat($date): string
    {
        if ($this->format === 'YYYY-MM-DD') {
            return substr($date, 0, 4);
        } else if ($this->format === 'MM/DD/YYYY') {
            return substr($date, 6, 4);
        }

        return substr($date, 6, 4);
    }

    public function getPluginsList(): string
    {
        $plugins = [];


        if (!is_null($this->mobileFriendly) && $this->mobileFriendly !== "false") {
            $plugins[] = 'mobilefriendly';
        }

        if (!is_null($this->predefinedRanges) && $this->predefinedRanges !== "false") {
            $plugins[] = 'ranges';
        }

        if (!is_null($this->keyboardNavigation) && $this->keyboardNavigation !== "false") {
            $plugins[] = 'keyboardnav';
        }

        return count($plugins) ? ("'" . implode("', '", $plugins) . "'") : "";
    }
}
