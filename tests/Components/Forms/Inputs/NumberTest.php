<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class NumberTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-number.background', 'background');
        Config::set('themes.default.input-number.border', 'border');
        Config::set('themes.default.input-number.color', 'color');
        Config::set('themes.default.input-number.font', 'font');
        Config::set('themes.default.input-number.other', 'other');
        Config::set('themes.default.input-number.padding', 'padding');
        Config::set('themes.default.input-number.rounded', 'rounded');
        Config::set('themes.default.input-number.shadow', 'shadow');
    }

    /** @test */
    public function an_input_number_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.number name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.number name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.number name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" class="1 2 3 4 5 6 7 8" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_with_placeholder_amended(): void
    {
        $template = <<<'HTML'
            <x-input.number name="name" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" placeholder="placeholder text" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.number name="name" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="test_value" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
