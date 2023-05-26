<?php

declare(strict_types=1);

namespace Tests\Components\Panels;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class FooterTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.panel-footer.background', 'background');
        Config::set('themes.default.panel-footer.border', 'border');
        Config::set('themes.default.panel-footer.color', 'color');
        Config::set('themes.default.panel-footer.font', 'font');
        Config::set('themes.default.panel-footer.other', 'other');
        Config::set('themes.default.panel-footer.padding', 'padding');
        Config::set('themes.default.panel-footer.rounded', 'rounded');
        Config::set('themes.default.panel-footer.shadow', 'shadow');
    }

    /** @test */
    public function a_panel_footer_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel-footer>Some Footer</x-panel-footer>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow">Some Footer</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_footer_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-panel-footer background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
                Some Footer
            </x-panel-footer>
            HTML;

        $expected = <<<'HTML'
            <div>Some Footer</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_footer_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-panel-footer background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">
                Some Footer
            </x-panel-footer>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8">Some Footer</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
