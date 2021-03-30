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

        Config::set('themes.default.input-select.background', 'background');
        Config::set('themes.default.input-select.border', 'border');
        Config::set('themes.default.input-select.color', 'color');
        Config::set('themes.default.input-select.font', 'font');
        Config::set('themes.default.input-select.other', 'other');
        Config::set('themes.default.input-select.padding', 'padding');
        Config::set('themes.default.input-select.rounded', 'rounded');
        Config::set('themes.default.input-select.shadow', 'shadow');
    }

    /** @test */
    public function an_input_select_component_can_be_rendered_in_key_value_format(): void
    {
        $template = <<<HTML
            <x-input.select name="language" :options="[
                1 => 'English',
                2 => 'Spanish'
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
                <div class="relative">
                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> </span>
                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </div>
                        </button>
                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
            </span> </div>
                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
            >
                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                            </svg>
                                        </span>
                                    </li>
                                    <li id="list-box-item-language-1" role="option" data-text="English" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
            </span> </div>
                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
            >
                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
                                            <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
            </span> </div>
                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
            >
                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
                                                    </svg>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <script>
                function uiSelectLanguage(options) {
                    return {
                        init() {
                            if (this.selected !== undefined) {
                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
                                                                    }
                        },
                        activeDescendant: null,
                        optionCount: null,
                        selectOpen: false,
                        selected: null,
                        value: 0,
                        text: '',
                                                changed() {
                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
                                                        },
                        choose(option_id) {
                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
                                                            document.getElementById("language").value = option_id;
                            this.value = option_id;
                            this.selectOpen = false;
                        },
                        onButtonClick() {
                            if (this.selectOpen) {
                                return;
                            }

                            this.selected = this.value;
                            this.selectOpen = true;
                        },
                        onOptionSelect() {
                            // if (this.selected !== null) {
                            //     this.value = this.selected;
                            // }
                            //
                            // this.selectOpen = false;
                            // this.$refs.button.focus();
                        },
                        onEscape() {
                            this.selectOpen = false;
                            this.$refs.button.focus();
                        },
                        onArrowUp() {
                            // todo: make this actually work on button up/down
                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
                            // this.$refs.list-box.children[this.selected].scrollIntoView({
                            //     block: 'nearest'
                            // });
                        },
                        onArrowDown() {
                            // todo: make this actually work on button up/down
                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
                            // this.$refs.list-box.children[this.selected].scrollIntoView({
                            //     block: 'nearest'
                            // });
                        },
                        ...options,
                    }
                }
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
//
//    /** @test */
//    public function an_input_select_component_can_be_rendered_in_key_value_format_with_required(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => 'English',
//                2 => 'Spanish'
//            ]" type="required" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 1, selected: 1 })" x-init="init()">
//                <input type="hidden" name="language" id="language" value="1" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-1" role="option" data-text="English" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> </div>
//                                    <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-2" role="option" data-text="Spanish" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> </div>
//                                        <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                    </ul>
//                                </div>
//                            </div>
//                        </div>
//                        <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                                changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                                        },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_can_be_rendered(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English'],
//                2 => ['text' => 'Spanish']
//            ]" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
//                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
//            </span> </div>
//                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-1" role="option" data-text="English" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> </div>
//                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                            <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> </div>
//                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                    </svg>
//                                                </span>
//                                            </li>
//                                        </ul>
//                                    </div>
//                                </div>
//                            </div>
//                            <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                                changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                                        },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_can_be_rendered_with_required(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English'],
//                2 => ['text' => 'Spanish']
//            ]" type="required" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 1, selected: 1 })" x-init="init()">
//                <input type="hidden" name="language" id="language" value="1" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-1" role="option" data-text="English" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> </div>
//                                    <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-2" role="option" data-text="Spanish" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> </div>
//                                        <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                    </ul>
//                                </div>
//                            </div>
//                        </div>
//                        <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                                changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                                        },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_custom_text_name_can_be_rendered(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['lang' => 'English'],
//                2 => ['lang' => 'Spanish']
//            ]" text-name="lang" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
//                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
//            </span> </div>
//                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-1" role="option" data-text="English" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> </div>
//                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                            <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> </div>
//                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                    </svg>
//                                                </span>
//                                            </li>
//                                        </ul>
//                                    </div>
//                                </div>
//                            </div>
//                            <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                                changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                                        },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                                                            document.getElementById("language").value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_custom_text_name_can_be_rendered_with_required(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['lang' => 'English'],
//                2 => ['lang' => 'Spanish']
//            ]" type="required" text-name="lang" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 1, selected: 1 })" x-init="init()">
//                <input type="hidden" name="language" id="language" value="1" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-1" role="option" data-text="English" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> </div>
//                                    <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-2" role="option" data-text="Spanish" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> </div>
//                                        <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                    </ul>
//                                </div>
//                            </div>
//                        </div>
//                        <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                                changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                                        },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                                                            document.getElementById("language").value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_image_can_be_rendered(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English', 'image' => 'https://cdn.countryflags.com/thumbs/england/flag-800.png'],
//                2 => ['text' => 'Spanish', 'image' => 'https://cdn.countryflags.com/thumbs/spain/flag-800.png'],
//            ]" image />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
//                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2">
//                            <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" x-bind:src="image" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                            <span x-text="text" class="ml-3 block truncate grow py-1.5"></span>
//                        </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." data-image="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2">
//                                        <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                        <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
//            </span>
//                                    </div>
//                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-1" role="option" data-text="English" data-image="https://cdn.countryflags.com/thumbs/england/flag-800.png" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2">
//                                            <img src="https://cdn.countryflags.com/thumbs/england/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                            <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span>
//                                        </div>
//                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" data-image="https://cdn.countryflags.com/thumbs/spain/flag-800.png" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                            <div class="flex items-center space-x-2">
//                                                <img src="https://cdn.countryflags.com/thumbs/spain/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                                <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span>
//                                            </div>
//                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                    </svg>
//                                                </span>
//                                            </li>
//                                        </ul>
//                                    </div>
//                                </div>
//                            </div>
//                            <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                    this.image = document.getElementById('list-box-item-language-' + this.selected).dataset.image;                }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                    image: '',            changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                            this.image = document.getElementById('list-box-item-language-' + this.value).dataset.image;            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                                            this.image = document.getElementById('list-box-item-language-' + option_id).dataset.image;                                                            document.getElementById("language").value = option_id;                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_image_can_be_rendered_with_required(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English', 'image' => 'https://cdn.countryflags.com/thumbs/england/flag-800.png'],
//                2 => ['text' => 'Spanish', 'image' => 'https://cdn.countryflags.com/thumbs/spain/flag-800.png'],
//            ]" type="required" image />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 1, selected: 1 })" x-init="init()">
//                <input type="hidden" name="language" id="language" value="1" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2">
//                            <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" x-bind:src="image" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                            <span x-text="text" class="ml-3 block truncate grow py-1.5"></span>
//                        </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-1" role="option" data-text="English" data-image="https://cdn.countryflags.com/thumbs/england/flag-800.png" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2">
//                                        <img src="https://cdn.countryflags.com/thumbs/england/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                        <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span>
//                                    </div>
//                                    <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-2" role="option" data-text="Spanish" data-image="https://cdn.countryflags.com/thumbs/spain/flag-800.png" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2">
//                                            <img src="https://cdn.countryflags.com/thumbs/spain/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                            <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span>
//                                        </div>
//                                        <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                    </ul>
//                                </div>
//                            </div>
//                        </div>
//                        <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                    this.image = document.getElementById('list-box-item-language-' + this.selected).dataset.image;                }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                    image: '',            changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                            this.image = document.getElementById('list-box-item-language-' + this.value).dataset.image;            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.image = document.getElementById('list-box-item-language-' + option_id).dataset.image;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_image_custom_names_can_be_rendered(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English', 'avatar' => 'https://cdn.countryflags.com/thumbs/england/flag-800.png'],
//                2 => ['text' => 'Spanish', 'avatar' => 'https://cdn.countryflags.com/thumbs/spain/flag-800.png'],
//            ]" image="avatar" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
//                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2">
//                            <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" x-bind:src="image" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                            <span x-text="text" class="ml-3 block truncate grow py-1.5"></span>
//                        </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." data-image="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2">
//                                        <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                        <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
//            </span>
//                                    </div>
//                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-1" role="option" data-text="English" data-image="https://cdn.countryflags.com/thumbs/england/flag-800.png" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2">
//                                            <img src="https://cdn.countryflags.com/thumbs/england/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                            <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span>
//                                        </div>
//                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" data-image="https://cdn.countryflags.com/thumbs/spain/flag-800.png" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                            <div class="flex items-center space-x-2">
//                                                <img src="https://cdn.countryflags.com/thumbs/spain/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                                <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span>
//                                            </div>
//                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                    </svg>
//                                                </span>
//                                            </li>
//                                        </ul>
//                                    </div>
//                                </div>
//                            </div>
//                            <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                    this.image = document.getElementById('list-box-item-language-' + this.selected).dataset.image;                }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                    image: '',            changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                            this.image = document.getElementById('list-box-item-language-' + this.value).dataset.image;            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.image = document.getElementById('list-box-item-language-' + option_id).dataset.image;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_image_custom_names_can_be_rendered_with_required(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English', 'avatar' => 'https://cdn.countryflags.com/thumbs/england/flag-800.png'],
//                2 => ['text' => 'Spanish', 'avatar' => 'https://cdn.countryflags.com/thumbs/spain/flag-800.png'],
//            ]" type="required" image="avatar" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 1, selected: 1 })" x-init="init()">
//                <input type="hidden" name="language" id="language" value="1" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2">
//                            <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" x-bind:src="image" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                            <span x-text="text" class="ml-3 block truncate grow py-1.5"></span>
//                        </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-1" role="option" data-text="English" data-image="https://cdn.countryflags.com/thumbs/england/flag-800.png" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2">
//                                        <img src="https://cdn.countryflags.com/thumbs/england/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                        <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span>
//                                    </div>
//                                    <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-2" role="option" data-text="Spanish" data-image="https://cdn.countryflags.com/thumbs/spain/flag-800.png" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2">
//                                            <img src="https://cdn.countryflags.com/thumbs/spain/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                            <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span>
//                                        </div>
//                                        <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                    </ul>
//                                </div>
//                            </div>
//                        </div>
//                        <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                    this.image = document.getElementById('list-box-item-language-' + this.selected).dataset.image;                }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                    image: '',            changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                            this.image = document.getElementById('list-box-item-language-' + this.value).dataset.image;            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.image = document.getElementById('list-box-item-language-' + option_id).dataset.image;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_subtext_can_be_rendered(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English', 'subtext' => 'Englais'],
//                2 => ['text' => 'Spanish', 'subtext' => 'Espanol'],
//            ]" subtext />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
//                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> <span x-text="subtext" class="truncate text-gray-500"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." data-subtext="" @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
//            </span> </div>
//                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-1" role="option" data-text="English" data-subtext="Englais" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> <span :class="{ 'text-gray-200': selected === 1, 'text-gray-500': !(selected === 1) }" class="truncate text-gray-500"> Englais </span> </div>
//                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" data-subtext="Espanol" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                            <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> <span :class="{ 'text-gray-200': selected === 2, 'text-gray-500': !(selected === 2) }" class="truncate text-gray-500"> Espanol </span> </div>
//                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                    </svg>
//                                                </span>
//                                            </li>
//                                        </ul>
//                                    </div>
//                                </div>
//                            </div>
//                            <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                        subtext: '',                        changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_subtext_can_be_rendered_with_required(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English', 'subtext' => 'Englais'],
//                2 => ['text' => 'Spanish', 'subtext' => 'Espanol'],
//            ]" type="required" subtext />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 1, selected: 1 })" x-init="init()">
//                <input type="hidden" name="language" id="language" value="1" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> <span x-text="subtext" class="truncate text-gray-500"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-1" role="option" data-text="English" data-subtext="Englais" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> <span :class="{ 'text-gray-200': selected === 1, 'text-gray-500': !(selected === 1) }" class="truncate text-gray-500"> Englais </span> </div>
//                                    <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-2" role="option" data-text="Spanish" data-subtext="Espanol" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> <span :class="{ 'text-gray-200': selected === 2, 'text-gray-500': !(selected === 2) }" class="truncate text-gray-500"> Espanol </span> </div>
//                                        <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                    </ul>
//                                </div>
//                            </div>
//                        </div>
//                        <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                        subtext: '',                        changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_subtext_custom_names_can_be_rendered(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English', 'spanish' => 'Englais'],
//                2 => ['text' => 'Spanish', 'spanish' => 'Espanol'],
//            ]" subtext="spanish" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
//                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> <span x-text="subtext" class="truncate text-gray-500"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." data-subtext="" @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
//            </span> </div>
//                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-1" role="option" data-text="English" data-subtext="Englais" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> <span :class="{ 'text-gray-200': selected === 1, 'text-gray-500': !(selected === 1) }" class="truncate text-gray-500"> Englais </span> </div>
//                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" data-subtext="Espanol" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                            <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> <span :class="{ 'text-gray-200': selected === 2, 'text-gray-500': !(selected === 2) }" class="truncate text-gray-500"> Espanol </span> </div>
//                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                    </svg>
//                                                </span>
//                                            </li>
//                                        </ul>
//                                    </div>
//                                </div>
//                            </div>
//                            <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                        subtext: '',                        changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_subtext_custom_names_can_be_rendered_with_required(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English', 'spanish' => 'Englais'],
//                2 => ['text' => 'Spanish', 'spanish' => 'Espanol'],
//            ]" type="required" subtext="spanish" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 1, selected: 1 })" x-init="init()">
//                <input type="hidden" name="language" id="language" value="1" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> <span x-text="subtext" class="truncate text-gray-500"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-1" role="option" data-text="English" data-subtext="Englais" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> <span :class="{ 'text-gray-200': selected === 1, 'text-gray-500': !(selected === 1) }" class="truncate text-gray-500"> Englais </span> </div>
//                                    <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-2" role="option" data-text="Spanish" data-subtext="Espanol" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> <span :class="{ 'text-gray-200': selected === 2, 'text-gray-500': !(selected === 2) }" class="truncate text-gray-500"> Espanol </span> </div>
//                                        <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                    </ul>
//                                </div>
//                            </div>
//                        </div>
//                        <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                        subtext: '',                        changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_subtext_and_image_can_be_rendered(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English', 'subtext' => 'Englais', 'image' => 'https://cdn.countryflags.com/thumbs/england/flag-800.png'],
//                2 => ['text' => 'Spanish', 'subtext' => 'Espanol', 'image' => 'https://cdn.countryflags.com/thumbs/spain/flag-800.png'],
//            ]" subtext image />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
//                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2">
//                            <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" x-bind:src="image" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                            <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> <span x-text="subtext" class="truncate text-gray-500"></span>
//                        </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." data-subtext="" data-image="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2">
//                                        <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                        <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
//            </span>
//                                    </div>
//                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-1" role="option" data-text="English" data-subtext="Englais" data-image="https://cdn.countryflags.com/thumbs/england/flag-800.png" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2">
//                                            <img src="https://cdn.countryflags.com/thumbs/england/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                            <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> <span :class="{ 'text-gray-200': selected === 1, 'text-gray-500': !(selected === 1) }" class="truncate text-gray-500"> Englais </span>
//                                        </div>
//                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" data-subtext="Espanol" data-image="https://cdn.countryflags.com/thumbs/spain/flag-800.png" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                            <div class="flex items-center space-x-2">
//                                                <img src="https://cdn.countryflags.com/thumbs/spain/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                                <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> <span :class="{ 'text-gray-200': selected === 2, 'text-gray-500': !(selected === 2) }" class="truncate text-gray-500"> Espanol </span>
//                                            </div>
//                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                    </svg>
//                                                </span>
//                                            </li>
//                                        </ul>
//                                    </div>
//                                </div>
//                            </div>
//                            <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                    this.image = document.getElementById('list-box-item-language-' + this.selected).dataset.image;                }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                        subtext: '',            image: '',            changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                this.image = document.getElementById('list-box-item-language-' + this.value).dataset.image;            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                this.image = document.getElementById('list-box-item-language-' + option_id).dataset.image;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_subtext_and_image_can_be_rendered_with_required(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['text' => 'English', 'subtext' => 'Englais', 'image' => 'https://cdn.countryflags.com/thumbs/england/flag-800.png'],
//                2 => ['text' => 'Spanish', 'subtext' => 'Espanol', 'image' => 'https://cdn.countryflags.com/thumbs/spain/flag-800.png'],
//            ]" type="required" subtext image />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 1, selected: 1 })" x-init="init()">
//                <input type="hidden" name="language" id="language" value="1" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2">
//                            <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" x-bind:src="image" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                            <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> <span x-text="subtext" class="truncate text-gray-500"></span>
//                        </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-1" role="option" data-text="English" data-subtext="Englais" data-image="https://cdn.countryflags.com/thumbs/england/flag-800.png" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2">
//                                        <img src="https://cdn.countryflags.com/thumbs/england/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                        <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> <span :class="{ 'text-gray-200': selected === 1, 'text-gray-500': !(selected === 1) }" class="truncate text-gray-500"> Englais </span>
//                                    </div>
//                                    <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-2" role="option" data-text="Spanish" data-subtext="Espanol" data-image="https://cdn.countryflags.com/thumbs/spain/flag-800.png" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2">
//                                            <img src="https://cdn.countryflags.com/thumbs/spain/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                            <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> <span :class="{ 'text-gray-200': selected === 2, 'text-gray-500': !(selected === 2) }" class="truncate text-gray-500"> Espanol </span>
//                                        </div>
//                                        <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                    </ul>
//                                </div>
//                            </div>
//                        </div>
//                        <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                    this.image = document.getElementById('list-box-item-language-' + this.selected).dataset.image;                }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                        subtext: '',            image: '',            changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                this.image = document.getElementById('list-box-item-language-' + this.value).dataset.image;            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                this.image = document.getElementById('list-box-item-language-' + option_id).dataset.image;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//
//    /** @test */
//    public function an_input_select_component_with_subtext_image_and_custom_names_can_be_rendered(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['title' => 'English', 'subtitle' => 'Englais', 'flag' => 'https://cdn.countryflags.com/thumbs/england/flag-800.png'],
//                2 => ['title' => 'Spanish', 'subtitle' => 'Espanol', 'flag' => 'https://cdn.countryflags.com/thumbs/spain/flag-800.png'],
//            ]" text-name="title" subtext="subtitle" image="flag" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
//                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2">
//                            <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" x-bind:src="image" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                            <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> <span x-text="subtext" class="truncate text-gray-500"></span>
//                        </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." data-subtext="" data-image="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2">
//                                        <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                        <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
//            </span>
//                                    </div>
//                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-1" role="option" data-text="English" data-subtext="Englais" data-image="https://cdn.countryflags.com/thumbs/england/flag-800.png" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2">
//                                            <img src="https://cdn.countryflags.com/thumbs/england/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                            <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> <span :class="{ 'text-gray-200': selected === 1, 'text-gray-500': !(selected === 1) }" class="truncate text-gray-500"> Englais </span>
//                                        </div>
//                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" data-subtext="Espanol" data-image="https://cdn.countryflags.com/thumbs/spain/flag-800.png" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                            <div class="flex items-center space-x-2">
//                                                <img src="https://cdn.countryflags.com/thumbs/spain/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                                <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> <span :class="{ 'text-gray-200': selected === 2, 'text-gray-500': !(selected === 2) }" class="truncate text-gray-500"> Espanol </span>
//                                            </div>
//                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                    </svg>
//                                                </span>
//                                            </li>
//                                        </ul>
//                                    </div>
//                                </div>
//                            </div>
//                            <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                    this.image = document.getElementById('list-box-item-language-' + this.selected).dataset.image;                }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                        subtext: '',            image: '',            changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                this.image = document.getElementById('list-box-item-language-' + this.value).dataset.image;            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                this.image = document.getElementById('list-box-item-language-' + option_id).dataset.image;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_with_subtext_image_and_custom_names_can_be_rendered_with_required(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => ['title' => 'English', 'subtitle' => 'Englais', 'flag' => 'https://cdn.countryflags.com/thumbs/england/flag-800.png'],
//                2 => ['title' => 'Spanish', 'subtitle' => 'Espanol', 'flag' => 'https://cdn.countryflags.com/thumbs/spain/flag-800.png'],
//            ]" type="required" text-name="title" subtext="subtitle" image="flag" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 1, selected: 1 })" x-init="init()">
//                <input type="hidden" name="language" id="language" value="1" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="background border color font other padding rounded shadow flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2">
//                            <img src="https://i.pinimg.com/564x/51/f6/fb/51f6fb256629fc755b8870c801092942.jpg" x-bind:src="image" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                            <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> <span x-text="subtext" class="truncate text-gray-500"></span>
//                        </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="background border color font other padding rounded shadow">
//                                <li id="list-box-item-language-1" role="option" data-text="English" data-subtext="Englais" data-image="https://cdn.countryflags.com/thumbs/england/flag-800.png" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2">
//                                        <img src="https://cdn.countryflags.com/thumbs/england/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                        <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> <span :class="{ 'text-gray-200': selected === 1, 'text-gray-500': !(selected === 1) }" class="truncate text-gray-500"> Englais </span>
//                                    </div>
//                                    <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-2" role="option" data-text="Spanish" data-subtext="Espanol" data-image="https://cdn.countryflags.com/thumbs/spain/flag-800.png" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2">
//                                            <img src="https://cdn.countryflags.com/thumbs/spain/flag-800.png" alt="" class="flex-shrink-0 h-6 w-6 rounded-full" />
//                                            <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> <span :class="{ 'text-gray-200': selected === 2, 'text-gray-500': !(selected === 2) }" class="truncate text-gray-500"> Espanol </span>
//                                        </div>
//                                        <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                    </ul>
//                                </div>
//                            </div>
//                        </div>
//                        <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                    this.image = document.getElementById('list-box-item-language-' + this.selected).dataset.image;                }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                        subtext: '',            image: '',            changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                this.image = document.getElementById('list-box-item-language-' + this.value).dataset.image;            },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                            this.subtext = document.getElementById('list-box-item-language-' + this.selected).dataset.subtext;                this.image = document.getElementById('list-box-item-language-' + option_id).dataset.image;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_can_be_rendered_with_no_styles(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => 'English',
//                2 => 'Spanish'
//            ]" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
//                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1">
//                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
//            </span> </div>
//                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-1" role="option" data-text="English" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> </div>
//                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                            <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> </div>
//                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                    </svg>
//                                                </span>
//                                            </li>
//                                        </ul>
//                                    </div>
//                                </div>
//                            </div>
//                            <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                                changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                                        },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function an_input_select_component_can_be_rendered_with_inline_styles(): void
//    {
//        $template = <<<HTML
//            <x-input.select name="language" :options="[
//                1 => 'English',
//                2 => 'Spanish'
//            ]" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
//            HTML;
//
//        $expected = <<<'HTML'
//            <div x-cloak x-data="uiSelectLanguage({ selectOpen: false, value: 0, selected: 0 })" x-init="init()">
//                <input type="hidden" name="language" id="language" x-model="value" x-on:change="changed()" />
//                <div class="relative">
//                    <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="list-box" :aria-expanded="selectOpen" aria-labelledby="list-box-label" class="1 2 3 4 5 6 7 8 flex items-center space-x-2 py-0 px-0">
//                        <span class="flex items-center w-full space-x-2"> <span x-text="text" class="ml-3 block truncate grow py-1.5"></span> </span>
//                        <div class="border-l border-input text-muted flex items-center justify-center self-stretch px-3 flex-shrink-0" size="w-4 h-4">
//                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
//                                </svg>
//                            </div>
//                        </button>
//                        <div x-show="selectOpen" @click.away="selectOpen = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 rounded-md bg-white shadow-lg z-50">
//                            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="list-box" tabindex="-1" role="list-box" aria-labelledby="list-box-label" :aria-activedescendant="activeDescendant" x-max="1" aria-activedescendant="list-box-item-1" class="1 2 3 4 5 6 7 8">
//                                <li id="list-box-item-language-0" role="option" data-text="Please Select ..." @click="choose(0)" @mouseenter="selected = 0" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                    <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }" class="ml-3 block font-normal truncate"> Please Select ...
//            </span> </div>
//                                    <span x-show="value === 0" :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                            <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                            </svg>
//                                        </span>
//                                    </li>
//                                    <li id="list-box-item-language-1" role="option" data-text="English" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                        <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="ml-3 block font-normal truncate"> English
//            </span> </div>
//                                        <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-gray-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                </svg>
//                                            </span>
//                                        </li>
//                                        <li id="list-box-item-language-2" role="option" data-text="Spanish" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pr-9">
//                                            <div class="flex items-center space-x-2"> <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="ml-3 block font-normal truncate"> Spanish
//            </span> </div>
//                                            <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-gray-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;"
//            >
//                                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
//                                                    <path d="M10.9627 16.7186L6 12.7898l1.24068-1.6542 3.30852 2.6881L16.5458 7 18.2 8.24068l-7.2373 8.47792z" />
//                                                    </svg>
//                                                </span>
//                                            </li>
//                                        </ul>
//                                    </div>
//                                </div>
//                            </div>
//                            <script>
//                function uiSelectLanguage(options) {
//                    return {
//                        init() {
//                            if (this.selected !== undefined) {
//                                this.text = document.getElementById('list-box-item-language-' + this.selected).dataset.text;
//                                                                    }
//                        },
//                        activeDescendant: null,
//                        optionCount: null,
//                        selectOpen: false,
//                        selected: null,
//                        value: 0,
//                        text: '',
//                                                changed() {
//                            this.text = document.getElementById('list-box-item-language-' + this.value).dataset.text;
//                                                        },
//                        choose(option_id) {
//                            this.text = document.getElementById('list-box-item-language-' + option_id).dataset.text;
//                                                            document.getElementById("language").value = option_id;
//                            this.value = option_id;
//                            this.selectOpen = false;
//                        },
//                        onButtonClick() {
//                            if (this.selectOpen) {
//                                return;
//                            }
//
//                            this.selected = this.value;
//                            this.selectOpen = true;
//                        },
//                        onOptionSelect() {
//                            // if (this.selected !== null) {
//                            //     this.value = this.selected;
//                            // }
//                            //
//                            // this.selectOpen = false;
//                            // this.$refs.button.focus();
//                        },
//                        onEscape() {
//                            this.selectOpen = false;
//                            this.$refs.button.focus();
//                        },
//                        onArrowUp() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        onArrowDown() {
//                            // todo: make this actually work on button up/down
//                            // this.selected = this.selected + 1> this.optionCount - 1 ? 1 : this.selected + 1;
//                            // this.$refs.list-box.children[this.selected].scrollIntoView({
//                            //     block: 'nearest'
//                            // });
//                        },
//                        ...options,
//                    }
//                }
//            </script>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
}
