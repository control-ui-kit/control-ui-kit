<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use ControlUIKit\Components\Tables\Filters;
use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class FiltersTest extends ComponentTestCase
{
    protected function setUp(): void
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

        Config::set('themes.default.input-checkbox.background', 'background');
        Config::set('themes.default.input-checkbox.border', 'border');
        Config::set('themes.default.input-checkbox.color', 'color');
        Config::set('themes.default.input-checkbox.layout', 'layout');
        Config::set('themes.default.input-checkbox.other', 'other');
        Config::set('themes.default.input-checkbox.padding', 'padding');
        Config::set('themes.default.input-checkbox.input-background', 'input-background');
        Config::set('themes.default.input-checkbox.input-border', 'input-border');
        Config::set('themes.default.input-checkbox.input-other', 'input-other');
        Config::set('themes.default.input-checkbox.input-rounded', 'input-rounded');

        Config::set('themes.default.table-filter.input-background', 'input-background');
        Config::set('themes.default.table-filter.input-border', 'input-border');
        Config::set('themes.default.table-filter.input-color', 'input-color');
        Config::set('themes.default.table-filter.input-font', 'input-font');
        Config::set('themes.default.table-filter.input-other', 'input-other');
        Config::set('themes.default.table-filter.input-padding', 'input-padding');
        Config::set('themes.default.table-filter.input-rounded', 'input-rounded');
        Config::set('themes.default.table-filter.input-shadow', 'input-shadow');
        Config::set('themes.default.table-filter.input-width', 'input-width');
        Config::set('themes.default.table-filter.select-other', 'select-other');
        Config::set('themes.default.table-filter.text-other', 'text-other');
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
            <div class="relative" x-data="{ showFilters: false, fields: { 'status': { original: '', selected: '', unset: '', toggle: false, }, }, clearFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field =>
                { if (this.fields[field].selected) { params.append(field, this.fields[field].unset) } }) window.location.search = params.toString() }, updateFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field => { if (this.fields[field].selected) { params.append(field, this.fields[field].selected) } else if (this.fields[field].original) { params.append(field, this.fields[field].unset) } }) window.location.search = params.toString() }, clickAway() { Object.keys(this.fields).forEach(field => { this.fields[field].selected = this.fields[field].original this.fields[field].toggle = this.fields[field].selected !== this.fields[field].unset }) this.showFilters = false } }" @click.away="if (!$event.target.closest('.flatpickr-calendar')) clickAway()"
            >
                <button class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width relative group border-button-default hover:border-button-default-hover text-button-default hover:text-button-default-hover cursor-pointer" x-on:click="showFilters = !showFilters">
                    <svg class="icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </button>
                    <div x-show="showFilters" class="origin-top-right absolute z-10 right-0 mt-2 min-w-[400px] w-max rounded-md shadow-md bg-panel border border-panel" tabindex="-1" x-cloak>
                        <div class="flex items-center justify-between p-2 bg-panel-header">
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="clearFilters()" type="button"> Clear </button>
                            <span class="text-xs uppercase text-gray-600 font-bold">Filters</span>
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="updateFilters()" type="button"> Update </button>
                        </div>
                        <div class="divide-y divide-panel">
                            <div x-data="{ toggle() { fields['status'].toggle = !fields['status'].toggle fields['status'].selected = fields['status'].unset } }" x-effect="fields['status'].toggle = fields['status'].selected !== null && fields['status'].selected !== fields['status'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                                <div class="flex shrink-0 space-x-2 items-center m-4">
                                    <div class="background border color layout other padding">
                                        <input name="status_toggle" type="checkbox" id="status_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['status'].toggle" x-on:click="toggle()" />
                                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                                        </svg>
                                    </div>
                                    <label for="status_toggle" class="cursor-pointer whitespace-nowrap">Status</label>
                                </div>
                                <div x-cloak x-data="Components.inputSelect({ id: 'status', value: '' })" x-init="init()" x-modelable="value" class="w-full relative" x-model="fields['status'].selected">
                                    <input type="hidden" name="status" id="status" value="" x-model="value" x-on:change="onValueChange()" />
                                    <button type="button" class="bg-input border border-input focus:border-input focus:outline-hidden focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer py-1.5 pl-3 pr-10 rounded-sm w-full" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                                        <div class="flex items-center min-w-0">
                                            <img x-show="image !== undefined" :src="image" class="shrink-0 pr-2 h-6 w-auto">
                                            <span x-text="text" class="text-input-option hover:text-input-option-hover block truncate"></span> <span x-text="subtext" class="text-input-option-sub hover:text-input-option-sub-hover block truncate pl-2"></span>
                                        </div>
                                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                                            <span x-show="!open">
                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                                    </svg>
                                                </span>
                                                <span x-show="open">
                                                    <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </button>
                                            <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="bg-input border border-input focus:outline-hidden absolute mt-1 max-h-60 overflow-auto z-50 py-1 rounded-sm shadow-md w-full" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-status" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                                                <li class="cursor-pointer select-none relative group py-2 pl-3 pr-9" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'hover:bg-input-option-hover': activeIndex === 0, 'bg-input-option text-input-option': !(activeIndex === 0) }">
                                                    <div class="flex items-center "> <span class="text-input-option hover:text-input-option-hover block truncate" :class="{ 'font-semibold': highlightIndex === 0, 'font-normal': !(highlightIndex === 0) }">Please Select ...</span> </div>
                                                    <span class="text-brand absolute inset-y-0 right-0 flex items-center pr-4" :class="{ '': activeIndex === 0, '': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="cursor-pointer select-none relative group py-2 pl-3 pr-9" role="option" data-text="Active" data-value="active" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'hover:bg-input-option-hover': activeIndex === 1, 'bg-input-option text-input-option': !(activeIndex === 1) }">
                                                        <div class="flex items-center "> <span class="text-input-option hover:text-input-option-hover block truncate" :class="{ 'font-semibold': highlightIndex === 1, 'font-normal': !(highlightIndex === 1) }">Active</span> </div>
                                                        <span class="text-brand absolute inset-y-0 right-0 flex items-center pr-4" :class="{ '': activeIndex === 1, '': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="cursor-pointer select-none relative group py-2 pl-3 pr-9" role="option" data-text="Inactive" data-value="inactive" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'hover:bg-input-option-hover': activeIndex === 2, 'bg-input-option text-input-option': !(activeIndex === 2) }">
                                                            <div class="flex items-center "> <span class="text-input-option hover:text-input-option-hover block truncate" :class="{ 'font-semibold': highlightIndex === 2, 'font-normal': !(highlightIndex === 2) }">Inactive</span> </div>
                                                            <span class="text-brand absolute inset-y-0 right-0 flex items-center pr-4" :class="{ '': activeIndex === 2, '': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
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
            <div class="relative" x-data="{ showFilters: false, fields: { 'status': { original: '', selected: '', unset: '', toggle: false, }, }, clearFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field =>
                { if (this.fields[field].selected) { params.append(field, this.fields[field].unset) } }) window.location.search = params.toString() }, updateFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field => { if (this.fields[field].selected) { params.append(field, this.fields[field].selected) } else if (this.fields[field].original) { params.append(field, this.fields[field].unset) } }) window.location.search = params.toString() }, clickAway() { Object.keys(this.fields).forEach(field => { this.fields[field].selected = this.fields[field].original this.fields[field].toggle = this.fields[field].selected !== this.fields[field].unset }) this.showFilters = false } }" @click.away="if (!$event.target.closest('.flatpickr-calendar')) clickAway()"
            >
                <button class=" relative group border-button-default hover:border-button-default-hover text-button-default hover:text-button-default-hover cursor-pointer" x-on:click="showFilters = !showFilters">
                    <svg class="icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </button>
                    <div x-show="showFilters" class="origin-top-right absolute z-10 right-0 mt-2 min-w-[400px] w-max rounded-md shadow-md bg-panel border border-panel" tabindex="-1" x-cloak>
                        <div class="flex items-center justify-between p-2 bg-panel-header">
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="clearFilters()" type="button"> Clear </button>
                            <span class="text-xs uppercase text-gray-600 font-bold">Filters</span>
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="updateFilters()" type="button"> Update </button>
                        </div>
                        <div class="divide-y divide-panel">
                            <div x-data="{ toggle() { fields['status'].toggle = !fields['status'].toggle fields['status'].selected = fields['status'].unset } }" x-effect="fields['status'].toggle = fields['status'].selected !== null && fields['status'].selected !== fields['status'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                                <div class="flex shrink-0 space-x-2 items-center m-4">
                                    <div class="background border color layout other padding">
                                        <input name="status_toggle" type="checkbox" id="status_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['status'].toggle" x-on:click="toggle()" />
                                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                                        </svg>
                                    </div>
                                    <label for="status_toggle" class="cursor-pointer whitespace-nowrap">Status</label>
                                </div>
                                <div x-cloak x-data="Components.inputSelect({ id: 'status', value: '' })" x-init="init()" x-modelable="value" class="w-full relative" x-model="fields['status'].selected">
                                    <input type="hidden" name="status" id="status" value="" x-model="value" x-on:change="onValueChange()" />
                                    <button type="button" class="bg-input border border-input focus:border-input focus:outline-hidden focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer py-1.5 pl-3 pr-10 rounded-sm w-full" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                                        <div class="flex items-center min-w-0">
                                            <img x-show="image !== undefined" :src="image" class="shrink-0 pr-2 h-6 w-auto">
                                            <span x-text="text" class="text-input-option hover:text-input-option-hover block truncate"></span> <span x-text="subtext" class="text-input-option-sub hover:text-input-option-sub-hover block truncate pl-2"></span>
                                        </div>
                                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                                            <span x-show="!open">
                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                                    </svg>
                                                </span>
                                                <span x-show="open">
                                                    <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </button>
                                            <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="bg-input border border-input focus:outline-hidden absolute mt-1 max-h-60 overflow-auto z-50 py-1 rounded-sm shadow-md w-full" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-status" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                                                <li class="cursor-pointer select-none relative group py-2 pl-3 pr-9" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'hover:bg-input-option-hover': activeIndex === 0, 'bg-input-option text-input-option': !(activeIndex === 0) }">
                                                    <div class="flex items-center "> <span class="text-input-option hover:text-input-option-hover block truncate" :class="{ 'font-semibold': highlightIndex === 0, 'font-normal': !(highlightIndex === 0) }">Please Select ...</span> </div>
                                                    <span class="text-brand absolute inset-y-0 right-0 flex items-center pr-4" :class="{ '': activeIndex === 0, '': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="cursor-pointer select-none relative group py-2 pl-3 pr-9" role="option" data-text="Active" data-value="active" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'hover:bg-input-option-hover': activeIndex === 1, 'bg-input-option text-input-option': !(activeIndex === 1) }">
                                                        <div class="flex items-center "> <span class="text-input-option hover:text-input-option-hover block truncate" :class="{ 'font-semibold': highlightIndex === 1, 'font-normal': !(highlightIndex === 1) }">Active</span> </div>
                                                        <span class="text-brand absolute inset-y-0 right-0 flex items-center pr-4" :class="{ '': activeIndex === 1, '': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                                </svg>
                                                            </span>
                                                        </li>
                                                        <li class="cursor-pointer select-none relative group py-2 pl-3 pr-9" role="option" data-text="Inactive" data-value="inactive" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'hover:bg-input-option-hover': activeIndex === 2, 'bg-input-option text-input-option': !(activeIndex === 2) }">
                                                            <div class="flex items-center "> <span class="text-input-option hover:text-input-option-hover block truncate" :class="{ 'font-semibold': highlightIndex === 2, 'font-normal': !(highlightIndex === 2) }">Inactive</span> </div>
                                                            <span class="text-brand absolute inset-y-0 right-0 flex items-center pr-4" :class="{ '': activeIndex === 2, '': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                                    </svg>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
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
            <div class="relative" x-data="{ showFilters: false, fields: { 'status': { original: '', selected: '', unset: '', toggle: false, }, }, clearFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field =>
                { if (this.fields[field].selected) { params.append(field, this.fields[field].unset) } }) window.location.search = params.toString() }, updateFilters() { let params = new URLSearchParams() Object.keys(this.fields).forEach(field => { if (this.fields[field].selected) { params.append(field, this.fields[field].selected) } else if (this.fields[field].original) { params.append(field, this.fields[field].unset) } }) window.location.search = params.toString() }, clickAway() { Object.keys(this.fields).forEach(field => { this.fields[field].selected = this.fields[field].original this.fields[field].toggle = this.fields[field].selected !== this.fields[field].unset }) this.showFilters = false } }" @click.away="if (!$event.target.closest('.flatpickr-calendar')) clickAway()"
            >
                <button class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width relative group border-button-default hover:border-button-default-hover text-button-default hover:text-button-default-hover cursor-pointer" x-on:click="showFilters = !showFilters">
                    <svg class="icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </button>
                    <div x-show="showFilters" class="origin-top-right absolute z-10 right-0 mt-2 min-w-[400px] w-max rounded-md shadow-md bg-panel border border-panel" tabindex="-1" x-cloak>
                        <div class="flex items-center justify-between p-2 bg-panel-header">
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="clearFilters()" type="button"> Clear </button>
                            <span class="text-xs uppercase text-gray-600 font-bold">Filters</span>
                            <button class="bg-button-default hover:bg-button-default-hover border border-button-default hover:border-button-default-hover focus:ring-1 focus:ring-brand text-button-default hover:text-button-default-hover cursor-pointer text-sm flex items-center justify-center group-hover outline-hidden focus:outline-hidden space-x-1 px-2 py-1.5 rounded-sm w-max w-full" x-on:click="updateFilters()" type="button"> Update </button>
                        </div>
                        <div class="divide-y divide-panel">
                            <div x-data="{ toggle() { fields['status'].toggle = !fields['status'].toggle fields['status'].selected = fields['status'].unset } }" x-effect="fields['status'].toggle = fields['status'].selected !== null && fields['status'].selected !== fields['status'].unset" class="text-sm flex justify-between items-center mr-2"
            >
                                <div class="flex shrink-0 space-x-2 items-center m-4">
                                    <div class="background border color layout other padding">
                                        <input name="status_toggle" type="checkbox" id="status_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields['status'].toggle" x-on:click="toggle()" />
                                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                                        </svg>
                                    </div>
                                    <label for="status_toggle" class="cursor-pointer whitespace-nowrap">Status</label>
                                </div>
                                <div x-cloak x-data="Components.inputSelect({ id: 'status', value: '' })" x-init="init()" x-modelable="value" class="w-full relative" x-model="fields['status'].selected">
                                    <input type="hidden" name="status" id="status" value="" x-model="value" x-on:change="onValueChange()" />
                                    <button type="button" class="bg-input border border-input focus:border-input focus:outline-hidden focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer py-1.5 pl-3 pr-10 rounded-sm w-full" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                                        <div class="flex items-center min-w-0">
                                            <img x-show="image !== undefined" :src="image" class="shrink-0 pr-2 h-6 w-auto">
                                            <span x-text="text" class="text-input-option hover:text-input-option-hover block truncate"></span> <span x-text="subtext" class="text-input-option-sub hover:text-input-option-sub-hover block truncate pl-2"></span>
                                        </div>
                                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                                            <span x-show="!open">
                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                                    </svg>
                                                </span>
                                                <span x-show="open">
                                                    <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </button>
                                            <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="bg-input border border-input focus:outline-hidden absolute mt-1 max-h-60 overflow-auto z-50 py-1 rounded-sm shadow-md w-full" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-status" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                                                <li class="cursor-pointer select-none relative group py-2 pl-3 pr-9" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'hover:bg-input-option-hover': activeIndex === 0, 'bg-input-option text-input-option': !(activeIndex === 0) }">
                                                    <div class="flex items-center "> <span class="text-input-option hover:text-input-option-hover block truncate" :class="{ 'font-semibold': highlightIndex === 0, 'font-normal': !(highlightIndex === 0) }">Please Select ...</span> </div>
                                                    <span class="text-brand absolute inset-y-0 right-0 flex items-center pr-4" :class="{ '': activeIndex === 0, '': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                            </svg>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            HTML;

        $this->assertComponentRenders($expected, $template, ['filters' => $filters]);
    }

    #[Test]
    public function filters_processes_date_range_without_selected_key(): void
    {
        $filters = [
            'period' => [
                'label' => 'Period',
                'type' => 'date-range',
                'from' => '2024-01-01',
                'to' => '2024-01-31',
            ],
        ];

        $component = new Filters(filters: $filters);

        $this->assertSame('2024-01-01#2024-01-31', $component->filters['period']['selected']);
    }

    #[Test]
    public function filters_processes_date_range_with_null_selected(): void
    {
        $filters = [
            'period' => [
                'label' => 'Period',
                'type' => 'date-range',
                'selected' => null,
                'from' => '2024-06-01',
                'to' => '2024-06-30',
            ],
        ];

        $component = new Filters(filters: $filters);

        $this->assertSame('2024-06-01#2024-06-30', $component->filters['period']['selected']);
    }
}
