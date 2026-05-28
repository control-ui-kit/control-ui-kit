<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\SegmentDoughnutChart;
use Illuminate\View\View;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class SegmentDoughnutChartTest extends ComponentTestCase
{
    #[Test]
    public function segment_doughnut_chart_constructor_assigns_properties_with_defaults(): void
    {
        $component = new SegmentDoughnutChart(
            id: 'donut_chart',
            values: [40, 60],
            labels: ['Male', 'Female'],
        );

        $this->assertSame('donut_chart', $component->id);
        $this->assertSame([40, 60], $component->values);
        $this->assertSame(['Male', 'Female'], $component->labels);
        $this->assertSame([], $component->colors);
        $this->assertSame(72, $component->cutout);
    }

    #[Test]
    public function segment_doughnut_chart_constructor_assigns_all_properties(): void
    {
        $component = new SegmentDoughnutChart(
            id: 'donut_chart',
            values: [30, 70],
            labels: ['A', 'B'],
            colors: ['--chart-100', '--chart-400'],
            cutout: 60,
        );

        $this->assertSame(['--chart-100', '--chart-400'], $component->colors);
        $this->assertSame(60, $component->cutout);
    }

    #[Test]
    public function segment_doughnut_chart_render_returns_correct_view(): void
    {
        $component = new SegmentDoughnutChart('donut_chart', [], []);
        $view = $component->render();

        $this->assertInstanceOf(View::class, $view);
        $this->assertSame('control-ui-kit::control-ui-kit.charts.segment-donut-chart', $view->getName());
    }

    #[Test]
    public function segment_doughnut_chart_rendered_output_contains_canvas_with_correct_id(): void
    {
        $template = <<<'HTML'
            <x-segment-donut-chart
                id="donut_chart"
                :values="[40, 60, 100]"
                :labels="['Male', 'Female', 'Unknown']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="donut_chart">', $rendered);
    }

    #[Test]
    public function segment_doughnut_chart_empty_colors_uses_default_palette_fallback(): void
    {
        $template = <<<'HTML'
            <x-segment-donut-chart
                id="donut_chart"
                :values="[40, 60]"
                :labels="['Male', 'Female']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        // Empty colors: @json([] ?: []) renders as []
        $this->assertStringContainsString('const palette = [];', $rendered);
        $this->assertStringContainsString('paletteDefaults', $rendered);
    }

    #[Test]
    public function segment_doughnut_chart_provided_colors_appear_in_rendered_output(): void
    {
        $template = <<<'HTML'
            <x-segment-donut-chart
                id="donut_chart"
                :values="[40, 60]"
                :labels="['Male', 'Female']"
                :colors="['--chart-100', '--chart-400']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"--chart-100"', $rendered);
        $this->assertStringContainsString('"--chart-400"', $rendered);
    }

    #[Test]
    public function segment_doughnut_chart_default_cutout_appears_in_output(): void
    {
        $template = <<<'HTML'
            <x-segment-donut-chart
                id="donut_chart"
                :values="[50, 50]"
                :labels="['A', 'B']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString("cutout: '72%'", $rendered);
    }

    #[Test]
    public function segment_doughnut_chart_custom_cutout_appears_in_output(): void
    {
        $template = <<<'HTML'
            <x-segment-donut-chart
                id="donut_chart"
                :values="[50, 50]"
                :labels="['A', 'B']"
                :cutout="60"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString("cutout: '60%'", $rendered);
    }

    #[Test]
    public function segment_doughnut_chart_values_and_labels_are_json_encoded(): void
    {
        $template = <<<'HTML'
            <x-segment-donut-chart
                id="donut_chart"
                :values="[40, 60, 100]"
                :labels="['Male', 'Female', 'Unknown']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('[40,60,100]', $rendered);
        $this->assertStringContainsString('["Male","Female","Unknown"]', $rendered);
    }
}
