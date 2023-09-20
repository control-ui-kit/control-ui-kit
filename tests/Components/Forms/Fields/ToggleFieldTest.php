<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class ToggleFieldTest extends ComponentTestCase
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
        Config::set('themes.default.form-layout-inline.help-desktop', 'help-desktop');
        Config::set('themes.default.form-layout-inline.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-inline.label-text', 'label-text');
        Config::set('themes.default.form-layout-inline.label-wrapper', 'label-wrapper');
        Config::set('themes.default.form-layout-inline.required-icon-size', 'required-icon-size');
        Config::set('themes.default.form-layout-inline.required-icon-color', 'required-icon-color');
        Config::set('themes.default.form-layout-inline.slot-wrapper', 'slot-wrapper');
        Config::set('themes.default.form-layout-inline.wrapper', 'wrapper');

        Config::set('themes.default.input-toggle.background', 'background');
        Config::set('themes.default.input-toggle.border', 'border');
        Config::set('themes.default.input-toggle.other', 'other');
        Config::set('themes.default.input-toggle.padding', 'padding');
        Config::set('themes.default.input-toggle.shadow', 'shadow');

        Config::set('themes.default.input-toggle.base-animation', 'base-animation');
        Config::set('themes.default.input-toggle.base-background', 'base-background');
        Config::set('themes.default.input-toggle.base-border', 'base-border');
        Config::set('themes.default.input-toggle.base-focus', 'base-focus');
        Config::set('themes.default.input-toggle.base-other', 'base-other');
        Config::set('themes.default.input-toggle.base-rounded', 'base-rounded');
        Config::set('themes.default.input-toggle.base-shadow', 'base-shadow');
        Config::set('themes.default.input-toggle.base-size', 'base-size');
        Config::set('themes.default.input-toggle.base-state-off', 'base-state-off');
        Config::set('themes.default.input-toggle.base-state-on', 'base-state-on');

        Config::set('themes.default.input-toggle.switch-animation', 'switch-background');
        Config::set('themes.default.input-toggle.switch-background', 'switch-background');
        Config::set('themes.default.input-toggle.switch-border', 'switch-border');
        Config::set('themes.default.input-toggle.switch-focus', 'switch-focus');
        Config::set('themes.default.input-toggle.switch-other', 'switch-other');
        Config::set('themes.default.input-toggle.switch-rounded', 'switch-rounded');
        Config::set('themes.default.input-toggle.switch-shadow', 'switch-shadow');
        Config::set('themes.default.input-toggle.switch-size', 'switch-size');
        Config::set('themes.default.input-toggle.switch-state-off', 'switch-state-off');
        Config::set('themes.default.input-toggle.switch-state-on', 'switch-state-on');
    }

    /** @test */
    public function the_field_toggle_component_can_be_rendered(): void
    {
        $this->withViewErrors(['enable' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-toggle name="enable" label="Enable" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-font label-wrapper">
                    <p class="label-text"> <span>Enable</span> </p>
                </label>
                <div class="field-wrapper">
                    <div class="slot-wrapper">
                        <span x-data="Components.toggle({ on: '1', off: '0', value: '0' })" class="background border other padding shadow">
                            <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="toggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                            <input type="hidden" name="enable" id="enable" value="0" x-model="value" />
                        </span>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
