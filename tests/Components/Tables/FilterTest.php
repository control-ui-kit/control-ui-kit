<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class FilterTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.table-filter.button-background', 'button-background');
        Config::set('themes.default.table-filter.button-border', 'button-border');
        Config::set('themes.default.table-filter.button-color', 'button-color');
        Config::set('themes.default.table-filter.button-font', 'button-font');
        Config::set('themes.default.table-filter.button-other', 'button-other');
        Config::set('themes.default.table-filter.button-padding', 'button-padding');
        Config::set('themes.default.table-filter.button-rounded', 'button-rounded');
        Config::set('themes.default.table-filter.button-shadow', 'button-shadow');
        Config::set('themes.default.table-filter.button-width', 'button-width');

        Config::set('themes.default.table-filter.check-background', 'check-background');
        Config::set('themes.default.table-filter.check-border', 'check-border');
        Config::set('themes.default.table-filter.check-color', 'check-color');
        Config::set('themes.default.table-filter.check-font', 'check-font');
        Config::set('themes.default.table-filter.check-other', 'check-other');
        Config::set('themes.default.table-filter.check-padding', 'check-padding');
        Config::set('themes.default.table-filter.check-rounded', 'check-rounded');
        Config::set('themes.default.table-filter.check-shadow', 'check-shadow');
        Config::set('themes.default.table-filter.check-active', 'check-active');
        Config::set('themes.default.table-filter.check-inactive', 'check-inactive');
        Config::set('themes.default.table-filter.check-icon', 'check-icon');
        Config::set('themes.default.table-filter.check-size', 'check-size');

        Config::set('themes.default.table-filter.icon', 'icon.chevron-down');
        Config::set('themes.default.table-filter.icon-background', 'icon-background');
        Config::set('themes.default.table-filter.icon-border', 'icon-border');
        Config::set('themes.default.table-filter.icon-color', 'icon-color');
        Config::set('themes.default.table-filter.icon-other', 'icon-other');
        Config::set('themes.default.table-filter.icon-padding', 'icon-padding');
        Config::set('themes.default.table-filter.icon-rounded', 'icon-rounded');
        Config::set('themes.default.table-filter.icon-shadow', 'icon-shadow');
        Config::set('themes.default.table-filter.icon-size', 'icon-size');

        Config::set('themes.default.table-filter.image-border', 'image-border');
        Config::set('themes.default.table-filter.image-other', 'image-other');
        Config::set('themes.default.table-filter.image-padding', 'image-padding');
        Config::set('themes.default.table-filter.image-rounded', 'image-rounded');
        Config::set('themes.default.table-filter.image-shadow', 'image-shadow');
        Config::set('themes.default.table-filter.image-size', 'image-size');

        Config::set('themes.default.table-filter.list-background', 'list-background');
        Config::set('themes.default.table-filter.list-border', 'list-border');
        Config::set('themes.default.table-filter.list-color', 'list-color');
        Config::set('themes.default.table-filter.list-font', 'list-font');
        Config::set('themes.default.table-filter.list-other', 'list-other');
        Config::set('themes.default.table-filter.list-padding', 'list-padding');
        Config::set('themes.default.table-filter.list-rounded', 'list-rounded');
        Config::set('themes.default.table-filter.list-shadow', 'list-shadow');
        Config::set('themes.default.table-filter.list-width', 'list-width');

        Config::set('themes.default.table-filter.list-text-active', 'list-text-active');
        Config::set('themes.default.table-filter.list-text-inactive', 'list-text-inactive');
        Config::set('themes.default.table-filter.list-subtext-active', 'list-subtext-active');
        Config::set('themes.default.table-filter.list-subtext-inactive', 'list-subtext-inactive');

        Config::set('themes.default.table-filter.option-background', 'option-background');
        Config::set('themes.default.table-filter.option-border', 'option-border');
        Config::set('themes.default.table-filter.option-color', 'option-color');
        Config::set('themes.default.table-filter.option-font', 'option-font');
        Config::set('themes.default.table-filter.option-other', 'option-other');
        Config::set('themes.default.table-filter.option-padding', 'option-padding');
        Config::set('themes.default.table-filter.option-rounded', 'option-rounded');
        Config::set('themes.default.table-filter.option-shadow', 'option-shadow');
        Config::set('themes.default.table-filter.option-spacing', 'option-spacing');
        Config::set('themes.default.table-filter.option-active', 'option-active');
        Config::set('themes.default.table-filter.option-inactive', 'option-inactive');

        Config::set('themes.default.table-filter.text-background', 'text-background');
        Config::set('themes.default.table-filter.text-border', 'text-border');
        Config::set('themes.default.table-filter.text-color', 'text-color');
        Config::set('themes.default.table-filter.text-font', 'text-font');
        Config::set('themes.default.table-filter.text-other', 'text-other');
        Config::set('themes.default.table-filter.text-padding', 'text-padding');
        Config::set('themes.default.table-filter.text-rounded', 'text-rounded');
        Config::set('themes.default.table-filter.text-shadow', 'text-shadow');

        Config::set('themes.default.table-filter.subtext-background', 'subtext-background');
        Config::set('themes.default.table-filter.subtext-border', 'subtext-border');
        Config::set('themes.default.table-filter.subtext-color', 'subtext-color');
        Config::set('themes.default.table-filter.subtext-font', 'subtext-font');
        Config::set('themes.default.table-filter.subtext-other', 'subtext-other');
        Config::set('themes.default.table-filter.subtext-padding', 'subtext-padding');
        Config::set('themes.default.table-filter.subtext-rounded', 'subtext-rounded');
        Config::set('themes.default.table-filter.subtext-shadow', 'subtext-shadow');

        Config::set('themes.default.table-filter.wrapper-background', 'wrapper-background');
        Config::set('themes.default.table-filter.wrapper-border', 'wrapper-border');
        Config::set('themes.default.table-filter.wrapper-color', 'wrapper-color');
        Config::set('themes.default.table-filter.wrapper-font', 'wrapper-font');
        Config::set('themes.default.table-filter.wrapper-other', 'wrapper-other');
        Config::set('themes.default.table-filter.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.table-filter.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.table-filter.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.table-filter.wrapper-width', 'wrapper-width');

        Config::set('themes.default.table-filter.please-select-text', 'please-select-text');
        Config::set('themes.default.table-filter.please-select-value', 'please-select-value');
        Config::set('themes.default.table-filter.please-select-trans', 'please-select-trans');

        Config::set('themes.default.table-filter.image-name', 'image-name');
        Config::set('themes.default.table-filter.subtext-name', 'subtext-name');
        Config::set('themes.default.table-filter.text-name', 'text-name');
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.filter name="name" label="label" :options="[ 1 => 'A' ]" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                        label
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </div>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0; console.log('mouseenter')" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'list-text-active': highlightIndex === 0, 'list-text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_no_wrapper_styles(): void
    {
        $template = <<<'HTML'
            <x-table.filter name="name" label="label" :options="[ 1 => 'A' ]"
                wrapper-background="none"
                wrapper-border="none"
                wrapper-color="none"
                wrapper-font="none"
                wrapper-other="none"
                wrapper-padding="none"
                wrapper-rounded="none"
                wrapper-shadow="none"
                wrapper-width="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                        label
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </div>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0; console.log('mouseenter')" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'list-text-active': highlightIndex === 0, 'list-text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_override_wrapper_styles(): void
    {
        $template = <<<'HTML'
            <x-table.filter name="name" label="label" :options="[ 1 => 'A' ]"
                wrapper-background="custom-background"
                wrapper-border="custom-border"
                wrapper-color="custom-color"
                wrapper-font="custom-font"
                wrapper-other="custom-other"
                wrapper-padding="custom-padding"
                wrapper-rounded="custom-rounded"
                wrapper-shadow="custom-shadow"
                wrapper-width="custom-width"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow custom-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                        label
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </div>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0; console.log('mouseenter')" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'list-text-active': highlightIndex === 0, 'list-text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
