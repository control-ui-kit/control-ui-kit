<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class TextareaTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-textarea.background', 'background');
        Config::set('themes.default.input-textarea.border', 'border');
        Config::set('themes.default.input-textarea.color', 'color');
        Config::set('themes.default.input-textarea.font', 'font');
        Config::set('themes.default.input-textarea.other', 'other');
        Config::set('themes.default.input-textarea.padding', 'padding');
        Config::set('themes.default.input-textarea.rounded', 'rounded');
        Config::set('themes.default.input-textarea.shadow', 'shadow');
        Config::set('themes.default.input-textarea.width', 'width');
    }

    /** @test */
    public function an_input_textarea_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.textarea name="name" />
            HTML;

        $expected = <<<'HTML'
            <textarea name="name" id="name" class="background border color font other padding rounded shadow width"></textarea>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_textarea_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.textarea name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <textarea name="name" id="name"></textarea>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_textarea_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.textarea name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <textarea name="name" id="name" class="1 2 3 4 5 6 7 8 9"></textarea>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_textarea_component_with_placeholder_amended(): void
    {
        $template = <<<'HTML'
            <x-input.textarea name="name" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <textarea name="name" id="name" placeholder="placeholder text" class="background border color font other padding rounded shadow width"></textarea>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_textarea_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.textarea name="name" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <textarea name="name" id="name" class="background border color font other padding rounded shadow width">test_value</textarea>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
