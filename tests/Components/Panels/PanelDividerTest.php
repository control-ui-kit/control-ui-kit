<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class PanelDividerTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.panel-divider.border', 'border');
    }

    /** @test */
    public function a_panel_divider_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel.divider />
            HTML;

        $expected = <<<'HTML'
            <div class="border"></div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
