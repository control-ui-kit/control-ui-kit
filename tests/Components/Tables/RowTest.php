<?php

namespace Tests\Components\Tables;

use ControlUIKit\Components\Tables\EmptyRow;
use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
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
        Config::set('themes.default.table-row.hover', 'hover');
        Config::set('themes.default.table-row.other', 'other');
        Config::set('themes.default.table-row.padding', 'padding');
        Config::set('themes.default.table-row.rounded', 'rounded');
        Config::set('themes.default.table-row.shadow', 'shadow');

        Config::set('themes.default.table-row.default.background', 'background-default');
        Config::set('themes.default.table-row.default.hover', 'hover-default');
        Config::set('themes.default.table-row.default.color', 'color-default');

        Config::set('themes.default.table-row.brand.background', 'background-brand');
        Config::set('themes.default.table-row.brand.hover', 'hover-brand');
        Config::set('themes.default.table-row.brand.color', 'color-brand');

        Config::set('themes.default.table-row.danger.background', 'background-danger');
        Config::set('themes.default.table-row.danger.hover', 'hover-danger');
        Config::set('themes.default.table-row.danger.color', 'color-danger');

        Config::set('themes.default.table-row.info.background', 'background-info');
        Config::set('themes.default.table-row.info.hover', 'hover-info');
        Config::set('themes.default.table-row.info.color', 'color-info');

        Config::set('themes.default.table-row.muted.background', 'background-muted');
        Config::set('themes.default.table-row.muted.hover', 'hover-muted');
        Config::set('themes.default.table-row.muted.color', 'color-muted');

        Config::set('themes.default.table-row.success.background', 'background-success');
        Config::set('themes.default.table-row.success.hover', 'hover-success');
        Config::set('themes.default.table-row.success.color', 'color-success');

        Config::set('themes.default.table-row.warning.background', 'background-warning');
        Config::set('themes.default.table-row.warning.hover', 'hover-warning');
        Config::set('themes.default.table-row.warning.color', 'color-warning');
    }

    #[Test]
    public function a_table_row_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-row />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-default border color color-default font hover hover-default other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table-row background="none"
                         border="none"
                         color="none"
                         font="none"
                         hover="none"
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

    #[Test]
    public function a_table_row_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-table-row background="1"
                         border="2"
                         color="3"
                         font="4"
                         hover="5"
                         other="6"
                         padding="7"
                         rounded="8"
                         shadow="9" />
            HTML;

        $expected = <<<'HTML'
            <tr class="1 2 3 4 5 6 7 8 9"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_default_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-table-row default />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-default border color color-default font hover hover-default other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_default_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-table-row rowStyle="default" />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-default border color color-default font hover hover-default other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_brand_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-table-row brand />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-brand border color color-brand font hover hover-brand other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_brand_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-table-row rowStyle="brand" />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-brand border color color-brand font hover hover-brand other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_danger_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-table-row danger />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-danger border color color-danger font hover hover-danger other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_danger_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-table-row rowStyle="danger" />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-danger border color color-danger font hover hover-danger other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_info_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-table-row info />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-info border color color-info font hover hover-info other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_info_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-table-row rowStyle="info" />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-info border color color-info font hover hover-info other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_muted_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-table-row muted />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-muted border color color-muted font hover hover-muted other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_muted_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-table-row rowStyle="muted" />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-muted border color color-muted font hover hover-muted other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_success_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-table-row success />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-success border color color-success font hover hover-success other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_success_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-table-row rowStyle="success" />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-success border color color-success font hover hover-success other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]

    public function a_table_row_component_can_be_rendered_with_warning_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-table-row warning />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-warning border color color-warning font hover hover-warning other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_row_component_can_be_rendered_with_warning_styles_using_row_style_attribute(): void
    {
        $template = <<<'HTML'
            <x-table-row rowStyle="warning" />
            HTML;

        $expected = <<<'HTML'
            <tr class="background background-warning border color color-warning font hover hover-warning other padding rounded shadow"></tr>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
