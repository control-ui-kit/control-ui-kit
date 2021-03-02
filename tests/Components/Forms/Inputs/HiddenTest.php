<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class HiddenTest extends ComponentTestCase
{
    /** @test */
    public function an_input_hidden_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.hidden name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="hidden" id="name" value="name" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_hidden_component_with_id_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.hidden name="name" id="something_else" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="hidden" id="something_else" value="name" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_hidden_component_with_value_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.hidden name="name" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="hidden" id="name" value="test_value" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
