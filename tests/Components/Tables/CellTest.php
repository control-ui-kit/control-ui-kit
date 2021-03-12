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

        Config::set('themes.default.table-cell.align', 'align');
        Config::set('themes.default.table-cell.background', 'background');
        Config::set('themes.default.table-cell.border', 'border');
        Config::set('themes.default.table-cell.color', 'color');
        Config::set('themes.default.table-cell.font', 'font');
        Config::set('themes.default.table-cell.other', 'other');
        Config::set('themes.default.table-cell.padding', 'padding');
        Config::set('themes.default.table-cell.rounded', 'rounded');
        Config::set('themes.default.table-cell.shadow', 'shadow');

        Config::set('app.timezone', 'UTC');
        Config::set('app.locale', 'en');
        Config::set('control-ui-kit.user_timezone_field', 'timezone');
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.cell />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"></td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table.cell align="none"
                          background="none"
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
            <x-table.cell align="0"
                          background="1"
                          border="2"
                          color="3"
                          font="4"
                          other="5"
                          padding="6"
                          rounded="7"
                          shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <td class="align 1 2 3 4 5 6 7 8"></td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_shorthand_left_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.cell left>::Some Data</x-table.cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-left background border color font other padding rounded shadow"> ::Some Data </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_attribute_left_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.cell align="left">::Some Data</x-table.cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-left background border color font other padding rounded shadow"> ::Some Data </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_shorthand_right_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.cell right>::Some Data</x-table.cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-right background border color font other padding rounded shadow"> ::Some Data </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_attribute_right_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.cell align="right">::Some Data</x-table.cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-right background border color font other padding rounded shadow"> ::Some Data </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_shorthand_center_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.cell center>::Some Data</x-table.cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-center background border color font other padding rounded shadow"> ::Some Data </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_attribute_center_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.cell align="center">::Some Data</x-table.cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-center background border color font other padding rounded shadow"> ::Some Data </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_data_attribute(): void
    {
        $template = <<<'HTML'
            <x-table.cell value="::some value" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> ::some value </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_decimal_formatting_precision_2(): void
    {
        $template = <<<'HTML'
            <x-table.cell value="2.0312" format="decimal:2" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> 2.03 </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_decimal_formatting_precision_8(): void
    {
        $template = <<<'HTML'
            <x-table.cell value="2323.0312324323423" format="decimal:8" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> 2323.03123243 </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_currency_formatting(): void
    {
        $template = <<<'HTML'
            <x-table.cell value="12.0912" format="currency" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> 12.09 </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_prefix(): void
    {
        $template = <<<'HTML'
            <x-table.cell value="12.0912" prefix="::prefix" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> ::prefix 12.0912 </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_suffix(): void
    {
        $template = <<<'HTML'
            <x-table.cell value="12.0912" suffix="::suffix" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> 12.0912 ::suffix </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_currency_formatting_and_symbol(): void
    {
        $template = <<<'HTML'
            <x-table.cell value="12.0912" format="currency" prefix="£" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> £ 12.09 </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_date_formatting_from_string_to_dmY(): void
    {
        $template = <<<'HTML'
            <x-table.cell value="2021-03-09 15:16:17" format="date:d/m/Y" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> 09/03/2021 </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_date_formatting_from_carbon_object_to_mdY(): void
    {
        $template = <<<'HTML'
            <x-table.cell value="2021-03-09 15:16:17" format="date:mdY" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> 03092021 </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_default_date_formatting(): void
    {
        $template = <<<'HTML'
            <x-table.cell value="2021-03-09 15:16:17" format="date" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> 09/03/2021 </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_default_date_formatting_set_to_en_US(): void
    {
        Config::set('app.locale', 'en_US');

        $template = <<<'HTML'
            <x-table.cell value="2021-03-09 15:16:17" format="date" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> 03/09/2021 </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_diff_for_humans(): void
    {
        $template = <<<'HTML'
            @php $date = now()->subHours(2); @endphp
            <x-table.cell :value="$date" format="date:diff" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow"> 2 hours ago </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_href_has_hyperlink_around_value(): void
    {
        $template = <<<'HTML'
            <x-table.cell href="http://example.com">::data</x-table.cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow">
                <a href="http://example.com" class="inline-block"> ::data </a>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_href_and_text_align_works_correctly(): void
    {
        $template = <<<'HTML'
            <x-table.cell href="http://example.com" right>::data</x-table.cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-right background border color font other padding rounded shadow">
                <a href="http://example.com" class="inline-block"> ::data </a>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_icon_and_icon_size_works_correctly(): void
    {
        $template = <<<'HTML'
            <x-table.cell icon="icon.dot" icon-size="::size" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow">
                <svg class="::size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_icon_and_href_and_alignment_correctly(): void
    {
        $template = <<<'HTML'
            <x-table.cell icon="icon.dot" href="http://example.com/testing" right icon-size="::size" />
            HTML;

        $expected = <<<'HTML'
            <td class="text-right background border color font other padding rounded shadow">
                <a href="http://example.com/testing" class="inline-block">
                    <svg class="::size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </a>
                </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_image_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table.cell image="http://example.com/testing.jpg" image-style="::styles" image-alt="::alt" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other padding rounded shadow">
                <img src="http://example.com/testing.jpg" class="inline-block ::styles" alt="::alt" />
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
