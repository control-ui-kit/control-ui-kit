<?php

declare(strict_types=1);

namespace Tests\Helpers;

use ControlUIKit\Helpers\Chart;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ChartTest extends TestCase
{
    private function makeChart(): Chart
    {
        return (new Chart)->name('test');
    }

    #[Test]
    public function options_returns_chart_instance(): void
    {
        $chart = $this->makeChart();

        $result = $chart->options(['responsive' => true]);

        $this->assertInstanceOf(Chart::class, $result);
    }

    #[Test]
    public function options_raw_with_string_returns_chart_instance(): void
    {
        $chart = $this->makeChart();

        $result = $chart->optionsRaw('{"responsive":true}');

        $this->assertInstanceOf(Chart::class, $result);
    }

    #[Test]
    public function options_raw_with_array_returns_chart_instance(): void
    {
        $chart = $this->makeChart();

        $result = $chart->optionsRaw(['responsive' => true]);

        $this->assertInstanceOf(Chart::class, $result);
    }

    #[Test]
    public function element_returns_chart_instance(): void
    {
        $chart = $this->makeChart();

        $result = $chart->element('my-chart-element');

        $this->assertInstanceOf(Chart::class, $result);
    }

    #[Test]
    public function type_throws_exception_for_invalid_chart_type(): void
    {
        $chart = $this->makeChart();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid Chart type.');

        $chart->type('invalid');
    }
}
