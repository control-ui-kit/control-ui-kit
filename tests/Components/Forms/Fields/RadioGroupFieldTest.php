<?php

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class RadioGroupFieldTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.label.background', 'label-background');
        Config::set('themes.default.label.border', 'label-border');
        Config::set('themes.default.label.color', 'label-color');
        Config::set('themes.default.label.font', 'label-font');
        Config::set('themes.default.label.other', 'label-other');
        Config::set('themes.default.label.padding', 'label-padding');
        Config::set('themes.default.label.rounded', 'label-rounded');
        Config::set('themes.default.label.shadow', 'label-shadow');

        Config::set('themes.default.error.color', 'color');
        Config::set('themes.default.error.font', 'font');
        Config::set('themes.default.error.other', 'other');
        Config::set('themes.default.error.padding', 'padding');

        Config::set('themes.default.form-layout-responsive.content', 'content-style');
        Config::set('themes.default.form-layout-responsive.help', 'help-style');
        Config::set('themes.default.form-layout-responsive.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-responsive.text', 'text-style');
        Config::set('themes.default.form-layout-responsive.label', 'label-style');
        Config::set('themes.default.form-layout-responsive.required-size', 'required-size');
        Config::set('themes.default.form-layout-responsive.required-color', 'required-color');
        Config::set('themes.default.form-layout-responsive.slot', 'slot-style');
        Config::set('themes.default.form-layout-responsive.wrapper', 'wrapper');

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
        Config::set('themes.default.input-radio-group.help-wrapper', 'help-wrapper');

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
    public function the_radio_group_form_field_component_can_be_rendered(): void
    {
        $this->withViewErrors(['enable' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-radio-group name="enable" label="Enable" options="Yes|No" help="Some help text" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="enable_display" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Enable</span> </p>
                    <p class="help-style">Some help text</p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                            <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'yes' }">
                                <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                                    <input name="enable" type="radio" id="enable-yes" value="yes" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                                </div>
                                <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'yes' }"> Yes </span>
                            </label>
                            <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'no' }">
                                <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                                    <input name="enable" type="radio" id="enable-no" value="no" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                                </div>
                                <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'no' }"> No </span>
                            </label>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                    <p class="help-mobile">Some help text</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_radio_group_form_field_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['enable' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-radio-group name="enable" label="Enable" options="Yes|No" help="Some help text" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="enable_display" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Enable</span> </p>
                    <p class="help-style">Some help text</p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="background border color font other padding rounded shadow width" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                            <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'yes' }">
                                <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                                    <input name="enable" type="radio" id="enable-yes" value="yes" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                                </div>
                                <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'yes' }"> Yes </span>
                            </label>
                            <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'no' }">
                                <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                                    <input name="enable" type="radio" id="enable-no" value="no" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                                </div>
                                <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'no' }"> No </span>
                            </label>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                    <p class="help-mobile">Some help text</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_radio_group_form_field_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['enable' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-radio-group name="enable" label="Enable" options="Yes|No" help="Some help text" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="enable_display" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Enable</span> </p>
                    <p class="help-style">Some help text</p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="background border color font other padding rounded shadow width" onclick="alert('here')" x-cloak x-data="{ selected: '' }" x-modelable="selected">
                            <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'yes' }">
                                <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                                    <input name="enable" type="radio" id="enable-yes" value="yes" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                                </div>
                                <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'yes' }"> Yes </span>
                            </label>
                            <label class="option-background option-border option-color option-font option-other option-padding option-rounded option-shadow" :class="{ 'option-selected': selected === 'no' }">
                                <div class="radio-background radio-border radio-color radio-font radio-other radio-padding radio-rounded radio-shadow">
                                    <input name="enable" type="radio" id="enable-no" value="no" class="input-background input-border input-color input-other input-padding input-rounded input-shadow" x-model="selected" />
                                </div>
                                <span class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow" :class="{ 'label-selected': selected === 'no' }"> No </span>
                            </label>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                    <p class="help-mobile">Some help text</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
