<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\Gauge;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class GaugeTest extends ComponentTestCase
{
    #[Test]
    public function gauge_chart_constructor_assigns_id(): void
    {
        $component = new Gauge(id: 'my_gauge', value: 72);

        $this->assertSame('my_gauge', $component->id);
    }

    #[Test]
    public function gauge_chart_value_is_coerced_to_int(): void
    {
        $component = new Gauge(id: 'my_gauge', value: '72');

        $this->assertSame(72, $component->value);
    }

    #[Test]
    public function gauge_chart_value_supports_floats(): void
    {
        $component = new Gauge(id: 'my_gauge', value: '72.5');

        $this->assertSame(72.5, $component->value);
    }

    #[Test]
    public function gauge_chart_max_defaults_to_one_hundred(): void
    {
        $component = new Gauge(id: 'my_gauge', value: 72);

        $this->assertSame(100, $component->max);
    }

    #[Test]
    public function gauge_chart_max_can_be_overridden(): void
    {
        $component = new Gauge(id: 'my_gauge', value: 3, max: 5);

        $this->assertSame(5, $component->max);
    }

    #[Test]
    public function gauge_chart_default_colours_come_from_theme(): void
    {
        $component = new Gauge(id: 'my_gauge', value: 72);

        $this->assertSame('--chart-100', $component->valueColor);
        $this->assertSame('--chart-grid', $component->trackColor);
    }

    #[Test]
    public function gauge_chart_default_cutout_comes_from_theme(): void
    {
        $component = new Gauge(id: 'my_gauge', value: 72);

        $this->assertSame('75%', $component->cutout);
    }

    #[Test]
    public function gauge_chart_render_returns_the_chart_blade_string(): void
    {
        $component = new Gauge(id: 'my_gauge', value: 72);

        $this->assertStringContainsString('$chart->render()', $component->render());
    }

    #[Test]
    public function gauge_chart_renders_canvas_with_correct_id(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" />');

        $this->assertStringContainsString('<canvas id="uptime"', $rendered);
    }

    #[Test]
    public function gauge_chart_renders_as_a_doughnut(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" />');

        $this->assertStringContainsString("var chartType = 'doughnut';", $rendered);
        $this->assertStringContainsString('window.uptime = new Chart(', $rendered);
    }

    #[Test]
    public function gauge_chart_data_is_value_and_remainder(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" />');

        $this->assertStringContainsString('"data":[72,28]', $rendered);
    }

    #[Test]
    public function gauge_chart_data_uses_custom_max_for_remainder(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="3" max="5" />');

        $this->assertStringContainsString('"data":[3,2]', $rendered);
    }

    #[Test]
    public function gauge_chart_remainder_never_negative(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="120" max="100" />');

        $this->assertStringContainsString('"data":[120,0]', $rendered);
    }

    #[Test]
    public function gauge_chart_uses_value_and_track_colours(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" />');

        $this->assertStringContainsString('"backgroundColor":["--chart-100","--chart-grid"]', $rendered);
    }

    #[Test]
    public function gauge_chart_colours_can_be_overridden(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" value-color="--chart-500" track-color="--chart-200" />');

        $this->assertStringContainsString('"backgroundColor":["--chart-500","--chart-200"]', $rendered);
    }

    #[Test]
    public function gauge_chart_registers_the_center_text_plugin(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" />');

        $this->assertStringContainsString('var _centerTextPlugin = {', $rendered);
        $this->assertStringContainsString('plugins: [_centerTextPlugin]', $rendered);
    }

    #[Test]
    public function gauge_chart_center_text_shows_value_and_suffix(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" suffix="%" />');

        $this->assertStringContainsString('"text":"72%"', $rendered);
    }

    #[Test]
    public function gauge_chart_center_text_can_be_overridden_with_display(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" display="A+" />');

        $this->assertStringContainsString('"text":"A+"', $rendered);
    }

    #[Test]
    public function gauge_chart_center_label_is_emitted_when_set(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" label="Uptime" />');

        $this->assertStringContainsString('"label":"Uptime"', $rendered);
    }

    #[Test]
    public function gauge_chart_center_sizes_default_to_tailwind_classes(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" />');

        $this->assertStringContainsString('"size":"text-3xl"', $rendered);
        $this->assertStringContainsString('"labelSize":"text-sm"', $rendered);
    }

    #[Test]
    public function gauge_chart_center_sizes_can_be_overridden(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" center-size="text-5xl" center-label-size="text-base" />');

        $this->assertStringContainsString('"size":"text-5xl"', $rendered);
        $this->assertStringContainsString('"labelSize":"text-base"', $rendered);
    }

    #[Test]
    public function gauge_chart_constructor_assigns_center_sizes(): void
    {
        $component = new Gauge(id: 'my_gauge', value: 72);

        $this->assertSame('text-3xl', $component->centerSize);
        $this->assertSame('text-sm', $component->centerLabelSize);
    }

    #[Test]
    public function gauge_chart_legend_hidden_by_default(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" />');

        $this->assertStringContainsString('"legend":{"display":false', $rendered);
    }

    #[Test]
    public function gauge_chart_legend_can_be_enabled(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" legend-display="true" />');

        $this->assertStringContainsString('"legend":{"display":true', $rendered);
    }

    #[Test]
    public function gauge_chart_tooltip_enabled_by_default(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" />');

        $this->assertStringContainsString('"tooltip":{"enabled":true', $rendered);
    }

    #[Test]
    public function gauge_chart_tooltip_can_be_disabled(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" tooltip-enabled="false" />');

        $this->assertStringContainsString('"tooltip":{"enabled":false', $rendered);
    }

    #[Test]
    public function gauge_chart_tooltip_config_matches_donut_styling(): void
    {
        $gauge = (string) $this->blade('<x-gauge-chart id="g" value="72" />');
        $donut = (string) $this->blade('<x-donut-chart id="d" :data="[\'A\' => 72]" />');

        foreach ([
            '"mode":"nearest"',
            '"intersect":true',
            '"backgroundColor":"rgb(--chart-tooltip-bg)"',
            '"borderColor":"rgb(--chart-tooltip-border)"',
            '"displayColors":true',
        ] as $fragment) {
            $this->assertStringContainsString($fragment, $gauge);
            $this->assertStringContainsString($fragment, $donut);
        }
    }

    #[Test]
    public function gauge_chart_wires_external_legend_handlers(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" />');

        $this->assertStringContainsString('document.querySelectorAll(\'[data-chart="uptime"]\')', $rendered);
        $this->assertStringContainsString('chart.tooltip.setActiveElements', $rendered);
        $this->assertStringContainsString('chart.toggleDataVisibility', $rendered);
    }

    #[Test]
    public function gauge_chart_default_cutout_present_in_output(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" />');

        $this->assertStringContainsString('"cutout":"75%"', $rendered);
    }

    #[Test]
    public function gauge_chart_non_responsive_renders_fixed_canvas_size(): void
    {
        $rendered = (string) $this->blade('<x-gauge-chart id="uptime" value="72" responsive="false" />');

        $this->assertStringContainsString('<canvas id="uptime" width="400" height="200"', $rendered);
    }

    #[Test]
    public function gauge_chart_invalid_legend_position_falls_back_to_left(): void
    {
        $component = new Gauge(id: 'my_gauge', value: 72, legendPosition: 'invalid');

        $this->assertSame('left', $component->legendPosition);
    }

    #[Test]
    public function gauge_chart_invalid_legend_align_falls_back_to_center(): void
    {
        $component = new Gauge(id: 'my_gauge', value: 72, legendAlign: 'invalid');

        $this->assertSame('center', $component->legendAlign);
    }
}
