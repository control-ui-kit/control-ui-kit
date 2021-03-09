<?php

namespace ControlUIKit\Helpers\Formatters;

class DecimalFormatter extends BaseFormatter
{
    protected string $decimalSeparator = '.';
    protected string $thousandsSeparator = '';
    protected int $decimals;
    protected ?string $rounding = null;

    public function format(string $value, ?string $options): string
    {
        $this->options($options);

        return $this->parse($value);
    }

    private function options(string $options): void
    {
        if (is_numeric($options)) {
            $this->decimals = $options;
            return;
        }

        [$this->decimals, $this->rounding] = explode('|', $options);
    }

    private function parse($value): string
    {
        if (! is_numeric($value)) {
            return $value;
        }

        if (! $this->rounding) {
            return $this->numberFormat($value);
        }

        if ($this->rounding === 'round-down') {
            return $this->numberFormat($this->roundDown($value));
        }

        if ($this->rounding === 'round-up') {
            return $this->numberFormat($this->roundUp($value));
        }

        return $value;
    }

    private function roundDown($value)
    {
        $sign = $value > 0 ? 1 : -1;
        $base = 10 ** $this->decimals;
        return floor(abs($value) * $base) / $base * $sign;
    }

    private function roundUp($value)
    {
        $multi = 10 ** $this->decimals; // Can be cached in lookup table
        return ceil($value * $multi) / $multi;
    }

    private function numberFormat($value): string
    {
        return number_format($value * 1, $this->decimals, $this->decimalSeparator, $this->thousandsSeparator);
    }
}
