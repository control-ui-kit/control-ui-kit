<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ToggleTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

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

    #[Test]
    public function an_input_toggle_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '0', on: '1', off: '0' })" x-modelable="value" class="background border other padding shadow">
                <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="flipToggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                <input type="hidden" name="enable" id="enable" value="0" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_toggle_component_can_be_rendered_with_no_wrapper_styles(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" background="none" border="none" other="none" padding="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '0', on: '1', off: '0' })" x-modelable="value">
                <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="flipToggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                <input type="hidden" name="enable" id="enable" value="0" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_toggle_component_can_be_rendered_with_inline_wrapper_styles(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" background="1" border="2" other="3" padding="4" shadow="5" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '0', on: '1', off: '0' })" x-modelable="value" class="1 2 3 4 5">
                <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="flipToggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                <input type="hidden" name="enable" id="enable" value="0" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_toggle_component_can_be_rendered_with_no_base_styles(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" base-animation="none" base-background="none" base-border="none" base-focus="none" base-other="none" base-rounded="none" base-shadow="none" base-size="none" base-state-off="none" base-state-on="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '0', on: '1', off: '0' })" x-modelable="value" class="background border other padding shadow">
                <button type="button" :class="{ '': value == on, '': value == off }" class="" @click.prevent="flipToggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                <input type="hidden" name="enable" id="enable" value="0" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_toggle_component_can_be_rendered_with_inline_base_styles(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" base-animation="1" base-background="2" base-border="3" base-focus="4" base-other="5" base-rounded="6" base-shadow="7" base-size="8" base-state-off="9" base-state-on="10" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '0', on: '1', off: '0' })" x-modelable="value" class="background border other padding shadow">
                <button type="button" :class="{ '10': value == on, '9': value == off }" class="1 2 3 4 5 6 7 8" @click.prevent="flipToggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                <input type="hidden" name="enable" id="enable" value="0" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_toggle_component_can_be_rendered_with_no_switch_styles(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" switch-animation="none" switch-background="none" switch-border="none" switch-focus="none" switch-other="none" switch-rounded="none" switch-shadow="none" switch-size="none" switch-state-off="none" switch-state-on="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '0', on: '1', off: '0' })" x-modelable="value" class="background border other padding shadow">
                <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="flipToggle()"> <span :class="{ '': value == on, '': value == off }" class=""></span> </button>
                <input type="hidden" name="enable" id="enable" value="0" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_toggle_component_can_be_rendered_with_inline_switch_styles(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" switch-animation="1" switch-background="2" switch-border="3" switch-focus="4" switch-other="5" switch-rounded="6" switch-shadow="7" switch-size="8" switch-state-off="9" switch-state-on="10" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '0', on: '1', off: '0' })" x-modelable="value" class="background border other padding shadow">
                <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="flipToggle()"> <span :class="{ '10': value == on, '9': value == off }" class="1 2 3 4 5 6 7 8"></span> </button>
                <input type="hidden" name="enable" id="enable" value="0" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_toggle_component_with_on_and_off_states_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" off="::off" on="::on" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '::off', on: '::on', off: '::off' })" x-modelable="value" class="background border other padding shadow">
                <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="flipToggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                <input type="hidden" name="enable" id="enable" value="::off" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_toggle_component_with_on_and_off_states_and_value_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" off="::off" on="::on" value="::on" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '::on', on: '::on', off: '::off' })" x-modelable="value" class="background border other padding shadow">
                <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="flipToggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                <input type="hidden" name="enable" id="enable" value="::on" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_toggle_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '0', on: '1', off: '0' })" x-modelable="value" class="background border other padding shadow float-right">
                <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="flipToggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                <input type="hidden" name="enable" id="enable" value="0" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_toggle_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-toggle name="enable" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputToggle({ value: '0', on: '1', off: '0' })" x-modelable="value" class="background border other padding shadow" onclick="alert('here')">
                <button type="button" :class="{ 'base-state-on': value == on, 'base-state-off': value == off }" class="base-animation base-background base-border base-focus base-other base-rounded base-shadow base-size" @click.prevent="flipToggle()"> <span :class="{ 'switch-state-on': value == on, 'switch-state-off': value == off }" class="switch-background switch-border switch-focus switch-other switch-rounded switch-shadow switch-size"></span> </button>
                <input type="hidden" name="enable" id="enable" value="0" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
