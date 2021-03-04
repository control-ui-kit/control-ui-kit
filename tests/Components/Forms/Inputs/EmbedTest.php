<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class EmbedTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-embed.background', 'embed-background');
        Config::set('themes.default.input-embed.border', 'embed-border');
        Config::set('themes.default.input-embed.color', 'embed-color');
        Config::set('themes.default.input-embed.font', 'embed-font');
        Config::set('themes.default.input-embed.left', 'embed-left');
        Config::set('themes.default.input-embed.icon-size', 'embed-icon-size');
        Config::set('themes.default.input-embed.other', 'embed-other');
        Config::set('themes.default.input-embed.padding', 'embed-padding');
        Config::set('themes.default.input-embed.right', 'embed-right');
        Config::set('themes.default.input-embed.rounded', 'embed-rounded');
        Config::set('themes.default.input-embed.shadow', 'embed-shadow');
    }

    /** @test */
    public function an_input_embed_component_slot_left_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="left">::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-left"> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_slot_left_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="left" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" left="none">::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_slot_left_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="left" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" left="9">::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9"> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_slot_right_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="right">::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-right"> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_slot_right_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="right" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" right="none">::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_slot_right_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="right" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" right="9">::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9"> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_left_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="left" icon="icon.dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-left">
                <svg class="embed-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_left_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="left" icon="icon.dot" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" left="none" />
            HTML;

        $expected = <<<'HTML'
            <div>
                <svg class="embed-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_left_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="left" icon="icon.dot" icon-size="custom-size" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" left="9" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9">
                <svg class="custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_right_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="right" icon="icon.dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-right">
                <svg class="embed-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_right_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="right" icon="icon.dot" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" right="none" />
            HTML;

        $expected = <<<'HTML'
            <div>
                <svg class="embed-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_right_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="right" icon="icon.dot" icon-size="custom-size" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" right="9" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9">
                <svg class="custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_right_can_be_rendered_with_bulk_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed position="left" icon="icon.dot" icon-size="custom-size" :styles="[
                'background' => '1',
                'border' => '2',
                'color' => '3',
                'font' => '4',
                'other' => '5',
                'padding' => '6',
                'rounded' => '7',
                'shadow' => '8',
            ]"/>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 embed-left">
                <svg class="custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
