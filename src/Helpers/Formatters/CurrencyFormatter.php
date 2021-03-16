<?php

namespace ControlUIKit\Helpers\Formatters;

class CurrencyFormatter extends BaseFormatter
{
    public function format(string $data, ?string $options): string
    {
        return app(DecimalFormatter::class)->format($data, '2|fixed');
    }
}
