<?php

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class RangeFieldTest extends ComponentTestCase
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

        Config::set('themes.default.input-range.default-range', 'brand');
        Config::set('themes.default.input-range.default-size', 'md');
        Config::set('themes.default.input-range.min', 1);
        Config::set('themes.default.input-range.max', 100);
        Config::set('themes.default.input-range.step', 1);

        Config::set('themes.default.input-range.show-max', false);
        Config::set('themes.default.input-range.show-min', false);
        Config::set('themes.default.input-range.show-value', false);

        Config::set('themes.default.input-range.background', 'background');
        Config::set('themes.default.input-range.border', 'border');
        Config::set('themes.default.input-range.color', 'color');
        Config::set('themes.default.input-range.other', 'other');
        Config::set('themes.default.input-range.padding', 'padding');
        Config::set('themes.default.input-range.rounded', 'rounded');
        Config::set('themes.default.input-range.shadow', 'shadow');
        Config::set('themes.default.input-range.width', 'width');

        Config::set('themes.default.input-range.pill-background', 'pill-background');
        Config::set('themes.default.input-range.pill-border', 'pill-border');
        Config::set('themes.default.input-range.pill-color', 'pill-color');
        Config::set('themes.default.input-range.pill-font', 'pill-font');
        Config::set('themes.default.input-range.pill-other', 'pill-other');
        Config::set('themes.default.input-range.pill-padding', 'pill-padding');
        Config::set('themes.default.input-range.pill-rounded', 'pill-rounded');
        Config::set('themes.default.input-range.pill-shadow', 'pill-shadow');
        Config::set('themes.default.input-range.pill-width', 'pill-width');
        Config::set('themes.default.input-range.pill-min', 'pill-min');
        Config::set('themes.default.input-range.pill-max', 'pill-max');
        Config::set('themes.default.input-range.pill-value', 'pill-value');
    }

    /** @test */
    public function the_range_form_field_component_can_be_rendered(): void
    {
        $this->withViewErrors(['number' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-range label="Number" name="number" value="5" help="Some help text" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="number" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Number</span> </p>
                    <p class="help-style">Some help text</p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputRange({ id: 'number', value: '5'})" x-modelable="value" class="background border color other padding rounded shadow width">
                            <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="5" class="range range-brand range-md" />
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
    public function the_range_form_field_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['number' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-range label="Number" name="number" value="5" help="Some help text" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="number" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Number</span> </p>
                    <p class="help-style">Some help text</p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputRange({ id: 'number', value: '5'})" x-modelable="value" class="background border color other padding rounded shadow width">
                            <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="5" class="range range-brand range-md" />
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
    public function the_range_form_field_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['number' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-range label="Number" name="number" value="5" help="Some help text" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="number" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Number</span> </p>
                    <p class="help-style">Some help text</p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputRange({ id: 'number', value: '5'})" x-modelable="value" class="background border color other padding rounded shadow width">
                            <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="5" class="range range-brand range-md" onclick="alert('here')" />
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
