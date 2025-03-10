<?php

namespace Tests\Helpers\Formatters;

use ControlUIKit\Exceptions\DecimalFormatterException;
use ControlUIKit\Helpers\Formatters\DecimalFormatter;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class DecimalFormatterTest extends TestCase
{
    #[Test]
    public function decimal_formatter_handles_2_decimal_places_with_round_down_correctly(): void
    {
        $options = '2';
        $value = '2.1234';
        $expected = '2.12';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_2_decimal_places_with_round_up_correctly(): void
    {
        $options = '2';
        $value = '2.1284';
        $expected = '2.13';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_2_decimal_places_correctly(): void
    {
        $options = '2';
        $value = '2.1';
        $expected = '2.1';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_2_decimal_places_correctly_2(): void
    {
        $options = '2';
        $value = '2';
        $expected = '2';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_2_decimal_places_with_fixed_decimal_zeros_correctly(): void
    {
        $options = '2|fixed';
        $value = '2.1';
        $expected = '2.10';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_2_decimal_places_with_fixed_decimal_zeros_correctly_2(): void
    {
        $options = '2|fixed';
        $value = '2';
        $expected = '2.00';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_2_decimal_places_correctly_when_large_decimal_supplied(): void
    {
        $options = '2';
        $value = '2.1434312131';
        $expected = '2.14';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_3_decimal_places_with_round_down_correctly(): void
    {
        $options = '3';
        $value = '2.1234';
        $expected = '2.123';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_3_decimal_places_with_round_up_correctly(): void
    {
        $options = '3';
        $value = '2.1289';
        $expected = '2.129';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_3_decimal_places_correctly(): void
    {
        $options = '3';
        $value = '2.1';
        $expected = '2.1';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_3_decimal_places_correctly_2(): void
    {
        $options = '3';
        $value = '2';
        $expected = '2';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_3_decimal_places_with_fixed_zeros_correctly(): void
    {
        $options = '3|fixed';
        $value = '2.1';
        $expected = '2.100';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_3_decimal_places_with_fixed_zeros_correctly_2(): void
    {
        $options = '3|fixed';
        $value = '2';
        $expected = '2.000';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_3_decimal_places_correctly_when_large_decimal_supplied(): void
    {
        $options = '3';
        $value = '2.1434312131';
        $expected = '2.143';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_2_decimal_places_with_forced_round_down_and_low_decimal_correctly(): void
    {
        $options = '2|round-down';
        $value = '2.1234';
        $expected = '2.12';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_2_decimal_places_with_forced_round_up_and_low_decimal_correctly(): void
    {
        $options = '2|round-up';
        $value = '2.1234';
        $expected = '2.13';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_2_decimal_places_with_forced_round_down_and_high_decimal_correctly(): void
    {
        $options = '2|round-down';
        $value = '2.1284';
        $expected = '2.12';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_2_decimal_places_with_forced_round_up_and_high_decimal_correctly(): void
    {
        $options = '2|round-up';
        $value = '2.1284';
        $expected = '2.13';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_7_decimal_places_with_forced_round_down_and_long_low_decimal_correctly(): void
    {
        $options = '7|round-down';
        $value = '221.11111111111111111';
        $expected = '221.1111111';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_7_decimal_places_with_forced_round_up_and_long_low_decimal_correctly(): void
    {
        $options = '7|round-up';
        $value = '221.11111111111111111';
        $expected = '221.1111112';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_7_decimal_places_with_forced_round_down_and_long_high_decimal_correctly(): void
    {
        $options = '7|round-down';
        $value = '221.111111166666666666';
        $expected = '221.1111111';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_7_decimal_places_with_forced_round_up_and_long_high_decimal_correctly(): void
    {
        $options = '7|round-up';
        $value = '221.11111119999999999999';
        $expected = '221.1111112';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_negative_2_decimal_places_with_round_up_correctly(): void
    {
        $options = '2';
        $value = '-2.1284';
        $expected = '-2.13';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_negative_2_decimal_places_with_round_down_correctly(): void
    {
        $options = '2';
        $value = '-2.1224';
        $expected = '-2.12';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_negative_2_decimal_places_with_forced_round_down_correctly(): void
    {
        $options = '2|round-down';
        $value = '-2.1284';
        $expected = '-2.12';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_negative_2_decimal_places_with_forced_round_up_correctly(): void
    {
        $options = '2|round-up';
        $value = '-2.1224';
        $expected = '-2.12';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_round_up_and_fixed_decimals_correctly(): void
    {
        $options = '3|round-up|fixed';
        $value = '2.1199000000';
        $expected = '2.120';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_invalid_number_correctly(): void
    {
        $options = '2';
        $value = 'invalid';
        $expected = 'invalid';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_invalid_option_string_correctly(): void
    {
        $options = '2|cheese';
        $value = '2.012';
        $expected = '2.01';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_throws_exception_if_no_option_passed(): void
    {
        $options = '';
        $value = '2.012';
        $expected = '';

        $this->expectException(DecimalFormatterException::class);
        $this->expectExceptionMessage('Decimal places not specified');

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_empty_value_correctly(): void
    {
        $options = '2';
        $value = '';
        $expected = '';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }

    #[Test]
    public function decimal_formatter_handles_zero_value_correctly(): void
    {
        $options = '2|fixed';
        $value = '0.00';
        $expected = '0.00';

        self::assertSame($expected, app(DecimalFormatter::class)->format($value, $options));
    }
}
