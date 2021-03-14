<?php

namespace ControlUIKit\Helpers\Formatters;

class DateTimeFormatter extends BaseFormatter
{
    public function format(string $data, ?string $options): string
    {
        if (! $data) {
            return "-";
        }

        return app(DateFormatter::class)->format($data, 'datetime');
    }
}
