<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class SelectTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-select.please-select-text', 'Please Select ...');
        Config::set('themes.default.input-select.please-select-value', null);
        Config::set('themes.default.input-select.please-select-trans', '');

        Config::set('themes.default.input-select.button-background', 'button-background');
        Config::set('themes.default.input-select.button-border', 'button-border');
        Config::set('themes.default.input-select.button-color', 'button-color');
        Config::set('themes.default.input-select.button-font', 'button-font');
        Config::set('themes.default.input-select.button-other', 'button-other');
        Config::set('themes.default.input-select.button-padding', 'button-padding');
        Config::set('themes.default.input-select.button-rounded', 'button-rounded');
        Config::set('themes.default.input-select.button-shadow', 'button-shadow');
        Config::set('themes.default.input-select.button-width', 'button-width');

        Config::set('themes.default.input-select.check-background', 'check-background');
        Config::set('themes.default.input-select.check-border', 'check-border');
        Config::set('themes.default.input-select.check-color', 'check-color');
        Config::set('themes.default.input-select.check-font', 'check-font');
        Config::set('themes.default.input-select.check-other', 'check-other');
        Config::set('themes.default.input-select.check-padding', 'check-padding');
        Config::set('themes.default.input-select.check-rounded', 'check-rounded');
        Config::set('themes.default.input-select.check-shadow', 'check-shadow');
        Config::set('themes.default.input-select.check-active', 'check-active');
        Config::set('themes.default.input-select.check-inactive', 'check-inactive');
        Config::set('themes.default.input-select.check-icon', 'icon.check');
        Config::set('themes.default.input-select.check-icon-size', 'check-icon-size');

        Config::set('themes.default.input-select.icon', 'icon.chevron-down');
        Config::set('themes.default.input-select.icon-background', 'icon-background');
        Config::set('themes.default.input-select.icon-border', 'icon-border');
        Config::set('themes.default.input-select.icon-color', 'icon-color');
        Config::set('themes.default.input-select.icon-other', 'icon-other');
        Config::set('themes.default.input-select.icon-padding', 'icon-padding');
        Config::set('themes.default.input-select.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input-select.icon-shadow', 'icon-shadow');
        Config::set('themes.default.input-select.icon-size', 'icon-size');

        Config::set('themes.default.input-select.image-border', 'image-border');
        Config::set('themes.default.input-select.image-other', 'image-other');
        Config::set('themes.default.input-select.image-padding', 'image-padding');
        Config::set('themes.default.input-select.image-rounded', 'image-rounded');
        Config::set('themes.default.input-select.image-shadow', 'image-shadow');
        Config::set('themes.default.input-select.image-size', 'image-size');

        Config::set('themes.default.input-select.list-background', 'list-background');
        Config::set('themes.default.input-select.list-border', 'list-border');
        Config::set('themes.default.input-select.list-color', 'list-color');
        Config::set('themes.default.input-select.list-font', 'list-font');
        Config::set('themes.default.input-select.list-other', 'list-other');
        Config::set('themes.default.input-select.list-padding', 'list-padding');
        Config::set('themes.default.input-select.list-rounded', 'list-rounded');
        Config::set('themes.default.input-select.list-shadow', 'list-shadow');
        Config::set('themes.default.input-select.list-width', 'list-width');

        Config::set('themes.default.input-select.option-background', 'option-background');
        Config::set('themes.default.input-select.option-border', 'option-border');
        Config::set('themes.default.input-select.option-color', 'option-color');
        Config::set('themes.default.input-select.option-font', 'option-font');
        Config::set('themes.default.input-select.option-other', 'option-other');
        Config::set('themes.default.input-select.option-padding', 'option-padding');
        Config::set('themes.default.input-select.option-rounded', 'option-rounded');
        Config::set('themes.default.input-select.option-shadow', 'option-shadow');
        Config::set('themes.default.input-select.option-spacing', 'option-spacing');
        Config::set('themes.default.input-select.option-active', 'option-active');
        Config::set('themes.default.input-select.option-inactive', 'option-inactive');

        Config::set('themes.default.input-select.text-background', 'text-background');
        Config::set('themes.default.input-select.text-border', 'text-border');
        Config::set('themes.default.input-select.text-color', 'text-color');
        Config::set('themes.default.input-select.text-font', 'text-font');
        Config::set('themes.default.input-select.text-other', 'text-other');
        Config::set('themes.default.input-select.text-padding', 'text-padding');
        Config::set('themes.default.input-select.text-rounded', 'text-rounded');
        Config::set('themes.default.input-select.text-shadow', 'text-shadow');
        Config::set('themes.default.input-select.text-active', 'text-active');
        Config::set('themes.default.input-select.text-inactive', 'text-inactive');

        Config::set('themes.default.input-select.subtext-background', 'subtext-background');
        Config::set('themes.default.input-select.subtext-border', 'subtext-border');
        Config::set('themes.default.input-select.subtext-color', 'subtext-color');
        Config::set('themes.default.input-select.subtext-font', 'subtext-font');
        Config::set('themes.default.input-select.subtext-other', 'subtext-other');
        Config::set('themes.default.input-select.subtext-padding', 'subtext-padding');
        Config::set('themes.default.input-select.subtext-rounded', 'subtext-rounded');
        Config::set('themes.default.input-select.subtext-shadow', 'subtext-shadow');
        Config::set('themes.default.input-select.subtext-active', 'subtext-active');
        Config::set('themes.default.input-select.subtext-inactive', 'subtext-inactive');

    }

    /** @test */
    public function an_input_select_component_can_be_rendered_in_key_value_format(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_in_array_key_value_format(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1 => ['text' => 'English'], 2 => ['text' => 'Spanish'] ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_in_text_key_value_format(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 'en' => 'English', 'es' => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="en" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="es" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_custom_button_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                button-background="custom-background"
                button-border="custom-border"
                button-color="custom-color"
                button-font="custom-font"
                button-other="custom-other"
                button-padding="custom-padding"
                button-rounded="custom-rounded"
                button-shadow="custom-shadow"
                button-width="custom-width"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="custom-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow custom-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_no_button_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                button-background="none"
                button-border="none"
                button-color="none"
                button-font="none"
                button-other="none"
                button-padding="none"
                button-rounded="none"
                button-shadow="none"
                button-width="none"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class=" relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_custom_list_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                list-background="custom-background"
                list-border="custom-border"
                list-color="custom-color"
                list-font="custom-font"
                list-other="custom-other"
                list-padding="custom-padding"
                list-rounded="custom-rounded"
                list-shadow="custom-shadow"
                list-width="custom-width"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow custom-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_no_list_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                list-background="none"
                list-border="none"
                list-color="none"
                list-font="none"
                list-other="none"
                list-padding="none"
                list-rounded="none"
                list-shadow="none"
                list-width="none"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_custom_option_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
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
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'custom-active': activeIndex === 0, 'custom-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center custom-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'custom-active': activeIndex === 1, 'custom-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center custom-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'custom-active': activeIndex === 2, 'custom-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center custom-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_no_option_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
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
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ '': activeIndex === 0, '': !(activeIndex === 0) }">
                            <div class="flex items-center "> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ '': activeIndex === 1, '': !(activeIndex === 1) }">
                                <div class="flex items-center "> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ '': activeIndex === 2, '': !(activeIndex === 2) }">
                                    <div class="flex items-center "> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_custom_text_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
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
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': highlightIndex === 0, 'custom-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': highlightIndex === 1, 'custom-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': highlightIndex === 2, 'custom-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_no_text_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
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
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class=""></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="" :class="{ '': highlightIndex === 0, '': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="" :class="{ '': highlightIndex === 1, '': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="" :class="{ '': highlightIndex === 2, '': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_custom_subtext_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
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
                :options="[
                    1 => ['text' => 'English', 'subtext' => '::subtext1'],
                    2 => ['text' => 'Spanish', 'subtext' => '::subtext2'],
                ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="::subtext1" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> <span class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': highlightIndex === 1, 'custom-inactive': !(highlightIndex === 1) }">::subtext1</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="::subtext2" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> <span class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': highlightIndex === 2, 'custom-inactive': !(highlightIndex === 2) }">::subtext2</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_no_subtext_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
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
                :options="[
                    1 => ['text' => 'English', 'subtext' => '::subtext1'],
                    2 => ['text' => 'Spanish', 'subtext' => '::subtext2'],
                ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class=""></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="::subtext1" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> <span class="" :class="{ '': highlightIndex === 1, '': !(highlightIndex === 1) }">::subtext1</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="::subtext2" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> <span class="" :class="{ '': highlightIndex === 2, '': !(highlightIndex === 2) }">::subtext2</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_custom_check_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                check-background="custom-background"
                check-border="custom-border"
                check-color="custom-color"
                check-font="custom-font"
                check-icon="icon.dot"
                check-icon-size="custom-icon-size"
                check-other="custom-other"
                check-padding="custom-padding"
                check-rounded="custom-rounded"
                check-shadow="custom-shadow"
                check-active="custom-active"
                check-inactive="custom-inactive"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': activeIndex === 0, 'custom-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="custom-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="3" r="3"/>
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': activeIndex === 1, 'custom-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="custom-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="3" cy="3" r="3"/>
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow" :class="{ 'custom-active': activeIndex === 2, 'custom-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="custom-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
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
    public function an_input_select_component_can_be_rendered_with_no_check_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                check-background="none"
                check-border="none"
                check-color="none"
                check-font="none"
                check-other="none"
                check-padding="none"
                check-rounded="none"
                check-shadow="none"
                check-active="none"
                check-inactive="none"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="" :class="{ '': activeIndex === 0, '': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="" :class="{ '': activeIndex === 1, '': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="" :class="{ '': activeIndex === 2, '': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_custom_icon_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                icon-background="custom-background"
                icon-border="custom-border"
                icon-color="custom-color"
                icon="icon.dot"
                icon-other="custom-other"
                icon-padding="custom-padding"
                icon-rounded="custom-rounded"
                icon-shadow="custom-shadow"
                icon-size="custom-size"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="custom-background custom-border custom-color custom-other custom-padding custom-rounded custom-shadow">
                        <svg class="custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_no_icon_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                icon-background="none"
                icon-border="none"
                icon-color="none"
                icon-other="none"
                icon-padding="none"
                icon-rounded="none"
                icon-shadow="none"
                icon-size="none"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_subtext(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[
                    1 => ['text' => 'English', 'subtext' => '::subtext1'],
                    2 => ['text' => 'Spanish', 'subtext' => '::subtext2'],
                ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="::subtext1" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 1, 'subtext-inactive': !(highlightIndex === 1) }">::subtext1</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="::subtext2" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 2, 'subtext-inactive': !(highlightIndex === 2) }">::subtext2</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_bespoke_subtext_name(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                subtext="some-name"
                :options="[
                    1 => ['text' => 'English', 'some-name' => '::subtext1'],
                    2 => ['text' => 'Spanish', 'some-name' => '::subtext2'],
                ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="::subtext1" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 1, 'subtext-inactive': !(highlightIndex === 1) }">::subtext1</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="::subtext2" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 2, 'subtext-inactive': !(highlightIndex === 2) }">::subtext2</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_bespoke_text_name(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                text="some-name"
                :options="[
                    1 => ['some-name' => 'English', 'subtext' => '::subtext1'],
                    2 => ['some-name' => 'Spanish', 'subtext' => '::subtext2'],
                ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="::subtext1" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 1, 'subtext-inactive': !(highlightIndex === 1) }">::subtext1</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-subtext="::subtext2" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> <span class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="{ 'subtext-active': highlightIndex === 2, 'subtext-inactive': !(highlightIndex === 2) }">::subtext2</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_image(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[
                    1 => ['text' => 'English', 'image' => 'english.jpg'],
                    2 => ['text' => 'Spanish', 'image' => 'spanish.jpg'],
                ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-image="english.jpg" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing">
                                    <img src="english.jpg" alt="" class="image-border image-other image-padding image-rounded image-shadow image-size">
                                    <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span>
                                </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-image="spanish.jpg" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing">
                                        <img src="spanish.jpg" alt="" class="image-border image-other image-padding image-rounded image-shadow image-size">
                                        <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span>
                                    </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_image_name(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                image="image-url"
                :options="[
                    1 => ['text' => 'English', 'image-url' => 'english.jpg'],
                    2 => ['text' => 'Spanish', 'image-url' => 'spanish.jpg'],
                ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-image="english.jpg" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing">
                                    <img src="english.jpg" alt="" class="image-border image-other image-padding image-rounded image-shadow image-size">
                                    <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span>
                                </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-image="spanish.jpg" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing">
                                        <img src="spanish.jpg" alt="" class="image-border image-other image-padding image-rounded image-shadow image-size">
                                        <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span>
                                    </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_image_and_custom_image_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                image-border="custom-border"
                image-other="custom-other"
                image-padding="custom-padding"
                image-rounded="custom-rounded"
                image-shadow="custom-shadow"
                image-size="custom-size"
                :options="[
                    1 => ['text' => 'English', 'image' => 'english.jpg'],
                    2 => ['text' => 'Spanish', 'image' => 'spanish.jpg'],
                ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="custom-border custom-other custom-padding custom-rounded custom-shadow custom-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-image="english.jpg" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing">
                                    <img src="english.jpg" alt="" class="custom-border custom-other custom-padding custom-rounded custom-shadow custom-size">
                                    <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span>
                                </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-image="spanish.jpg" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing">
                                        <img src="spanish.jpg" alt="" class="custom-border custom-other custom-padding custom-rounded custom-shadow custom-size">
                                        <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span>
                                    </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_image_and_no_image_styles(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                image-border="none"
                image-other="none"
                image-padding="none"
                image-rounded="none"
                image-shadow="none"
                image-size="none"
                :options="[
                    1 => ['text' => 'English', 'image' => 'english.jpg'],
                    2 => ['text' => 'Spanish', 'image' => 'spanish.jpg'],
                ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Please Select ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Please Select ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-image="english.jpg" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing">
                                    <img src="english.jpg" alt="" class="">
                                    <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span>
                                </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-image="spanish.jpg" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing">
                                        <img src="spanish.jpg" alt="" class="">
                                        <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span>
                                    </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_as_required(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
                required
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: 1 })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" value="1" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">English</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">Spanish</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_please_select_text(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
                please-select="Select Language ..."
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: null })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Select Language ..." data-value="" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Select Language ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_array_please_select_value_and_text(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
                :please-select="['text' => 'Select Language ...', 'value' => 0]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: 0 })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" value="0" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Select Language ..." data-value="0" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">Select Language ...</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_please_select_value_text_and_trans_via_array(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
                :please-select="['text' => 'Select Language ...', 'value' => 0, 'trans' => 'ui.please-select']"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: 0 })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" value="0" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="ui.please-select" data-value="0" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">ui.please-select</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_please_select_value_and_text_set_in_config(): void
    {
        Config::set('themes.default.input-select.please-select-value', '::please-select-value');
        Config::set('themes.default.input-select.please-select-text', '::please-select-text');

        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: '::please-select-value' })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" value="::please-select-value" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="::please-select-text" data-value="::please-select-value" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">::please-select-text</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_please_select_value_and_lang_string_set_in_config(): void
    {
        Config::set('themes.default.input-select.please-select-value', '::please-select-value');
        Config::set('themes.default.input-select.please-select-text', '::please-select-text');
        Config::set('themes.default.input-select.please-select-trans', 'ui.please-select');

        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: '::please-select-value' })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" value="::please-select-value" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="ui.please-select" data-value="::please-select-value" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">ui.please-select</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_please_select_value_and_lang_string_set_in_config_with_overriding_inline_please_select(): void
    {
        Config::set('themes.default.input-select.please-select-value', '::please-select-value');
        Config::set('themes.default.input-select.please-select-text', '::please-select-text');
        Config::set('themes.default.input-select.please-select-trans', 'ui.please-select');

        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
                please-select="::please-select"
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: '::please-select-value' })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" value="::please-select-value" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="::please-select" data-value="::please-select-value" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">::please-select</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">English</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                                <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(2)" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 2, 'option-inactive': !(activeIndex === 2) }">
                                    <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 2, 'text-inactive': !(highlightIndex === 2) }">Spanish</span> </div>
                                    <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 2, 'check-inactive': !(activeIndex === 2) }" x-show="highlightIndex === 2">
                                        <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_in_key_value_format_with_a_selected_value_and_required(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
                value="2"
                required
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: 2 })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" value="2" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="English" data-value="1" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">English</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="Spanish" data-value="2" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">Spanish</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_basic_int_array(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 1, 2 ]"
                value="2"
                required
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: 2 })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" value="2" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="1" data-value="0" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">1</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="2" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">2</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
    public function an_input_select_component_can_be_rendered_with_basic_string_array(): void
    {
        $template = <<<HTML
            <x-input.select
                name="language"
                :options="[ 'a', 'b' ]"
                value="2"
                required
            />
            HTML;

        $expected = <<<HTML
            <div x-cloak x-data="Components.listbox({ id: 'language', value: 2 })" x-init="init()" class="button-width relative">
                <input type="hidden" name="language" id="language" value="2" x-model="value" x-on:change="onValueChange()" />
                <button type="button" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
                    <div class="flex items-center">
                        <img x-show="image !== undefined" :src="image" class="image-border image-other image-padding image-rounded image-shadow image-size">
                        <span x-text="text" class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow"></span> <span x-text="subtext" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow"></span>
                    </div>
                    <span class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </span>
                    </button>
                    <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="list-background list-border list-color list-font list-other list-padding list-rounded list-shadow list-width" x-max="1" @click.away="open = false" @keydown.enter.stop.prevent="onKeyboardSelect()" @keydown.space.stop.prevent="onKeyboardSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox-language" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                        <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="a" data-value="0" @click="onMouseSelect(0)" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 0, 'option-inactive': !(activeIndex === 0) }">
                            <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 0, 'text-inactive': !(highlightIndex === 0) }">a</span> </div>
                            <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 0, 'check-inactive': !(activeIndex === 0) }" x-show="highlightIndex === 0">
                                <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                    </svg>
                                </span>
                            </li>
                            <li class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" role="option" data-text="b" data-value="1" @click="onMouseSelect(1)" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = null" :class="{ 'option-active': activeIndex === 1, 'option-inactive': !(activeIndex === 1) }">
                                <div class="flex items-center option-spacing"> <span class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow" :class="{ 'text-active': highlightIndex === 1, 'text-inactive': !(highlightIndex === 1) }">b</span> </div>
                                <span class="check-background check-border check-color check-font check-other check-padding check-rounded check-shadow" :class="{ 'check-active': activeIndex === 1, 'check-inactive': !(activeIndex === 1) }" x-show="highlightIndex === 1">
                                    <svg class="check-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                        </svg>
                                    </span>
                                </li>
                            </ul>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
