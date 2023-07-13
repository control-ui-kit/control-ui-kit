<?php

declare(strict_types=1);

namespace Tests\Components\Panels;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class HeaderTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.panel-header.background', 'background');
        Config::set('themes.default.panel-header.border', 'border');
        Config::set('themes.default.panel-header.color', 'color');
        Config::set('themes.default.panel-header.font', 'font');
        Config::set('themes.default.panel-header.other', 'other');
        Config::set('themes.default.panel-header.padding', 'padding');
        Config::set('themes.default.panel-header.rounded', 'rounded');
        Config::set('themes.default.panel-header.shadow', 'shadow');
    }

    /** @test */
    public function a_panel_header_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel-header>Some Heading</x-panel-header>
            HTML;

        $expected = <<<'HTML'
            <h3 class="background border color font other padding rounded shadow">
                Some Heading
            </h3>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_header_component_can_be_rendered_with_sub_text(): void
    {
        $template = <<<'HTML'
            <x-panel-header sub-text="::sub">Some Heading</x-panel-header>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow flex justify-between">
                <h3>
                    Some Heading
                </h3>
                <span>::sub</span>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_header_component_can_be_rendered_with_sub_text_and_url(): void
    {
        $template = <<<'HTML'
            <x-panel-header sub-text="::sub" sub-url="::url">Some Heading</x-panel-header>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow flex justify-between">
                <h3>
                    Some Heading
                </h3>
                <a href="::url" class="text-brand hover:text-brand-hover">::sub</a>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_header_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-panel-header background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
                Some Heading
            </x-panel-header>
            HTML;

        $expected = <<<'HTML'
            <h3>
                Some Heading
            </h3>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_header_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-panel-header background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">
                Some Heading
            </x-panel-header>
            HTML;

        $expected = <<<'HTML'
            <h3 class="1 2 3 4 5 6 7 8">
                Some Heading
            </h3>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
