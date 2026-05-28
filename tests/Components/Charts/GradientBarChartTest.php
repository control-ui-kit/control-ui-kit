<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\GradientBarChart;
use Illuminate\View\View;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class GradientBarChartTest extends ComponentTestCase
{
    #[Test]
    public function gradient_bar_chart_constructor_assigns_properties_with_defaults(): void
    {
        $component = new GradientBarChart(
            id: 'bar_chart',
            values: [100, 200, 300],
            labels: ['Jan', 'Feb', 'Mar'],
            label: 'Streams',
        );

        $this->assertSame('bar_chart', $component->id);
        $this->assertSame([100, 200, 300], $component->values);
        $this->assertSame(['Jan', 'Feb', 'Mar'], $component->labels);
        $this->assertSame('Streams', $component->label);
        $this->assertSame([], $component->gradientStops);
    }

    #[Test]
    public function gradient_bar_chart_constructor_assigns_all_properties(): void
    {
        $stops = [['t' => 0.0, 'cssVar' => '--chart-100'], ['t' => 1.0, 'cssVar' => '--chart-300']];

        $component = new GradientBarChart(
            id: 'bar_chart',
            values: [10, 20],
            labels: ['A', 'B'],
            label: 'Downloads',
            gradientStops: $stops,
        );

        $this->assertSame('Downloads', $component->label);
        $this->assertSame($stops, $component->gradientStops);
    }

    #[Test]
    public function gradient_bar_chart_render_returns_correct_view(): void
    {
        $component = new GradientBarChart('bar_chart', [], [], 'Label');
        $view = $component->render();

        $this->assertInstanceOf(View::class, $view);
        $this->assertSame('control-ui-kit::control-ui-kit.charts.gradient-bar-chart', $view->getName());
    }

    #[Test]
    public function gradient_bar_chart_rendered_output_contains_canvas_with_correct_id(): void
    {
        $template = <<<'HTML'
            <x-gradient-bar-chart
                id="bar_chart"
                :values="[100, 200, 300]"
                :labels="['Jan', 'Feb', 'Mar']"
                label="Streams"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="bar_chart">', $rendered);
    }

    #[Test]
    public function gradient_bar_chart_values_labels_and_label_appear_in_output(): void
    {
        $template = <<<'HTML'
            <x-gradient-bar-chart
                id="bar_chart"
                :values="[100, 200, 300]"
                :labels="['Jan', 'Feb', 'Mar']"
                label="Streams"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('[100,200,300]', $rendered);
        $this->assertStringContainsString('["Jan","Feb","Mar"]', $rendered);
        $this->assertStringContainsString('"Streams"', $rendered);
    }

    #[Test]
    public function gradient_bar_chart_empty_gradient_stops_renders_as_null(): void
    {
        $template = <<<'HTML'
            <x-gradient-bar-chart
                id="bar_chart"
                :values="[50, 75]"
                :labels="['A', 'B']"
                label="Plays"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('const stops = null;', $rendered);
    }

    #[Test]
    public function gradient_bar_chart_provided_gradient_stops_appear_in_output(): void
    {
        $template = <<<'HTML'
            <x-gradient-bar-chart
                id="bar_chart"
                :values="[50, 75]"
                :labels="['A', 'B']"
                label="Plays"
                :gradientStops="[['t' => 0.5, 'cssVar' => '--chart-200']]"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"cssVar":"--chart-200"', $rendered);
        $this->assertStringContainsString('"t":0.5', $rendered);
    }
}
