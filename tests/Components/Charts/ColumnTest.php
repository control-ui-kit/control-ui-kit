<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\Column;
use Illuminate\View\View;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ColumnTest extends ComponentTestCase
{
    private array $datasets = [
        ['label' => 'Streams', 'data' => [100, 200, 150]],
        ['label' => 'Downloads', 'data' => [50, 80, 60]],
    ];
    private array $labels = ['Jan', 'Feb', 'Mar'];

    #[Test]
    public function column_chart_constructor_assigns_id(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('my_chart', $component->id);
    }

    #[Test]
    public function column_chart_constructor_assigns_datasets(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame($this->datasets, $component->datasets);
    }

    #[Test]
    public function column_chart_constructor_assigns_labels(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame($this->labels, $component->labels);
    }

    #[Test]
    public function column_chart_x_axis_type_defaults_to_category(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('category', $component->xAxisType);
    }

    #[Test]
    public function column_chart_render_returns_correct_view(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertInstanceOf(View::class, $component->render());
        $this->assertSame('control-ui-kit::control-ui-kit.charts.column-chart', $component->render()->getName());
    }

    #[Test]
    public function column_chart_renders_canvas_with_correct_id(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="col_chart"', $rendered);
    }

    #[Test]
    public function column_chart_serialises_dataset_label_and_data(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [60, 120, 70]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Streams"', $rendered);
        $this->assertStringContainsString('"data":[60,120,70]', $rendered);
    }

    #[Test]
    public function column_chart_serialises_labels_as_json(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('["Jan","Feb","Mar"]', $rendered);
    }

    #[Test]
    public function column_chart_supports_multiple_datasets(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[
                    ['label' => 'Streams', 'data' => [1, 2, 3]],
                    ['label' => 'Downloads', 'data' => [4, 5, 6]]
                ]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Streams"', $rendered);
        $this->assertStringContainsString('"label":"Downloads"', $rendered);
    }

    #[Test]
    public function column_chart_does_not_emit_index_axis(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"indexAxis"', $rendered);
    }

    #[Test]
    public function column_chart_dataset_solid_color_when_no_gradient_stops(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3], 'color' => '--chart-500']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"color":"--chart-500"', $rendered);
    }

    #[Test]
    public function column_chart_dataset_gradient_stops_appear_in_output(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3], 'gradientStops' => [['t' => 0.0, 'cssVar' => '--chart-100'], ['t' => 1.0, 'cssVar' => '--chart-500']]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"gradientStops"', $rendered);
        $this->assertStringContainsString('"--chart-100"', $rendered);
        $this->assertStringContainsString('"--chart-500"', $rendered);
    }

    #[Test]
    public function column_chart_empty_datasets_renders_without_error(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart" :datasets="[]" :labels="[]" />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="col_chart"', $rendered);
    }

    #[Test]
    public function column_chart_animation_enabled_by_default(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('true', $component->animation);
    }

    #[Test]
    public function column_chart_animation_can_be_disabled(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                animation="false"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"animation":false', $rendered);
    }

    #[Test]
    public function column_chart_animation_emits_duration_and_easing_when_enabled(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"animation":', $rendered);
        $this->assertStringContainsString('"duration":', $rendered);
        $this->assertStringContainsString('"easing":', $rendered);
    }

    #[Test]
    public function column_chart_defaults_point_radius_from_config(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $expected = (string) config('themes.default.charts.defaults.point.radius');
        $this->assertSame($expected, $component->pointRadius);
    }

    #[Test]
    public function column_chart_point_radius_can_be_overridden(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, pointRadius: '8');

        $this->assertSame('8', $component->pointRadius);
    }

    #[Test]
    public function column_chart_hides_x_grid_by_default(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('true', $component->hideXGrid);
    }

    #[Test]
    public function column_chart_y_grid_visible_by_default(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('false', $component->hideGrid);
    }

    #[Test]
    public function column_chart_renders_chart_init_script(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('window.col_chart = new Chart(', $rendered);
        $this->assertStringContainsString("type: 'bar'", $rendered);
    }

    #[Test]
    public function column_chart_passes_colors_array_to_view(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertIsArray($component->colors);
        $this->assertNotEmpty($component->colors);
        $this->assertStringStartsWith('--chart-', $component->colors[0]);
    }

    #[Test]
    public function column_chart_dataset_order_is_passed_through(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3], 'order' => 1]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"order":1', $rendered);
    }

    #[Test]
    public function column_chart_mixed_gradient_and_solid_datasets(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[
                    ['label' => 'Streams', 'data' => [1, 2, 3], 'gradientStops' => [['t' => 0.0, 'cssVar' => '--chart-100'], ['t' => 1.0, 'cssVar' => '--chart-500']]],
                    ['label' => 'Downloads', 'data' => [4, 5, 6]]
                ]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"gradientStops"', $rendered);
        $this->assertStringContainsString('"label":"Streams"', $rendered);
        $this->assertStringContainsString('"label":"Downloads"', $rendered);
    }

    #[Test]
    public function column_chart_category_axis_does_not_emit_time_config(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"type":"time"', $rendered);
        $this->assertStringNotContainsString('"minUnit"', $rendered);
    }

    #[Test]
    public function column_chart_time_axis_emits_time_config(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                x-axis-type="time"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['2020-01-01', '2020-02-01', '2020-03-01']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"type":"time"', $rendered);
    }

    #[Test]
    public function column_chart_time_axis_emits_min_unit(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                x-axis-type="time"
                x-axis-min-unit="month"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['2020-01-01', '2020-02-01', '2020-03-01']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"minUnit":"month"', $rendered);
    }

    #[Test]
    public function column_chart_category_axis_does_not_emit_min_unit(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"minUnit"', $rendered);
    }

    #[Test]
    public function column_chart_invalid_legend_position_falls_back_to_left(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, legendPosition: 'invalid');

        $this->assertSame('left', $component->legendPosition);
    }

    #[Test]
    public function column_chart_invalid_legend_align_falls_back_to_center(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, legendAlign: 'invalid');

        $this->assertSame('center', $component->legendAlign);
    }

    #[Test]
    public function column_chart_padding_props_are_null_by_default(): void
    {
        $component = new Column(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertNull($component->paddingTop);
        $this->assertNull($component->paddingBottom);
        $this->assertNull($component->paddingLeft);
        $this->assertNull($component->paddingRight);
    }

    #[Test]
    public function column_chart_padding_props_can_be_set(): void
    {
        $component = new Column(
            id: 'my_chart',
            datasets: $this->datasets,
            labels: $this->labels,
            paddingTop: '20',
            paddingBottom: '10',
            paddingLeft: '5',
            paddingRight: '5'
        );

        $this->assertSame('20', $component->paddingTop);
        $this->assertSame('10', $component->paddingBottom);
        $this->assertSame('5', $component->paddingLeft);
        $this->assertSame('5', $component->paddingRight);
    }

    #[Test]
    public function column_chart_default_padding_is_zero_in_rendered_output(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"layout":{"padding":{"top":0,"bottom":0,"left":0,"right":0}}', $rendered);
    }

    #[Test]
    public function column_chart_padding_values_are_emitted_in_rendered_output(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                padding-top="20"
                padding-bottom="10"
                padding-left="5"
                padding-right="5"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"layout":{"padding":{"top":20,"bottom":10,"left":5,"right":5}}', $rendered);
    }

    #[Test]
    public function column_chart_dataset_options_present_when_passed(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3], 'hoverColor' => '#ff0000', 'borderRadius' => 4, 'barPercentage' => 0.8, 'categoryPercentage' => 0.9]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"hoverColor":"#ff0000"', $rendered);
        $this->assertStringContainsString('"borderRadius":4', $rendered);
        $this->assertStringContainsString('"barPercentage":0.8', $rendered);
        $this->assertStringContainsString('"categoryPercentage":0.9', $rendered);
    }

    #[Test]
    public function column_chart_dataset_options_absent_when_not_passed(): void
    {
        $template = <<<'HTML'
            <x-column-chart id="col_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"hoverColor"', $rendered);
        $this->assertStringNotContainsString('"borderRadius"', $rendered);
        $this->assertStringNotContainsString('"barPercentage"', $rendered);
        $this->assertStringNotContainsString('"categoryPercentage"', $rendered);
    }
}
