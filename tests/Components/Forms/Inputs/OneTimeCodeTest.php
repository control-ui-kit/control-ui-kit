<?php

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class OneTimeCodeTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-one-time-code.background', 'background');
        Config::set('themes.default.input-one-time-code.border', 'border');
        Config::set('themes.default.input-one-time-code.color', 'color');
        Config::set('themes.default.input-one-time-code.font', 'font');
        Config::set('themes.default.input-one-time-code.other', 'other');
        Config::set('themes.default.input-one-time-code.padding', 'padding');
        Config::set('themes.default.input-one-time-code.rounded', 'rounded');
        Config::set('themes.default.input-one-time-code.shadow', 'shadow');
        Config::set('themes.default.input-one-time-code.width', 'width');
    }

    /** @test */
    public function a_one_time_passcode_field_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-otc name="code" />
            HTML;

        $expected = <<<'HTML'
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_one_time_passcode_field_with_digits_override_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-otc name="code" digits="4" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', 'digit_3': '', 'digit_4': '', digits: 4, value: '' })" x-modelable="value">
                <fieldset class="fs-code-otc">
                    <input id="code-1" data-digit="1" x-model="digit_1" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                    <input id="code-2" data-digit="2" x-model="digit_2" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                    <input id="code-3" data-digit="3" x-model="digit_3" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                    <input id="code-4" data-digit="4" x-model="digit_4" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                </fieldset>
                <input type="hidden" name="code" id="code" x-model="value" />
                <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_one_time_passcode_field_with_custom_id_can_be_rendered(): void
    {
        Config::set('themes.default.input-one-time-code.digits', 2);

        $template = <<<'HTML'
            <x-input-otc name="code" id="bar" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', digits: 2, value: '' })" x-modelable="value">
                <fieldset class="fs-code-otc">
                    <input id="code-1" data-digit="1" x-model="digit_1" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                    <input id="code-2" data-digit="2" x-model="digit_2" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                </fieldset>
                <input type="hidden" name="code" id="bar" x-model="value" />
                <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_one_time_passcode_field_with_no_styles_can_be_rendered(): void
    {
        Config::set('themes.default.input-one-time-code.digits', 2);

        $template = <<<'HTML'
            <x-input-otc name="code" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', digits: 2, value: '' })" x-modelable="value">
                <fieldset class="fs-code-otc">
                    <input id="code-1" data-digit="1" x-model="digit_1" type="number" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                    <input id="code-2" data-digit="2" x-model="digit_2" type="number" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                </fieldset>
                <input type="hidden" name="code" id="code" x-model="value" />
                <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_one_time_passcode_field_with_inline_styles_can_be_rendered(): void
    {
        Config::set('themes.default.input-one-time-code.digits', 2);

        $template = <<<'HTML'
            <x-input-otc name="code" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', digits: 2, value: '' })" x-modelable="value">
                <fieldset class="fs-code-otc">
                    <input id="code-1" data-digit="1" x-model="digit_1" type="number" class="1 2 3 4 5 6 7 8 9" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                    <input id="code-2" data-digit="2" x-model="digit_2" type="number" class="1 2 3 4 5 6 7 8 9" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                </fieldset>
                <input type="hidden" name="code" id="code" x-model="value" />
                <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_one_time_passcode_field_with_value_can_be_rendered(): void
    {
        Config::set('themes.default.input-one-time-code.digits', 2);

        $template = <<<'HTML'
            <x-input-otc name="code" value="56" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', digits: 2, value: '56' })" x-modelable="value">
                <fieldset class="fs-code-otc">
                    <input id="code-1" data-digit="1" x-model="digit_1" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                    <input id="code-2" data-digit="2" x-model="digit_2" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                </fieldset>
                <input type="hidden" name="code" id="code" x-model="value" />
                <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_one_time_passcode_field_with_required_input_can_be_rendered(): void
    {
        Config::set('themes.default.input-one-time-code.digits', 2);

        $template = <<<'HTML'
            <x-input-otc name="code" required-input />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', digits: 2, value: '' })" x-modelable="value">
                <fieldset class="fs-code-otc">
                    <input id="code-1" data-digit="1" x-model="digit_1" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" required />
                    <input id="code-2" data-digit="2" x-model="digit_2" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" required />
                </fieldset>
                <input type="hidden" name="code" id="code" x-model="value" />
                <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_one_time_passcode_field_with_custom_class_can_be_rendered(): void
    {
        Config::set('themes.default.input-one-time-code.digits', 2);

        $template = <<<'HTML'
            <x-input-otc name="code" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', digits: 2, value: '' })" x-modelable="value" class="float-right">
                <fieldset class="fs-code-otc">
                    <input id="code-1" data-digit="1" x-model="digit_1" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                    <input id="code-2" data-digit="2" x-model="digit_2" type="number" class="background border color font other padding rounded shadow width" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                </fieldset>
                <input type="hidden" name="code" id="code" x-model="value" />
                <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_one_time_passcode_field_with_custom_attribute_can_be_rendered(): void
    {
        Config::set('themes.default.input-one-time-code.digits', 2);

        $template = <<<'HTML'
            <x-input-otc name="code" onclick="alert('test')" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputOneTimeCode({ name: 'code', 'digit_1': '', 'digit_2': '', digits: 2, value: '' })" x-modelable="value">
                <fieldset class="fs-code-otc">
                    <input id="code-1" data-digit="1" x-model="digit_1" type="number" class="background border color font other padding rounded shadow width" onclick="alert('test')" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                    <input id="code-2" data-digit="2" x-model="digit_2" type="number" class="background border color font other padding rounded shadow width" onclick="alert('test')" pattern="[0-9]*" min="0" max="9" maxlength="1" />
                </fieldset>
                <input type="hidden" name="code" id="code" x-model="value" />
                <style> fieldset.fs-code-otc input::-webkit-outer-spin-button, fieldset.fs-code-otc input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
