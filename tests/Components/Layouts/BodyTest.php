<?php

declare(strict_types=1);

namespace Tests\Components\Layouts;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class BodyTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.layout-body.background', 'background');
        Config::set('themes.default.layout-body.border', 'border');
        Config::set('themes.default.layout-body.color', 'color');
        Config::set('themes.default.layout-body.font', 'font');
        Config::set('themes.default.layout-body.other', 'other');
        Config::set('themes.default.layout-body.padding', 'padding');
        Config::set('themes.default.layout-body.rounded', 'rounded');
        Config::set('themes.default.layout-body.shadow', 'shadow');
        Config::set('themes.default.layout-body.theme', 'light');
    }

    /** @test */
    public function a_layout_body_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-layout.body>
                Document html
            </x-layout.body>
            HTML;

        $expected = <<<'HTML'
            <body class="background border color font other padding rounded shadow" data-theme="light">
            Document html
            </body>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_body_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-layout.body background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" theme="none">
                Document html
            </x-layout.body>
            HTML;

        $expected = <<<'HTML'
            <body data-theme="light">
            Document html
            </body>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_body_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-layout.body background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" theme="9">
                Document html
            </x-layout.body>
            HTML;

        $expected = <<<'HTML'
            <body class="1 2 3 4 5 6 7 8" data-theme="light">
            Document html
            </body>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_body_component_can_have_a_dark_theme(): void
    {
        $template = <<<'HTML'
            <x-layout.body theme="dark">
                Document html
            </x-layout.body>
            HTML;

        $expected = <<<'HTML'
            <body class="background border color font other padding rounded shadow" data-theme="dark">
            Document html
            </body>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_body_component_can_have_a_light_theme(): void
    {
        $template = <<<'HTML'
            <x-layout.body theme="light">
                Document html
            </x-layout.body>
            HTML;

        $expected = <<<'HTML'
            <body class="background border color font other padding rounded shadow" data-theme="light">
            Document html
            </body>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_layout_body_component_cannot_have_an_invalid_theme(): void
    {
        $template = <<<'HTML'
            <x-layout.body theme="invalid">
                Document html
            </x-layout.body>
            HTML;

        $expected = <<<'HTML'
            <body class="background border color font other padding rounded shadow" data-theme="light">
            Document html
            </body>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
