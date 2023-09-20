<?php

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class RoyaltyFieldTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.label.font', 'label-font');

        Config::set('themes.default.error.color', 'color');
        Config::set('themes.default.error.font', 'font');
        Config::set('themes.default.error.other', 'other');
        Config::set('themes.default.error.padding', 'padding');

        Config::set('themes.default.form-layout-inline.field-wrapper', 'field-wrapper');
        Config::set('themes.default.form-layout-inline.error-text', 'error-text');
        Config::set('themes.default.form-layout-inline.help-desktop', 'help-desktop');
        Config::set('themes.default.form-layout-inline.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-inline.label-text', 'label-text');
        Config::set('themes.default.form-layout-inline.label-wrapper', 'label-wrapper');
        Config::set('themes.default.form-layout-inline.required-icon-size', 'required-icon-size');
        Config::set('themes.default.form-layout-inline.required-icon-color', 'required-icon-color');
        Config::set('themes.default.form-layout-inline.slot-wrapper', 'slot-wrapper');
        Config::set('themes.default.form-layout-inline.wrapper', 'wrapper');

        Config::set('themes.default.input-royalty.decimals', 2);
        Config::set('themes.default.input-royalty.default', '');
        Config::set('themes.default.input-royalty.min', 0);
        Config::set('themes.default.input-royalty.max', null);

        Config::set('themes.default.input-royalty.prefix-text', '');
        Config::set('themes.default.input-royalty.type', 'number');

        Config::set('themes.default.input-royalty.font', 'royalty-font');
        Config::set('themes.default.input-royalty.input-font', 'royalty-input-font');

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
    public function the_field_royalty_component_can_be_rendered(): void
    {
        $this->withViewErrors(['value' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-royalty name="value" label="Value" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="value_display" class="label-font label-wrapper">
                    <p class="label-text"> <span>Value</span> </p>
                </label>
                <div class="field-wrapper">
                    <div class="slot-wrapper">
                        <div x-data="Components.inputNumber({ id: 'value', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-width">
                            <input type="number" id="value_display" x-model.lazy="display" min="0" step="0.01" class="background border color royalty-font other padding rounded shadow width" />
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
