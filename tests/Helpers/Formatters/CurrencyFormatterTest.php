<?php

namespace Tests\Helpers\Formatters;

use ControlUIKit\Helpers\Formatters\CurrencyFormatter;
use Orchestra\Testbench\TestCase;

class CurrencyFormatterTest extends TestCase
{
    /** @test */
    public function currency_formatter_handles_2_decimal_places_correctly(): void
    {
        $options = '2';
        $value = '2.1234';
        $expected = '2.12';

        self::assertSame($expected, app(CurrencyFormatter::class)->format($value, $options));
    }
}
