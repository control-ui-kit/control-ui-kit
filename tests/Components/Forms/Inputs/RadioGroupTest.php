<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class RadioGroupTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-radio-group.background', 'background');
        Config::set('themes.default.input-radio-group.border', 'border');
        Config::set('themes.default.input-radio-group.color', 'color');
        Config::set('themes.default.input-radio-group.font', 'font');
        Config::set('themes.default.input-radio-group.other', 'other');
        Config::set('themes.default.input-radio-group.padding', 'padding');
        Config::set('themes.default.input-radio-group.rounded', 'rounded');
        Config::set('themes.default.input-radio-group.shadow', 'shadow');
        Config::set('themes.default.input-radio-group.width', 'width');

        Config::set('themes.default.input-radio-group.help-background', 'help-background');
        Config::set('themes.default.input-radio-group.help-border', 'help-border');
        Config::set('themes.default.input-radio-group.help-color', 'help-color');
        Config::set('themes.default.input-radio-group.help-font', 'help-font');
        Config::set('themes.default.input-radio-group.help-other', 'help-other');
        Config::set('themes.default.input-radio-group.help-padding', 'help-padding');
        Config::set('themes.default.input-radio-group.help-rounded', 'help-rounded');
        Config::set('themes.default.input-radio-group.help-shadow', 'help-shadow');

        Config::set('themes.default.input-radio-group.label-background', 'label-background');
        Config::set('themes.default.input-radio-group.label-border', 'label-border');
        Config::set('themes.default.input-radio-group.label-color', 'label-color');
        Config::set('themes.default.input-radio-group.label-font', 'label-font');
        Config::set('themes.default.input-radio-group.label-other', 'label-other');
        Config::set('themes.default.input-radio-group.label-padding', 'label-padding');
        Config::set('themes.default.input-radio-group.label-rounded', 'label-rounded');
        Config::set('themes.default.input-radio-group.label-selected', 'label-selected');
        Config::set('themes.default.input-radio-group.label-shadow', 'label-shadow');

        Config::set('themes.default.input-radio-group.option-background', 'option-background');
        Config::set('themes.default.input-radio-group.option-border', 'option-border');
        Config::set('themes.default.input-radio-group.option-color', 'option-color');
        Config::set('themes.default.input-radio-group.option-font', 'option-font');
        Config::set('themes.default.input-radio-group.option-other', 'option-other');
        Config::set('themes.default.input-radio-group.option-padding', 'option-padding');
        Config::set('themes.default.input-radio-group.option-rounded', 'option-rounded');
        Config::set('themes.default.input-radio-group.option-selected', 'option-selected');
        Config::set('themes.default.input-radio-group.option-shadow', 'option-shadow');

        Config::set('themes.default.input-radio-group.radio-background', 'radio-background');
        Config::set('themes.default.input-radio-group.radio-border', 'radio-border');
        Config::set('themes.default.input-radio-group.radio-color', 'radio-color');
        Config::set('themes.default.input-radio-group.radio-font', 'radio-font');
        Config::set('themes.default.input-radio-group.radio-other', 'radio-other');
        Config::set('themes.default.input-radio-group.radio-padding', 'radio-padding');
        Config::set('themes.default.input-radio-group.radio-rounded', 'radio-rounded');
        Config::set('themes.default.input-radio-group.radio-shadow', 'radio-shadow');

        Config::set('themes.default.input-radio.background', 'input-background');
        Config::set('themes.default.input-radio.border', 'input-border');
        Config::set('themes.default.input-radio.color', 'input-color');
        Config::set('themes.default.input-radio.other', 'input-other');
        Config::set('themes.default.input-radio.padding', 'input-padding');
        Config::set('themes.default.input-radio.rounded', 'input-rounded');
        Config::set('themes.default.input-radio.shadow', 'input-shadow');
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_single_string_options(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" options="Yes|No" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'yes' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-yes" value="yes" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'yes' }"> Yes </span>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'no' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-no" value="no" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'no' }"> No </span>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_value_label_string_options(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" options="1:Yes|0:No" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '1' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-1" value="1" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === '1' }"> Yes </span>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '0' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-0" value="0" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === '0' }"> No </span>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_value_label_help_string_options(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" options="1:Yes:Yes help text|0:No:No help text" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '1' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-1" value="1" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'label-selected': selected === '1' }"> <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow">Yes</span> <span class="help-background help-border help-color help-font help-other help-padding help-rounded help-shadow">Yes help text</span> </div>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '0' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-0" value="0" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'label-selected': selected === '0' }"> <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow">No</span> <span class="help-background help-border help-color help-font help-other help-padding help-rounded help-shadow">No help text</span> </div>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_value_label_help_id_string_options(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" options="1:Yes:Yes help text:yes-id|0:No:No help text:no-id" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '1' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="yes-id" value="1" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'label-selected': selected === '1' }"> <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow">Yes</span> <span class="help-background help-border help-color help-font help-other help-padding help-rounded help-shadow">Yes help text</span> </div>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '0' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="no-id" value="0" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'label-selected': selected === '0' }"> <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow">No</span> <span class="help-background help-border help-color help-font help-other help-padding help-rounded help-shadow">No help text</span> </div>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_array_options_containing_label_only(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" :options="[
                ['label' => 'Yes'],
                ['label' => 'No']
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'yes' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-yes" value="yes" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'yes' }"> Yes </span>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'no' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-no" value="no" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'no' }"> No </span>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_array_options_containing_label_and_value(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" :options="[
                ['label' => 'Yes', 'value' => 1],
                ['label' => 'No', 'value' => 0]
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '1' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-1" value="1" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === '1' }"> Yes </span>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '0' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-0" value="0" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === '0' }"> No </span>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_array_options_containing_label_value_and_help(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" :options="[
                ['label' => 'Yes', 'value' => 1, 'help' => 'Yes help string'],
                ['label' => 'No', 'value' => 0, 'help' => 'No help string']
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '1' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-1" value="1" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'label-selected': selected === '1' }"> <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow">Yes</span> <span class="help-background help-border help-color help-font help-other help-padding help-rounded help-shadow">Yes help string</span> </div>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '0' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-0" value="0" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'label-selected': selected === '0' }"> <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow">No</span> <span class="help-background help-border help-color help-font help-other help-padding help-rounded help-shadow">No help string</span> </div>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_array_options_containing_label_value_and_id(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" :options="[
                ['label' => 'Yes', 'value' => 1, 'id' => 'yes-way'],
                ['label' => 'No', 'value' => 0, 'id' => 'no-way']
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '1' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="yes-way" value="1" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === '1' }"> Yes </span>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === '0' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="no-way" value="0" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === '0' }"> No </span>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" options="1:Test:Help text"
                background="none"
                border="none"
                color="none"
                font="none"
                other="none"
                padding="none"
                rounded="none"
                shadow="none"
                width="none"

                help-background="none"
                help-border="none"
                help-color="none"
                help-font="none"
                help-other="none"
                help-padding="none"
                help-rounded="none"
                help-shadow="none"

                label-background="none"
                label-border="none"
                label-color="none"
                label-font="none"
                label-other="none"
                label-padding="none"
                label-rounded="none"
                label-shadow="none"

                option-background="none"
                option-border="none"
                option-color="none"
                option-font="none"
                option-other="none"
                option-padding="none"
                option-rounded="none"
                option-shadow="none"

                radio-background="none"
                radio-border="none"
                radio-color="none"
                radio-font="none"
                radio-other="none"
                radio-padding="none"
                radio-rounded="none"
                radio-shadow="none"

                input-background="none"
                input-border="none"
                input-color="none"
                input-other="none"
                input-padding="none"
                input-rounded="none"
                input-shadow="none"
             />
            HTML;

        $expected = <<<'HTML'
            <div x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="" :class="{ 'option-selected': selected === '1' }">
                    <div class="">
                        <input name="group" type="radio" id="group-1" value="1" x-model="selected" />
                    </div>
                    <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'label-selected': selected === '1' }"> <span class="">Test</span> <span class="">Help text</span> </div>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" options="1:Test:Help text"
                background="1"
                border="2"
                color="3"
                font="4"
                other="5"
                padding="6"
                rounded="7"
                shadow="8"
                width="9"

                help-background="10"
                help-border="11"
                help-color="12"
                help-font="13"
                help-other="14"
                help-padding="15"
                help-rounded="16"
                help-shadow="17"

                label-background="20"
                label-border="21"
                label-color="22"
                label-font="23"
                label-other="24"
                label-padding="25"
                label-rounded="26"
                label-shadow="27"

                option-background="30"
                option-border="31"
                option-color="32"
                option-font="33"
                option-other="34"
                option-padding="35"
                option-rounded="36"
                option-shadow="37"

                radio-background="40"
                radio-border="41"
                radio-color="42"
                radio-font="43"
                radio-other="44"
                radio-padding="45"
                radio-rounded="46"
                radio-shadow="47"

                input-background="50"
                input-border="51"
                input-color="52"
                input-other="53"
                input-padding="54"
                input-rounded="55"
                input-shadow="56"
             />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="30 31 32 33 34 35 36 37" :class="{ 'option-selected': selected === '1' }">
                    <div class="40 41 42 43 44 45 46 47">
                        <input name="group" type="radio" id="group-1" value="1" class="50 51 52 53 54 55 56" x-model="selected" />
                    </div>
                    <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'label-selected': selected === '1' }"> <span class="20 21 22 23 24 25 26 27">Test</span> <span class="10 11 12 13 14 15 16 17">Help text</span> </div>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_value(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" options="Yes|No" value="no" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: 'no' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'yes' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-yes" value="yes" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'yes' }"> Yes </span>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'no' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-no" value="no" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'no' }"> No </span>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" options="Yes|No" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width float-right" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'yes' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-yes" value="yes" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'yes' }"> Yes </span>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'no' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-no" value="no" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'no' }"> No </span>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_group_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-radio-group name="group" options="Yes|No" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow width" onclick="alert('here')" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'yes' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-yes" value="yes" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'yes' }"> Yes </span>
                </label>
                <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'no' }">
                    <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                        <input name="group" type="radio" id="group-no" value="no" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                    </div>
                    <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'no' }"> No </span>
                </label>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
