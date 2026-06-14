<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class WorldMapTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.world-map-chart.min-color', '--chart-100');
        Config::set('themes.default.world-map-chart.mid-color', '');
        Config::set('themes.default.world-map-chart.max-color', '--chart-500');
        Config::set('themes.default.world-map-chart.no-data-color', '--chart-grid');
        Config::set('themes.default.world-map-chart.border-color', '--chart-border');
        Config::set('themes.default.world-map-chart.border-width', '0.5');
        Config::set('themes.default.world-map-chart.background-color', '--chart-grid');
        Config::set('themes.default.world-map-chart.tooltip-background', '--chart-tooltip-bg');
        Config::set('themes.default.world-map-chart.tooltip-color', '--chart-tooltip-text');
        Config::set('themes.default.world-map-chart.tooltip-border', '--chart-tooltip-border');
        Config::set('themes.default.world-map-chart.tooltip-font', 'text-xs');
        Config::set('themes.default.world-map-chart.tooltip-padding', 'px-2 py-1');
        Config::set('themes.default.world-map-chart.tooltip-rounded', 'rounded');
        Config::set('themes.default.world-map-chart.width', 'w-full');
        Config::set('themes.default.world-map-chart.height', 'h-auto');
    }

    #[Test]
    public function a_world_map_chart_renders_svg_with_correct_id(): void
    {
        $template = '<x-world-map-chart id="sales_map" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('<svg id="sales_map"', $html);
        $this->assertStringContainsString('viewBox="0 0 960 500"', $html);
    }

    #[Test]
    public function a_world_map_chart_renders_wrapper_with_width_and_height_classes(): void
    {
        $template = '<x-world-map-chart id="map1" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('w-full', $html);
        $this->assertStringContainsString('h-auto', $html);
    }

    #[Test]
    public function a_world_map_chart_renders_script_with_data(): void
    {
        $template = '<x-world-map-chart id="map_data" :data="[\'GB\' => 1200, \'US\' => 5000]" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('"GB":1200', $html);
        $this->assertStringContainsString('"US":5000', $html);
    }

    #[Test]
    public function a_world_map_chart_uses_natural_earth_projection_by_default(): void
    {
        $template = '<x-world-map-chart id="proj_map" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString("var projection = 'natural-earth'", $html);
        $this->assertStringContainsString('geoNaturalEarth1', $html);
    }

    #[Test]
    public function a_world_map_chart_can_use_mercator_projection(): void
    {
        $template = '<x-world-map-chart id="merc_map" projection="mercator" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString("var projection = 'mercator'", $html);
        $this->assertStringContainsString('geoMercator', $html);
    }

    #[Test]
    public function a_world_map_chart_shows_correct_theme_colours(): void
    {
        $template = '<x-world-map-chart id="colour_map" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('"cssVar":"--chart-100"', $html);
        $this->assertStringContainsString('"cssVar":"--chart-500"', $html);
        $this->assertStringContainsString("var noDataColor = '--chart-grid'", $html);
        $this->assertStringContainsString("var borderColor = '--chart-border'", $html);
    }

    #[Test]
    public function a_world_map_chart_uses_default_two_stop_gradient(): void
    {
        $template = '<x-world-map-chart id="grad_map" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('"t":0', $html);
        $this->assertStringContainsString('"t":1', $html);
        $this->assertStringContainsString('var gradientStops =', $html);
    }

    #[Test]
    public function a_world_map_chart_builds_two_stop_gradient_from_min_max(): void
    {
        $template = '<x-world-map-chart id="minmax_map" min-color="--chart-100" max-color="--chart-500" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('"cssVar":"--chart-100"', $html);
        $this->assertStringContainsString('"cssVar":"--chart-500"', $html);
        $this->assertStringNotContainsString('"t":0.5', $html);
    }

    #[Test]
    public function a_world_map_chart_builds_three_stop_gradient_from_min_mid_max(): void
    {
        $template = '<x-world-map-chart id="midmap" min-color="--chart-100" mid-color="--chart-200" max-color="--chart-300" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('"cssVar":"--chart-100"', $html);
        $this->assertStringContainsString('"cssVar":"--chart-200"', $html);
        $this->assertStringContainsString('"cssVar":"--chart-300"', $html);
        $this->assertStringContainsString('"t":0.5', $html);
    }

    #[Test]
    public function a_world_map_chart_gradient_stops_take_precedence_over_min_mid_max(): void
    {
        $template = '<x-world-map-chart id="prec_map" min-color="--chart-100" mid-color="--chart-200" max-color="--chart-300" :gradient-stops="[[\'t\' => 0.0, \'cssVar\' => \'--chart-700\'], [\'t\' => 1.0, \'cssVar\' => \'--chart-800\']]" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('"cssVar":"--chart-700"', $html);
        $this->assertStringContainsString('"cssVar":"--chart-800"', $html);
        $this->assertStringNotContainsString('"cssVar":"--chart-200"', $html);
    }

    #[Test]
    public function a_world_map_chart_accepts_custom_gradient_stops(): void
    {
        $template = '<x-world-map-chart id="multi_map" :gradient-stops="[[\'t\' => 0.0, \'cssVar\' => \'--chart-100\'], [\'t\' => 0.5, \'cssVar\' => \'--chart-200\'], [\'t\' => 1.0, \'cssVar\' => \'--chart-300\']]" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('"cssVar":"--chart-100"', $html);
        $this->assertStringContainsString('"cssVar":"--chart-200"', $html);
        $this->assertStringContainsString('"cssVar":"--chart-300"', $html);
        $this->assertStringContainsString('"t":0.5', $html);
    }

    #[Test]
    public function a_world_map_chart_renders_tooltip_div_by_default(): void
    {
        $template = '<x-world-map-chart id="tip_map" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('id="tip_map_tooltip"', $html);
        $this->assertStringContainsString('text-xs', $html);
        $this->assertStringContainsString('px-2 py-1', $html);
        $this->assertStringContainsString('rounded', $html);
    }

    #[Test]
    public function a_world_map_chart_renders_tooltip_label_when_provided(): void
    {
        $template = '<x-world-map-chart id="label_map" label="Monthly Revenue" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString("var tooltipLabel = 'Monthly Revenue'", $html);
    }

    #[Test]
    public function a_world_map_chart_has_empty_label_by_default(): void
    {
        $template = '<x-world-map-chart id="nolabel_map" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString("var tooltipLabel = ''", $html);
    }

    #[Test]
    public function a_world_map_chart_colour_overrides_are_applied(): void
    {
        $template = '<x-world-map-chart id="override_map" min-color="--chart-200" max-color="--chart-700" />';

        $html = (string) $this->blade($template);

        $this->assertStringContainsString('"cssVar":"--chart-200"', $html);
        $this->assertStringContainsString('"cssVar":"--chart-700"', $html);
    }
}
