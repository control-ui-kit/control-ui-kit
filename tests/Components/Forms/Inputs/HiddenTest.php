<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class HiddenTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-hidden.other', 'other');
        Config::set('themes.default.input-hidden.padding', 'padding');
    }

    /** @test */
    public function an_input_hidden_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.hidden name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="hidden" id="name" class="other padding" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_hidden_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.hidden name="name" other="none" padding="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="hidden" id="name" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_hidden_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.hidden name="name" other="5" padding="6" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="hidden" id="name" class="5 6" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_hidden_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.hidden name="name" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="hidden" id="name" value="test_value" class="other padding" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
