<?php

namespace Tests\Helpers\Formatters;

use ControlUIKit\Helpers\Formatters\CurrencyFormatter;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CurrencyFormatterTest extends TestCase
{
    #[Test]
    public function currency_formatter_handles_2_decimal_places_correctly(): void
    {
        $options = '2';
        $value = '2.1234';
        $expected = '2.12';

        self::assertSame($expected, app(CurrencyFormatter::class)->format($value, $options));
    }

    #[Test]
    public function currency_formatter_handles_whole_numbers_correctly(): void
    {
        $options = '2';
        $value = '2';
        $expected = '2.00';

        self::assertSame($expected, app(CurrencyFormatter::class)->format($value, $options));
    }

    #[Test]
    public function currency_formatter_handles_zero_value_correctly(): void
    {
        $options = '2';
        $value = '0.00';
        $expected = '0.00';

        self::assertSame($expected, app(CurrencyFormatter::class)->format($value, $options));
    }
}
