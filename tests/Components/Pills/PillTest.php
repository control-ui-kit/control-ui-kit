<?php

declare(strict_types=1);

namespace Tests\Components\Pills;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class PillTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.pill.background', 'background');
        Config::set('themes.default.pill.border', 'border');
        Config::set('themes.default.pill.color', 'color');
        Config::set('themes.default.pill.font', 'font');
        Config::set('themes.default.pill.other', 'other');
        Config::set('themes.default.pill.padding', 'padding');
        Config::set('themes.default.pill.rounded', 'rounded');
        Config::set('themes.default.pill.shadow', 'shadow');

        Config::set('themes.default.pill.default.background', 'background-default');
        Config::set('themes.default.pill.default.color', 'color-default');

        Config::set('themes.default.pill.brand.background', 'background-brand');
        Config::set('themes.default.pill.brand.color', 'color-brand');

        Config::set('themes.default.pill.danger.background', 'background-danger');
        Config::set('themes.default.pill.danger.color', 'color-danger');

        Config::set('themes.default.pill.info.background', 'background-info');
        Config::set('themes.default.pill.info.color', 'color-info');

        Config::set('themes.default.pill.muted.background', 'background-muted');
        Config::set('themes.default.pill.muted.color', 'color-muted');

        Config::set('themes.default.pill.success.background', 'background-success');
        Config::set('themes.default.pill.success.color', 'color-success');

        Config::set('themes.default.pill.warning.background', 'background-warning');
        Config::set('themes.default.pill.warning.color', 'color-warning');

    }

    /** @test */
    public function a_pill_component_with_no_specified_style_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pill> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-default border color color-default font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-pill background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
                :: content
            </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-pill background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">
                :: content
            </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="1 2 3 4 5 6 7 8"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function a_pill_component_can_be_rendered_with_default_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-pill default> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-default border color color-default font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_default_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-pill pillStyle="default"> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-default border color color-default font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_brand_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-pill brand> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-brand border color color-brand font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_brand_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-pill pillStyle="brand"> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-brand border color color-brand font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
    /** @test */
    public function a_pill_component_can_be_rendered_with_danger_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-pill danger> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-danger border color color-danger font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_danger_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-pill pillStyle="danger"> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-danger border color color-danger font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_info_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-pill info> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-info border color color-info font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_info_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-pill pillStyle="info"> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-info border color color-info font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_muted_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-pill muted> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-muted border color color-muted font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_muted_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-pill pillStyle="muted"> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-muted border color color-muted font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_success_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-pill success> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-success border color color-success font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_success_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-pill pillStyle="success"> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-success border color color-success font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
    /** @test */

    public function a_pill_component_can_be_rendered_with_warning_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-pill warning> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-warning border color color-warning font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_can_be_rendered_with_warning_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-pill pillStyle="warning"> :: content </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-warning border color color-warning font other padding rounded shadow"> :: content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_with_no_specified_style_can_be_rendered_using_name_attribute(): void
    {
        $template = <<<'HTML'
            <x-pill name=":: some content" />
            HTML;

        $expected = <<<'HTML'
            <span class="background background-default border color color-default font other padding rounded shadow"> :: some content </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_with_custom_style_can_be_rendered(): void
    {
        Config::set('themes.default.pill.new-release.background', 'background-new-release');
        Config::set('themes.default.pill.new-release.color', 'color-new-release');

        $template = <<<'HTML'
            <x-pill pillStyle="new-release"> :: custom style </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-new-release border color color-new-release font other padding rounded shadow"> :: custom style </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_with_custom_style_using_only_name_can_be_rendered(): void
    {
        Config::set('themes.default.pill.new-release.background', 'background-new-release');
        Config::set('themes.default.pill.new-release.color', 'color-new-release');

        $template = <<<'HTML'
            <x-pill name="New Release" />
            HTML;

        $expected = <<<'HTML'
            <span class="background background-new-release border color color-new-release font other padding rounded shadow"> New Release </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_with_custom_style_using_slot_and_name_can_be_rendered(): void
    {
        Config::set('themes.default.pill.new-release.background', 'background-new-release');
        Config::set('themes.default.pill.new-release.color', 'color-new-release');

        $template = <<<'HTML'
            <x-pill name="New Release"> :: slot data </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-new-release border color color-new-release font other padding rounded shadow"> :: slot data </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_pill_component_with_name_and_pill_style_uses_pill_style_even_if_custom_style_exists(): void
    {
        Config::set('themes.default.pill.new-release.background', 'background-new-release');
        Config::set('themes.default.pill.new-release.color', 'color-new-release');

        $template = <<<'HTML'
            <x-pill name="new-release" pillStyle="danger"> :: slot data </x-pill>
            HTML;

        $expected = <<<'HTML'
            <span class="background background-danger border color color-danger font other padding rounded shadow"> :: slot data </span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
