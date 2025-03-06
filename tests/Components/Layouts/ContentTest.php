<?php

declare(strict_types=1);

namespace Tests\Components\Layouts;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ContentTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.layout-content.background', 'background');
        Config::set('themes.default.layout-content.border', 'border');
        Config::set('themes.default.layout-content.color', 'color');
        Config::set('themes.default.layout-content.font', 'font');
        Config::set('themes.default.layout-content.other', 'other');
        Config::set('themes.default.layout-content.padding', 'padding');
        Config::set('themes.default.layout-content.rounded', 'rounded');
        Config::set('themes.default.layout-content.shadow', 'shadow');
    }

    #[Test]
    public function a_layout_content_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-layout-content>
                Content html
            </x-layout-content>
            HTML;

        $expected = <<<'HTML'
            <main class="background border color font other padding rounded shadow"> Content html
            </main>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_layout_content_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-layout-content background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
                Content html
            </x-layout-content>
            HTML;

        $expected = <<<'HTML'
            <main> Content html
            </main>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_layout_content_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-layout-content background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">
                Content html
            </x-layout-content>
            HTML;

        $expected = <<<'HTML'
            <main class="1 2 3 4 5 6 7 8"> Content html
            </main>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
