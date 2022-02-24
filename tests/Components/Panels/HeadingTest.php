<?php

declare(strict_types=1);

namespace Tests\Components\Panels;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class HeadingTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.panel-heading.background', 'background');
        Config::set('themes.default.panel-heading.border', 'border');
        Config::set('themes.default.panel-heading.color', 'color');
        Config::set('themes.default.panel-heading.font', 'font');
        Config::set('themes.default.panel-heading.other', 'other');
        Config::set('themes.default.panel-heading.padding', 'padding');
        Config::set('themes.default.panel-heading.rounded', 'rounded');
        Config::set('themes.default.panel-heading.shadow', 'shadow');
    }

    /** @test */
    public function a_panel_heading_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel-heading>Some Heading</x-panel-heading>
            HTML;

        $expected = <<<'HTML'
            <h3 class="background border color font other padding rounded shadow">
                Some Heading
            </h3>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_heading_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-panel-heading background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
                Some Heading
            </x-panel-heading>
            HTML;

        $expected = <<<'HTML'
            <h3>
                Some Heading
            </h3>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_heading_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-panel-heading background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">
                Some Heading
            </x-panel-heading>
            HTML;

        $expected = <<<'HTML'
            <h3 class="1 2 3 4 5 6 7 8">
                Some Heading
            </h3>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
