<?php

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class NumberFieldTest extends ComponentTestCase
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
        Config::set('themes.default.form-layout-inline.error-text', 'error-text');
        Config::set('themes.default.form-layout-responsive.help', 'help-style');
        Config::set('themes.default.form-layout-responsive.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-responsive.text', 'text-style');
        Config::set('themes.default.form-layout-responsive.label', 'label-style');
        Config::set('themes.default.form-layout-responsive.required-size', 'required-size');
        Config::set('themes.default.form-layout-responsive.required-color', 'required-color');
        Config::set('themes.default.form-layout-responsive.slot', 'slot-style');
        Config::set('themes.default.form-layout-responsive.wrapper', 'wrapper');

        Config::set('themes.default.input-number.decimals', 0);
        Config::set('themes.default.input-number.default', '');
        Config::set('themes.default.input-number.min', null);
        Config::set('themes.default.input-number.max', null);

        Config::set('themes.default.input-number.prefix-text', '');
        Config::set('themes.default.input-number.type', 'number');

        Config::set('themes.default.input-number.font', 'number-font');
        Config::set('themes.default.input-number.input-font', 'number-input-font');

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

        Config::set('themes.default.input.background', 'background');
        Config::set('themes.default.input.border', 'border');
        Config::set('themes.default.input.color', 'color');
        Config::set('themes.default.input.font', 'font');
        Config::set('themes.default.input.other', 'other');
        Config::set('themes.default.input.padding', 'padding');
        Config::set('themes.default.input.rounded', 'rounded');
        Config::set('themes.default.input.shadow', 'shadow');
        Config::set('themes.default.input.width', 'width');

        Config::set('themes.default.input.wrapper-width', 'wrapper-width');
    }

    /** @test */
    public function the_field_number_component_can_be_rendered(): void
    {
        $this->withViewErrors(['value' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-number name="value" label="Value" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="value_display" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Value</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputNumber({ id: 'value', value: null, decimals: 0, })" x-modelable="value" class="wrapper-width">
                            <input type="number" id="value_display" x-model.lazy="display" step="1" class="background border color number-font other padding rounded shadow width" />
                            <input name="value" type="hidden" id="value" x-model="value" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
