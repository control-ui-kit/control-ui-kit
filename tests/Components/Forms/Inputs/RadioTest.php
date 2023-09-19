<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class RadioTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-radio.background', 'background');
        Config::set('themes.default.input-radio.border', 'border');
        Config::set('themes.default.input-radio.color', 'color');
        Config::set('themes.default.input-radio.other', 'other');
        Config::set('themes.default.input-radio.padding', 'padding');
        Config::set('themes.default.input-radio.rounded', 'rounded');
        Config::set('themes.default.input-radio.shadow', 'shadow');
    }

    /** @test */
    public function an_input_radio_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-radio name="name" value="value_field" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="radio" id="name_value_field" value="value_field" class="background border color other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-radio name="name" value="value_field" background="none" border="none" color="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="radio" id="name_value_field" value="value_field" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-radio name="name" value="value_field" background="1" border="2" color="3" other="4" padding="5" rounded="6" shadow="7" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="radio" id="name_value_field" value="value_field" class="1 2 3 4 5 6 7" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input-radio name="name" value="new_test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="radio" id="name_new_test_value" value="new_test_value" class="background border color other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_component_can_be_rendered_when_checked(): void
    {
        $template = <<<'HTML'
            <x-input-radio name="name" value="value_field" checked="1" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="radio" id="name_value_field" value="value_field" checked class="background border color other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
