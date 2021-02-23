<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class TableTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.table.background', 'background');
        Config::set('themes.default.table.body-styles', 'body-styles');
        Config::set('themes.default.table.border', 'border');
        Config::set('themes.default.table.color', 'color');
        Config::set('themes.default.table.font', 'font');
        Config::set('themes.default.table.head-styles', 'head-styles');
        Config::set('themes.default.table.other', 'other');
        Config::set('themes.default.table.padding', 'padding');
        Config::set('themes.default.table.rounded', 'rounded');
        Config::set('themes.default.table.shadow', 'shadow');

//        Config::set('themes.default.tabs-heading.background', 'background');
//        Config::set('themes.default.tabs-heading.border', 'border');
//        Config::set('themes.default.tabs-heading.color', 'color');
//        Config::set('themes.default.tabs-heading.font', 'font');
//        Config::set('themes.default.tabs-heading.other', 'other');
//        Config::set('themes.default.tabs-heading.padding', 'padding');
//        Config::set('themes.default.tabs-heading.rounded', 'rounded');
//        Config::set('themes.default.tabs-heading.shadow', 'shadow');
//        Config::set('themes.default.tabs-heading.active', 'active');
//        Config::set('themes.default.tabs-heading.inactive', 'inactive');
//        Config::set('themes.default.tabs-heading.icon-size', 'icon-size');
//
//        Config::set('themes.default.tabs-panel.background', 'background');
//        Config::set('themes.default.tabs-panel.border', 'border');
//        Config::set('themes.default.tabs-panel.color', 'color');
//        Config::set('themes.default.tabs-panel.font', 'font');
//        Config::set('themes.default.tabs-panel.other', 'other');
//        Config::set('themes.default.tabs-panel.padding', 'padding');
//        Config::set('themes.default.tabs-panel.rounded', 'rounded');
//        Config::set('themes.default.tabs-panel.shadow', 'shadow');
    }

    /** @test */
    public function a_table_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table />
            HTML;

        $expected = <<<'HTML'
            <table class="background border color font other padding rounded shadow">
                <tbody class="body-styles"></tbody>
            </table>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table background="none" body-styles="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <table>
                <tbody class=""></tbody>
            </table>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-table background="1" body-styles="2" border="3" color="4" font="5" other="6" padding="7" rounded="8" shadow="9" />
            HTML;

        $expected = <<<'HTML'
            <table class="1 3 4 5 6 7 8 9">
                <tbody class="2"></tbody>
            </table>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
