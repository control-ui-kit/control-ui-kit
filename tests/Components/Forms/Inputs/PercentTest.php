<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class PercentTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-percent.background', 'background');
        Config::set('themes.default.input-percent.border', 'border');
        Config::set('themes.default.input-percent.color', 'color');
        Config::set('themes.default.input-percent.font', 'font');
        Config::set('themes.default.input-percent.other', 'other');
        Config::set('themes.default.input-percent.padding', 'padding');
        Config::set('themes.default.input-percent.rounded', 'rounded');
        Config::set('themes.default.input-percent.shadow', 'shadow');
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.percent name="name" value="1" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="1" min="0" max="100" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.percent name="name" value="1" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="1" min="0" max="100" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.percent name="name" value="1" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="1" min="0" max="100" class="1 2 3 4 5 6 7 8" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.percent name="name" value="new_test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="new_test_value" min="0" max="100" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
