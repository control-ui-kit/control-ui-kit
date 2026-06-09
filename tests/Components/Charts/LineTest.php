<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\Line;
use Illuminate\View\View;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class LineTest extends ComponentTestCase
{
    private array $datasets = [['label' => 'Streams', 'data' => [60, 120, 70, 110, 80]]];
    private array $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May'];

    #[Test]
    public function line_chart_constructor_assigns_id(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('my_chart', $component->id);
    }

    #[Test]
    public function line_chart_constructor_assigns_datasets(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame($this->datasets, $component->datasets);
    }

    #[Test]
    public function line_chart_constructor_assigns_labels(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame($this->labels, $component->labels);
    }

    #[Test]
    public function line_chart_defaults_x_axis_type_to_category(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('category', $component->xAxisType);
    }

    #[Test]
    public function line_chart_accepts_time_x_axis_type(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, xAxisType: 'time');

        $this->assertSame('time', $component->xAxisType);
    }

    #[Test]
    public function line_chart_render_returns_correct_view(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertInstanceOf(View::class, $component->render());
        $this->assertSame('control-ui-kit::control-ui-kit.charts.line-chart', $component->render()->getName());
    }

    #[Test]
    public function line_chart_renders_canvas_with_correct_id(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [60, 120, 70]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="line_chart"', $rendered);
    }

    #[Test]
    public function line_chart_serialises_dataset_label_and_data(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [60, 120, 70]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Streams"', $rendered);
        $this->assertStringContainsString('"data":[60,120,70]', $rendered);
    }

    #[Test]
    public function line_chart_serialises_labels_as_json(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [60, 120, 70]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('["Jan","Feb","Mar"]', $rendered);
    }

    #[Test]
    public function line_chart_supports_multiple_datasets(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[
                    ['label' => 'Audio', 'data' => [1, 2, 3]],
                    ['label' => 'Video', 'data' => [4, 5, 6]]
                ]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Audio"', $rendered);
        $this->assertStringContainsString('"label":"Video"', $rendered);
    }

    #[Test]
    public function line_chart_passes_dataset_color_when_provided(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3], 'color' => '--chart-500']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"color":"--chart-500"', $rendered);
    }

    #[Test]
    public function line_chart_passes_gradient_stops_when_provided(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3], 'gradientStops' => [['t' => 0.0, 'cssVar' => '--chart-100'], ['t' => 1.0, 'cssVar' => '--chart-300']]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"gradientStops"', $rendered);
        $this->assertStringContainsString('"--chart-100"', $rendered);
        $this->assertStringContainsString('"--chart-300"', $rendered);
    }

    #[Test]
    public function line_chart_mixed_gradient_and_static_datasets(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[
                    ['label' => 'Audio', 'data' => [1, 2, 3]],
                    ['label' => 'Video', 'data' => [4, 5, 6], 'gradientStops' => [['t' => 0.5, 'cssVar' => '--chart-200']]]
                ]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Audio"', $rendered);
        $this->assertStringContainsString('"label":"Video"', $rendered);
        $this->assertStringContainsString('"cssVar":"--chart-200"', $rendered);
    }

    #[Test]
    public function line_chart_category_axis_does_not_emit_time_config(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"type":"time"', $rendered);
        $this->assertStringNotContainsString('tooltipFormat', $rendered);
    }

    #[Test]
    public function line_chart_time_axis_type_emits_time_config(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                x-axis-type="time"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['01/01/2024', '02/01/2024', '03/01/2024']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"type":"time"', $rendered);
        $this->assertStringContainsString('"tooltipFormat":"ll"', $rendered);
    }

    #[Test]
    public function line_chart_passes_dashed_option_in_dataset(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3], 'dashed' => [5, 5]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"dashed":[5,5]', $rendered);
    }

    #[Test]
    public function line_chart_passes_radius_in_dataset(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3], 'radius' => 8]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"radius":8', $rendered);
    }

    #[Test]
    public function line_chart_renders_chart_init_script(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('window.line_chart = new Chart(', $rendered);
        $this->assertStringContainsString("type: 'line'", $rendered);
    }

    #[Test]
    public function line_chart_passes_colors_array_to_view(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertIsArray($component->colors);
        $this->assertNotEmpty($component->colors);
        $this->assertStringStartsWith('--chart-', $component->colors[0]);
    }

    #[Test]
    public function line_chart_empty_datasets_renders_without_error(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" :datasets="[]" :labels="[]" />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="line_chart"', $rendered);
    }

    #[Test]
    public function line_chart_hides_x_axis_grid_by_default(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('true', $component->hideXGrid);
    }

    #[Test]
    public function line_chart_x_grid_can_be_shown(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, hideXGrid: 'false');

        $this->assertSame('false', $component->hideXGrid);
    }

    #[Test]
    public function line_chart_y_grid_visible_by_default(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('false', $component->hideGrid);
    }

    #[Test]
    public function line_chart_animation_enabled_by_default(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('true', $component->animation);
    }

    #[Test]
    public function line_chart_animation_can_be_disabled(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                animation="false"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"animation":false', $rendered);
    }

    #[Test]
    public function line_chart_animation_emits_duration_and_easing_when_enabled(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
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
    public function line_chart_animation_duration_can_be_overridden(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, animationDuration: '500');

        $this->assertSame('500', $component->animationDuration);
    }

    #[Test]
    public function line_chart_animation_easing_can_be_overridden(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, animationEasing: 'linear');

        $this->assertSame('linear', $component->animationEasing);
    }

    #[Test]
    public function line_chart_defaults_x_axis_min_unit_to_day(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('day', $component->xAxisMinUnit);
    }

    #[Test]
    public function line_chart_x_axis_min_unit_can_be_overridden(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, xAxisMinUnit: 'week');

        $this->assertSame('week', $component->xAxisMinUnit);
    }

    #[Test]
    public function line_chart_time_axis_emits_min_unit_in_rendered_output(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                x-axis-type="time"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['01/01/2024', '02/01/2024', '03/01/2024']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"minUnit":"day"', $rendered);
    }

    #[Test]
    public function line_chart_time_axis_min_unit_can_be_overridden_in_render(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                x-axis-type="time"
                x-axis-min-unit="week"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['01/01/2024', '02/01/2024', '03/01/2024']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"minUnit":"week"', $rendered);
    }

    #[Test]
    public function line_chart_category_axis_does_not_emit_min_unit(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringNotContainsString('"minUnit"', $rendered);
    }

    #[Test]
    public function line_chart_defaults_point_radius_from_config(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $expected = (string) config('themes.default.charts.defaults.point.radius');
        $this->assertSame($expected, $component->pointRadius);
    }

    #[Test]
    public function line_chart_point_radius_can_be_overridden(): void
    {
        $component = new Line(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, pointRadius: '10');

        $this->assertSame('10', $component->pointRadius);
    }

    #[Test]
    public function line_chart_point_radius_is_emitted_in_rendered_output(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $defaultRadius = config('themes.default.charts.defaults.point.radius');
        $this->assertStringContainsString('"radius":' . $defaultRadius, $rendered);
    }

    #[Test]
    public function line_chart_point_radius_override_is_emitted_in_rendered_output(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart"
                point-radius="10"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"radius":10', $rendered);
    }
}
