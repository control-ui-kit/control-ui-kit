<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\Combo;
use Illuminate\View\View;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ComboTest extends ComponentTestCase
{
    private array $datasets = [
        ['label' => 'Revenue', 'data' => [100, 200, 150], 'type' => 'bar'],
        ['label' => 'Growth', 'data' => [10, 20, 15], 'type' => 'line'],
    ];
    private array $labels = ['Jan', 'Feb', 'Mar'];

    #[Test]
    public function combo_chart_constructor_assigns_id(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('my_chart', $component->id);
    }

    #[Test]
    public function combo_chart_constructor_assigns_datasets(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame($this->datasets, $component->datasets);
    }

    #[Test]
    public function combo_chart_constructor_assigns_labels(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame($this->labels, $component->labels);
    }

    #[Test]
    public function combo_chart_defaults_x_axis_type_to_category(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('category', $component->xAxisType);
    }

    #[Test]
    public function combo_chart_accepts_time_x_axis_type(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, xAxisType: 'time');

        $this->assertSame('time', $component->xAxisType);
    }

    #[Test]
    public function combo_chart_defaults_x_axis_min_unit_to_day(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('day', $component->xAxisMinUnit);
    }

    #[Test]
    public function combo_chart_x_axis_min_unit_can_be_overridden(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, xAxisMinUnit: 'week');

        $this->assertSame('week', $component->xAxisMinUnit);
    }

    #[Test]
    public function combo_chart_show_second_axis_defaults_to_false(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertFalse($component->showSecondAxis);
    }

    #[Test]
    public function combo_chart_show_second_axis_can_be_enabled(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, showSecondAxis: 'true');

        $this->assertTrue($component->showSecondAxis);
    }

    #[Test]
    public function combo_chart_y1_axis_label_defaults_to_null(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertNull($component->y1AxisLabel);
    }

    #[Test]
    public function combo_chart_y1_axis_label_can_be_set(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, y1AxisLabel: 'Percentage');

        $this->assertSame('Percentage', $component->y1AxisLabel);
    }

    #[Test]
    public function combo_chart_render_returns_correct_view(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertInstanceOf(View::class, $component->render());
        $this->assertSame('control-ui-kit::control-ui-kit.charts.combo-chart', $component->render()->getName());
    }

    #[Test]
    public function combo_chart_renders_canvas_with_correct_id(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="combo_chart"', $rendered);
    }

    #[Test]
    public function combo_chart_serialises_dataset_label_and_data(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [60, 120, 70], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Revenue"', $rendered);
        $this->assertStringContainsString('"data":[60,120,70]', $rendered);
    }

    #[Test]
    public function combo_chart_serialises_labels_as_json(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('["Jan","Feb","Mar"]', $rendered);
    }

    #[Test]
    public function combo_chart_supports_multiple_datasets(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[
                    ['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar'],
                    ['label' => 'Growth', 'data' => [4, 5, 6], 'type' => 'line']
                ]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Revenue"', $rendered);
        $this->assertStringContainsString('"label":"Growth"', $rendered);
    }

    #[Test]
    public function combo_chart_bar_dataset_type_is_passed_through(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"type":"bar"', $rendered);
    }

    #[Test]
    public function combo_chart_line_dataset_type_is_passed_through(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Growth', 'data' => [1, 2, 3], 'type' => 'line']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"type":"line"', $rendered);
    }

    #[Test]
    public function combo_chart_line_dataset_has_tension(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Growth', 'data' => [1, 2, 3], 'type' => 'line']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('tension', $rendered);
    }

    #[Test]
    public function combo_chart_passes_dataset_color_when_provided(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar', 'color' => '--chart-500']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"color":"--chart-500"', $rendered);
    }

    #[Test]
    public function combo_chart_dataset_y_axis_id_is_passed_through(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Growth', 'data' => [1, 2, 3], 'type' => 'line', 'yAxisID' => 'y1']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"yAxisID":"y1"', $rendered);
    }

    #[Test]
    public function combo_chart_does_not_emit_y1_scale_by_default(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"y1":', $rendered);
    }

    #[Test]
    public function combo_chart_emits_y1_scale_when_show_second_axis_is_true(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                show-second-axis="true"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"y1":', $rendered);
    }

    #[Test]
    public function combo_chart_y1_scale_has_right_position(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                show-second-axis="true"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"position":"right"', $rendered);
    }

    #[Test]
    public function combo_chart_y1_scale_has_draw_on_chart_area_false(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                show-second-axis="true"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"drawOnChartArea":false', $rendered);
    }

    #[Test]
    public function combo_chart_y1_axis_label_is_emitted_in_output(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                show-second-axis="true"
                y1-axis-label="Percentage"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"Percentage"', $rendered);
    }

    #[Test]
    public function combo_chart_category_axis_does_not_emit_time_config(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"type":"time"', $rendered);
        $this->assertStringNotContainsString('tooltipFormat', $rendered);
    }

    #[Test]
    public function combo_chart_time_axis_type_emits_time_config(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                x-axis-type="time"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['01/01/2024', '02/01/2024', '03/01/2024']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"type":"time"', $rendered);
        $this->assertStringContainsString('"tooltipFormat":"ll"', $rendered);
    }

    #[Test]
    public function combo_chart_time_axis_emits_min_unit(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                x-axis-type="time"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['01/01/2024', '02/01/2024', '03/01/2024']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"minUnit":"day"', $rendered);
    }

    #[Test]
    public function combo_chart_time_axis_min_unit_can_be_overridden(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                x-axis-type="time"
                x-axis-min-unit="week"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['01/01/2024', '02/01/2024', '03/01/2024']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"minUnit":"week"', $rendered);
    }

    #[Test]
    public function combo_chart_category_axis_does_not_emit_min_unit(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"minUnit"', $rendered);
    }

    #[Test]
    public function combo_chart_animation_enabled_by_default(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('true', $component->animation);
    }

    #[Test]
    public function combo_chart_animation_can_be_disabled(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                animation="false"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"animation":false', $rendered);
    }

    #[Test]
    public function combo_chart_animation_emits_duration_and_easing_when_enabled(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"animation":', $rendered);
        $this->assertStringContainsString('"duration":', $rendered);
        $this->assertStringContainsString('"easing":', $rendered);
    }

    #[Test]
    public function combo_chart_defaults_point_radius_from_config(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $expected = (string) config('themes.default.charts.defaults.point.radius');
        $this->assertSame($expected, $component->pointRadius);
    }

    #[Test]
    public function combo_chart_point_radius_can_be_overridden(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, pointRadius: '10');

        $this->assertSame('10', $component->pointRadius);
    }

    #[Test]
    public function combo_chart_point_radius_is_emitted_in_options(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $defaultRadius = config('themes.default.charts.defaults.point.radius');
        $this->assertStringContainsString('"radius":' . $defaultRadius, $rendered);
    }

    #[Test]
    public function combo_chart_hides_x_grid_by_default(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('true', $component->hideXGrid);
    }

    #[Test]
    public function combo_chart_y_grid_visible_by_default(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('false', $component->hideGrid);
    }

    #[Test]
    public function combo_chart_renders_chart_init_script(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Revenue', 'data' => [1, 2, 3], 'type' => 'bar']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('window.combo_chart = new Chart(', $rendered);
        $this->assertStringContainsString("type: 'bar'", $rendered);
    }

    #[Test]
    public function combo_chart_passes_colors_array_to_view(): void
    {
        $component = new Combo(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertIsArray($component->colors);
        $this->assertNotEmpty($component->colors);
        $this->assertStringStartsWith('--chart-', $component->colors[0]);
    }

    #[Test]
    public function combo_chart_empty_datasets_renders_without_error(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart" :datasets="[]" :labels="[]" />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="combo_chart"', $rendered);
    }

    #[Test]
    public function combo_chart_line_dataset_passes_gradient_stops(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Growth', 'data' => [1, 2, 3], 'type' => 'line', 'gradientStops' => [['t' => 0.0, 'cssVar' => '--chart-100'], ['t' => 1.0, 'cssVar' => '--chart-300']]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"gradientStops"', $rendered);
        $this->assertStringContainsString('"--chart-100"', $rendered);
    }

    #[Test]
    public function combo_chart_line_dataset_passes_dashed_option(): void
    {
        $template = <<<'HTML'
            <x-combo-chart id="combo_chart"
                :datasets="[['label' => 'Growth', 'data' => [1, 2, 3], 'type' => 'line', 'dashed' => [5, 5]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"dashed":[5,5]', $rendered);
    }
}
