<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class RoyaltyTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

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

    #[Test]
    public function an_input_royalty_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_royalty_symbol(): void
    {
        Config::set('themes.default.input-royalty.prefix-text', '£');

        $template = <<<'HTML'
            <x-input-royalty name="name" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="prefix-background prefix-border prefix-color prefix-font prefix-other prefix-padding prefix-rounded prefix-shadow"> £ </div>
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="input-background input-border input-color royalty-input-font input-other input-padding input-rounded input-shadow" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_inline_royalty_symbol(): void
    {
        Config::set('themes.default.input-royalty.prefix-text', '£');

        $template = <<<'HTML'
            <x-input-royalty name="name" symbol="$" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="prefix-background prefix-border prefix-color prefix-font prefix-other prefix-padding prefix-rounded prefix-shadow"> $ </div>
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="input-background input-border input-color royalty-input-font input-other input-padding input-rounded input-shadow" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="9">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="1 2 3 4 5 6 7 8 9" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_with_placeholder_amended(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" placeholder="placeholder text" min="0" step="0.01" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" value="123" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: 123, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_onblur(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" onblur="::someBlur" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="background border color royalty-font other padding rounded shadow width" onblur="::someBlur" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_large_decimal_value_which_is_rounded(): void
    {
        Config::set('themes.default.input-royalty.decimals', 2);
        Config::set('themes.default.input-royalty.default', 0.00);

        $template = <<<'HTML'
            <x-input-royalty name="name" value="24.99999999999" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: 25, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_config_default(): void
    {
        Config::set('themes.default.input-royalty.decimals', 1);
        Config::set('themes.default.input-royalty.default', 0.00);

        $template = <<<'HTML'
            <x-input-royalty name="name" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: 0, decimals: 1, min: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.1" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_inline_decimals(): void
    {
        Config::set('themes.default.input-royalty.decimals', 4);
        Config::set('themes.default.input-royalty.default', 0.00);

        $template = <<<'HTML'
            <x-input-royalty name="name" value="1.23456789" step="0.1" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: 1.2346, decimals: 4, min: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.1" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_allow_negatives_enabled(): void
    {
        Config::set('themes.default.input-royalty.min', 0);

        $template = <<<'HTML'
            <x-input-royalty name="name" allow-negatives />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" step="0.01" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_min_disabled(): void
    {
        Config::set('themes.default.input-royalty.min', 10);
        Config::set('themes.default.input-royalty.max', null);

        $template = <<<'HTML'
            <x-input-royalty name="name" min="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" step="0.01" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_max_disabled(): void
    {
        Config::set('themes.default.input-royalty.min', null);
        Config::set('themes.default.input-royalty.max', 10);

        $template = <<<'HTML'
            <x-input-royalty name="name" max="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" step="0.01" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_step_disabled(): void
    {
        Config::set('themes.default.input-royalty.min', null);

        $template = <<<'HTML'
            <x-input-royalty name="name" step="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_min_and_max_values(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" min="1.4" max="8.9" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, max: 8.9, min: 1.4, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" min="1.4" max="8.9" step="0.01" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_custom_step(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" step="0.1" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.1" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_no_symbol_and_with_custom_attributes(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" onblur="console.log(this)" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="background border color royalty-font other padding rounded shadow width" onblur="console.log(this)" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_symbol_and_with_custom_attributes(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" symbol="£" onblur="console.log(this)" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="prefix-background prefix-border prefix-color prefix-font prefix-other prefix-padding prefix-rounded prefix-shadow"> £ </div>
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="input-background input-border input-color royalty-input-font input-other input-padding input-rounded input-shadow" onblur="console.log(this)" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_no_symbol_and_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-width float-right">
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="background border color royalty-font other padding rounded shadow width" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_royalty_component_can_be_rendered_with_symbol_and_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-royalty name="name" symbol="£" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'name', value: null, decimals: 2, min: 0, })" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width float-right">
                <div class="prefix-background prefix-border prefix-color prefix-font prefix-other prefix-padding prefix-rounded prefix-shadow"> £ </div>
                <input type="number" id="name_display" x-model.lazy="display" min="0" step="0.01" class="input-background input-border input-color royalty-input-font input-other input-padding input-rounded input-shadow" />
                <input name="name" type="hidden" id="name" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
