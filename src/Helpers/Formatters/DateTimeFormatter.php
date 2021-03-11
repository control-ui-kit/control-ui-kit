<?php

namespace ControlUIKit\Helpers\Formatters;

class DateTimeFormatter extends BaseFormatter
{
    public function format(string $value, ?string $options): string
    {
        if (! $value) {
            return "-";
        }

        return app(DateFormatter::class)->format($value, 'datetime');
    }
}
