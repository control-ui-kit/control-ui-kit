<?php

declare(strict_types=1);

namespace Tests\Components\Panels;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class PanelTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.title.background', 'background');
        Config::set('themes.default.title.border', 'border');
        Config::set('themes.default.title.color', 'color');
        Config::set('themes.default.title.font', 'font');
        Config::set('themes.default.title.other', 'other');
        Config::set('themes.default.title.padding', 'padding');
        Config::set('themes.default.title.rounded', 'rounded');
        Config::set('themes.default.title.shadow', 'shadow');

        Config::set('themes.default.panel.background', 'background');
        Config::set('themes.default.panel.border', 'border');
        Config::set('themes.default.panel.color', 'color');
        Config::set('themes.default.panel.divider', 'divider');
        Config::set('themes.default.panel.font', 'font');
        Config::set('themes.default.panel.other', 'other');
        Config::set('themes.default.panel.padding', 'padding');
        Config::set('themes.default.panel.rounded', 'rounded');
        Config::set('themes.default.panel.shadow', 'shadow');
        Config::set('themes.default.panel.spacing', 'spacing');
        Config::set('themes.default.panel.width', 'width');
        Config::set('themes.default.panel.tiny', 'tiny');
        Config::set('themes.default.panel.small', 'small');
        Config::set('themes.default.panel.medium', 'medium');
        Config::set('themes.default.panel.large', 'large');
        Config::set('themes.default.panel.xl', 'xl');
        Config::set('themes.default.panel.jumbo', 'jumbo');

        Config::set('themes.default.panel-header.background', 'background');
        Config::set('themes.default.panel-header.border', 'border');
        Config::set('themes.default.panel-header.color', 'color');
        Config::set('themes.default.panel-header.font', 'font');
        Config::set('themes.default.panel-header.other', 'other');
        Config::set('themes.default.panel-header.padding', 'padding');
        Config::set('themes.default.panel-header.rounded', 'rounded');
        Config::set('themes.default.panel-header.shadow', 'shadow');

        Config::set('themes.default.panel-footer.background', 'background');
        Config::set('themes.default.panel-footer.border', 'border');
        Config::set('themes.default.panel-footer.color', 'color');
        Config::set('themes.default.panel-footer.font', 'font');
        Config::set('themes.default.panel-footer.other', 'other');
        Config::set('themes.default.panel-footer.padding', 'padding');
        Config::set('themes.default.panel-footer.rounded', 'rounded');
        Config::set('themes.default.panel-footer.shadow', 'shadow');

        Config::set('themes.default.panel-section.background', 'background');
        Config::set('themes.default.panel-section.border', 'border');
        Config::set('themes.default.panel-section.color', 'color');
        Config::set('themes.default.panel-section.font', 'font');
        Config::set('themes.default.panel-section.other', 'other');
        Config::set('themes.default.panel-section.padding', 'padding');
        Config::set('themes.default.panel-section.rounded', 'rounded');
        Config::set('themes.default.panel-section.shadow', 'shadow');
        Config::set('themes.default.panel-section.spacing', 'spacing');
    }

    /** @test */
    public function a_panel_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel>
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow width"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_with_a_title(): void
    {
        $template = <<< HTML
            <x-panel title="title">
                content
            </x-panel>
            HTML;

        $expected = <<< HTML
            <div class="flex flex-col width">
                <h3 class="background border color font other padding rounded shadow">
                    title
                </h3>
                <div class="background border color divider font other rounded shadow width"> content
            </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_custom_padding_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel padding="custom">
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font custom other rounded shadow width"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_marked_as_padded_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel padded>
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font padding other rounded shadow width"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_tiny_width_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel tiny>
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow tiny"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_small_width_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel small>
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow small"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_medium_width_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel medium>
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow medium"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_large_width_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel large>
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow large"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_xl_width_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel xl>
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow xl"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_jumbo_width_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel jumbo>
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow jumbo"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-panel background="none" border="none" color="none" divider="none" font="none" other="none" rounded="none" shadow="none" width="none">
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-panel background="1" border="2" color="3" divider="4" font="5" other="6" rounded="7" shadow="8" width="9">
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_with_a_dynamic_component(): void
    {
        $template = <<<'HTML'
            <x-panel component="title"></x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow width">
                <h3 class="background border color font other padding rounded shadow"></h3>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_a_header_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel header="header"></x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow width">
                <h3 class="background color font other padding rounded shadow">
                    header
                </h3>
                <div class="padding spacing"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_a_footer_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel footer="footer">content</x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow width">
                content
                <div class="background border color font other padding rounded shadow">footer</div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_with_a_section_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-panel footer="footer">
                <x-panel-section header="header">
                    content
                </x-panel-section>
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow width">
                <div>
                    <h3 class="background border color font other padding rounded shadow">
                        header
                    </h3>
                    <div class="background border color font other padding rounded shadow spacing">content</div>
                </div>
                <div class="background border color font other padding rounded shadow">footer</div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_stacked(): void
    {
        $template = <<<'HTML'
            <x-panel stacked>
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow spacing width"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_simple(): void
    {
        $template = <<<'HTML'
            <x-panel simple>
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font padding other rounded shadow spacing width"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_panel_component_can_be_rendered_with_additional_attributes(): void
    {
        $template = <<<'HTML'
            <x-panel id="profile" padding="none" wire:model="something">
                content
            </x-panel>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color divider font other rounded shadow width" id="profile" wire:model="something"> content
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
