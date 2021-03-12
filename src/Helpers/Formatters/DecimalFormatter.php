<?php

namespace ControlUIKit\Helpers\Formatters;

use ControlUIKit\Exceptions\DecimalFormatterException;

class DecimalFormatter extends BaseFormatter
{
    protected string $decimalSeparator = '.';
    protected string $thousandsSeparator = '';
    protected int $decimals;
    protected ?string $rounding = null;

    public function format(string $data, ?string $options): string
    {
        if (! $options) {
            throw (new DecimalFormatterException())::make('missingOptionSolution', 'Decimal places not specified');
        }

        $this->options($options);

        return $this->parse($data);
    }

    private function options(string $options): void
    {
        if (is_numeric($options)) {
            $this->decimals = $options;
            return;
        }

        [$this->decimals, $this->rounding] = explode('|', $options);
    }

    private function parse($data): string
    {
        if (! is_numeric($data)) {
            return $data;
        }

        if (! $this->rounding) {
            return $this->numberFormat($data);
        }

        if ($this->rounding === 'round-down') {
            return $this->numberFormat($this->roundDown($data));
        }

        if ($this->rounding === 'round-up') {
            return $this->numberFormat($this->roundUp($data));
        }

        return $data;
    }

    private function roundDown($data)
    {
        $sign = $data > 0 ? 1 : -1;
        $base = 10 ** $this->decimals;
        return floor(abs($data) * $base) / $base * $sign;
    }

    private function roundUp($data)
    {
        $multi = 10 ** $this->decimals; // Can be cached in lookup table
        return ceil($data * $multi) / $multi;
    }

    private function numberFormat($data): string
    {
        return number_format($data * 1, $this->decimals, $this->decimalSeparator, $this->thousandsSeparator);
    }
}
