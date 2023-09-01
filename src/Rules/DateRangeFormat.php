<?php

namespace ControlUIKit\Rules;

use Closure;
use DateTime;
use Illuminate\Contracts\Validation\ValidationRule;

class DateRangeFormat implements ValidationRule
{
    private string $format;
    private string $separator;

    public function __construct(string $format = null, string $separator = null)
    {
        $this->format = $format ?? config('themes.default.input-date-range.data');
        $this->separator = $separator ?? config('themes.default.input-date-range.separator');
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dates = explode($this->separator, $value);

        if (count($dates) !== 2) {
            $fail(trans('validation.exists', ['attribute' => $attribute]));
            return;
        }

        $fromDateValid = DateTime::createFromFormat($this->format, $dates[0]) !== false;
        $toDateValid = DateTime::createFromFormat($this->format, $dates[1]) !== false;

        if (! $fromDateValid) {
            $fail(trans('validation.date_format', ['attribute' => $attribute .' \'from\'', 'format' => $this->format]));
        }

        if (! $toDateValid) {
            $fail(trans('validation.date_format', ['attribute' => $attribute .' \'to\'', 'format' => $this->format]));
        }
    }
}
