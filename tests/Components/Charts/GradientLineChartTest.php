<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\GradientLineChart;
use Illuminate\View\View;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class GradientLineChartTest extends ComponentTestCase
{
    #[Test]
    public function gradient_line_chart_constructor_assigns_properties(): void
    {
        $datasets = [['label' => 'Audio', 'values' => [1, 2, 3]]];
        $labels   = ['Jan', 'Feb', 'Mar'];

        $component = new GradientLineChart(
            id: 'line_chart',
            datasets: $datasets,
            labels: $labels,
        );

        $this->assertSame('line_chart', $component->id);
        $this->assertSame($datasets, $component->datasets);
        $this->assertSame($labels, $component->labels);
    }

    #[Test]
    public function gradient_line_chart_render_returns_correct_view(): void
    {
        $component = new GradientLineChart('line_chart', [], []);
        $view = $component->render();

        $this->assertInstanceOf(View::class, $view);
        $this->assertSame('control-ui-kit::control-ui-kit.charts.gradient-line-chart', $view->getName());
    }

    #[Test]
    public function gradient_line_chart_rendered_output_contains_canvas_with_correct_id(): void
    {
        $template = <<<'HTML'
            <x-gradient-line-chart
                id="line_chart"
                :datasets="[['label' => 'Audio', 'values' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="line_chart">', $rendered);
    }

    #[Test]
    public function gradient_line_chart_single_dataset_label_and_values_are_json_serialised(): void
    {
        $template = <<<'HTML'
            <x-gradient-line-chart
                id="line_chart"
                :datasets="[['label' => 'Audio', 'values' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Audio"', $rendered);
        $this->assertStringContainsString('"values":[1,2,3]', $rendered);
    }

    #[Test]
    public function gradient_line_chart_labels_appear_in_rendered_output_as_json(): void
    {
        $template = <<<'HTML'
            <x-gradient-line-chart
                id="line_chart"
                :datasets="[['label' => 'Audio', 'values' => [10, 20, 30]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('["Jan","Feb","Mar"]', $rendered);
    }

    #[Test]
    public function gradient_line_chart_gradient_stops_are_json_serialised_when_provided(): void
    {
        $template = <<<'HTML'
            <x-gradient-line-chart
                id="line_chart"
                :datasets="[['label' => 'Audio', 'values' => [1, 2], 'gradientStops' => [['t' => 0.0, 'cssVar' => '--chart-100'], ['t' => 1.0, 'cssVar' => '--chart-300']]]]"
                :labels="['Jan', 'Feb']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"gradientStops"', $rendered);
        $this->assertStringContainsString('"--chart-100"', $rendered);
        $this->assertStringContainsString('"--chart-300"', $rendered);
    }

    #[Test]
    public function gradient_line_chart_multi_dataset_both_labels_appear_in_output(): void
    {
        $template = <<<'HTML'
            <x-gradient-line-chart
                id="line_chart"
                :datasets="[
                    ['label' => 'Audio', 'values' => [1, 2, 3]],
                    ['label' => 'Video', 'values' => [4, 5, 6], 'gradientStops' => [['t' => 0.5, 'cssVar' => '--chart-200']]]
                ]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Audio"', $rendered);
        $this->assertStringContainsString('"label":"Video"', $rendered);
        $this->assertStringContainsString('"cssVar":"--chart-200"', $rendered);
    }
}
