<?php

namespace Tests\Helpers\Formatters;

use Carbon\Carbon;
use ControlUIKit\Helpers\Formatters\DateFormatter;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;

class DateFormatterTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('app.timezone', 'UTC');
        Config::set('app.locale', 'en');
        Config::set('control-ui-kit.user_timezone', 'UTC');
    }

    /** @test */
    public function date_formatter_can_format_date_string_to_specified_format_correctly(): void
    {
        $options = 'd/m/Y';
        $value = '2021-03-09 14:56:23';
        $expected = '09/03/2021';

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_can_format_carbon_date_instance_to_specified_format_correctly(): void
    {
        $options = 'd/m/Y';
        $value = Carbon::now();
        $expected = Carbon::now()->format($options);

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_returns_diff_for_humans_correctly(): void
    {
        $options = 'diff';
        $value = Carbon::now()->subDays(2);
        $expected = '2 days ago';

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_returns_default_uk_date_when_no_format_passed(): void
    {
        $options = '';
        $value = '2021-03-09 14:56:23';
        $expected = '09/03/2021';

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_returns_default_us_date_when_no_format_passed(): void
    {
        Config::set('app.locale', 'en_US');

        $options = '';
        $value = '2021-03-09 14:56:23';
        $expected = '03/09/2021';

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_handles_datetime_default_correctly(): void
    {
        $options = 'datetime';
        $value = '2021-03-09 14:56:23';
        $expected = '09/03/2021 14:56:23';

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_handles_datetime_us_correctly(): void
    {
        Config::set('app.locale', 'en_US');

        $options = 'datetime';
        $value = '2021-03-09 14:56:23';
        $expected = '03/09/2021 2:56:23 PM';

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_returns_timezone_altered_date_if_user_timezone_set(): void
    {
        $options = 'diffForHumans';
        $value = Carbon::now();
        $expected = '9 hours ago';

        Config::set('control-ui-kit.user_timezone', 'Asia/Tokyo');
        Config::set('app.timezone', 'UTC');

        self::assertSame($expected, app(DateFormatter::class)->format($value, $options));
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
