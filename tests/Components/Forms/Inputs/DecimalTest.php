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

        Config::set('themes.default.input-decimal.onblur', '');
        Config::set('themes.default.input-decimal.decimals', 2);
        Config::set('themes.default.input-decimal.default', '');
        Config::set('themes.default.input-decimal.prefix-text', '');
        Config::set('themes.default.input-decimal.type', 'number');

        Config::set('themes.default.input-decimal.background', 'background');
        Config::set('themes.default.input-decimal.border', 'border');
        Config::set('themes.default.input-decimal.color', 'color');
        Config::set('themes.default.input-decimal.font', 'font');
        Config::set('themes.default.input-decimal.other', 'other');
        Config::set('themes.default.input-decimal.padding', 'padding');
        Config::set('themes.default.input-decimal.rounded', 'rounded');
        Config::set('themes.default.input-decimal.shadow', 'shadow');
        Config::set('themes.default.input-decimal.width', 'width');
    }

    /** @test */
    public function an_input_decimal_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-decimal name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_decimal_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-decimal name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" step="0.01" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_decimal_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-decimal name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" step="0.01" class="1 2 3 4 5 6 7 8 9" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_input_decimal_component_can_be_rendered_with_onblur_containing_decimal_variable(): void
    {
        Config::set('themes.default.input-decimal.decimals', '3');
        Config::set('themes.default.input-decimal.onblur', 'formatDecimal(this, {{ $decimals }})');

        $template = <<<'HTML'
            <x-input-decimal name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" onblur="formatDecimal(this, 3)" step="0.001" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
