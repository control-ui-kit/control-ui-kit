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

        Config::set('themes.default.input-currency.prefix-text', '');

        Config::set('themes.default.input-currency.background', 'background');
        Config::set('themes.default.input-currency.border', 'border');
        Config::set('themes.default.input-currency.color', 'color');
        Config::set('themes.default.input-currency.font', 'font');
        Config::set('themes.default.input-currency.other', 'other');
        Config::set('themes.default.input-currency.padding', 'padding');
        Config::set('themes.default.input-currency.rounded', 'rounded');
        Config::set('themes.default.input-currency.shadow', 'shadow');
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.currency name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" step="0.01" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_currency_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.currency name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
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
            <x-input.currency name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" step="0.01" class="1 2 3 4 5 6 7 8" />
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
            <input name="name" type="number" id="name" placeholder="placeholder text" step="0.01" class="background border color font other padding rounded shadow" />
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
            <input name="name" type="number" id="name" value="123" step="0.01" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
