<?php

declare(strict_types=1);

namespace Tests\Components\Panels;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class SectionTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.panel-section.background', 'background');
        Config::set('themes.default.panel-section.border', 'border');
        Config::set('themes.default.panel-section.color', 'color');
        Config::set('themes.default.panel-section.font', 'font');
        Config::set('themes.default.panel-section.other', 'other');
        Config::set('themes.default.panel-section.padding', 'padding');
        Config::set('themes.default.panel-section.rounded', 'rounded');
        Config::set('themes.default.panel-section.shadow', 'shadow');
        Config::set('themes.default.panel-section.spacing', 'spacing');
    }

    /** @test */
    public function a_panel_section_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel-section>Some section</x-panel-section>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow spacing">Some section</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_section_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-panel-section background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" spacing="none">
                Some section
            </x-panel-section>
            HTML;

        $expected = <<<'HTML'
            <div>Some section</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_section_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-panel-section background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" spacing="9">
                Some section
            </x-panel-section>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9">Some section</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
