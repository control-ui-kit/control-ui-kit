<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\Stacked;
use Illuminate\View\View;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class StackedTest extends ComponentTestCase
{
    private array $datasets = [
        ['label' => 'Series A', 'data' => [100, 200, 150]],
        ['label' => 'Series B', 'data' => [50, 80, 60]],
    ];
    private array $labels = ['Jan', 'Feb', 'Mar'];

    #[Test]
    public function stacked_chart_constructor_assigns_id(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('my_chart', $component->id);
    }

    #[Test]
    public function stacked_chart_constructor_assigns_datasets(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame($this->datasets, $component->datasets);
    }

    #[Test]
    public function stacked_chart_constructor_assigns_labels(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame($this->labels, $component->labels);
    }

    #[Test]
    public function stacked_chart_defaults_x_axis_type_to_category(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('category', $component->xAxisType);
    }

    #[Test]
    public function stacked_chart_accepts_time_x_axis_type(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, xAxisType: 'time');

        $this->assertSame('time', $component->xAxisType);
    }

    #[Test]
    public function stacked_chart_defaults_to_vertical_orientation(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('x', $component->indexAxis);
    }

    #[Test]
    public function stacked_chart_accepts_horizontal_orientation(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, indexAxis: 'y');

        $this->assertSame('y', $component->indexAxis);
    }

    #[Test]
    public function stacked_chart_invalid_orientation_falls_back_to_vertical(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, indexAxis: 'diagonal');

        $this->assertSame('x', $component->indexAxis);
    }

    #[Test]
    public function stacked_chart_emits_vertical_index_axis_by_default(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"indexAxis":"x"', $rendered);
    }

    #[Test]
    public function stacked_chart_emits_horizontal_index_axis_when_set(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                index-axis="y"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"indexAxis":"y"', $rendered);
    }

    #[Test]
    public function stacked_chart_defaults_x_axis_min_unit_to_day(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('day', $component->xAxisMinUnit);
    }

    #[Test]
    public function stacked_chart_x_axis_min_unit_can_be_overridden(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, xAxisMinUnit: 'week');

        $this->assertSame('week', $component->xAxisMinUnit);
    }

    #[Test]
    public function stacked_chart_render_returns_correct_view(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertInstanceOf(View::class, $component->render());
        $this->assertSame('control-ui-kit::control-ui-kit.charts.stacked-chart', $component->render()->getName());
    }

    #[Test]
    public function stacked_chart_renders_canvas_with_correct_id(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="stacked_chart"', $rendered);
    }

    #[Test]
    public function stacked_chart_serialises_dataset_label_and_data(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [60, 120, 70]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Series A"', $rendered);
        $this->assertStringContainsString('"data":[60,120,70]', $rendered);
    }

    #[Test]
    public function stacked_chart_serialises_labels_as_json(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('["Jan","Feb","Mar"]', $rendered);
    }

    #[Test]
    public function stacked_chart_supports_multiple_datasets(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[
                    ['label' => 'Series A', 'data' => [1, 2, 3]],
                    ['label' => 'Series B', 'data' => [4, 5, 6]]
                ]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Series A"', $rendered);
        $this->assertStringContainsString('"label":"Series B"', $rendered);
    }

    #[Test]
    public function stacked_chart_x_scale_has_stacked_true(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"stacked":true', $rendered);
    }

    #[Test]
    public function stacked_chart_y_scale_has_stacked_true(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $reflection = new \ReflectionClass($component);
        $method = $reflection->getMethod('chartOptions');
        $method->setAccessible(true);
        $options = $method->invoke($component);

        $this->assertTrue($options['scales']['y']['stacked']);
    }

    #[Test]
    public function stacked_chart_dataset_passes_stack_property(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3], 'stack' => 'group1']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"stack":"group1"', $rendered);
    }

    #[Test]
    public function stacked_chart_dataset_without_stack_property_omits_stack(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"stack":', $rendered);
    }

    #[Test]
    public function stacked_chart_passes_dataset_color_when_provided(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3], 'color' => '--chart-500']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"color":"--chart-500"', $rendered);
    }

    #[Test]
    public function stacked_chart_category_axis_does_not_emit_time_config(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"type":"time"', $rendered);
        $this->assertStringNotContainsString('tooltipFormat', $rendered);
    }

    #[Test]
    public function stacked_chart_time_axis_type_emits_time_config(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                x-axis-type="time"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['01/01/2024', '02/01/2024', '03/01/2024']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"type":"time"', $rendered);
        $this->assertStringContainsString('"tooltipFormat":"ll"', $rendered);
    }

    #[Test]
    public function stacked_chart_time_axis_emits_min_unit(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                x-axis-type="time"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['01/01/2024', '02/01/2024', '03/01/2024']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"minUnit":"day"', $rendered);
    }

    #[Test]
    public function stacked_chart_time_axis_min_unit_can_be_overridden(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                x-axis-type="time"
                x-axis-min-unit="week"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['01/01/2024', '02/01/2024', '03/01/2024']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"minUnit":"week"', $rendered);
    }

    #[Test]
    public function stacked_chart_category_axis_does_not_emit_min_unit(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"minUnit"', $rendered);
    }

    #[Test]
    public function stacked_chart_animation_enabled_by_default(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('true', $component->animation);
    }

    #[Test]
    public function stacked_chart_animation_can_be_disabled(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                animation="false"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"animation":false', $rendered);
    }

    #[Test]
    public function stacked_chart_animation_emits_duration_and_easing_when_enabled(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"animation":', $rendered);
        $this->assertStringContainsString('"duration":', $rendered);
        $this->assertStringContainsString('"easing":', $rendered);
    }

    #[Test]
    public function stacked_chart_defaults_point_radius_from_config(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $expected = (string) config('themes.default.charts.defaults.point.radius');
        $this->assertSame($expected, $component->pointRadius);
    }

    #[Test]
    public function stacked_chart_point_radius_can_be_overridden(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, pointRadius: '10');

        $this->assertSame('10', $component->pointRadius);
    }

    #[Test]
    public function stacked_chart_hides_x_grid_by_default(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('true', $component->hideXGrid);
    }

    #[Test]
    public function stacked_chart_y_grid_visible_by_default(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('false', $component->hideGrid);
    }

    #[Test]
    public function stacked_chart_renders_chart_init_script(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('window.stacked_chart = new Chart(', $rendered);
        $this->assertStringContainsString("type: 'bar'", $rendered);
    }

    #[Test]
    public function stacked_chart_passes_colors_array_to_view(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertIsArray($component->colors);
        $this->assertNotEmpty($component->colors);
        $this->assertStringStartsWith('--chart-', $component->colors[0]);
    }

    #[Test]
    public function stacked_chart_empty_datasets_renders_without_error(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart" :datasets="[]" :labels="[]" />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="stacked_chart"', $rendered);
    }

    #[Test]
    public function stacked_chart_dataset_order_is_passed_through(): void
    {
        $template = <<<'HTML'
            <x-stacked-chart id="stacked_chart"
                :datasets="[['label' => 'Series A', 'data' => [1, 2, 3], 'order' => 2]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"order":2', $rendered);
    }

    #[Test]
    public function stacked_chart_invalid_legend_position_falls_back_to_left(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, legendPosition: 'invalid');

        $this->assertSame('left', $component->legendPosition);
    }

    #[Test]
    public function stacked_chart_invalid_legend_align_falls_back_to_center(): void
    {
        $component = new Stacked(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, legendAlign: 'invalid');

        $this->assertSame('center', $component->legendAlign);
    }
}
