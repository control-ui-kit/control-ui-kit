<?php

declare(strict_types=1);

namespace Tests\Components\Panels;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class DividerTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.panel-divider.border', 'border');
    }

    #[Test]
    public function a_panel_divider_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel-divider />
            HTML;

        $expected = <<<'HTML'
            <div class="border"></div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_panel_divider_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-panel-divider border="none" />
            HTML;

        $expected = <<<'HTML'
            <div></div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    #[Test]
    public function a_panel_divider_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-panel-divider border="border-2 border-brand" />
            HTML;

        $expected = <<<'HTML'
            <div class="border-2 border-brand"></div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
