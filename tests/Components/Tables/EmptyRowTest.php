<?php

namespace Tests\Components\Tables;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class EmptyRowTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.table-cell.align', 'cell-align');
        Config::set('themes.default.table-cell.background', 'cell-background');
        Config::set('themes.default.table-cell.border', 'cell-border');
        Config::set('themes.default.table-cell.color', 'cell-color');
        Config::set('themes.default.table-cell.font', 'cell-font');
        Config::set('themes.default.table-cell.other', 'cell-other');
        Config::set('themes.default.table-cell.padding', 'cell-padding');
        Config::set('themes.default.table-cell.rounded', 'cell-rounded');
        Config::set('themes.default.table-cell.shadow', 'cell-shadow');

        Config::set('themes.default.table-empty.align', 'align');
        Config::set('themes.default.table-empty.background', 'background');
        Config::set('themes.default.table-empty.border', 'border');
        Config::set('themes.default.table-empty.color', 'color');
        Config::set('themes.default.table-empty.colspan', 'colspan');
        Config::set('themes.default.table-empty.font', 'font');
        Config::set('themes.default.table-empty.icon-size', 'icon-size');
        Config::set('themes.default.table-empty.icon-style', 'icon-style');
        Config::set('themes.default.table-empty.other', 'other');
        Config::set('themes.default.table-empty.padding', 'padding');
        Config::set('themes.default.table-empty.rounded', 'rounded');
        Config::set('themes.default.table-empty.shadow', 'shadow');
        Config::set('themes.default.table-empty.stacked', 'stacked');

        Config::set('themes.default.table-row.background', 'row-background');
        Config::set('themes.default.table-row.border', 'row-border');
        Config::set('themes.default.table-row.color', 'row-color');
        Config::set('themes.default.table-row.font', 'row-font');
        Config::set('themes.default.table-row.other', 'row-other');
        Config::set('themes.default.table-row.padding', 'row-padding');
        Config::set('themes.default.table-row.rounded', 'row-rounded');
        Config::set('themes.default.table-row.shadow', 'row-shadow');

        Config::set('themes.default.table-row.default.background', 'row-background');
    }

    /** @test */
    public function a_table_empty_row_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-empty />
            HTML;

        $expected = <<<'HTML'
            <tr class="row-background row-border row-color row-font row-other row-padding row-rounded row-shadow">
                <td class="cell-background cell-border cell-color cell-font cell-other cell-rounded cell-shadow" colspan="colspan">
                    <span class="block cell-padding">
                        <div class="background border color font other padding rounded shadow"> No records found </div>
                    </span>
                </td>
            </tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_empty_row_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table-empty background="none"
                           border="none"
                           color="none"
                           font="none"
                           other="none"
                           padding="none"
                           rounded="none"
                           shadow="none"
            />
            HTML;

        $expected = <<<'HTML'
            <tr class="row-background row-border row-color row-font row-other row-padding row-rounded row-shadow">
                <td class="cell-background cell-border cell-color cell-font cell-other cell-rounded cell-shadow" colspan="colspan">
                    <span class="block cell-padding">
                        <div> No records found </div>
                    </span>
                </td>
            </tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_empty_row_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-table-empty background="1"
                           border="2"
                           color="3"
                           font="4"
                           other="5"
                           padding="6"
                           rounded="7"
                           shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <tr class="row-background row-border row-color row-font row-other row-padding row-rounded row-shadow">
                <td class="cell-background cell-border cell-color cell-font cell-other cell-rounded cell-shadow" colspan="colspan">
                    <span class="block cell-padding">
                        <div class="1 2 3 4 5 6 7 8"> No records found </div>
                    </span>
                </td>
            </tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_empty_row_component_can_be_rendered_with_custom_text(): void
    {
        $template = <<<'HTML'
            <x-table-empty>::CUSTOM TEXT</x-table-empty>
            HTML;

        $expected = <<<'HTML'
            <tr class="row-background row-border row-color row-font row-other row-padding row-rounded row-shadow">
                <td class="cell-background cell-border cell-color cell-font cell-other cell-rounded cell-shadow" colspan="colspan">
                    <span class="block cell-padding">
                        <div class="background border color font other padding rounded shadow"> ::CUSTOM TEXT </div>
                    </span>
                </td>
            </tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_empty_row_component_can_be_rendered_with_custom_html(): void
    {
        $template = <<<'HTML'
            <x-table-empty>
                <strong>::CUSTOM TEXT</strong>
                <a href="#">Some hyperlink</a>
            </x-table-empty>
            HTML;

        $expected = <<<'HTML'
            <tr class="row-background row-border row-color row-font row-other row-padding row-rounded row-shadow">
                <td class="cell-background cell-border cell-color cell-font cell-other cell-rounded cell-shadow" colspan="colspan">
                    <span class="block cell-padding">
                        <div class="background border color font other padding rounded shadow">
                            <strong>::CUSTOM TEXT</strong>
                            <a href="#">Some hyperlink</a>
                        </div>
                    </span>
                </td>
            </tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_empty_row_component_can_be_rendered_stacked(): void
    {
        $template = <<<'HTML'
            <x-table-empty stacked> ::Stacked </x-table-empty>
            HTML;

        $expected = <<<'HTML'
            <tr class="row-background row-border row-color row-font row-other row-padding row-rounded row-shadow">
                <td class="cell-background cell-border cell-color cell-font cell-other cell-rounded cell-shadow" colspan="colspan">
                    <span class="block cell-padding">
                        <div class="background border color font other padding rounded shadow stacked"> ::Stacked </div>
                    </span>
                </td>
            </tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_empty_row_component_can_be_rendered_with_icon(): void
    {
        $template = <<<'HTML'
            <x-table-empty icon="icon-dot"> ::Icon </x-table-empty>
            HTML;

        $expected = <<<'HTML'
            <tr class="row-background row-border row-color row-font row-other row-padding row-rounded row-shadow">
                <td class="cell-background cell-border cell-color cell-font cell-other cell-rounded cell-shadow" colspan="colspan">
                    <span class="block cell-padding">
                        <div class="background border color font other padding rounded shadow">
                            <svg class="icon-size fill-current icon-style" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="3" cy="3" r="3"/>
                                </svg>
                                <span> ::Icon </span>
                            </div>
                        </span>
                    </td>
                </tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_empty_row_component_can_be_rendered_with_icon_size_and_styles(): void
    {
        $template = <<<'HTML'
            <x-table-empty icon="icon-dot" icon-size="custom-size" icon-style="custom-style"> ::Icon </x-table-empty>
            HTML;

        $expected = <<<'HTML'
            <tr class="row-background row-border row-color row-font row-other row-padding row-rounded row-shadow">
                <td class="cell-background cell-border cell-color cell-font cell-other cell-rounded cell-shadow" colspan="colspan">
                    <span class="block cell-padding">
                        <div class="background border color font other padding rounded shadow">
                            <svg class="custom-size fill-current custom-style" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="3" cy="3" r="3"/>
                                </svg>
                                <span> ::Icon </span>
                            </div>
                        </span>
                    </td>
                </tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_empty_row_component_can_be_rendered_with_custom_colspan(): void
    {
        $template = <<<'HTML'
            <x-table-empty colspan="4" />
            HTML;

        $expected = <<<'HTML'
            <tr class="row-background row-border row-color row-font row-other row-padding row-rounded row-shadow">
                <td class="cell-background cell-border cell-color cell-font cell-other cell-rounded cell-shadow" colspan="4">
                    <span class="block cell-padding">
                        <div class="background border color font other padding rounded shadow"> No records found </div>
                    </span>
                </td>
            </tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
