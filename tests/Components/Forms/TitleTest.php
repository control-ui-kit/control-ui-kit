<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class TitleTest extends ComponentTestCase
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
    }

    /** @test */
    public function a_title_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-title>The Title</x-title>
            HTML;

        $expected = <<<'HTML'
            <h3 class="background border color font other padding rounded shadow">
                The Title
            </h3>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_title_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-title background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">The Title</x-title>
            HTML;

        $expected = <<<'HTML'
            <h3>
                The Title
            </h3>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_title_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-title background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">The Title</x-title>
            HTML;

        $expected = <<<'HTML'
            <h3 class="1 2 3 4 5 6 7 8">
                The Title
            </h3>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
