<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Tests\Components\ComponentTestCase;

class HiddenTest extends ComponentTestCase
{
    /** @test */
    public function an_input_hidden_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-hidden name="name" />
            HTML;

        $expected = <<<'HTML'
            <input type="hidden" name="name" id="name" value="name" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_hidden_component_with_id_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-hidden name="name" id="something_else" />
            HTML;

        $expected = <<<'HTML'
            <input type="hidden" name="name" id="something_else" value="name" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_hidden_component_with_alpine_model_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-hidden name="name" id="something_else" x-model="test" />
            HTML;

        $expected = <<<'HTML'
            <input type="hidden" name="name" id="something_else" value="name" x-model="test" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_hidden_component_with_livewire_model_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-hidden name="name" id="something_else" wire:model="test" />
            HTML;

        $expected = <<<'HTML'
            <input type="hidden" name="name" id="something_else" value="name" wire:model="test" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_hidden_component_with_value_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-hidden name="name" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <input type="hidden" name="name" id="name" value="test_value" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
