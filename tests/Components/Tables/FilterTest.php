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
        Config::set('themes.default.table-filter.check-other', 'check-other');
        Config::set('themes.default.table-filter.check-padding', 'check-padding');
        Config::set('themes.default.table-filter.check-rounded', 'check-rounded');
        Config::set('themes.default.table-filter.check-shadow', 'check-shadow');
        Config::set('themes.default.table-filter.check-active', 'check-active');
        Config::set('themes.default.table-filter.check-inactive', 'check-inactive');
        Config::set('themes.default.table-filter.check-icon', 'icon-check');
        Config::set('themes.default.table-filter.check-icon-size', 'check-size');

        Config::set('themes.default.table-filter.icon', 'icon-chevron-down');
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
        Config::set('themes.default.table-filter.text-active', 'text-active');
        Config::set('themes.default.table-filter.text-inactive', 'text-inactive');

        Config::set('themes.default.table-filter.subtext-background', 'subtext-background');
        Config::set('themes.default.table-filter.subtext-border', 'subtext-border');
        Config::set('themes.default.table-filter.subtext-color', 'subtext-color');
        Config::set('themes.default.table-filter.subtext-font', 'subtext-font');
        Config::set('themes.default.table-filter.subtext-other', 'subtext-other');
        Config::set('themes.default.table-filter.subtext-padding', 'subtext-padding');
        Config::set('themes.default.table-filter.subtext-rounded', 'subtext-rounded');
        Config::set('themes.default.table-filter.subtext-shadow', 'subtext-shadow');
        Config::set('themes.default.table-filter.subtext-active', 'subtext-active');
        Config::set('themes.default.table-filter.subtext-inactive', 'subtext-inactive');

        Config::set('themes.default.table-filter.wrapper-background', 'wrapper-background');
        Config::set('themes.default.table-filter.wrapper-border', 'wrapper-border');
        Config::set('themes.default.table-filter.wrapper-color', 'wrapper-color');
        Config::set('themes.default.table-filter.wrapper-font', 'wrapper-font');
        Config::set('themes.default.table-filter.wrapper-other', 'wrapper-other');
        Config::set('themes.default.table-filter.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.table-filter.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.table-filter.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.table-filter.wrapper-width', 'wrapper-width');

        Config::set('themes.default.table-filter.image-name', 'image');
        Config::set('themes.default.table-filter.subtext-name', 'subtext');
        Config::set('themes.default.table-filter.text-name', 'text');
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_text_array(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => ['text' => 'A'] ]" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_text_name(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" text="text2" :options="[ 1 => ['text2' => 'A'] ]" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_text_name_config_change(): void
    {
        Config::set('themes.default.table-filter.text-name', 'text2');

        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => ['text2' => 'A'] ]" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_no_button_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                button-background="none"
                button-border="none"
                button-color="none"
                button-font="none"
                button-other="none"
                button-padding="none"
                button-rounded="none"
                button-shadow="none"
                button-width="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_override_button_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                button-background="custom-background"
                button-border="custom-border"
                button-color="custom-color"
                button-font="custom-font"
                button-other="custom-other"
                button-padding="custom-padding"
                button-rounded="custom-rounded"
                button-shadow="custom-shadow"
                button-width="custom-width"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow custom-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_no_list_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                list-background="none"
                list-border="none"
                list-color="none"
                list-font="none"
                list-other="none"
                list-padding="none"
                list-rounded="none"
                list-shadow="none"
                list-width="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_override_list_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                list-background="custom-background"
                list-border="custom-border"
                list-color="custom-color"
                list-font="custom-font"
                list-other="custom-other"
                list-padding="custom-padding"
                list-rounded="custom-rounded"
                list-shadow="custom-shadow"
                list-width="custom-width"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow custom-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_no_option_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                option-background="none"
                option-border="none"
                option-color="none"
                option-font="none"
                option-other="none"
                option-padding="none"
                option-rounded="none"
                option-shadow="none"
                option-spacing="none"
                option-active="none"
                option-inactive="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ '': activeIndex === 0, '': !(activeIndex === 0) }">
                            <div class="flex items-center "> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_override_option_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                option-background="custom-background"
                option-border="custom-border"
                option-color="custom-color"
                option-font="custom-font"
                option-other="custom-other"
                option-padding="custom-padding"
                option-rounded="custom-rounded"
                option-shadow="custom-shadow"
                option-spacing="custom-spacing"
                option-active="custom-active"
                option-inactive="custom-inactive"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'custom-active': activeIndex === 0, 'custom-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center custom-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
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
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
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
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
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
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
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
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_no_text_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                text-background="none"
                text-border="none"
                text-color="none"
                text-font="none"
                text-other="none"
                text-padding="none"
                text-rounded="none"
                text-shadow="none"
                text-active="none"
                text-inactive="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="" :class="{ '': highlightIndex === 0, '': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_override_text_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                text-background="custom-background"
                text-border="custom-border"
                text-color="custom-color"
                text-font="custom-font"
                text-other="custom-other"
                text-padding="custom-padding"
                text-rounded="custom-rounded"
                text-shadow="custom-shadow"
                text-active="custom-active"
                text-inactive="custom-inactive"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': highlightIndex === 0, 'custom-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_subtext(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label"
                :options="[ 1 => ['text' => '::text', 'subtext' => '::subtext'] ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">::text</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 0, 'subtext-inactive': !(highlightIndex === 0) }">::subtext</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_subtext_and_subtext_name(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" subtext="subtext2"
                :options="[ 1 => ['text' => '::text', 'subtext2' => '::subtext'] ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">::text</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 0, 'subtext-inactive': !(highlightIndex === 0) }">::subtext</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_subtext_and_subtext_config_update(): void
    {
        Config::set('themes.default.table-filter.subtext-name', 'subtext2');

        $template = <<<'HTML'
            <x-table-filter name="name" label="label"
                :options="[ 1 => ['text' => '::text', 'subtext2' => '::subtext'] ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">::text</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 0, 'subtext-inactive': !(highlightIndex === 0) }">::subtext</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_subtext_and_no_subtext_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label"
                :options="[ 1 => ['text' => '::text', 'subtext' => '::subtext'] ]"
                subtext-background="none"
                subtext-border="none"
                subtext-color="none"
                subtext-font="none"
                subtext-other="none"
                subtext-padding="none"
                subtext-rounded="none"
                subtext-shadow="none"
                subtext-active="none"
                subtext-inactive="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">::text</span> <span class="" :class="{ '': highlightIndex === 0, '': !(highlightIndex === 0) }">::subtext</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_subtext_and_override_subtext_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label"
                :options="[ 1 => ['text' => '::text', 'subtext' => '::subtext'] ]"
                subtext-background="custom-background"
                subtext-border="custom-border"
                subtext-color="custom-color"
                subtext-font="custom-font"
                subtext-other="custom-other"
                subtext-padding="custom-padding"
                subtext-rounded="custom-rounded"
                subtext-shadow="custom-shadow"
                subtext-active="custom-active"
                subtext-inactive="custom-inactive"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">::text</span> <span class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': highlightIndex === 0, 'custom-inactive': !(highlightIndex === 0) }">::subtext</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_with_check_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]" value="1" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="1" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                            <span class="check-background check-border check-color check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }">
                                <svg class="check-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                        </ul>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_with_check_can_be_rendered_with_inline_icon(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]" value="1"
                check-icon="icon-dot"
                check-icon-size="::custom-size"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="1" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                            <span class="check-background check-border check-color check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }">
                                <svg class="::custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="3" r="3"/>
                                    </svg>
                                </span>
                            </li>
                        </ul>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_with_check_can_be_rendered_with_no_check_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]" value="1"
                check-background="none"
                check-border="none"
                check-color="none"
                check-other="none"
                check-padding="none"
                check-rounded="none"
                check-shadow="none"
                check-active="none"
                check-inactive="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="1" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                            <span class="" :class="{ '': activeIndex === 0, '': !(activeIndex === 0) }">
                                <svg class="check-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                        </ul>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_with_check_can_be_rendered_with_override_check_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]" value="1"
                check-background="custom-background"
                check-border="custom-border"
                check-color="custom-color"
                check-other="custom-other"
                check-padding="custom-padding"
                check-rounded="custom-rounded"
                check-shadow="custom-shadow"
                check-active="custom-active"
                check-inactive="custom-inactive"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="1" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                            <span class="custom-background custom-border custom-color custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': activeIndex === 0, 'custom-inactive': !(activeIndex === 0) }">
                                <svg class="check-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                        </ul>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_with_custom_icon_can_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                icon="icon-dot"
                icon-size="custom-size"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_with_can_be_rendered_with_no_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                icon-background="none"
                icon-border="none"
                icon-color="none"
                icon-other="none"
                icon-padding="none"
                icon-rounded="none"
                icon-shadow="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_with_can_be_rendered_with_override_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[ 1 => 'A' ]"
                icon-background="custom-background"
                icon-border="custom-border"
                icon-color="custom-color"
                icon-other="custom-other"
                icon-padding="custom-padding"
                icon-rounded="custom-rounded"
                icon-shadow="custom-shadow"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="custom-background custom-border custom-color custom-other custom-padding custom-rounded custom-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span> </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_an_image(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[1 => ['text' => 'A', 'image' => 'image.png']]" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing">
                                <img src="image.png" alt="" class="image-border image-other image-padding image-rounded image-shadow image-size">
                                <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span>
                            </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_an_image_and_override_image_name(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" image="image2" :options="[1 => ['text' => 'A', 'image2' => 'image.png']]" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing">
                                <img src="image.png" alt="" class="image-border image-other image-padding image-rounded image-shadow image-size">
                                <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span>
                            </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_an_image_and_config_set_image_name(): void
    {
        Config::set('themes.default.table-filter.image-name', 'image2');

        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[1 => ['text' => 'A', 'image2' => 'image.png']]" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing">
                                <img src="image.png" alt="" class="image-border image-other image-padding image-rounded image-shadow image-size">
                                <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span>
                            </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_an_image_and_no_image_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[1 => ['text' => 'A', 'image' => 'image.png']]"
                image-border="none"
                image-other="none"
                image-padding="none"
                image-rounded="none"
                image-shadow="none"
                image-size="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing">
                                <img src="image.png" alt="" class="">
                                <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span>
                            </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_filter_component_can_be_rendered_with_an_image_and_override_image_styles(): void
    {
        $template = <<<'HTML'
            <x-table-filter name="name" label="label" :options="[1 => ['text' => 'A', 'image' => 'image.png']]"
                image-border="custom-border"
                image-other="custom-other"
                image-padding="custom-padding"
                image-rounded="custom-rounded"
                image-shadow="custom-shadow"
                image-size="custom-size"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width table-filter" data-ref="nameButton" data-priority="5" data-label="label">
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button-nameButton" @click.stop="onButtonClick('nameButton')" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <span>label</span>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open == 'nameButton'" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-nameButton" data-ref="nameButton" data-value="" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-value="1" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing">
                                <img src="image.png" alt="" class="custom-border custom-other custom-padding custom-rounded custom-shadow custom-size">
                                <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">A</span>
                            </div>
                        </li>
                    </ul>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
