<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class CurrencyTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-currency.decimals', 2);
        Config::set('themes.default.input-currency.decimals-fixed', true);
        Config::set('themes.default.input-currency.onblur', '');
        Config::set('themes.default.input-currency.default', '');
        Config::set('themes.default.input-currency.prefix-text', '');
        Config::set('themes.default.input-currency.type', 'number');

        Config::set('themes.default.input-currency.background', 'background');
        Config::set('themes.default.input-currency.border', 'border');
        Config::set('themes.default.input-currency.color', 'color');
        Config::set('themes.default.input-currency.font', 'font');
        Config::set('themes.default.input-currency.other', 'other');
        Config::set('themes.default.input-currency.padding', 'padding');
        Config::set('themes.default.input-currency.rounded', 'rounded');
        Config::set('themes.default.input-currency.shadow', 'shadow');
        Config::set('themes.default.input-currency.width', 'width');
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.currency name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.currency name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" step="0.01" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.currency name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" step="0.01" class="1 2 3 4 5 6 7 8 9" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_with_placeholder_amended(): void
    {
        $template = <<<'HTML'
            <x-input.currency name="name" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" placeholder="placeholder text" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.currency name="name" value="123" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="123.00" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered_with_onblur_inline(): void
    {
        $template = <<<'HTML'
            <x-input.currency name="name" onblur="::someBlur" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" onblur="::someBlur" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered_with_onblur_from_config(): void
    {
        Config::set('themes.default.input-currency.onblur', '::someBlur');

        $template = <<<'HTML'
            <x-input.currency name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" onblur="::someBlur" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered_with_onblur_containing_variable_from_config(): void
    {
        Config::set('themes.default.input-currency.decimals', '2');
        Config::set('themes.default.input-currency.onblur', 'formatCurrency(this, {{ $decimals }})');

        $template = <<<'HTML'
            <x-input.currency name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" onblur="formatCurrency(this, 2)" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered_with_onblur_containing_variable_from_inline(): void
    {
        Config::set('themes.default.input-currency.decimals', '2');
        Config::set('themes.default.input-currency.onblur', 'formatCurrency(this, {{ $decimals }})');

        $template = <<<'HTML'
            <x-input.currency name="name" decimals="3" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" onblur="formatCurrency(this, 3)" step="0.001" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered_with_large_decimal_value_which_is_rounded(): void
    {
        Config::set('themes.default.input-currency.decimals', '2');
        Config::set('themes.default.input-currency.default', '0.00');

        $template = <<<'HTML'
            <x-input.currency name="name" value="24.99999999999" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="25.00" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered_with_config_default(): void
    {
        Config::set('themes.default.input-currency.decimals', '2');
        Config::set('themes.default.input-currency.decimals-fixed', true);
        Config::set('themes.default.input-currency.default', '0.00');

        $template = <<<'HTML'
            <x-input.currency name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="0.00" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
