<?php

namespace ControlUIKit\Helpers\Formatters;

class CurrencyFormatter extends BaseFormatter
{
    public function format(string $value, ?string $options): string
    {
        return app(DecimalFormatter::class)->format($value, 2);
    }
}
