<?php

declare(strict_types=1);

namespace Tests\Components\Layouts;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class ToolbarTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.layout-toolbar.background', 'background');
        Config::set('themes.default.layout-toolbar.border', 'border');
        Config::set('themes.default.layout-toolbar.color', 'color');
        Config::set('themes.default.layout-toolbar.font', 'font');
        Config::set('themes.default.layout-toolbar.other', 'other');
        Config::set('themes.default.layout-toolbar.padding', 'padding');
        Config::set('themes.default.layout-toolbar.rounded', 'rounded');
        Config::set('themes.default.layout-toolbar.shadow', 'shadow');
    }

    /** @test */
    public function a_layout_toolbar_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-layout.toolbar>
                Toolbar html
            </x-layout.toolbar>
            HTML;

        $expected = <<<'HTML'
            <section class="background border color font other padding rounded shadow"> Toolbar html
            </section>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_toolbar_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-layout.toolbar background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
                Toolbar html
            </x-layout.toolbar>
            HTML;

        $expected = <<<'HTML'
            <section> Toolbar html
            </section>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_toolbar_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-layout.toolbar background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">
                Toolbar html
            </x-layout.toolbar>
            HTML;

        $expected = <<<'HTML'
            <section class="1 2 3 4 5 6 7 8"> Toolbar html
            </section>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
