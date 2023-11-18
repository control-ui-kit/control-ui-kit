<?php

namespace Tests\Components\Forms\Inputs;

use ControlUIKit\AutoComplete;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\ViewException;
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

        Config::set('themes.default.input-autocomplete.clear-background', 'clear-background');
        Config::set('themes.default.input-autocomplete.clear-border', 'clear-border');
        Config::set('themes.default.input-autocomplete.clear-color', 'clear-color');
        Config::set('themes.default.input-autocomplete.clear-other', 'clear-other');
        Config::set('themes.default.input-autocomplete.clear-padding', 'clear-padding');
        Config::set('themes.default.input-autocomplete.clear-rounded', 'clear-rounded');
        Config::set('themes.default.input-autocomplete.clear-shadow', 'clear-shadow');
        Config::set('themes.default.input-autocomplete.clear-size', 'clear-size');

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

        Config::set('themes.default.input-autocomplete.no-results-text', '::no-results');
        Config::set('themes.default.input-autocomplete.prompt-text', '::prompt-text');
        Config::set('themes.default.input-autocomplete.selected-text', '::selected');
        Config::set('themes.default.input-autocomplete.placeholder', '');

        Config::set('themes.default.input-autocomplete.icon-open', 'icon-chevron-down');
        Config::set('themes.default.input-autocomplete.icon-close', 'icon-chevron-up');

        Config::set('themes.default.input-autocomplete.ajax-limit', 20);
        Config::set('themes.default.input-autocomplete.ajax-chars', 2);
        Config::set('themes.default.input-autocomplete.url-id', '__id__');
        Config::set('themes.default.input-autocomplete.url-search', '__term__');
        Config::set('themes.default.input-autocomplete.url-limit', '__limit__');

        Config::set('themes.default.input-autocomplete.data-limit', 999);
        Config::set('themes.default.input-autocomplete.data-chars', 1);

        Config::set('themes.default.input-autocomplete.option-value', 'id');
        Config::set('themes.default.input-autocomplete.option-image', 'image');
        Config::set('themes.default.input-autocomplete.option-subtext', 'subtext');
        Config::set('themes.default.input-autocomplete.option-text', 'text');
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
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
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

                clear-background="110"
                clear-border="111"
                clear-color="112"
                clear-other="113"
                clear-padding="114"
                clear-rounded="115"
                clear-shadow="116"
                clear-size="117"

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
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"63","option-selected":"68","subtext-focus":"83","subtext-selected":"88","text-focus":"93","text-selected":"98"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="1 2 3 4 5 6 7 8 9">
                <div class="100 101 102 103 104 105 106 107 108" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="40 41 42 43 44 45 46 47" />
                    <svg class="117 fill-current 110 111 112 113 114 115 116" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="20 21 22 23 24 25 26" x-show="! show" @click="toggle()">
                            <svg class="27 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="20 21 22 23 24 25 26" x-show="show" @click="toggle()">
                                <svg class="27 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="10 11 12 13 14 15 16 17">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="60 61 62 64 65 66 67 69" :class="classText(option.id, index)">
                                                <img class="30 31 32 33 34 35" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="90 91 92 94 95 96 97 99">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="80 81 82 84 85 86 87 89" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="50 51 52 53 54 55 56 57"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="50 51 52 53 54 55 56 57"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="70 71 72 73 74 75 76 77"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
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

                clear-background="none"
                clear-border="none"
                clear-color="none"
                clear-other="none"
                clear-padding="none"
                clear-rounded="none"
                clear-shadow="none"
                clear-size="none"

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
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"","option-selected":"","subtext-focus":"","subtext-selected":"","text-focus":"","text-selected":""}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="">
                <div class="" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="" />
                    <svg class="fill-current" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div x-show="! show" @click="toggle()">
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div x-show="show" @click="toggle()">
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="" :class="classText(option.id, index)">
                                                <img class="" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class=""> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class=""> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class=""> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_multi_dimensional_array_data(): void
    {
        Config::set('themes.default.input-autocomplete.id-name', 'id');
        Config::set('themes.default.input-autocomplete.text-name', 'text');
        Config::set('themes.default.input-autocomplete.subtext-name', 'subtext');
        Config::set('themes.default.input-autocomplete.image-name', 'image');

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                :src="[
                    ['id' => 16, 'text' => 'English', 'subtext' => 'GB', 'image' => 'https://cdn.label-worx.com/media/flags/GB.png'],
                    ['id' => 34, 'text' => 'German', 'subtext' => 'DE', 'image' => 'https://cdn.label-worx.com/media/flags/DE.png'],
                ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":16,"text":"English","sub":"GB","image":"https:\/\/cdn.label-worx.com\/media\/flags\/GB.png"},{"id":34,"text":"German","sub":"DE","image":"https:\/\/cdn.label-worx.com\/media\/flags\/DE.png"}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_multi_dimensional_collection_data(): void
    {
        Config::set('themes.default.input-autocomplete.id-name', 'id');
        Config::set('themes.default.input-autocomplete.text-name', 'text');
        Config::set('themes.default.input-autocomplete.subtext-name', 'subtext');
        Config::set('themes.default.input-autocomplete.image-name', 'image');

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                :src="collect([
                    ['id' => 16, 'text' => 'English', 'subtext' => 'GB', 'image' => 'https://cdn.label-worx.com/media/flags/GB.png'],
                    ['id' => 34, 'text' => 'German', 'subtext' => 'DE', 'image' => 'https://cdn.label-worx.com/media/flags/DE.png'],
                ])"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":16,"text":"English","sub":"GB","image":"https:\/\/cdn.label-worx.com\/media\/flags\/GB.png"},{"id":34,"text":"German","sub":"DE","image":"https:\/\/cdn.label-worx.com\/media\/flags\/DE.png"}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_multi_dimensional_array_data_with_option_inline_text_overrides(): void
    {
        Config::set('themes.default.input-autocomplete.id-name', 'id');
        Config::set('themes.default.input-autocomplete.text-name', 'text');
        Config::set('themes.default.input-autocomplete.subtext-name', 'subtext');
        Config::set('themes.default.input-autocomplete.image-name', 'image');

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                option-value="key"
                option-text="label"
                option-subtext="iso"
                option-image="flag"
                :src="[
                    ['key' => 16, 'label' => 'English', 'iso' => 'GB', 'flag' => 'https://cdn.label-worx.com/media/flags/GB.png'],
                    ['key' => 34, 'label' => 'German', 'iso' => 'DE', 'flag' => 'https://cdn.label-worx.com/media/flags/DE.png'],
                ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"key","text":"label","subtext":"iso","image":"flag","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":16,"text":"English","sub":"GB","image":"https:\/\/cdn.label-worx.com\/media\/flags\/GB.png"},{"id":34,"text":"German","sub":"DE","image":"https:\/\/cdn.label-worx.com\/media\/flags\/DE.png"}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_multi_dimensional_array_data_with_options_string_overrides(): void
    {
        Config::set('themes.default.input-autocomplete.id-name', 'id');
        Config::set('themes.default.input-autocomplete.text-name', 'text');
        Config::set('themes.default.input-autocomplete.subtext-name', 'subtext');
        Config::set('themes.default.input-autocomplete.image-name', 'image');

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                options="key|label|iso|flag"
                :src="[
                    ['key' => 16, 'label' => 'English', 'iso' => 'GB', 'flag' => 'https://cdn.label-worx.com/media/flags/GB.png'],
                    ['key' => 34, 'label' => 'German', 'iso' => 'DE', 'flag' => 'https://cdn.label-worx.com/media/flags/DE.png'],
                ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"key","text":"label","subtext":"iso","image":"flag","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":16,"text":"English","sub":"GB","image":"https:\/\/cdn.label-worx.com\/media\/flags\/GB.png"},{"id":34,"text":"German","sub":"DE","image":"https:\/\/cdn.label-worx.com\/media\/flags\/DE.png"}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_ajax_url(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                src="https://api.control-ui-kit.com/term"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: {"search_url":"https:\/\/api.control-ui-kit.com\/term","lookup_url":null,"id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_exception_is_thrown_if_an_autocomplete_component_is_configured_for_ajax_and_value_with_no_lookup_or_selected_text(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Value specified without lookup or selected text');

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                src="https://api.control-ui-kit.com/term"
                value="2"
            />
            HTML;

        $this->blade($template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_ajax_url_and_inline_search_url_field(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                src="https://api.control-ui-kit.com/search-term"
                url-search="search-term"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: {"search_url":"https:\/\/api.control-ui-kit.com\/search-term","lookup_url":null,"id_string":"__id__","search_string":"search-term","limit_string":"__limit__"}, conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_ajax_lookup_and_inline_url_id_field(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                src="https://api.control-ui-kit.com/term"
                lookup="https://api.control-ui-kit.com/lookup/id-term"
                url-id="id-term"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: {"search_url":"https:\/\/api.control-ui-kit.com\/term","lookup_url":"https:\/\/api.control-ui-kit.com\/lookup\/id-term","id_string":"id-term","search_string":"__term__","limit_string":"__limit__"}, conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_ajax_preload_query(): void
    {
        Http::fake([
            'https://api.control-ui-kit.com*' => Http::response([
                ['id' => 16, 'text' => 'English', 'subtext' => 'GB', 'image' => 'https://cdn.label-worx.com/media/flags/GB.png'],
                ['id' => 34, 'text' => 'German', 'subtext' => 'DE', 'image' => 'https://cdn.label-worx.com/media/flags/DE.png'],
            ]),
        ]);

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                src="https://api.control-ui-kit.com/preload"
                preload
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":16,"text":"English","sub":"GB","image":"https:\/\/cdn.label-worx.com\/media\/flags\/GB.png"},{"id":34,"text":"German","sub":"DE","image":"https:\/\/cdn.label-worx.com\/media\/flags\/DE.png"}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);

        Http::assertSent(static function (Request $request) {
            return $request->url() === 'https://api.control-ui-kit.com/preload';
        });
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_ajax_focus_query(): void
    {
        Http::fake([
            'https://api.control-ui-kit.com/focus' => Http::response([
                ['id' => 16, 'text' => 'English', 'subtext' => 'GB', 'image' => 'https://cdn.label-worx.com/media/flags/GB.png'],
                ['id' => 34, 'text' => 'German', 'subtext' => 'DE', 'image' => 'https://cdn.label-worx.com/media/flags/DE.png'],
            ]),
        ]);

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                src="https://api.control-ui-kit.com/countries"
                focus="https://api.control-ui-kit.com/focus"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: {"search_url":"https:\/\/api.control-ui-kit.com\/countries","lookup_url":null,"id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [], focus: [{"id":16,"text":"English","sub":"GB","image":"https:\/\/cdn.label-worx.com\/media\/flags\/GB.png"},{"id":34,"text":"German","sub":"DE","image":"https:\/\/cdn.label-worx.com\/media\/flags\/DE.png"}] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);

        Http::assertSent(static function (Request $request) {
            return $request->url() === 'https://api.control-ui-kit.com/focus';
        });
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_ajax_and_value_and_selected(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                src="https://api.control-ui-kit.com/countries"
                selected="USA"
                value="16"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "16", filter: "USA", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: {"search_url":"https:\/\/api.control-ui-kit.com\/countries","lookup_url":null,"id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_custom_icons(): void
    {
        Config::set('themes.default.input-autocomplete.icon-open', 'icon-dot');
        Config::set('themes.default.input-autocomplete.icon-close', 'icon-dot');
        Config::set('themes.default.input-autocomplete.icon-clear', 'icon-dot');

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                :src="[ 1 => 'France', 2 => 'Germany' ]"
                icon-open="icon-chevron-down"
                icon-close="icon-chevron-up"
                icon-clear="icon-close"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_placeholder(): void
    {
        Config::set('themes.default.input-autocomplete.placeholder', '');

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                :src="[ 1 => 'France', 2 => 'Germany' ]"
                placeholder="Please Select..."
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" placeholder="Please Select..." class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_custom_texts(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                no-results-text="111"
                prompt-text="222"
                selected-text="333"
                :src="[ 1 => 'France', 2 => 'Germany' ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> 111 '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>222</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>333</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_data_limit_restriction(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                :src="[ 1 => 'France', 2 => 'Germany' ]"
                limit="1"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":1,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_ajax_limit_restrictions(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                src="https://api.control-ui-kit.com/search-term"
                limit="4"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":4,"min":2}, ajax: {"search_url":"https:\/\/api.control-ui-kit.com\/search-term","lookup_url":null,"id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_data_and_min_char_change(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                :src="[ 1 => 'France', 2 => 'Germany' ]"
                min-chars="3"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":3}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_ajax_and_min_char_change(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                src="https://api.control-ui-kit.com/search-term"
                min-chars="4"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":4}, ajax: {"search_url":"https:\/\/api.control-ui-kit.com\/search-term","lookup_url":null,"id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_class_type(): void
    {
        Config::set('autocompletes', [
            'countries' => CountriesAutoComplete::class,
        ]);

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                type="countries"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: {"search_url":"http:\/\/localhost\/control-ui-kit\/ajax-class?query=search&type=countries&term=__term__&limit=__limit__","lookup_url":"http:\/\/localhost\/control-ui-kit\/ajax-class?query=lookup&type=countries&value=__id__","id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_class_type_with_preload(): void
    {
        Http::fake([
            '*' => [
                0 => [
                    'id' => 1,
                    'text' => 'USA',
                    'sub' => null,
                    'image' => null,
                ],
            ],
        ]);

        Config::set('autocompletes', [
            'countries' => CountriesPreloadAutoComplete::class,
        ]);

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                type="countries"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":1,"text":"USA","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);

        Schema::dropIfExists('countries');
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_class_type_with_focus(): void
    {
        Http::fake([
            '*' => [
                0 => [
                    'id' => 1,
                    'text' => 'USA',
                    'sub' => null,
                    'image' => null,
                ],
            ],
        ]);

        Config::set('autocompletes', [
            'countries' => CountriesFocusAutoComplete::class,
        ]);

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                type="countries"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":20,"min":2}, ajax: {"search_url":"http:\/\/localhost\/control-ui-kit\/ajax-class?query=search&type=countries&term=__term__&limit=__limit__","lookup_url":"http:\/\/localhost\/control-ui-kit\/ajax-class?query=lookup&type=countries&value=__id__","id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [], focus: [{"id":1,"text":"USA","sub":null,"image":null}] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);

        Schema::dropIfExists('countries');
    }

    /** @test */
    public function an_exception_is_thrown_if_the_autocompletes_config_is_not_found(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('autocomplete config not found - run php artisan vendor:publish --tag=control-ui-kit-autocomplete');

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                type="unknown"
            />
            HTML;

        $this->blade($template);
    }

    /** @test */
    public function an_exception_is_thrown_if_the_type_is_not_a_registered_autocomplete(): void
    {
        Config::set('autocompletes', [
            'countries' => CountriesAutoComplete::class,
        ]);

        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Invalid autocomplete type : unknown');

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                type="unknown"
            />
            HTML;

        $this->blade($template);
    }

    /** @test */
    public function an_exception_is_thrown_if_the_register_type_is_not_a_valid_autocomplete_class(): void
    {
        Config::set('autocompletes', [
            'countries' => ViewException::class,
        ]);

        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Class specified is not an AutoComplete class : Illuminate\View\ViewException');

        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                type="countries"
            />
            HTML;

        $this->blade($template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                :src="[ 1 => 'France', 2 => 'Germany' ]"
                class="float-right"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width float-right">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_model_class(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                :src="$class"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":null,"image":null,"limit":20,"min":2}, ajax: {"search_url":"http:\/\/localhost\/control-ui-kit\/ajax-model?model=Tests%5CComponents%5CForms%5CInputs%5CCountry&fields%5Bf%5D=id&fields%5Bn%5D=text&preload=0&term=__term__&limit=__limit__","lookup_url":"http:\/\/localhost\/control-ui-kit\/ajax-model?model=Tests%5CComponents%5CForms%5CInputs%5CCountry&fields%5Bf%5D=id&fields%5Bn%5D=text&preload=0&value=__id__","id_string":"__id__","search_string":"__term__","limit_string":"__limit__"}, conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template, ['class' => Country::class]);
    }

    /** @test */
    public function an_autocomplete_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-autocomplete
                name="countries"
                :src="[ 1 => 'France', 2 => 'Germany' ]"
                onclick="alert('here')"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputAutocomplete({ value: "", filter: "", config: {"value":"id","text":"text","subtext":"subtext","image":"image","limit":999,"min":1}, ajax: [], conditionals: {"option-focus":"option-focus","option-selected":"option-selected","subtext-focus":"subtext-focus","subtext-selected":"subtext-selected","text-focus":"text-focus","text-selected":"text-selected"}, data: [{"id":1,"text":"France","sub":null,"image":null},{"id":2,"text":"Germany","sub":null,"image":null}], focus: [] })' x-cloak x-modelable="value" class="background border color font other padding rounded shadow width">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" @click.away="close()">
                    <input name="countries_search" type="text" id="countries_search" x-model="filter" @mousedown="open()" @focus="open()" @input.debounce.250="refreshOptions()" @keydown.escape="close()" @keydown.tab="close()" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()" autocomplete="off" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" onclick="alert('here')" />
                    <svg class="clear-size fill-current clear-background clear-border clear-color clear-other clear-padding clear-rounded clear-shadow" x-show="selected" @click="clear()" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                        <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="! show" @click="toggle()">
                            <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                            <div class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow" x-show="show" @click="toggle()">
                                <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M16.2951 15.705l1.41-1.41-6-6.00002L5.70508 14.295l1.41 1.41 4.59002-4.58 4.59 4.58z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="countries" id="countries" x-model="value" />
                            <div x-show="isOpen()" class="dropdown-background dropdown-border dropdown-color dropdown-other dropdown-padding dropdown-rounded dropdown-shadow dropdown-width">
                                <div x-show="options !== null">
                                    <template x-for="(option, index) in options" :key="index">
                                        <div @click="onOptionClick(index)" :class="classOption(option.id, index)">
                                            <div class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="classText(option.id, index)">
                                                <img class="image-border image-other image-padding image-rounded image-shadow image-size" x-bind:src="option.image" x-show="option.image !== null">
                                                <div class="text-background text-border text-color text-font text-other text-padding text-rounded text-shadow">
                                                    <span x-text="option.text"></span>
                                                    <div x-show="option.sub" class="subtext-background subtext-border subtext-color subtext-font subtext-other subtext-padding subtext-rounded subtext-shadow" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div x-show="noResults">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> ::no-results '<span x-text="filter"></span>' </div>
                                </div>
                                <div x-show="isAjax && options === null">
                                    <div class="prompt-background prompt-border prompt-color prompt-font prompt-other prompt-padding prompt-rounded prompt-shadow"> <span>::prompt-text</span> </div>
                                    <div x-show="selectedText" class="selected-background selected-border selected-color selected-font selected-other selected-padding selected-rounded selected-shadow"> <span>::selected</span> <span>:</span> <span x-text="selectedText"></span> </div>
                                </div>
                            </div>
                        </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}

class Country extends Model
{
    use HasFactory;

    protected string $factory = CountryFactory::class;

    protected $table = 'countries';
    protected $primaryKey = 'country_id';
    public $timestamps = false;
    protected $fillable = ['country_id', 'country_name', 'iso'];
}

class CountryFactory extends Factory {
    protected $model = Country::class;

    public function definition(): array
    {
        return [
            'country_name' => $this->faker->country,
            'iso' => $this->faker->countryISOAlpha3,
        ];
    }
}

class CountriesAutoComplete extends AutoComplete
{
    public int $min = 2;
    public int $limit = 20;
    public bool $focus = false;
    public bool $preload = false;
    public bool $auto = false;
    public int $count = 20;

    public function count(): int
    {
        return 1;
    }

    public function focus(int $limit): Collection|array
    {
        return [];
    }

    public function lookup(int $id): Model|array
    {
        return [];
    }

    public function preload(): Collection|array
    {
        return [];
    }

    public function search(string $term, int $limit): Collection|array
    {
        return [];
    }
}

class CountriesPreloadAutoComplete extends CountriesAutoComplete
{
    public bool $preload = true;
}

class CountriesFocusAutoComplete extends CountriesAutoComplete
{
    public bool $focus = true;
}
