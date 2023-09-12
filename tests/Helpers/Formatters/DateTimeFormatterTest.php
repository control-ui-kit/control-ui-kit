<?php

namespace Tests\Helpers\Formatters;

use Carbon\Carbon;
use ControlUIKit\Helpers\Formatters\DateFormatter;
use ControlUIKit\Helpers\Formatters\DateTimeFormatter;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;

class DateTimeFormatterTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('app.timezone', 'UTC');
        Config::set('app.locale', 'en');
        Config::set('control-ui-kit.user_timezone', 'UTC');
    }

    /** @test */
    public function date_formatter_handles_datetime_default_correctly(): void
    {
        $options = '';
        $value = '2021-03-09 14:56:23';
        $expected = '09/03/2021 14:56:23';

        self::assertSame($expected, app(DateTimeFormatter::class)->format($value, $options));
    }

    /** @test */
    public function date_formatter_handles_datetime_us_correctly(): void
    {
        Config::set('app.locale', 'en_US');

        $options = '';
        $value = '2021-03-09 14:56:23';
        $expected = '03/09/2021 2:56:23 PM';

        self::assertSame($expected, app(DateTimeFormatter::class)->format($value, $options));
    }
}
