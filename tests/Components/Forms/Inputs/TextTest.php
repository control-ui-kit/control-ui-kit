<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class TextTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-text.background', 'background');
        Config::set('themes.default.input-text.border', 'border');
        Config::set('themes.default.input-text.color', 'color');
        Config::set('themes.default.input-text.font', 'font');
        Config::set('themes.default.input-text.other', 'other');
        Config::set('themes.default.input-text.padding', 'padding');
        Config::set('themes.default.input-text.rounded', 'rounded');
        Config::set('themes.default.input-text.shadow', 'shadow');
    }

    /** @test */
    public function an_input_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.text name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.text name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.text name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="1 2 3 4 5 6 7 8" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_with_placeholder_amended(): void
    {
        $template = <<<'HTML'
            <x-input.text name="name" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" placeholder="placeholder text" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.text name="name" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" value="test_value" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
