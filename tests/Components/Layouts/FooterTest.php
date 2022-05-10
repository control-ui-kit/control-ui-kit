<?php

declare(strict_types=1);

namespace Tests\Components\Layouts;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class FooterTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.layout-footer.background', 'background');
        Config::set('themes.default.layout-footer.border', 'border');
        Config::set('themes.default.layout-footer.color', 'color');
        Config::set('themes.default.layout-footer.font', 'font');
        Config::set('themes.default.layout-footer.other', 'other');
        Config::set('themes.default.layout-footer.padding', 'padding');
        Config::set('themes.default.layout-footer.rounded', 'rounded');
        Config::set('themes.default.layout-footer.shadow', 'shadow');
    }

    /** @test */
    public function a_layout_footer_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-layout-footer>
                Footer html
            </x-layout-footer>
            HTML;

        $expected = <<<'HTML'
            <footer class="background border color font other padding rounded shadow"> Footer html
            </footer>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_footer_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-layout-footer background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
                Footer html
            </x-layout-footer>
            HTML;

        $expected = <<<'HTML'
            <footer> Footer html
            </footer>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_footer_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-layout-footer background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">
                Footer html
            </x-layout-footer>
            HTML;

        $expected = <<<'HTML'
            <footer class="1 2 3 4 5 6 7 8"> Footer html
            </footer>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
