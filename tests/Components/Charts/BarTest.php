<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\Bar;
use Illuminate\View\View;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class BarTest extends ComponentTestCase
{
    private array $datasets = [
        ['label' => 'Streams', 'data' => [100, 200, 150]],
        ['label' => 'Downloads', 'data' => [50, 80, 60]],
    ];
    private array $labels = ['Jan', 'Feb', 'Mar'];

    #[Test]
    public function bar_chart_constructor_assigns_id(): void
    {
        $component = new Bar(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('my_chart', $component->id);
    }

    #[Test]
    public function bar_chart_constructor_assigns_datasets(): void
    {
        $component = new Bar(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame($this->datasets, $component->datasets);
    }

    #[Test]
    public function bar_chart_constructor_assigns_labels(): void
    {
        $component = new Bar(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame($this->labels, $component->labels);
    }

    #[Test]
    public function bar_chart_render_returns_correct_view(): void
    {
        $component = new Bar(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertInstanceOf(View::class, $component->render());
        $this->assertSame('control-ui-kit::control-ui-kit.charts.bar-chart', $component->render()->getName());
    }

    #[Test]
    public function bar_chart_renders_canvas_with_correct_id(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="bar_chart"', $rendered);
    }

    #[Test]
    public function bar_chart_serialises_dataset_label_and_data(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
                :datasets="[['label' => 'Streams', 'data' => [60, 120, 70]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"label":"Streams"', $rendered);
        $this->assertStringContainsString('"data":[60,120,70]', $rendered);
    }

    #[Test]
    public function bar_chart_serialises_labels_as_json(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('["Jan","Feb","Mar"]', $rendered);
    }

    #[Test]
    public function bar_chart_supports_multiple_datasets(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
    public function bar_chart_emits_index_axis_y_in_options(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"indexAxis":"y"', $rendered);
    }

    #[Test]
    public function bar_chart_x_axis_type_is_linear(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"type":"linear"', $rendered);
    }

    #[Test]
    public function bar_chart_dataset_solid_color_when_no_gradient_stops(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3], 'color' => '--chart-500']]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"color":"--chart-500"', $rendered);
    }

    #[Test]
    public function bar_chart_dataset_gradient_stops_appear_in_output(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
    public function bar_chart_empty_datasets_renders_without_error(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart" :datasets="[]" :labels="[]" />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('<canvas id="bar_chart"', $rendered);
    }

    #[Test]
    public function bar_chart_animation_enabled_by_default(): void
    {
        $component = new Bar(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('true', $component->animation);
    }

    #[Test]
    public function bar_chart_animation_can_be_disabled(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
                animation="false"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"animation":false', $rendered);
    }

    #[Test]
    public function bar_chart_animation_emits_duration_and_easing_when_enabled(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
    public function bar_chart_defaults_point_radius_from_config(): void
    {
        $component = new Bar(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $expected = (string) config('themes.default.charts.defaults.point.radius');
        $this->assertSame($expected, $component->pointRadius);
    }

    #[Test]
    public function bar_chart_point_radius_can_be_overridden(): void
    {
        $component = new Bar(id: 'my_chart', datasets: $this->datasets, labels: $this->labels, pointRadius: '8');

        $this->assertSame('8', $component->pointRadius);
    }

    #[Test]
    public function bar_chart_hides_x_grid_by_default(): void
    {
        $component = new Bar(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('true', $component->hideXGrid);
    }

    #[Test]
    public function bar_chart_y_grid_visible_by_default(): void
    {
        $component = new Bar(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertSame('false', $component->hideGrid);
    }

    #[Test]
    public function bar_chart_renders_chart_init_script(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3]]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('window.bar_chart = new Chart(', $rendered);
        $this->assertStringContainsString("type: 'bar'", $rendered);
    }

    #[Test]
    public function bar_chart_passes_colors_array_to_view(): void
    {
        $component = new Bar(id: 'my_chart', datasets: $this->datasets, labels: $this->labels);

        $this->assertIsArray($component->colors);
        $this->assertNotEmpty($component->colors);
        $this->assertStringStartsWith('--chart-', $component->colors[0]);
    }

    #[Test]
    public function bar_chart_dataset_order_is_passed_through(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
                :datasets="[['label' => 'Streams', 'data' => [1, 2, 3], 'order' => 1]]"
                :labels="['Jan', 'Feb', 'Mar']"
            />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('"order":1', $rendered);
    }

    #[Test]
    public function bar_chart_mixed_gradient_and_solid_datasets(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
}
