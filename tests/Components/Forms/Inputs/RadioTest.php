<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Tests\Components\ComponentTestCase;

class RadioTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function an_input_radio_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.radio name="name" value="value_field" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="radio" id="name_value_field" value="value_field" class="h-4 w-4 bg-input text-brand focus:ring-brand cursor-pointer border-input" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_radio_component_can_be_rendered_when_checked(): void
    {
        $template = <<<'HTML'
            <x-input.radio name="name" value="value_field" checked="1" class="" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="radio" id="name_value_field" value="value_field" checked class="h-4 w-4 bg-input text-brand focus:ring-brand cursor-pointer border-input" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
