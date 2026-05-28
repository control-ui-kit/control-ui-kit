<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\ChartUtils;
use ControlUIKit\Components\Charts\GradientBarChart;
use ControlUIKit\Components\Charts\GradientLineChart;
use ControlUIKit\Components\Charts\SegmentDoughnutChart;
use Illuminate\View\View;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ChartUtilsTest extends ComponentTestCase
{
    #[Test]
    public function chart_utils_render_returns_correct_view(): void
    {
        $component = new ChartUtils();
        $view = $component->render();

        $this->assertInstanceOf(View::class, $view);
        $this->assertSame('control-ui-kit::control-ui-kit.charts.chart-utils', $view->getName());
    }

    #[Test]
    public function chart_utils_rendered_output_contains_script_tag(): void
    {
        $template = <<<'HTML'
            <x-chart-utils />
            @stack('scripts')
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<script>', $rendered);
        $this->assertStringContainsString('</script>', $rendered);
    }

    #[Test]
    public function chart_utils_rendered_output_contains_function_definitions(): void
    {
        $template = <<<'HTML'
            <x-chart-utils />
            @stack('scripts')
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('const chartColor', $rendered);
        $this->assertStringContainsString('const chartColorArr', $rendered);
        $this->assertStringContainsString('const gradientColor', $rendered);
    }

    #[Test]
    public function chart_utils_script_only_rendered_once_when_component_used_twice(): void
    {
        $template = <<<'HTML'
            <x-chart-utils />
            <x-chart-utils />
            @stack('scripts')
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertSame(1, substr_count($rendered, 'const chartColor ='));
    }

    #[Test]
    public function chart_components_are_registered_in_config(): void
    {
        $components = config('control-ui-kit.components');

        $this->assertArrayHasKey('chart-utils', $components);
        $this->assertSame(ChartUtils::class, $components['chart-utils']);

        $this->assertArrayHasKey('gradient-line-chart', $components);
        $this->assertSame(GradientLineChart::class, $components['gradient-line-chart']);

        $this->assertArrayHasKey('segment-donut-chart', $components);
        $this->assertSame(SegmentDoughnutChart::class, $components['segment-donut-chart']);

        $this->assertArrayHasKey('gradient-bar-chart', $components);
        $this->assertSame(GradientBarChart::class, $components['gradient-bar-chart']);
    }
}
