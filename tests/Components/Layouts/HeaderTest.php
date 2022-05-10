<?php

declare(strict_types=1);

namespace Tests\Components\Layouts;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class HeaderTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.layout-header.background', 'background');
        Config::set('themes.default.layout-header.border', 'border');
        Config::set('themes.default.layout-header.color', 'color');
        Config::set('themes.default.layout-header.font', 'font');
        Config::set('themes.default.layout-header.other', 'other');
        Config::set('themes.default.layout-header.padding', 'padding');
        Config::set('themes.default.layout-header.rounded', 'rounded');
        Config::set('themes.default.layout-header.shadow', 'shadow');
    }

    /** @test */
    public function a_layout_header_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-layout-header>
                Header html
            </x-layout-header>
            HTML;

        $expected = <<<'HTML'
            <header class="background border color font other padding rounded shadow"> Header html
            </header>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_header_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-layout-header background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
                Header html
            </x-layout-header>
            HTML;

        $expected = <<<'HTML'
            <header> Header html
            </header>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_header_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-layout-header background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">
                Header html
            </x-layout-header>
            HTML;

        $expected = <<<'HTML'
            <header class="1 2 3 4 5 6 7 8"> Header html
            </header>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
