<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use ControlUIKit\Components\Tables\Table;
use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class TableTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.table.active-filter-background', 'active-filter-background');
        Config::set('themes.default.table.active-filter-border', 'active-filter-border');
        Config::set('themes.default.table.active-filter-color', 'active-filter-color');
        Config::set('themes.default.table.active-filter-font', 'active-filter-font');
        Config::set('themes.default.table.active-filter-other', 'active-filter-other');
        Config::set('themes.default.table.active-filter-padding', 'active-filter-padding');
        Config::set('themes.default.table.active-filter-rounded', 'active-filter-rounded');
        Config::set('themes.default.table.active-filter-shadow', 'active-filter-shadow');
        Config::set('themes.default.table.active-filter-width', 'active-filter-width');

        Config::set('themes.default.table.active-filters-wrapper-background', 'active-filters-wrapper-background');
        Config::set('themes.default.table.active-filters-wrapper-border', 'active-filters-wrapper-border');
        Config::set('themes.default.table.active-filters-wrapper-color', 'active-filters-wrapper-color');
        Config::set('themes.default.table.active-filters-wrapper-font', 'active-filters-wrapper-font');
        Config::set('themes.default.table.active-filters-wrapper-other', 'active-filters-wrapper-other');
        Config::set('themes.default.table.active-filters-wrapper-padding', 'active-filters-wrapper-padding');
        Config::set('themes.default.table.active-filters-wrapper-rounded', 'active-filters-wrapper-rounded');
        Config::set('themes.default.table.active-filters-wrapper-shadow', 'active-filters-wrapper-shadow');
        Config::set('themes.default.table.active-filters-wrapper-width', 'active-filters-wrapper-width');

        Config::set('themes.default.table.clear-filters-event', 'clear-filters-event');
        Config::set('themes.default.table.clear-filters-href', 'clear-filters-href');
        Config::set('themes.default.table.clear-filters-text', 'clear-filters-text');

        Config::set('themes.default.table.clear-filters-background', 'clear-filters-background');
        Config::set('themes.default.table.clear-filters-border', 'clear-filters-border');
        Config::set('themes.default.table.clear-filters-color', 'clear-filters-color');
        Config::set('themes.default.table.clear-filters-font', 'clear-filters-font');
        Config::set('themes.default.table.clear-filters-other', 'clear-filters-other');
        Config::set('themes.default.table.clear-filters-padding', 'clear-filters-padding');
        Config::set('themes.default.table.clear-filters-rounded', 'clear-filters-rounded');
        Config::set('themes.default.table.clear-filters-shadow', 'clear-filters-shadow');

        Config::set('themes.default.table.more-button-background', 'more-button-background');
        Config::set('themes.default.table.more-button-border', 'more-button-border');
        Config::set('themes.default.table.more-button-color', 'more-button-color');
        Config::set('themes.default.table.more-button-font', 'more-button-font');
        Config::set('themes.default.table.more-button-icon', 'icon-dot');
        Config::set('themes.default.table.more-button-icon-size', 'more-button-icon-size');
        Config::set('themes.default.table.more-button-other', 'more-button-other');
        Config::set('themes.default.table.more-button-padding', 'more-button-padding');
        Config::set('themes.default.table.more-button-rounded', 'more-button-rounded');
        Config::set('themes.default.table.more-button-shadow', 'more-button-shadow');
        Config::set('themes.default.table.more-button-width', 'more-button-width');

        Config::set('themes.default.table.more-filters-background', 'more-filters-background');
        Config::set('themes.default.table.more-filters-border', 'more-filters-border');
        Config::set('themes.default.table.more-filters-color', 'more-filters-color');
        Config::set('themes.default.table.more-filters-font', 'more-filters-font');
        Config::set('themes.default.table.more-filters-other', 'more-filters-other');
        Config::set('themes.default.table.more-filters-padding', 'more-filters-padding');
        Config::set('themes.default.table.more-filters-rounded', 'more-filters-rounded');
        Config::set('themes.default.table.more-filters-shadow', 'more-filters-shadow');
        Config::set('themes.default.table.more-filters-width', 'more-filters-width');
        Config::set('themes.default.table.more-filters-wrapper', 'more-filters-wrapper');

        Config::set('themes.default.table.search-icon-background', 'search-icon-background');
        Config::set('themes.default.table.search-icon-border', 'search-icon-border');
        Config::set('themes.default.table.search-icon-color', 'search-icon-color');
        Config::set('themes.default.table.search-icon-icon', 'icon-search');
        Config::set('themes.default.table.search-icon-icon-size', 'search-icon-size');
        Config::set('themes.default.table.search-icon-other', 'search-icon-other');
        Config::set('themes.default.table.search-icon-padding', 'search-icon-padding');
        Config::set('themes.default.table.search-icon-rounded', 'search-icon-rounded');
        Config::set('themes.default.table.search-icon-shadow', 'search-icon-shadow');

        Config::set('themes.default.table.search-input-background', 'search-input-background');
        Config::set('themes.default.table.search-input-border', 'search-input-border');
        Config::set('themes.default.table.search-input-color', 'search-input-color');
        Config::set('themes.default.table.search-input-font', 'search-input-font');
        Config::set('themes.default.table.search-input-other', 'search-input-other');
        Config::set('themes.default.table.search-input-padding', 'search-input-padding');
        Config::set('themes.default.table.search-input-rounded', 'search-input-rounded');
        Config::set('themes.default.table.search-input-shadow', 'search-input-shadow');
        Config::set('themes.default.table.search-input-width', 'search-input-width');

        Config::set('themes.default.table.search-wrapper-background', 'search-wrapper-background');
        Config::set('themes.default.table.search-wrapper-border', 'search-wrapper-border');
        Config::set('themes.default.table.search-wrapper-color', 'search-wrapper-color');
        Config::set('themes.default.table.search-wrapper-font', 'search-wrapper-font');
        Config::set('themes.default.table.search-wrapper-other', 'search-wrapper-other');
        Config::set('themes.default.table.search-wrapper-padding', 'search-wrapper-padding');
        Config::set('themes.default.table.search-wrapper-rounded', 'search-wrapper-rounded');
        Config::set('themes.default.table.search-wrapper-shadow', 'search-wrapper-shadow');
        Config::set('themes.default.table.search-wrapper-width', 'search-wrapper-width');

        Config::set('themes.default.table.search-enable', false);
        Config::set('themes.default.table.search-bar', 'search-bar');
        Config::set('themes.default.table.search-bar-spacing', 'search-bar-spacing');
        Config::set('themes.default.table.search-event', 'search-event');
        Config::set('themes.default.table.search-id', 'search-id');
        Config::set('themes.default.table.search-type', 'search-type');
        Config::set('themes.default.table.search-form-name', 'search-form-name');
        Config::set('themes.default.table.search-name', 'search-name');
        Config::set('themes.default.table.search-placeholder', 'search-placeholder');

        Config::set('themes.default.table.table-background', 'table-background');
        Config::set('themes.default.table.table-border', 'table-border');
        Config::set('themes.default.table.table-color', 'table-color');
        Config::set('themes.default.table.table-font', 'table-font');
        Config::set('themes.default.table.table-other', 'table-other');
        Config::set('themes.default.table.table-padding', 'table-padding');
        Config::set('themes.default.table.table-rounded', 'table-rounded');
        Config::set('themes.default.table.table-shadow', 'table-shadow');

        Config::set('themes.default.table.table-body-background', 'table-body-background');
        Config::set('themes.default.table.table-body-border', 'table-body-border');
        Config::set('themes.default.table.table-body-color', 'table-body-color');
        Config::set('themes.default.table.table-body-font', 'table-body-font');
        Config::set('themes.default.table.table-body-other', 'table-body-other');
        Config::set('themes.default.table.table-body-padding', 'table-body-padding');
        Config::set('themes.default.table.table-body-rounded', 'table-body-rounded');
        Config::set('themes.default.table.table-body-shadow', 'table-body-shadow');

        Config::set('themes.default.table.table-filters-background', 'table-filters-background');
        Config::set('themes.default.table.table-filters-border', 'table-filters-border');
        Config::set('themes.default.table.table-filters-color', 'table-filters-color');
        Config::set('themes.default.table.table-filters-container', 'table-filters-container');
        Config::set('themes.default.table.table-filters-font', 'table-filters-font');
        Config::set('themes.default.table.table-filters-other', 'table-filters-other');
        Config::set('themes.default.table.table-filters-padding', 'table-filters-padding');
        Config::set('themes.default.table.table-filters-rounded', 'table-filters-rounded');
        Config::set('themes.default.table.table-filters-shadow', 'table-filters-shadow');
        Config::set('themes.default.table.table-filters-width', 'table-filters-width');

        Config::set('themes.default.table.table-headings-background', 'table-headings-background');
        Config::set('themes.default.table.table-headings-border', 'table-headings-border');
        Config::set('themes.default.table.table-headings-color', 'table-headings-color');
        Config::set('themes.default.table.table-headings-font', 'table-headings-font');
        Config::set('themes.default.table.table-headings-other', 'table-headings-other');
        Config::set('themes.default.table.table-headings-padding', 'table-headings-padding');
        Config::set('themes.default.table.table-headings-rounded', 'table-headings-rounded');
        Config::set('themes.default.table.table-headings-shadow', 'table-headings-shadow');

        Config::set('themes.default.table.table-wrapper-background', 'table-wrapper-background');
        Config::set('themes.default.table.table-wrapper-border', 'table-wrapper-border');
        Config::set('themes.default.table.table-wrapper-color', 'table-wrapper-color');
        Config::set('themes.default.table.table-wrapper-font', 'table-wrapper-font');
        Config::set('themes.default.table.table-wrapper-other', 'table-wrapper-other');
        Config::set('themes.default.table.table-wrapper-padding', 'table-wrapper-padding');
        Config::set('themes.default.table.table-wrapper-rounded', 'table-wrapper-rounded');
        Config::set('themes.default.table.table-wrapper-shadow', 'table-wrapper-shadow');
        Config::set('themes.default.table.table-wrapper-with-filters', 'table-wrapper-with-filters');
        Config::set('themes.default.table.table-wrapper-without-filters', 'table-wrapper-without-filters');

        Config::set('themes.default.table-heading.align', 'headings-align');
        Config::set('themes.default.table-heading.background', 'headings-background');
        Config::set('themes.default.table-heading.border', 'headings-border');
        Config::set('themes.default.table-heading.color', 'headings-color');
        Config::set('themes.default.table-heading.font', 'headings-font');
        Config::set('themes.default.table-heading.other', 'headings-other');
        Config::set('themes.default.table-heading.padding', 'headings-padding');
        Config::set('themes.default.table-heading.rounded', 'headings-rounded');
        Config::set('themes.default.table-heading.shadow', 'headings-shadow');
        Config::set('themes.default.table-heading.width', 'headings-width');

        Config::set('themes.default.table-heading.field-order', 'order');
        Config::set('themes.default.table-heading.field-sort', 'sort');
        Config::set('themes.default.table-heading.icon-asc', 'icon-caret-up');
        Config::set('themes.default.table-heading.icon-desc', 'icon-caret-down');
    }

    #[Test]
    public function a_table_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ orderby: '', sort: '', href: function(name) { return 'http://localhost?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc'); }, }"
            >
                <div class="table-wrapper-background table-wrapper-border table-wrapper-color table-wrapper-font table-wrapper-other table-wrapper-padding table-wrapper-rounded table-wrapper-shadow">
                    <table class="table-background table-border table-color table-font table-other table-padding table-rounded table-shadow">
                        <tbody class="table-body-background table-body-border table-body-color table-body-font table-body-other table-body-padding table-body-rounded table-body-shadow"></tbody>
                    </table>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_component_can_be_rendered_with_no_table_styles(): void
    {
        $template = <<<'HTML'
            <x-table
                table-background="none"
                table-border="none"
                table-color="none"
                table-font="none"
                table-other="none"
                table-padding="none"
                table-rounded="none"
                table-shadow="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ orderby: '', sort: '', href: function(name) { return 'http://localhost?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc'); }, }"
            >
                <div class="table-wrapper-background table-wrapper-border table-wrapper-color table-wrapper-font table-wrapper-other table-wrapper-padding table-wrapper-rounded table-wrapper-shadow">
                    <table>
                        <tbody class="table-body-background table-body-border table-body-color table-body-font table-body-other table-body-padding table-body-rounded table-body-shadow"></tbody>
                    </table>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_component_can_be_rendered_with_override_table_styles(): void
    {
        $template = <<<'HTML'
            <x-table
                table-background="custom-background"
                table-border="custom-border"
                table-color="custom-color"
                table-font="custom-font"
                table-other="custom-other"
                table-padding="custom-padding"
                table-rounded="custom-rounded"
                table-shadow="custom-shadow"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ orderby: '', sort: '', href: function(name) { return 'http://localhost?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc'); }, }"
            >
                <div class="table-wrapper-background table-wrapper-border table-wrapper-color table-wrapper-font table-wrapper-other table-wrapper-padding table-wrapper-rounded table-wrapper-shadow">
                    <table class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow">
                        <tbody class="table-body-background table-body-border table-body-color table-body-font table-body-other table-body-padding table-body-rounded table-body-shadow"></tbody>
                    </table>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_component_can_be_rendered_with_no_table_body_styles(): void
    {
        $template = <<<'HTML'
            <x-table
                table-body-background="none"
                table-body-border="none"
                table-body-color="none"
                table-body-font="none"
                table-body-other="none"
                table-body-padding="none"
                table-body-rounded="none"
                table-body-shadow="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ orderby: '', sort: '', href: function(name) { return 'http://localhost?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc'); }, }"
            >
                <div class="table-wrapper-background table-wrapper-border table-wrapper-color table-wrapper-font table-wrapper-other table-wrapper-padding table-wrapper-rounded table-wrapper-shadow">
                    <table class="table-background table-border table-color table-font table-other table-padding table-rounded table-shadow">
                        <tbody class=""></tbody>
                    </table>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_component_can_be_rendered_with_override_table_body_styles(): void
    {
        $template = <<<'HTML'
            <x-table
                table-body-background="custom-background"
                table-body-border="custom-border"
                table-body-color="custom-color"
                table-body-font="custom-font"
                table-body-other="custom-other"
                table-body-padding="custom-padding"
                table-body-rounded="custom-rounded"
                table-body-shadow="custom-shadow"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ orderby: '', sort: '', href: function(name) { return 'http://localhost?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc'); }, }"
            >
                <div class="table-wrapper-background table-wrapper-border table-wrapper-color table-wrapper-font table-wrapper-other table-wrapper-padding table-wrapper-rounded table-wrapper-shadow">
                    <table class="table-background table-border table-color table-font table-other table-padding table-rounded table-shadow">
                        <tbody class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow"></tbody>
                    </table>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_component_can_be_rendered_with_no_table_wrapper_styles(): void
    {
        $template = <<<'HTML'
            <x-table
                table-wrapper-background="none"
                table-wrapper-border="none"
                table-wrapper-color="none"
                table-wrapper-font="none"
                table-wrapper-other="none"
                table-wrapper-padding="none"
                table-wrapper-rounded="none"
                table-wrapper-shadow="none"
                table-wrapper-with-filters="none"
                table-wrapper-without-filters="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ orderby: '', sort: '', href: function(name) { return 'http://localhost?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc'); }, }"
            >
                <div class="">
                    <table class="table-background table-border table-color table-font table-other table-padding table-rounded table-shadow">
                        <tbody class="table-body-background table-body-border table-body-color table-body-font table-body-other table-body-padding table-body-rounded table-body-shadow"></tbody>
                    </table>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_component_can_be_rendered_with_override_table_wrapper_styles(): void
    {
        $template = <<<'HTML'
            <x-table
                table-wrapper-background="custom-background"
                table-wrapper-border="custom-border"
                table-wrapper-color="custom-color"
                table-wrapper-font="custom-font"
                table-wrapper-other="custom-other"
                table-wrapper-padding="custom-padding"
                table-wrapper-rounded="custom-rounded"
                table-wrapper-shadow="custom-shadow"
                table-wrapper-with-filters="custom-with-filters"
                table-wrapper-without-filters="custom-without-filters"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ orderby: '', sort: '', href: function(name) { return 'http://localhost?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc'); }, }"
            >
                <div class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow">
                    <table class="table-background table-border table-color table-font table-other table-padding table-rounded table-shadow">
                        <tbody class="table-body-background table-body-border table-body-color table-body-font table-body-other table-body-padding table-body-rounded table-body-shadow"></tbody>
                    </table>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_component_can_be_rendered_with_headings(): void
    {
        $template = <<<'HTML'
            <x-table>
                <x-slot name="headings">
                    <x-table-heading>A</x-table-heading>
                    <x-table-heading>B</x-table-heading>
                    <x-table-heading>C</x-table-heading>
                </x-slot>
            </x-table>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ orderby: '', sort: '', href: function(name) { return 'http://localhost?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc'); }, }"
            >
                <div class="table-wrapper-background table-wrapper-border table-wrapper-color table-wrapper-font table-wrapper-other table-wrapper-padding table-wrapper-rounded table-wrapper-shadow">
                    <table class="table-background table-border table-color table-font table-other table-padding table-rounded table-shadow">
                        <thead>
                            <tr class="table-headings-background table-headings-border table-headings-color table-headings-font table-headings-other table-headings-padding table-headings-rounded table-headings-shadow">
                                <th class="headings-align headings-background headings-border headings-color headings-font headings-other headings-padding headings-rounded headings-shadow headings-width">A</th>
                                <th class="headings-align headings-background headings-border headings-color headings-font headings-other headings-padding headings-rounded headings-shadow headings-width">B</th>
                                <th class="headings-align headings-background headings-border headings-color headings-font headings-other headings-padding headings-rounded headings-shadow headings-width">C</th>
                            </tr>
                        </thead>
                        <tbody class="table-body-background table-body-border table-body-color table-body-font table-body-other table-body-padding table-body-rounded table-body-shadow"></tbody>
                    </table>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_component_can_be_rendered_with_headings_and_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table
                table-headings-background="none"
                table-headings-border="none"
                table-headings-color="none"
                table-headings-font="none"
                table-headings-other="none"
                table-headings-padding="none"
                table-headings-rounded="none"
                table-headings-shadow="none"
            >
                <x-slot name="headings">
                    <x-table-heading>A</x-table-heading>
                    <x-table-heading>B</x-table-heading>
                    <x-table-heading>C</x-table-heading>
                </x-slot>
            </x-table>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ orderby: '', sort: '', href: function(name) { return 'http://localhost?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc'); }, }"
            >
                <div class="table-wrapper-background table-wrapper-border table-wrapper-color table-wrapper-font table-wrapper-other table-wrapper-padding table-wrapper-rounded table-wrapper-shadow">
                    <table class="table-background table-border table-color table-font table-other table-padding table-rounded table-shadow">
                        <thead>
                            <tr class="">
                                <th class="headings-align headings-background headings-border headings-color headings-font headings-other headings-padding headings-rounded headings-shadow headings-width">A</th>
                                <th class="headings-align headings-background headings-border headings-color headings-font headings-other headings-padding headings-rounded headings-shadow headings-width">B</th>
                                <th class="headings-align headings-background headings-border headings-color headings-font headings-other headings-padding headings-rounded headings-shadow headings-width">C</th>
                            </tr>
                        </thead>
                        <tbody class="table-body-background table-body-border table-body-color table-body-font table-body-other table-body-padding table-body-rounded table-body-shadow"></tbody>
                    </table>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_component_can_be_rendered_with_headings_and_override_styles(): void
    {
        $template = <<<'HTML'
            <x-table
                table-headings-background="custom-background"
                table-headings-border="custom-border"
                table-headings-color="custom-color"
                table-headings-font="custom-font"
                table-headings-other="custom-other"
                table-headings-padding="custom-padding"
                table-headings-rounded="custom-rounded"
                table-headings-shadow="custom-shadow"
            >
                <x-slot name="headings">
                    <x-table-heading>A</x-table-heading>
                    <x-table-heading>B</x-table-heading>
                    <x-table-heading>C</x-table-heading>
                </x-slot>
            </x-table>
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ orderby: '', sort: '', href: function(name) { return 'http://localhost?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc'); }, }"
            >
                <div class="table-wrapper-background table-wrapper-border table-wrapper-color table-wrapper-font table-wrapper-other table-wrapper-padding table-wrapper-rounded table-wrapper-shadow">
                    <table class="table-background table-border table-color table-font table-other table-padding table-rounded table-shadow">
                        <thead>
                            <tr class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow">
                                <th class="headings-align headings-background headings-border headings-color headings-font headings-other headings-padding headings-rounded headings-shadow headings-width">A</th>
                                <th class="headings-align headings-background headings-border headings-color headings-font headings-other headings-padding headings-rounded headings-shadow headings-width">B</th>
                                <th class="headings-align headings-background headings-border headings-color headings-font headings-other headings-padding headings-rounded headings-shadow headings-width">C</th>
                            </tr>
                        </thead>
                        <tbody class="table-body-background table-body-border table-body-color table-body-font table-body-other table-body-padding table-body-rounded table-body-shadow"></tbody>
                    </table>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function active_filters_toggle_on_returns_on_text_without_label(): void
    {
        $table = new Table(filters: [
            'active' => [
                'id' => 'active',
                'name' => 'active',
                'label' => 'Active',
                'type' => 'toggle',
                'selected' => '1',
                'unset' => '',
                'on' => '1',
                'off' => '0',
                'on-text' => 'Active Only',
                'off-text' => 'Inactive Only',
            ],
        ]);

        $active = $table->activeFilters();

        $this->assertCount(1, $active);
        $this->assertSame('Active Only', $active[0]['text']);
    }

    #[Test]
    public function active_filters_toggle_off_returns_off_text(): void
    {
        $table = new Table(filters: [
            'active' => [
                'id' => 'active',
                'name' => 'active',
                'label' => 'Active',
                'type' => 'toggle',
                'selected' => '0',
                'unset' => '',
                'on' => '1',
                'off' => '0',
                'on-text' => 'Active Only',
                'off-text' => 'Inactive Only',
            ],
        ]);

        $active = $table->activeFilters();

        $this->assertCount(1, $active);
        $this->assertSame('Inactive Only', $active[0]['text']);
    }

    #[Test]
    public function active_filters_toggle_defaults_to_true_false_when_text_not_provided(): void
    {
        $table = new Table(filters: [
            'status' => [
                'id' => 'status',
                'name' => 'status',
                'label' => 'Status',
                'type' => 'toggle',
                'selected' => '1',
                'unset' => '',
                'on' => '1',
                'off' => '0',
            ],
        ]);

        $active = $table->activeFilters();

        $this->assertSame('true', $active[0]['text']);
    }

    #[Test]
    public function active_filters_autocomplete_returns_selected_text_when_provided(): void
    {
        $table = new Table(filters: [
            'country' => [
                'id' => 'country',
                'name' => 'country',
                'label' => 'Country',
                'type' => 'autocomplete',
                'selected' => '42',
                'selected-text' => 'United Kingdom',
                'unset' => '',
            ],
        ]);

        $active = $table->activeFilters();

        $this->assertCount(1, $active);
        $this->assertSame('United Kingdom', $active[0]['text']);
    }

    #[Test]
    public function active_filters_autocomplete_falls_back_to_raw_id_when_selected_text_absent(): void
    {
        $table = new Table(filters: [
            'country' => [
                'id' => 'country',
                'name' => 'country',
                'label' => 'Country',
                'type' => 'autocomplete',
                'selected' => '42',
                'unset' => '',
            ],
        ]);

        $active = $table->activeFilters();

        $this->assertCount(1, $active);
        $this->assertSame('42', $active[0]['text']);
    }

    #[Test]
    public function active_filters_date_returns_formatted_date(): void
    {
        $table = new Table(filters: [
            'created_at' => [
                'id' => 'created_at',
                'name' => 'created_at',
                'label' => 'Created At',
                'type' => 'date',
                'selected' => '2024-01-15',
                'unset' => '',
                'data' => 'Y-m-d',
                'format' => 'd/m/Y',
            ],
        ]);

        $active = $table->activeFilters();

        $this->assertCount(1, $active);
        $this->assertSame('15/01/2024', $active[0]['text']);
    }

    #[Test]
    public function active_filters_date_returns_raw_value_when_format_not_parseable(): void
    {
        $table = new Table(filters: [
            'created_at' => [
                'id' => 'created_at',
                'name' => 'created_at',
                'label' => 'Created At',
                'type' => 'date',
                'selected' => 'not-a-date',
                'unset' => '',
                'data' => 'Y-m-d',
                'format' => 'd/m/Y',
            ],
        ]);

        $active = $table->activeFilters();

        $this->assertCount(1, $active);
        $this->assertSame('not-a-date', $active[0]['text']);
    }

    #[Test]
    public function active_filters_date_uses_default_formats_when_not_specified(): void
    {
        $table = new Table(filters: [
            'created_at' => [
                'id' => 'created_at',
                'name' => 'created_at',
                'label' => 'Created At',
                'type' => 'date',
                'selected' => '2024-06-30',
                'unset' => '',
            ],
        ]);

        $active = $table->activeFilters();

        $this->assertCount(1, $active);
        $this->assertSame('30/06/2024', $active[0]['text']);
    }

    #[Test]
    public function active_filters_date_range_returns_formatted_range(): void
    {
        $table = new Table(filters: [
            'date_range' => [
                'id' => 'date_range',
                'name' => 'date_range',
                'label' => 'Date Range',
                'type' => 'date-range',
                'selected' => '2024-01-15#2024-01-31',
                'unset' => '',
                'data' => 'Y-m-d',
                'format' => 'd/m/Y',
            ],
        ]);

        $active = $table->activeFilters();

        $this->assertCount(1, $active);
        $this->assertSame('15/01/2024 - 31/01/2024', $active[0]['text']);
    }

    #[Test]
    public function active_filters_date_range_uses_default_formats_when_not_specified(): void
    {
        $table = new Table(filters: [
            'date_range' => [
                'id' => 'date_range',
                'name' => 'date_range',
                'label' => 'Date Range',
                'type' => 'date-range',
                'selected' => '2024-06-01#2024-06-30',
                'unset' => '',
            ],
        ]);

        $active = $table->activeFilters();

        $this->assertCount(1, $active);
        $this->assertSame('01/06/2024 - 30/06/2024', $active[0]['text']);
    }
}
