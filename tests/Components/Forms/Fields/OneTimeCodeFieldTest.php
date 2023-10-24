<?php

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class OneTimeCodeFieldTest extends ComponentTestCase
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

        Config::set('themes.default.input-one-time-code.background', 'background');
        Config::set('themes.default.input-one-time-code.border', 'border');
        Config::set('themes.default.input-one-time-code.color', 'color');
        Config::set('themes.default.input-one-time-code.font', 'font');
        Config::set('themes.default.input-one-time-code.other', 'other');
        Config::set('themes.default.input-one-time-code.padding', 'padding');
        Config::set('themes.default.input-one-time-code.rounded', 'rounded');
        Config::set('themes.default.input-one-time-code.shadow', 'shadow');
        Config::set('themes.default.input-one-time-code.width', 'width');

        Config::set('themes.default.input.decimals', '');
        Config::set('themes.default.input.default', '');
        Config::set('themes.default.input.type', 'text');
        Config::set('themes.default.input.icon-left', '');
        Config::set('themes.default.input.icon-right', '');
        Config::set('themes.default.input.min', null);
        Config::set('themes.default.input.max', null);
        Config::set('themes.default.input.prefix-text', '');
        Config::set('themes.default.input.step', '');
        Config::set('themes.default.input.suffix-text', '');

        Config::set('themes.default.input.input-background', 'input-background');
        Config::set('themes.default.input.input-border', 'input-border');
        Config::set('themes.default.input.input-color', 'input-color');
        Config::set('themes.default.input.input-font', 'input-font');
        Config::set('themes.default.input.input-other', 'input-other');
        Config::set('themes.default.input.input-padding', 'input-padding');
        Config::set('themes.default.input.input-rounded', 'input-rounded');
        Config::set('themes.default.input.input-shadow', 'input-shadow');

        Config::set('themes.default.input.icon-left-background', 'icon-left-background');
        Config::set('themes.default.input.icon-left-border', 'icon-left-border');
        Config::set('themes.default.input.icon-left-color', 'icon-left-color');
        Config::set('themes.default.input.icon-left-other', 'icon-left-other');
        Config::set('themes.default.input.icon-left-padding', 'icon-left-padding');
        Config::set('themes.default.input.icon-left-rounded', 'icon-left-rounded');
        Config::set('themes.default.input.icon-left-shadow', 'icon-left-shadow');
        Config::set('themes.default.input.icon-left-size', 'icon-left-size');

        Config::set('themes.default.input.icon-right-background', 'icon-right-background');
        Config::set('themes.default.input.icon-right-border', 'icon-right-border');
        Config::set('themes.default.input.icon-right-color', 'icon-right-color');
        Config::set('themes.default.input.icon-right-other', 'icon-right-other');
        Config::set('themes.default.input.icon-right-padding', 'icon-right-padding');
        Config::set('themes.default.input.icon-right-rounded', 'icon-right-rounded');
        Config::set('themes.default.input.icon-right-shadow', 'icon-right-shadow');
        Config::set('themes.default.input.icon-right-size', 'icon-right-size');

        Config::set('themes.default.input.prefix-background', 'prefix-background');
        Config::set('themes.default.input.prefix-border', 'prefix-border');
        Config::set('themes.default.input.prefix-color', 'prefix-color');
        Config::set('themes.default.input.prefix-font', 'prefix-font');
        Config::set('themes.default.input.prefix-other', 'prefix-other');
        Config::set('themes.default.input.prefix-padding', 'prefix-padding');
        Config::set('themes.default.input.prefix-rounded', 'prefix-rounded');
        Config::set('themes.default.input.prefix-shadow', 'prefix-shadow');

        Config::set('themes.default.input.suffix-background', 'suffix-background');
        Config::set('themes.default.input.suffix-border', 'suffix-border');
        Config::set('themes.default.input.suffix-color', 'suffix-color');
        Config::set('themes.default.input.suffix-font', 'suffix-font');
        Config::set('themes.default.input.suffix-other', 'suffix-other');
        Config::set('themes.default.input.suffix-padding', 'suffix-padding');
        Config::set('themes.default.input.suffix-rounded', 'suffix-rounded');
        Config::set('themes.default.input.suffix-shadow', 'suffix-shadow');

        Config::set('themes.default.input.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input.wrapper-width', 'wrapper-width');
    }


    /** @test */
    public function the_field_otc_component_can_be_rendered(): void
    {
        $this->withViewErrors(['code' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-otc name="code" label="Pass Code" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="code" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Pass Code</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', 'digit_3': '', 'digit_4': '', 'digit_5': '', 'digit_6': '', digits: 6, value: '' })" x-modelable="value">
                            <fieldset class="fs-code-otc">
                                <input id="code-1" data-digit="1" x-model="digit_1" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-2" data-digit="2" x-model="digit_2" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-3" data-digit="3" x-model="digit_3" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-4" data-digit="4" x-model="digit_4" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-5" data-digit="5" x-model="digit_5" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-6" data-digit="6" x-model="digit_6" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                            </fieldset>
                            <input type="hidden" name="code" id="code" x-model="value" />
                            <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_field_otc_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['code' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-otc name="code" label="Pass Code" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="code" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Pass Code</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', 'digit_3': '', 'digit_4': '', 'digit_5': '', 'digit_6': '', digits: 6, value: '' })" x-modelable="value">
                            <fieldset class="fs-code-otc">
                                <input id="code-1" data-digit="1" x-model="digit_1" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-2" data-digit="2" x-model="digit_2" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-3" data-digit="3" x-model="digit_3" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-4" data-digit="4" x-model="digit_4" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-5" data-digit="5" x-model="digit_5" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-6" data-digit="6" x-model="digit_6" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                            </fieldset>
                            <input type="hidden" name="code" id="code" x-model="value" />
                            <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_field_otc_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['code' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-otc name="code" label="Pass Code" onclick="alert('test')" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="code" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Pass Code</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', 'digit_3': '', 'digit_4': '', 'digit_5': '', 'digit_6': '', digits: 6, value: '' })" x-modelable="value">
                            <fieldset class="fs-code-otc">
                                <input id="code-1" data-digit="1" x-model="digit_1" type="number" class="background border color font other padding rounded shadow width" onclick="alert('test')" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-2" data-digit="2" x-model="digit_2" type="number" class="background border color font other padding rounded shadow width" onclick="alert('test')" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-3" data-digit="3" x-model="digit_3" type="number" class="background border color font other padding rounded shadow width" onclick="alert('test')" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-4" data-digit="4" x-model="digit_4" type="number" class="background border color font other padding rounded shadow width" onclick="alert('test')" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-5" data-digit="5" x-model="digit_5" type="number" class="background border color font other padding rounded shadow width" onclick="alert('test')" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                                <input id="code-6" data-digit="6" x-model="digit_6" type="number" class="background border color font other padding rounded shadow width" onclick="alert('test')" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                            </fieldset>
                            <input type="hidden" name="code" id="code" x-model="value" />
                            <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
