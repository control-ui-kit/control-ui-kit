<?php

namespace Tests\Helpers\Formatters;

use Carbon\Carbon;
use ControlUIKit\Exceptions\DateFormatterException;
use ControlUIKit\Helpers\Formatters\DateFormatter;
use Orchestra\Testbench\TestCase;

class DateFormatterTest extends TestCase
{
    /** @test */
    public function date_formatter_can_format_date_to_dmY_correctly(): void
    {
        $options = 'd/m/Y';
        $value = '2021-03-09 14:56:23';
        $expected = '09/03/2021';

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_can_format_date_to_Ymd_correctly(): void
    {
        $options = 'Ymd';
        $value = '2021-03-09 14:56:23';
        $expected = '20210309';

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_can_format_date_to_dmY_using_carbon_instance_correctly(): void
    {
        $options = 'd/m/Y';
        $value = Carbon::now()->subDays(5);
        $expected = Carbon::now()->subDays(5)->format($options);

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_can_format_date_to_Ymd_using_carbon_instance_correctly(): void
    {
        $options = 'Ymd';
        $value = Carbon::now();
        $expected = '20210309';

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_throws_exception_if_no_option_passed(): void
    {
        $options = '';
        $value = '::date';

        $this->expectException(DateFormatterException::class);
        $this->expectExceptionMessage('Date format not specified');

        self::assertSame('', app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_handles_empty_date_correctly(): void
    {
        $options = 'd/m/Y';
        $value = '';
        $expected = '-';

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }
}
