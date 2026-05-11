<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class FiltersTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.table-filters.button-background', 'button-background');
        Config::set('themes.default.table-filters.button-border', 'button-border');
        Config::set('themes.default.table-filters.button-color', 'button-color');
        Config::set('themes.default.table-filters.button-font', 'button-font');
        Config::set('themes.default.table-filters.button-icon', 'icon-dot');
        Config::set('themes.default.table-filters.button-icon-size', 'icon-size');
        Config::set('themes.default.table-filters.button-other', 'button-other');
        Config::set('themes.default.table-filters.button-padding', 'button-padding');
        Config::set('themes.default.table-filters.button-rounded', 'button-rounded');
        Config::set('themes.default.table-filters.button-shadow', 'button-shadow');
        Config::set('themes.default.table-filters.button-width', 'button-width');
    }

    private function filters(): array
    {
        return [
            'status' => [
                'label' => 'Status',
                'type' => 'select',
                'options' => ['active' => 'Active', 'inactive' => 'Inactive'],
                'selected' => '',
            ],
        ];
    }

    #[Test]
    public function a_table_filters_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-filters :filters="$filters" />
            HTML;

        $expected = <<<'HTML'
            <div class="relative" x-data="{ showFilters: false, fields: { status: { original: '', selected: '', unset: '', toggle: false, }, }, clearFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field =>
                { if (this.fields[field].selected) { params.append(field, this.fields[field].unset) } }) window.location.search = params.toString() }, updateFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field => { if (this.fields[field].selected) { params.append(field, this.fields[field].selected) } }) window.location.search = params.toString() }, clickAway() { Object.keys(this.fields).forEach(field => { this.fields[field].selected = this.fields[field].original this.fields[field].toggle = this.fields[field].selected !== this.fields[field].unset }) this.showFilters = false } }" @click.away="clickAway()"
            >
                <button class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width relative group border-button-default hover:border-button-default-hover text-button-default hover:text-button-default-hover cursor-pointer" x-on:click="showFilters = !showFilters">
                    <svg class="icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </button>
                    <div x-show="showFilters" class="origin-top-right absolute z-10 right-0 mt-2 min-w-[400px] w-max rounded-md shadow-md bg-panel border border-panel overflow-hidden" tabindex="-1" x-cloak>
                        <div class="flex items-center justify-between p-2 bg-panel-header">
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="clearFilters()" type="button"> Clear </button>
                            <span class="text-xs uppercase text-gray-600 font-bold">Filters</span>
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="updateFilters()" type="button"> Update </button>
                        </div>
                        <div class="divide-y divide-gray-150">
                            <div x-data="{ onChange(value) { fields.status.toggle = fields.status.selected !== fields.status.reset }, toggle() { fields.status.toggle = !fields.status.toggle fields.status.selected = fields.status.reset } }" class="text-sm flex justify-between items-center mr-2"
            >
                                <div class="flex space-x-2 items-center m-4">
                                    <div class="group grid size-4 grid-cols-1 has-[input:disabled]:opacity-50">
                                        <input name="status_toggle" type="checkbox" id="status_toggle" value="1" class="bg-input border border-input checked:bg-brand checked:border-brand focus:outline-none focus:ring-1 focus:ring-brand ring-offset-1 ring-offset-input col-start-1 row-start-1 cursor-pointer appearance-none rounded" x-model="fields.status.toggle" x-on:click="toggle()" />
                                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                                        </svg>
                                    </div>
                                    <label for="status_toggle" class="cursor-pointer">Status</label>
                                </div>
                                <select id="status" name="status" class="text-sm pr-8 bg-table-filters focus:outline-hidden focus:ring-0 border border-table-filters focus:border-brand text-input flex items-center shrink-0 cursor-pointer h-10 px-2.5 rounded w-max relative" x-on:change="onChange()" x-model="fields.status.selected">
                                    <option value="">Please Select</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template, ['filters' => $this->filters()]);
    }

    #[Test]
    public function a_table_filters_component_can_be_rendered_with_no_button_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filters :filters="$filters"
                button-background="none"
                button-border="none"
                button-color="none"
                button-font="none"
                button-other="none"
                button-padding="none"
                button-rounded="none"
                button-shadow="none"
                button-width="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="relative" x-data="{ showFilters: false, fields: { status: { original: '', selected: '', unset: '', toggle: false, }, }, clearFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field =>
                { if (this.fields[field].selected) { params.append(field, this.fields[field].unset) } }) window.location.search = params.toString() }, updateFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field => { if (this.fields[field].selected) { params.append(field, this.fields[field].selected) } }) window.location.search = params.toString() }, clickAway() { Object.keys(this.fields).forEach(field => { this.fields[field].selected = this.fields[field].original this.fields[field].toggle = this.fields[field].selected !== this.fields[field].unset }) this.showFilters = false } }" @click.away="clickAway()"
            >
                <button class=" relative group border-button-default hover:border-button-default-hover text-button-default hover:text-button-default-hover cursor-pointer" x-on:click="showFilters = !showFilters">
                    <svg class="icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </button>
                    <div x-show="showFilters" class="origin-top-right absolute z-10 right-0 mt-2 min-w-[400px] w-max rounded-md shadow-md bg-panel border border-panel overflow-hidden" tabindex="-1" x-cloak>
                        <div class="flex items-center justify-between p-2 bg-panel-header">
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="clearFilters()" type="button"> Clear </button>
                            <span class="text-xs uppercase text-gray-600 font-bold">Filters</span>
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="updateFilters()" type="button"> Update </button>
                        </div>
                        <div class="divide-y divide-gray-150">
                            <div x-data="{ onChange(value) { fields.status.toggle = fields.status.selected !== fields.status.reset }, toggle() { fields.status.toggle = !fields.status.toggle fields.status.selected = fields.status.reset } }" class="text-sm flex justify-between items-center mr-2"
            >
                                <div class="flex space-x-2 items-center m-4">
                                    <div class="group grid size-4 grid-cols-1 has-[input:disabled]:opacity-50">
                                        <input name="status_toggle" type="checkbox" id="status_toggle" value="1" class="bg-input border border-input checked:bg-brand checked:border-brand focus:outline-none focus:ring-1 focus:ring-brand ring-offset-1 ring-offset-input col-start-1 row-start-1 cursor-pointer appearance-none rounded" x-model="fields.status.toggle" x-on:click="toggle()" />
                                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                                        </svg>
                                    </div>
                                    <label for="status_toggle" class="cursor-pointer">Status</label>
                                </div>
                                <select id="status" name="status" class="text-sm pr-8 bg-table-filters focus:outline-hidden focus:ring-0 border border-table-filters focus:border-brand text-input flex items-center shrink-0 cursor-pointer h-10 px-2.5 rounded w-max relative" x-on:change="onChange()" x-model="fields.status.selected">
                                    <option value="">Please Select</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template, ['filters' => $this->filters()]);
    }

    #[Test]
    public function a_table_filters_component_normalises_filter_array_keys(): void
    {
        // Filters passed without explicit 'id', 'name', 'unset' keys should have them added
        $template = <<<'HTML'
            <x-table-filters :filters="$filters" />
            HTML;

        $filters = [
            'status' => [
                'label' => 'Status',
                'type' => 'select',
                'options' => [],
                'selected' => '',
            ],
        ];

        $expected = <<<'HTML'
            <div class="relative" x-data="{ showFilters: false, fields: { status: { original: '', selected: '', unset: '', toggle: false, }, }, clearFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field =>
                { if (this.fields[field].selected) { params.append(field, this.fields[field].unset) } }) window.location.search = params.toString() }, updateFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field => { if (this.fields[field].selected) { params.append(field, this.fields[field].selected) } }) window.location.search = params.toString() }, clickAway() { Object.keys(this.fields).forEach(field => { this.fields[field].selected = this.fields[field].original this.fields[field].toggle = this.fields[field].selected !== this.fields[field].unset }) this.showFilters = false } }" @click.away="clickAway()"
            >
                <button class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width relative group border-button-default hover:border-button-default-hover text-button-default hover:text-button-default-hover cursor-pointer" x-on:click="showFilters = !showFilters">
                    <svg class="icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </button>
                    <div x-show="showFilters" class="origin-top-right absolute z-10 right-0 mt-2 min-w-[400px] w-max rounded-md shadow-md bg-panel border border-panel overflow-hidden" tabindex="-1" x-cloak>
                        <div class="flex items-center justify-between p-2 bg-panel-header">
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="clearFilters()" type="button"> Clear </button>
                            <span class="text-xs uppercase text-gray-600 font-bold">Filters</span>
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="updateFilters()" type="button"> Update </button>
                        </div>
                        <div class="divide-y divide-gray-150">
                            <div x-data="{ onChange(value) { fields.status.toggle = fields.status.selected !== fields.status.reset }, toggle() { fields.status.toggle = !fields.status.toggle fields.status.selected = fields.status.reset } }" class="text-sm flex justify-between items-center mr-2"
            >
                                <div class="flex space-x-2 items-center m-4">
                                    <div class="group grid size-4 grid-cols-1 has-[input:disabled]:opacity-50">
                                        <input name="status_toggle" type="checkbox" id="status_toggle" value="1" class="bg-input border border-input checked:bg-brand checked:border-brand focus:outline-none focus:ring-1 focus:ring-brand ring-offset-1 ring-offset-input col-start-1 row-start-1 cursor-pointer appearance-none rounded" x-model="fields.status.toggle" x-on:click="toggle()" />
                                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                                        </svg>
                                    </div>
                                    <label for="status_toggle" class="cursor-pointer">Status</label>
                                </div>
                                <select id="status" name="status" class="text-sm pr-8 bg-table-filters focus:outline-hidden focus:ring-0 border border-table-filters focus:border-brand text-input flex items-center shrink-0 cursor-pointer h-10 px-2.5 rounded w-max relative" x-on:change="onChange()" x-model="fields.status.selected">
                                    <option value="">Please Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template, ['filters' => $filters]);
    }
}
