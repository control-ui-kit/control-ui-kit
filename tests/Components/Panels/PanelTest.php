<?php

declare(strict_types=1);

namespace Tests\Components\Panels;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class PanelTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.title.background', 'background');
        Config::set('themes.default.title.border', 'border');
        Config::set('themes.default.title.color', 'color');
        Config::set('themes.default.title.font', 'font');
        Config::set('themes.default.title.other', 'other');
        Config::set('themes.default.title.padding', 'padding');
        Config::set('themes.default.title.rounded', 'rounded');
        Config::set('themes.default.title.shadow', 'shadow');

        Config::set('themes.default.panel.background', 'background');
        Config::set('themes.default.panel.border', 'border');
        Config::set('themes.default.panel.color', 'color');
        Config::set('themes.default.panel.font', 'font');
        Config::set('themes.default.panel.other', 'other');
        Config::set('themes.default.panel.padding', 'padding');
        Config::set('themes.default.panel.rounded', 'rounded');
        Config::set('themes.default.panel.shadow', 'shadow');
    }

    /** @test */
    public function a_panel_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel>
                Panel content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow"> Panel content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_with_a_title(): void
    {
        $template = <<< HTML
            <x-panel title="Some Title">
                Panel content
            </x-panel>
            HTML;

        $expected = <<< HTML
            <div class="flex flex-col">
                <h3 class="background border color font other padding rounded shadow">
                    Some Title
                </h3>
                <div class="background border color font other padding rounded shadow"> Panel content
            </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-panel background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
                Panel content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div> Panel content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-panel background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">
                Panel content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8"> Panel content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_with_a_dynamic_component(): void
    {
        $template = <<<'HTML'
            <x-panel component="title"></x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow">
                <h3 class="background border color font other padding rounded shadow"></h3>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
