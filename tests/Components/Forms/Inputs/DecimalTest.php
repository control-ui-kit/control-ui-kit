<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class DecimalTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-decimal.background', 'background');
        Config::set('themes.default.input-decimal.border', 'border');
        Config::set('themes.default.input-decimal.color', 'color');
        Config::set('themes.default.input-decimal.font', 'font');
        Config::set('themes.default.input-decimal.other', 'other');
        Config::set('themes.default.input-decimal.padding', 'padding');
        Config::set('themes.default.input-decimal.rounded', 'rounded');
        Config::set('themes.default.input-decimal.shadow', 'shadow');
        Config::set('themes.default.input-decimal.width', 'width');

        Config::set('themes.default.input-decimal.decimals', 2);
        Config::set('themes.default.input-decimal.default', '');
        Config::set('themes.default.input-decimal.min', null);
        Config::set('themes.default.input-decimal.max', null);

        Config::set('themes.default.input-decimal.prefix-text', '');
        Config::set('themes.default.input-decimal.type', 'number');

        Config::set('themes.default.input-decimal.font', 'decimal-font');
        Config::set('themes.default.input-decimal.input-font', 'decimal-input-font');

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
    public function an_input_decimal_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-decimal name="value" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: null, decimals: 2, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" class="background border color decimal-font other padding rounded shadow width" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_decimal_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-decimal name="value" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: null, decimals: 2, })" x-modelable="value">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_decimal_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-decimal name="value" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: null, decimals: 2, })" x-modelable="value" class="9">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" class="1 2 3 4 5 6 7 8 9" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_decimal_component_with_custom_class_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-decimal name="value" value="9" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: 9, decimals: 2, })" x-modelable="value" class="wrapper-width float-right">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" class="background border color decimal-font other padding rounded shadow width" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_decimal_component_with_custom_attribute_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-decimal name="value" value="9" onblur="console.log(this)" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: 9, decimals: 2, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" class="background border color decimal-font other padding rounded shadow width" onblur="console.log(this)" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
