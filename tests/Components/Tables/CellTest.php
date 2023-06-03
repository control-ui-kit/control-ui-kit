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
        Config::set('themes.default.table-cell.href-color', 'href-color');
        Config::set('themes.default.table-cell.font', 'font');
        Config::set('themes.default.table-cell.other', 'other');
        Config::set('themes.default.table-cell.padding', 'padding');
        Config::set('themes.default.table-cell.rounded', 'rounded');
        Config::set('themes.default.table-cell.shadow', 'shadow');

        Config::set('themes.default.table-cell.icon-background', 'icon-background');
        Config::set('themes.default.table-cell.icon-border', 'icon-border');
        Config::set('themes.default.table-cell.icon-color', 'icon-color');
        Config::set('themes.default.table-cell.icon-other', 'icon-other');
        Config::set('themes.default.table-cell.icon-padding', 'icon-padding');
        Config::set('themes.default.table-cell.icon-rounded', 'icon-rounded');
        Config::set('themes.default.table-cell.icon-shadow', 'icon-shadow');
        Config::set('themes.default.table-cell.icon-size', 'icon-size');

        Config::set('themes.default.table-cell.image-border', 'image-border');
        Config::set('themes.default.table-cell.image-other', 'image-other');
        Config::set('themes.default.table-cell.image-padding', 'image-padding');
        Config::set('themes.default.table-cell.image-rounded', 'image-rounded');
        Config::set('themes.default.table-cell.image-shadow', 'image-shadow');
        Config::set('themes.default.table-cell.image-size', 'image-size');

        Config::set('themes.default.icon.size', '::icon-size');

        Config::set('app.timezone', 'UTC');
        Config::set('app.locale', 'en');
        Config::set('control-ui-kit.user_timezone_field', 'timezone');

        Config::set('themes.default.pill.background', 'pill-background');
        Config::set('themes.default.pill.border', 'pill-border');
        Config::set('themes.default.pill.color', 'pill-color');
        Config::set('themes.default.pill.font', 'pill-font');
        Config::set('themes.default.pill.other', 'pill-other');
        Config::set('themes.default.pill.padding', 'pill-padding');
        Config::set('themes.default.pill.rounded', 'pill-rounded');
        Config::set('themes.default.pill.shadow', 'pill-shadow');

        Config::set('themes.default.pill.default.background', 'pill-background-default');
        Config::set('themes.default.pill.default.color', 'pill-color-default');

        Config::set('themes.default.pill.brand.background', 'pill-background-brand');
        Config::set('themes.default.pill.brand.color', 'pill-color-brand');

        Config::set('themes.default.pill.danger.background', 'pill-background-danger');
        Config::set('themes.default.pill.danger.color', 'pill-color-danger');

        Config::set('themes.default.pill.info.background', 'pill-background-info');
        Config::set('themes.default.pill.info.color', 'pill-color-info');

        Config::set('themes.default.pill.muted.background', 'pill-background-muted');
        Config::set('themes.default.pill.muted.color', 'pill-color-muted');

        Config::set('themes.default.pill.success.background', 'pill-background-success');
        Config::set('themes.default.pill.success.color', 'pill-color-success');

        Config::set('themes.default.pill.warning.background', 'pill-background-warning');
        Config::set('themes.default.pill.warning.color', 'pill-color-warning');
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-cell />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"></div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table-cell align="none"
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
            <td>
                <div class=""></div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-table-cell align="0"
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
            <td class="align 1 2 3 4 5 7 8">
                <div class="6"></div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_shorthand_left_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-cell left>::Some Data</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-left background border color font other rounded shadow">
                <div class="padding"> ::Some Data </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_attribute_left_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-cell align="left">::Some Data</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-left background border color font other rounded shadow">
                <div class="padding"> ::Some Data </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_shorthand_right_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-cell right>::Some Data</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-right background border color font other rounded shadow">
                <div class="padding"> ::Some Data </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_attribute_right_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-cell align="right">::Some Data</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-right background border color font other rounded shadow">
                <div class="padding"> ::Some Data </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_shorthand_center_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-cell center>::Some Data</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-center background border color font other rounded shadow">
                <div class="padding"> ::Some Data </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_align_attribute_center_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-cell align="center">::Some Data</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-center background border color font other rounded shadow">
                <div class="padding"> ::Some Data </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_data_attribute(): void
    {
        $template = <<<'HTML'
            <x-table-cell data="::Some Data" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> ::Some Data </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_decimal_formatting_precision_2(): void
    {
        $template = <<<'HTML'
            <x-table-cell data="2.0312" format="decimal:2" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> 2.03 </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_decimal_formatting_precision_8(): void
    {
        $template = <<<'HTML'
            <x-table-cell data="2323.0312324323423" format="decimal:8" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> 2323.03123243 </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_currency_formatting(): void
    {
        $template = <<<'HTML'
            <x-table-cell data="12.0912" format="currency" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> 12.09 </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_prefix(): void
    {
        $template = <<<'HTML'
            <x-table-cell data="12.0912" prefix="::prefix" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> ::prefix 12.0912 </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_suffix(): void
    {
        $template = <<<'HTML'
            <x-table-cell data="12.0912" suffix="::suffix" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> 12.0912 ::suffix </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_currency_formatting_and_symbol(): void
    {
        $template = <<<'HTML'
            <x-table-cell data="12.0912" format="currency" prefix="£" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> £ 12.09 </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_date_formatting_with_null_value(): void
    {
        $template = <<<'HTML'
            @php $date = null; @endphp
            <x-table-cell :data="$date" format="date" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> - </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_date_formatting_from_string_to_dmY(): void
    {
        $template = <<<'HTML'
            <x-table-cell data="2021-03-09 15:16:17" format="date:d/m/Y" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> 09/03/2021 </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_date_formatting_from_carbon_object_to_mdY(): void
    {
        $template = <<<'HTML'
            <x-table-cell data="2021-03-09 15:16:17" format="date:mdY" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> 03092021 </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_default_date_formatting(): void
    {
        $template = <<<'HTML'
            <x-table-cell data="2021-03-09 15:16:17" format="date" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> 09/03/2021 </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_default_date_formatting_set_to_en_US(): void
    {
        Config::set('app.locale', 'en_US');

        $template = <<<'HTML'
            <x-table-cell data="2021-03-09 15:16:17" format="date" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> 03/09/2021 </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_can_be_rendered_with_diff_for_humans(): void
    {
        $template = <<<'HTML'
            @php $date = now()->subHours(2); @endphp
            <x-table-cell :data="$date" format="date:diff" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> 2 hours ago </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_href_has_hyperlink_around_data(): void
    {
        $template = <<<'HTML'
            <x-table-cell href="http://example.com">::data</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <a href="http://example.com" class="href-color padding"> ::data </a>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_href_and_target_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell href="http://example.com" target="_blank">::data</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <a href="http://example.com" class="href-color padding" target="_blank"> ::data </a>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_href_and_text_align_works_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell href="http://example.com" right>::data</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="text-right background border color font other rounded shadow">
                <a href="http://example.com" class="href-color padding"> ::data </a>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_href_and_custom_href_color_works_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell href="http://example.com" href-color="custom-color">::data</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <a href="http://example.com" class="custom-color padding"> ::data </a>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_icon_and_custom_icon_styles_works_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell icon="icon-dot" icon-size="custom-size" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding">
                    <svg class="icon-background icon-border icon-color icon-other inline-block icon-padding icon-rounded icon-shadow custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_icon_and_icon_styles_works_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell
                icon="icon-dot"
                icon-background="custom-background"
                icon-border="custom-border"
                icon-color="custom-color"
                icon-other="custom-other"
                icon-padding="custom-padding"
                icon-rounded="custom-rounded"
                icon-shadow="custom-shadow"
                icon-size="custom-size"
            />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding">
                    <svg class="custom-background custom-border custom-color custom-other inline-block custom-padding custom-rounded custom-shadow custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_icon_and_href_and_alignment_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell icon="icon-dot" href="http://example.com/testing" right icon-size="::size" />
            HTML;

        $expected = <<<'HTML'
            <td class="text-right background border color font other rounded shadow">
                <a href="http://example.com/testing" class="href-color padding">
                    <svg class="icon-background icon-border icon-color icon-other inline-block icon-padding icon-rounded icon-shadow ::size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
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
            <x-table-cell image="http://example.com/testing.jpg" image-alt="::alt" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding">
                    <img src="http://example.com/testing.jpg" class="image-border image-other image-padding image-rounded image-shadow image-size inline-block" loading="lazy" alt="::alt" />
                </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_image_and_custom_image_styles_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell
                image="http://example.com/testing.jpg"
                image-border="custom-border"
                image-other="custom-other"
                image-padding="custom-padding"
                image-rounded="custom-rounded"
                image-shadow="custom-shadow"
                image-size="custom-size"
            />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding">
                    <img src="http://example.com/testing.jpg" class="custom-border custom-other custom-padding custom-rounded custom-shadow custom-size inline-block" loading="lazy" />
                </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_image_and_no_image_styles_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell
                image="http://example.com/testing.jpg"
                image-border="none"
                image-other="none"
                image-padding="none"
                image-rounded="none"
                image-shadow="none"
                image-size="none"
            />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding">
                    <img src="http://example.com/testing.jpg" class="inline-block" loading="lazy" />
                </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_pill_and_slot_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill> :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-default pill-border pill-color pill-color-default pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_pill_and_data_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill data=":: pill" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-default pill-border pill-color pill-color-default pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_default_pill_style_and_slot_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="default" > :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-default pill-border pill-color pill-color-default pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_default_pill_style_and_data_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="default" data=":: pill" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-default pill-border pill-color pill-color-default pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_brand_pill_style_and_slot_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="brand" > :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-brand pill-border pill-color pill-color-brand pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_brand_pill_style_and_data_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="brand" data=":: pill" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-brand pill-border pill-color pill-color-brand pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_danger_pill_style_and_slot_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="danger" > :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-danger pill-border pill-color pill-color-danger pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_danger_pill_style_and_data_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="danger" data=":: pill" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-danger pill-border pill-color pill-color-danger pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_info_pill_style_and_slot_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="info" > :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-info pill-border pill-color pill-color-info pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_info_pill_style_and_data_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="info" data=":: pill" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-info pill-border pill-color pill-color-info pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_muted_pill_style_and_slot_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="muted" > :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-muted pill-border pill-color pill-color-muted pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_muted_pill_style_and_data_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="muted" data=":: pill" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-muted pill-border pill-color pill-color-muted pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_success_pill_style_and_slot_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="success" > :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-success pill-border pill-color pill-color-success pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_success_pill_style_and_data_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="success" data=":: pill" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-success pill-border pill-color pill-color-success pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_warning_pill_style_and_slot_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="warning" > :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-warning pill-border pill-color pill-color-warning pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_warning_pill_style_and_data_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="warning" data=":: pill" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-warning pill-border pill-color pill-color-warning pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_custom_pill_style_and_slot_renders_correctly(): void
    {
        Config::set('themes.default.pill.custom.background', 'pill-background-custom');
        Config::set('themes.default.pill.custom.color', 'pill-color-custom');

        $template = <<<'HTML'
            <x-table-cell pill="custom" > :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-custom pill-border pill-color pill-color-custom pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_custom_pill_style_and_data_renders_correctly(): void
    {
        Config::set('themes.default.pill.custom.background', 'pill-background-custom');
        Config::set('themes.default.pill.custom.color', 'pill-color-custom');

        $template = <<<'HTML'
            <x-table-cell pill="custom" data=":: pill" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-custom pill-border pill-color pill-color-custom pill-font pill-other pill-padding pill-rounded pill-shadow"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_custom_pill_style_and_no_data_or_slot_renders_correctly(): void
    {
        Config::set('themes.default.pill.new-release.background', 'pill-background-new-release');
        Config::set('themes.default.pill.new-release.color', 'pill-color-new-release');

        $template = <<<'HTML'
            <x-table-cell pill="New Release" />
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="pill-background pill-background-new-release pill-border pill-color pill-color-new-release pill-font pill-other pill-padding pill-rounded pill-shadow"> New Release </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_pill_and_href_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="warning" href="https://example.com">:: warning</x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <a href="https://example.com" class="href-color padding"> <span class="pill-background pill-background-warning pill-border pill-color pill-color-warning pill-font pill-other pill-padding pill-rounded pill-shadow"> :: warning </span> </a>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_pill_and_custom_inline_pill_styles_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="warning"
                          pill-background="1"
                          pill-border="2"
                          pill-color="3"
                          pill-font="4"
                          pill-other="5"
                          pill-padding="6"
                          pill-rounded="7"
                          pill-shadow="8"> :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span class="1 2 3 4 5 6 7 8"> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_cell_component_with_pill_and_inline_pill_styles_set_to_none_renders_correctly(): void
    {
        $template = <<<'HTML'
            <x-table-cell pill="warning"
                          pill-background="none"
                          pill-border="none"
                          pill-color="none"
                          pill-font="none"
                          pill-other="none"
                          pill-padding="none"
                          pill-rounded="none"
                          pill-shadow="none"> :: pill </x-table-cell>
            HTML;

        $expected = <<<'HTML'
            <td class="align background border color font other rounded shadow">
                <div class="padding"> <span> :: pill </span> </div>
            </td>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


}
