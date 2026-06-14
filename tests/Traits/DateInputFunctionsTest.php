<?php

declare(strict_types=1);

namespace Tests\Traits;

use ControlUIKit\Traits\DateInputFunctions;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class DateInputFunctionsTest extends TestCase
{
    use DateInputFunctions;

    public ?string $min = null;
    public ?string $max = null;
    public string $dataFormat = 'Y-m-d';
    public string $format = 'd/m/Y';

    protected function setUp(): void
    {
        parent::setUp();

        $this->min = null;
        $this->max = null;
        $this->dataFormat = 'Y-m-d';
        $this->format = 'd/m/Y';
    }

    // ---------------------------------------------------------------------------
    // minYear
    // ---------------------------------------------------------------------------

    #[Test]
    public function min_year_returns_current_year_minus_ten_when_no_min_set(): void
    {
        $this->min = null;

        $this->assertSame((int) date('Y') - 10, $this->minYear());
    }

    #[Test]
    public function min_year_returns_year_from_min_date_when_set(): void
    {
        $this->min = '2019-06-15';

        $this->assertSame(2019, $this->minYear());
    }

    // ---------------------------------------------------------------------------
    // maxYear
    // ---------------------------------------------------------------------------

    #[Test]
    public function max_year_returns_current_year_plus_ten_when_no_max_set(): void
    {
        $this->max = null;

        $this->assertSame((int) date('Y') + 10, $this->maxYear());
    }

    #[Test]
    public function max_year_returns_year_from_max_date_when_set(): void
    {
        $this->max = '2031-12-31';

        $this->assertSame(2031, $this->maxYear());
    }

    // ---------------------------------------------------------------------------
    // getYearFromFormat
    // ---------------------------------------------------------------------------

    #[Test]
    public function get_year_from_format_extracts_year_using_data_format(): void
    {
        $this->dataFormat = 'Y-m-d';

        $this->assertSame('2024', $this->getYearFromFormat('2024-03-22'));
    }

    #[Test]
    public function get_year_from_format_works_with_slash_separated_format(): void
    {
        $this->dataFormat = 'd/m/Y';

        $this->assertSame('2023', $this->getYearFromFormat('15/08/2023'));
    }
}
