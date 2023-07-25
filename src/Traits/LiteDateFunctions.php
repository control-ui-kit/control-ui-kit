<?php

namespace ControlUIKit\Traits;

use Carbon\Carbon;

trait LiteDateFunctions
{
    public function litePickerFormat(string $format): string
    {
        return str_replace(['d', 'm', 'y', 'Y'], ['DD', 'MM', 'YY', 'YYYY'], $format);
    }

    public function minDate(): string
    {
        if ($this->start) {
            return "moment('" . $this->convertFromDataFormat($this->start) . "', '$this->liteFormat')";
        }

        return 'null';
    }

    public function maxDate(): string
    {
        if ($this->end) {
            return "moment('" . $this->convertFromDataFormat($this->end) . "', '$this->liteFormat')";
        }

        return 'null';
    }

    public function minYear(): int
    {
        if ($this->start) {
            return (int)$this->getYearFromFormat($this->start);
        }

        return (int) date('Y') - 10;
    }

    public function maxYear(): int
    {
        if ($this->end) {
            return (int)$this->getYearFromFormat($this->end);
        }

        return (int) date('Y') + 10;
    }

    public function getYearFromFormat($date): string
    {
        return Carbon::createFromFormat($this->dataFormat, $date)->format('Y');
    }

    public function convertFromDataFormat($date): string
    {
        return Carbon::createFromFormat($this->dataFormat, $date)->format($this->format);
    }

    public function getPluginsList(): string
    {
        $plugins = [];

        if (!is_null($this->mobileFriendly) && $this->mobileFriendly !== "false") {
            $plugins[] = 'mobilefriendly';
        }

        if (!is_null($this->keyboardNavigation) && $this->keyboardNavigation !== "false") {
            $plugins[] = 'keyboardnav';
        }

        return count($plugins) ? ("'" . implode("', '", $plugins) . "'") : "";
    }
}
