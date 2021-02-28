<?php

namespace Tests\Components\Tables;

use ControlUIKit\Components\Tables\EmptyRow;
use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class RowTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.table-row.background', 'background');
        Config::set('themes.default.table-row.border', 'border');
        Config::set('themes.default.table-row.color', 'color');
        Config::set('themes.default.table-row.font', 'font');
        Config::set('themes.default.table-row.other', 'other');
        Config::set('themes.default.table-row.padding', 'padding');
        Config::set('themes.default.table-row.rounded', 'rounded');
        Config::set('themes.default.table-row.shadow', 'shadow');
    }

    /** @test */
    public function a_table_row_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.row />
            HTML;

        $expected = <<<'HTML'
            <tr class="background border color font other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_row_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table.row background="none"
                         border="none"
                         color="none"
                         font="none"
                         other="none"
                         padding="none"
                         rounded="none"
                         shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <tr></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_row_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-table.row background="1"
                         border="2"
                         color="3"
                         font="4"
                         other="5"
                         padding="6"
                         rounded="7"
                         shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <tr class="1 2 3 4 5 6 7 8"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_row_component_can_be_rendered_with_custom_style(): void
    {
        $this->markTestIncomplete('Row styling needed');

        $template = <<<'HTML'
            <x-table.row style="disabled" />
            HTML;

        $expected = <<<'HTML'
            <tr class="1 2 3 4 5 6 7 8"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
