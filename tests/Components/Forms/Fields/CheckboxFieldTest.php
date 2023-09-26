<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class CheckboxFieldTest extends ComponentTestCase
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

        Config::set('themes.default.input-checkbox.background', 'background');
        Config::set('themes.default.input-checkbox.border', 'border');
        Config::set('themes.default.input-checkbox.color', 'color');
        Config::set('themes.default.input-checkbox.other', 'other');
        Config::set('themes.default.input-checkbox.padding', 'padding');
        Config::set('themes.default.input-checkbox.rounded', 'rounded');
        Config::set('themes.default.input-checkbox.shadow', 'shadow');
    }

    /** @test */
    public function the_field_checkbox_component_can_be_rendered(): void
    {
        $this->withViewErrors(['enable' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-checkbox name="enable" label="Enable" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="enable" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Enable</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="enable" type="checkbox" id="enable" value="1" class="background border color other padding rounded shadow" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_field_checkbox_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['enable' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-checkbox name="enable" label="Enable" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="enable" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Enable</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="enable" type="checkbox" id="enable" value="1" class="background border color other padding rounded shadow" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_field_checkbox_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['enable' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-checkbox name="enable" label="Enable" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="enable" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Enable</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="enable" type="checkbox" id="enable" value="1" class="background border color other padding rounded shadow" onclick="alert('here')" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
