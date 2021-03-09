<?php

namespace ControlUIKit\Helpers\Formatters;

use Carbon\Carbon;
use ControlUIKit\Exceptions\DateFormatterException;

class DateFormatter extends BaseFormatter
{
    public function format(string $value, ?string $options): string
    {
        if (! $value) {
            return "-";
        }

        if (! $options) {
            throw (new DateFormatterException())::make('missingOptionSolution', 'Date format not specified');
        }

        return Carbon::parse($value)->format($options);
    }
}
