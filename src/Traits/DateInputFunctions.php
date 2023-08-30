<?php

namespace ControlUIKit\Traits;

use Carbon\Carbon;

trait DateInputFunctions
{
    public function displayDateFormat(string $format): string
    {
        return str_replace(['d', 'm', 'y', 'Y', 'H', 'i', 's'], ['DD', 'MM', 'YY', 'YYYY', 'HH', 'MM', 'SS'], $format);
    }

    public function flatConvert(string $format): string
    {
        return str_replace(['h', 'g', 's', 'A'], ['G', 'h', 'S', 'K'], $format);
    }

    public function minDate(): string
    {
        if ($this->start) {
            return "'" . $this->convertFromDataFormat($this->start) . "'";
        }

        return 'null';
    }

    public function maxDate(): string
    {
        if ($this->end) {
            return "'" . $this->convertFromDataFormat($this->end) . "'";
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
