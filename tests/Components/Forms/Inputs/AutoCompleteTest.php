<?php

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class AutoCompleteTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-autocomplete.background', 'background');
        Config::set('themes.default.input-autocomplete.border', 'border');
        Config::set('themes.default.input-autocomplete.color', 'color');
        Config::set('themes.default.input-autocomplete.font', 'font');
        Config::set('themes.default.input-autocomplete.other', 'other');
        Config::set('themes.default.input-autocomplete.padding', 'padding');
        Config::set('themes.default.input-autocomplete.rounded', 'rounded');
        Config::set('themes.default.input-autocomplete.shadow', 'shadow');
        Config::set('themes.default.input-autocomplete.width', 'width');

        Config::set('themes.default.input-autocomplete.dropdown-background', 'dropdown-background');
        Config::set('themes.default.input-autocomplete.dropdown-border', 'dropdown-border');
        Config::set('themes.default.input-autocomplete.dropdown-color', 'dropdown-color');
        Config::set('themes.default.input-autocomplete.dropdown-other', 'dropdown-other');
        Config::set('themes.default.input-autocomplete.dropdown-padding', 'dropdown-padding');
        Config::set('themes.default.input-autocomplete.dropdown-rounded', 'dropdown-rounded');
        Config::set('themes.default.input-autocomplete.dropdown-shadow', 'dropdown-shadow');
        Config::set('themes.default.input-autocomplete.dropdown-width', 'dropdown-width');

        Config::set('themes.default.input-autocomplete.icon-background', 'icon-background');
        Config::set('themes.default.input-autocomplete.icon-border', 'icon-border');
        Config::set('themes.default.input-autocomplete.icon-color', 'icon-color');
        Config::set('themes.default.input-autocomplete.icon-other', 'icon-other');
        Config::set('themes.default.input-autocomplete.icon-padding', 'icon-padding');
        Config::set('themes.default.input-autocomplete.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input-autocomplete.icon-shadow', 'icon-shadow');
        Config::set('themes.default.input-autocomplete.icon-size', 'icon-size');

        Config::set('themes.default.input-autocomplete.image-border', 'image-border');
        Config::set('themes.default.input-autocomplete.image-other', 'image-other');
        Config::set('themes.default.input-autocomplete.image-padding', 'image-padding');
        Config::set('themes.default.input-autocomplete.image-rounded', 'image-rounded');
        Config::set('themes.default.input-autocomplete.image-shadow', 'image-shadow');
        Config::set('themes.default.input-autocomplete.image-size', 'image-size');

        Config::set('themes.default.input-autocomplete.input-background', 'input-background');
        Config::set('themes.default.input-autocomplete.input-border', 'input-border');
        Config::set('themes.default.input-autocomplete.input-color', 'input-color');
        Config::set('themes.default.input-autocomplete.input-font', 'input-font');
        Config::set('themes.default.input-autocomplete.input-other', 'input-other');
        Config::set('themes.default.input-autocomplete.input-padding', 'input-padding');
        Config::set('themes.default.input-autocomplete.input-rounded', 'input-rounded');
        Config::set('themes.default.input-autocomplete.input-shadow', 'input-shadow');

        Config::set('themes.default.input.icon-background', 'icon-background');
        Config::set('themes.default.input.icon-border', 'icon-border');
        Config::set('themes.default.input.icon-color', 'icon-color');
        Config::set('themes.default.input.icon-other', 'icon-other');
        Config::set('themes.default.input.icon-padding', 'icon-padding');
        Config::set('themes.default.input.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input.icon-shadow', 'icon-shadow');
        Config::set('themes.default.input.icon-size', 'icon-size');

        Config::set('themes.default.input-autocomplete.prompt-background', 'prompt-background');
        Config::set('themes.default.input-autocomplete.prompt-border', 'prompt-border');
        Config::set('themes.default.input-autocomplete.prompt-color', 'prompt-color');
        Config::set('themes.default.input-autocomplete.prompt-font', 'prompt-font');
        Config::set('themes.default.input-autocomplete.prompt-other', 'prompt-other');
        Config::set('themes.default.input-autocomplete.prompt-padding', 'prompt-padding');
        Config::set('themes.default.input-autocomplete.prompt-rounded', 'prompt-rounded');
        Config::set('themes.default.input-autocomplete.prompt-shadow', 'prompt-shadow');

        Config::set('themes.default.input-autocomplete.option-background', 'option-background');
        Config::set('themes.default.input-autocomplete.option-border', 'option-border');
        Config::set('themes.default.input-autocomplete.option-color', 'option-color');
        Config::set('themes.default.input-autocomplete.option-focus', 'option-focus');
        Config::set('themes.default.input-autocomplete.option-font', 'option-font');
        Config::set('themes.default.input-autocomplete.option-other', 'option-other');
        Config::set('themes.default.input-autocomplete.option-padding', 'option-padding');
        Config::set('themes.default.input-autocomplete.option-rounded', 'option-rounded');
        Config::set('themes.default.input-autocomplete.option-selected', 'option-selected');
        Config::set('themes.default.input-autocomplete.option-shadow', 'option-shadow');

        Config::set('themes.default.input-autocomplete.selected-background', 'selected-background');
        Config::set('themes.default.input-autocomplete.selected-border', 'selected-border');
        Config::set('themes.default.input-autocomplete.selected-color', 'selected-color');
        Config::set('themes.default.input-autocomplete.selected-font', 'selected-font');
        Config::set('themes.default.input-autocomplete.selected-other', 'selected-other');
        Config::set('themes.default.input-autocomplete.selected-padding', 'selected-padding');
        Config::set('themes.default.input-autocomplete.selected-rounded', 'selected-rounded');
        Config::set('themes.default.input-autocomplete.selected-shadow', 'selected-shadow');

        Config::set('themes.default.input-autocomplete.subtext-background', 'subtext-background');
        Config::set('themes.default.input-autocomplete.subtext-border', 'subtext-border');
        Config::set('themes.default.input-autocomplete.subtext-color', 'subtext-color');
        Config::set('themes.default.input-autocomplete.subtext-focus', 'subtext-focus');
        Config::set('themes.default.input-autocomplete.subtext-font', 'subtext-font');
        Config::set('themes.default.input-autocomplete.subtext-other', 'subtext-other');
        Config::set('themes.default.input-autocomplete.subtext-padding', 'subtext-padding');
        Config::set('themes.default.input-autocomplete.subtext-rounded', 'subtext-rounded');
        Config::set('themes.default.input-autocomplete.subtext-selected', 'subtext-selected');
        Config::set('themes.default.input-autocomplete.subtext-shadow', 'subtext-shadow');

        Config::set('themes.default.input-autocomplete.text-background', 'text-background');
        Config::set('themes.default.input-autocomplete.text-border', 'text-border');
        Config::set('themes.default.input-autocomplete.text-color', 'text-color');
        Config::set('themes.default.input-autocomplete.text-focus', 'text-focus');
        Config::set('themes.default.input-autocomplete.text-font', 'text-font');
        Config::set('themes.default.input-autocomplete.text-other', 'text-other');
        Config::set('themes.default.input-autocomplete.text-padding', 'text-padding');
        Config::set('themes.default.input-autocomplete.text-rounded', 'text-rounded');
        Config::set('themes.default.input-autocomplete.text-selected', 'text-selected');
        Config::set('themes.default.input-autocomplete.text-shadow', 'text-shadow');

        Config::set('themes.default.input-autocomplete.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input-autocomplete.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input-autocomplete.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input-autocomplete.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input-autocomplete.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input-autocomplete.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input-autocomplete.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input-autocomplete.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input-autocomplete.wrapper-width', 'wrapper-width');

        Config::set('themes.default.input-autocomplete.type-prompt', '::type-prompt');
        Config::set('themes.default.input-autocomplete.selected-label', '::selected');
        Config::set('themes.default.input-autocomplete.placeholder', '');
        Config::set('themes.default.input-autocomplete.icon-open', 'icon-chevron-down');
        Config::set('themes.default.input-autocomplete.icon-closer', 'icon-chevron-up');
        Config::set('themes.default.input-autocomplete.id-name', 'id');
        Config::set('themes.default.input-autocomplete.image-name', 'image');
        Config::set('themes.default.input-autocomplete.subtext-name', 'subtext');
        Config::set('themes.default.input-autocomplete.text-name', 'text');

    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                :src="[ 1 => 'France', 2 => 'Germany' ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image"}, search_url: "", lookup_url: "", conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show && ! is_ajax" @click="toggle()">
                        <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </div>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show && ! is_ajax" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                </svg>
                            </div>
                        </div>
                        <input type="hidden" name="countries" id="countries" x-model="value" />
                        <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                            <div x-show="options !== null">
                                <template x-for="(option, index) in options" :key="index">
                                    <div @click="onOptionClick(index)" :class="classOption(option.id, index)" :aria-selected="focusedOptionIndex === index">
                                        <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                            <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                            <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                <span x-text="option.text"></span>
                                                <div class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div x-show="is_ajax && options === null">
                                <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::type-prompt</span> </div>
                                <div class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selected_text"></span> </div>
                            </div>
                        </div>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"

                background="1"
                border="2"
                color="3"
                font="4"
                other="5"
                padding="6"
                rounded="7"
                shadow="8"
                width="9"

                dropdown-background="10"
                dropdown-border="11"
                dropdown-color="12"
                dropdown-other="13"
                dropdown-padding="14"
                dropdown-rounded="15"
                dropdown-shadow="16"
                dropdown-width="17"

                icon-background="20"
                icon-border="21"
                icon-color="22"
                icon-other="23"
                icon-padding="24"
                icon-rounded="25"
                icon-shadow="26"
                icon-size="27"

                image-border="30"
                image-other="31"
                image-padding="32"
                image-rounded="33"
                image-shadow="34"
                image-size="35"

                input-background="40"
                input-border="41"
                input-color="42"
                input-font="43"
                input-other="44"
                input-padding="45"
                input-rounded="46"
                input-shadow="47"

                prompt-background="50"
                prompt-border="51"
                prompt-color="52"
                prompt-font="53"
                prompt-other="54"
                prompt-padding="55"
                prompt-rounded="56"
                prompt-shadow="57"

                option-background="60"
                option-border="61"
                option-color="62"
                option-focus="63"
                option-font="64"
                option-other="65"
                option-padding="66"
                option-rounded="67"
                option-selected="68"
                option-shadow="69"

                selected-background="70"
                selected-border="71"
                selected-color="72"
                selected-font="73"
                selected-other="74"
                selected-padding="75"
                selected-rounded="76"
                selected-shadow="77"

                subtext-background="80"
                subtext-border="81"
                subtext-color="82"
                subtext-focus="83"
                subtext-font="84"
                subtext-other="85"
                subtext-padding="86"
                subtext-rounded="87"
                subtext-selected="88"
                subtext-shadow="89"

                text-background="90"
                text-border="91"
                text-color="92"
                text-focus="93"
                text-font="94"
                text-other="95"
                text-padding="96"
                text-rounded="97"
                text-selected="98"
                text-shadow="99"

                wrapper-background="100"
                wrapper-border="101"
                wrapper-color="102"
                wrapper-font="103"
                wrapper-other="104"
                wrapper-padding="105"
                wrapper-rounded="106"
                wrapper-shadow="107"
                wrapper-width="108"

                :src="[ 1 => 'France', 2 => 'Germany' ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image"}, search_url: "", lookup_url: "", conditionals: {"option-focus":"63","option-selected":"68","subtext-focus":"83","subtext-selected":"88","text-focus":"93","text-selected":"98"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}] })' x-cloak x-modelable="value" class="1 2 3 4 5 6 7 8 9">
                <div class="100 101 102 103 104 105 106 107 108" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" class="40 41 42 43 44 45 46 47" />
                    <div class="20 21 22 23 24 25 26" x-show="! show && ! is_ajax" @click="toggle()">
                        <svg class="27 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </div>
                        <div class="20 21 22 23 24 25 26" x-show="show && ! is_ajax" @click="toggle()">
                            <svg class="27 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                </svg>
                            </div>
                        </div>
                        <input type="hidden" name="countries" id="countries" x-model="value" />
                        <div x-show="isOpen()" class="10 11 12 13 14 15 16 17">
                            <div x-show="options !== null">
                                <template x-for="(option, index) in options" :key="index">
                                    <div @click="onOptionClick(index)" :class="classOption(option.id, index)" :aria-selected="focusedOptionIndex === index">
                                        <div class="60 61 62 64 65 66 67 69" :class="classText(option.id, index)">
                                            <img class="30 31 32 33 34 35" x-bind:src="option.image" x-show="option.image !== null">
                                            <div class="90 91 92 94 95 96 97 99">
                                                <span x-text="option.text"></span>
                                                <div class="80 81 82 84 85 86 87 89" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div x-show="is_ajax && options === null">
                                <div class="50 51 52 53 54 55 56 57"> <span>::type-prompt</span> </div>
                                <div class="70 71 72 73 74 75 76 77"> <span>::selected</span> <span>:</span> <span x-text="selected_text"></span> </div>
                            </div>
                        </div>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"

                background="none"
                border="none"
                color="none"
                font="none"
                other="none"
                padding="none"
                rounded="none"
                shadow="none"
                width="none"

                dropdown-background="none"
                dropdown-border="none"
                dropdown-color="none"
                dropdown-other="none"
                dropdown-padding="none"
                dropdown-rounded="none"
                dropdown-shadow="none"
                dropdown-width="none"

                icon-background="none"
                icon-border="none"
                icon-color="none"
                icon-other="none"
                icon-padding="none"
                icon-rounded="none"
                icon-shadow="none"
                icon-size="none"

                image-border="none"
                image-other="none"
                image-padding="none"
                image-rounded="none"
                image-shadow="none"
                image-size="none"

                input-background="none"
                input-border="none"
                input-color="none"
                input-font="none"
                input-other="none"
                input-padding="none"
                input-rounded="none"
                input-shadow="none"

                prompt-background="none"
                prompt-border="none"
                prompt-color="none"
                prompt-font="none"
                prompt-other="none"
                prompt-padding="none"
                prompt-rounded="none"
                prompt-shadow="none"

                option-background="none"
                option-border="none"
                option-color="none"
                option-focus="none"
                option-font="none"
                option-other="none"
                option-padding="none"
                option-rounded="none"
                option-selected="none"
                option-shadow="none"

                selected-background="none"
                selected-border="none"
                selected-color="none"
                selected-font="none"
                selected-other="none"
                selected-padding="none"
                selected-rounded="none"
                selected-shadow="none"

                subtext-background="none"
                subtext-border="none"
                subtext-color="none"
                subtext-focus="none"
                subtext-font="none"
                subtext-other="none"
                subtext-padding="none"
                subtext-rounded="none"
                subtext-selected="none"
                subtext-shadow="none"

                text-background="none"
                text-border="none"
                text-color="none"
                text-focus="none"
                text-font="none"
                text-other="none"
                text-padding="none"
                text-rounded="none"
                text-selected="none"
                text-shadow="none"

                wrapper-background="none"
                wrapper-border="none"
                wrapper-color="none"
                wrapper-font="none"
                wrapper-other="none"
                wrapper-padding="none"
                wrapper-rounded="none"
                wrapper-shadow="none"
                wrapper-width="none"

                :src="[ 1 => 'France', 2 => 'Germany' ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image"}, search_url: "", lookup_url: "", conditionals: {"option-focus":"","option-selected":"","subtext-focus":"","subtext-selected":"","text-focus":"","text-selected":""}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}] })' x-cloak x-modelable="value" class="">
                <div class="" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" class="" />
                    <div x-show="! show && ! is_ajax" @click="toggle()">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                            </svg>
                        </div>
                        <div x-show="show && ! is_ajax" @click="toggle()">
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                </svg>
                            </div>
                        </div>
                        <input type="hidden" name="countries" id="countries" x-model="value" />
                        <div x-show="isOpen()" class="">
                            <div x-show="options !== null">
                                <template x-for="(option, index) in options" :key="index">
                                    <div @click="onOptionClick(index)" :class="classOption(option.id, index)" :aria-selected="focusedOptionIndex === index">
                                        <div class="" :class="classText(option.id, index)">
                                            <img class="" x-bind:src="option.image" x-show="option.image !== null">
                                            <div class="">
                                                <span x-text="option.text"></span>
                                                <div class="" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div x-show="is_ajax && options === null">
                                <div class=""> <span>::type-prompt</span> </div>
                                <div class=""> <span>::selected</span> <span>:</span> <span x-text="selected_text"></span> </div>
                            </div>
                        </div>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}