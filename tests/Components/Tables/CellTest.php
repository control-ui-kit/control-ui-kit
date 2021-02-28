<?php

namespace Tests\Components\Tables;

use ControlUIKit\Components\Tables\EmptyRow;
use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class CellTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.table-cell.background', 'background');
        Config::set('themes.default.table-cell.border', 'border');
        Config::set('themes.default.table-cell.color', 'color');
        Config::set('themes.default.table-cell.font', 'font');
        Config::set('themes.default.table-cell.other', 'other');
        Config::set('themes.default.table-cell.padding', 'padding');
        Config::set('themes.default.table-cell.rounded', 'rounded');
        Config::set('themes.default.table-cell.shadow', 'shadow');
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.cell />
            HTML;

        $expected = <<<'HTML'
            <td class="background border color font other padding rounded shadow"></td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table.cell background="none"
                          border="none"
                          color="none"
                          font="none"
                          other="none"
                          padding="none"
                          rounded="none"
                          shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <td></td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-table.cell background="1"
                          border="2"
                          color="3"
                          font="4"
                          other="5"
                          padding="6"
                          rounded="7"
                          shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <td class="1 2 3 4 5 6 7 8"></td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
