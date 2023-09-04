<?php

namespace ControlUIKit\Traits;

use Carbon\Carbon;

trait DateInputFunctions
{
    public function displayDateFormat(string $format): string
    {
        return str_replace(['d', 'm', 'y', 'Y', 'H', 'i', 's', 'S'], ['DD', 'MM', 'YY', 'YYYY', 'HH', 'MM', 'SS', 'SS'], $format);
    }

    public function pickerConvert(string $format): string
    {
        return str_replace(['h', 'g', 's', 'A'], ['G', 'h', 'S', 'K'], $format);
    }

    public function minDate(): string
    {
        if ($this->min) {
            return "'" . $this->convertFromDataFormat($this->min) . "'";
        }

        return 'null';
    }

    public function maxDate(): string
    {
        if ($this->max) {
            return "'" . $this->convertFromDataFormat($this->max) . "'";
        }

        return 'null';
    }

    public function minYear(): int
    {
        if ($this->min) {
            return (int)$this->getYearFromFormat($this->min);
        }

        return (int) date('Y') - 10;
    }

    public function maxYear(): int
    {
        if ($this->max) {
            return (int)$this->getYearFromFormat($this->max);
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
}
