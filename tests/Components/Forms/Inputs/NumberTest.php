<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use ControlUIKit\Exceptions\InputNumberException;
use Illuminate\Support\Facades\Config;
use Illuminate\View\ViewException;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class NumberTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

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
    public function an_input_number_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'age', value: null, decimals: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="age_display" x-model.lazy="display" step="1" class="background border color number-font other padding rounded shadow width" />
                <input name="age" type="hidden" id="age" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_number_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'age', value: null, decimals: 0, })" x-modelable="value">
                <input type="number" id="age_display" x-model.lazy="display" step="1" />
                <input name="age" type="hidden" id="age" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_number_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'age', value: null, decimals: 0, })" x-modelable="value" class="9">
                <input type="number" id="age_display" x-model.lazy="display" step="1" class="1 2 3 4 5 6 7 8 9" />
                <input name="age" type="hidden" id="age" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_number_component_with_placeholder_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'age', value: null, decimals: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="age_display" x-model.lazy="display" placeholder="placeholder text" step="1" class="background border color number-font other padding rounded shadow width" />
                <input name="age" type="hidden" id="age" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_number_component_with_value_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" value="4" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'age', value: 4, decimals: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="age_display" x-model.lazy="display" step="1" class="background border color number-font other padding rounded shadow width" />
                <input name="age" type="hidden" id="age" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_number_component_with_decimal_value_can_be_rendered(): void
    {
        Config::set('themes.default.input-number.decimals', 0);

        $template = <<<'HTML'
            <x-input-number name="age" value="4.89" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'age', value: 4.89, decimals: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="age_display" x-model.lazy="display" step="1" class="background border color number-font other padding rounded shadow width" />
                <input name="age" type="hidden" id="age" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_number_component_with_min_max_and_step_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="0" max="9" step="1" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'age', value: 9, decimals: 0, max: 9, min: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="age_display" x-model.lazy="display" min="0" max="9" step="1" class="background border color number-font other padding rounded shadow width" />
                <input name="age" type="hidden" id="age" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_number_component_with_custom_class_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" value="9" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'age', value: 9, decimals: 0, })" x-modelable="value" class="wrapper-width float-right">
                <input type="number" id="age_display" x-model.lazy="display" step="1" class="background border color number-font other padding rounded shadow width" />
                <input name="age" type="hidden" id="age" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_number_component_with_custom_attribute_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" value="9" onblur="console.log(this)" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'age', value: 9, decimals: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="age_display" x-model.lazy="display" step="1" class="background border color number-font other padding rounded shadow width" onblur="console.log(this)" />
                <input name="age" type="hidden" id="age" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_currency_component_can_be_rendered_with_allow_negatives_enabled(): void
    {
        Config::set('themes.default.input-currency.min', 0);

        $template = <<<'HTML'
            <x-input-number name="age" allow-negatives />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'age', value: null, decimals: 0, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="age_display" x-model.lazy="display" step="1" class="background border color number-font other padding rounded shadow width" />
                <input name="age" type="hidden" id="age" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_number_component_with_min_higher_than_max_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Specified min cannot be higher than specified max');

        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="19" max="9" step="1" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    #[Test]
    public function an_input_number_component_with_value_lower_than_min_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Value cannot be lower than specified min');

        $template = <<<'HTML'
            <x-input-number name="age" value="1" min="10" max="20" step="1" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    #[Test]
    public function an_input_number_component_with_value_higher_than_max_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Value cannot be higher than specified max');

        $template = <<<'HTML'
            <x-input-number name="age" value="10" min="0" max="9" step="1" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    #[Test]
    public function an_input_number_component_with_non_numeric_step_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Number not numeric [Step]');

        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="0" max="9" step="s" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    #[Test]
    public function an_input_number_component_with_non_numeric_min_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Number not numeric [Min]');

        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="s" max="9" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    #[Test]
    public function an_input_number_component_with_non_numeric_max_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Number not numeric [Max]');

        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="0" max="z" />
            HTML;

        $this->assertComponentRenders('', $template);
    }
}
