<?php

namespace Tests\Rules;

use ControlUIKit\Rules\DateRangeFormat;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class DateRangeFormatTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-date-range.data', 'Y-m-d');
        Config::set('themes.default.input-date-range.separator', '#');
    }

    #[Test]
    public function a_date_range_passes_when_valid(): void
    {
        $rule = new DateRangeFormat();

        $validator = Validator::make(['range' => '2021-01-01#2021-01-31'], ['range' => $rule]);

        $this->assertTrue($validator->passes());
    }

    #[Test]
    public function a_date_range_passes_when_valid_with_specified_separator(): void
    {
        $rule = new DateRangeFormat(separator: '$$');

        $validator = Validator::make(['range' => '2021-01-01$$2021-01-31'], ['range' => $rule]);

        $this->assertTrue($validator->passes());
    }

    #[Test]
    public function a_date_range_passes_when_date_format_specified(): void
    {
        $rule = new DateRangeFormat(format: 'd/m/Y');

        $validator = Validator::make(['range' => '01/01/2021#31/01/2021'], ['range' => $rule]);

        $this->assertTrue($validator->passes());
    }

    #[Test]
    public function a_date_range_passes_when_date_format_changed_in_config(): void
    {
        Config::set('themes.default.input-date-range.data', 'd/m/Y');

        $rule = new DateRangeFormat();

        $validator = Validator::make(['range' => '01/01/2021#31/01/2021'], ['range' => $rule]);

        $this->assertTrue($validator->passes());
    }

    #[Test]
    public function a_date_range_fails_when_only_a_single_date_is_passed(): void
    {
        $rule = new DateRangeFormat();

        $validator = Validator::make(['range' => '2021-01-31'], ['range' => $rule]);

        $this->assertTrue($validator->fails());
        $this->assertCount(1, $validator->messages()->messages()['range']);
        $this->assertSame(trans('validation.exists', ['attribute' => 'range']), $validator->messages()->messages()['range'][0]);
    }

    #[Test]
    public function a_date_range_fails_when_the_from_date_is_not_valid(): void
    {
        $rule = new DateRangeFormat();

        $validator = Validator::make(['range' => 'invalid#2021-01-01'], ['range' => $rule]);

        $this->assertTrue($validator->fails());
        $this->assertCount(1, $validator->messages()->messages()['range']);
        $this->assertSame(trans('validation.date_format', ['attribute' => 'range \'from\'', 'format' => 'Y-m-d']), $validator->messages()->messages()['range'][0]);
    }

    #[Test]
    public function a_date_range_fails_when_the_to_date_is_not_valid(): void
    {
        $rule = new DateRangeFormat();

        $validator = Validator::make(['range' => '2021-01-01#invalid'], ['range' => $rule]);

        $this->assertTrue($validator->fails());
        $this->assertCount(1, $validator->messages()->messages()['range']);
        $this->assertSame(trans('validation.date_format', ['attribute' => 'range \'to\'', 'format' => 'Y-m-d']), $validator->messages()->messages()['range'][0]);
    }

    #[Test]
    public function a_date_range_fails_when_both_dates_have_invalid_formats(): void
    {
        $rule = new DateRangeFormat();

        $validator = Validator::make(['range' => 'invalid#invalid'], ['range' => $rule]);

        $this->assertTrue($validator->fails());
        $this->assertCount(2, $validator->messages()->messages()['range']);
        $this->assertSame(trans('validation.date_format', ['attribute' => 'range \'from\'', 'format' => 'Y-m-d']), $validator->messages()->messages()['range'][0]);
        $this->assertSame(trans('validation.date_format', ['attribute' => 'range \'to\'', 'format' => 'Y-m-d']), $validator->messages()->messages()['range'][1]);
    }
}
