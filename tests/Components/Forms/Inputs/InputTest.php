<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Illuminate\View\ViewException;
use Tests\Components\ComponentTestCase;

class InputTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input.background', 'background');
        Config::set('themes.default.input.border', 'border');
        Config::set('themes.default.input.color', 'color');
        Config::set('themes.default.input.font', 'font');
        Config::set('themes.default.input.other', 'other');
        Config::set('themes.default.input.padding', 'padding');
        Config::set('themes.default.input.rounded', 'rounded');
        Config::set('themes.default.input.shadow', 'shadow');

        Config::set('themes.default.input.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'wrapper-shadow');

        Config::set('themes.default.input.input-background', 'input-background');
        Config::set('themes.default.input.input-border', 'input-border');
        Config::set('themes.default.input.input-color', 'input-color');
        Config::set('themes.default.input.input-font', 'input-font');
        Config::set('themes.default.input.input-other', 'input-other');
        Config::set('themes.default.input.input-padding', 'input-padding');
        Config::set('themes.default.input.input-rounded', 'input-rounded');
        Config::set('themes.default.input.input-shadow', 'input-shadow');

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
    public function an_input_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="1 2 3 4 5 6 7 8" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_appended_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" background="...1" border="...2"/>
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background 1 border 2 color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_with_placeholder_amended(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" placeholder="placeholder text" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" value="test_value" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_using_override_config_styles(): void
    {
        Config::set('themes.default.input-text.background', 'config-background');
        Config::set('themes.default.input-text.border', 'config-border');
        Config::set('themes.default.input-text.color', 'config-color');
        Config::set('themes.default.input-text.font', 'config-font');
        Config::set('themes.default.input-text.other', 'config-other');
        Config::set('themes.default.input-text.padding', 'config-padding');
        Config::set('themes.default.input-text.rounded', 'config-rounded');
        Config::set('themes.default.input-text.shadow', 'config-shadow');

        $template = <<<'HTML'
            <x-input name="name" type="text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="config-background config-border config-color config-font config-other config-padding config-rounded config-shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_left_icon(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" icon-left="icon.dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-left">
                    <svg class="embed-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_right_icon(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" icon-right="icon.dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-right">
                    <svg class="embed-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_prefix(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" prefix-text="::prefix" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-left"> ::prefix </div>
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_suffix(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" suffix-text="::suffix" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-right"> ::suffix </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_left_icon_and_custom_size(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" icon-left="icon.dot" icon-size="custom-size" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-left">
                    <svg class="custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_right_icon_and_custom_size(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" icon-right="icon.dot" icon-size="custom-size" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-right">
                    <svg class="custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_left_icon_and_no_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" icon-left="icon.dot" icon-background="none" icon-border="none" icon-color="none" icon-font="none" icon-other="none" icon-padding="none" icon-rounded="none" icon-shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="embed-left">
                    <svg class="embed-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_left_icon_and_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" icon-left="icon.dot" icon-background="1" icon-border="2" icon-color="3" icon-font="4" icon-other="5" icon-padding="6" icon-rounded="7" icon-shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="1 2 3 4 5 6 7 8 embed-left">
                    <svg class="embed-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_prefix_and_no_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" prefix-text="::prefix" prefix-background="none" prefix-border="none" prefix-color="none" prefix-font="none" prefix-other="none" prefix-padding="none" prefix-rounded="none" prefix-shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="embed-left"> ::prefix </div>
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_prefix_and_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" prefix-text="::prefix" prefix-background="1" prefix-border="2" prefix-color="3" prefix-font="4" prefix-other="5" prefix-padding="6" prefix-rounded="7" prefix-shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="1 2 3 4 5 6 7 8 embed-left"> ::prefix </div>
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_suffix_and_no_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" suffix-text="::suffix" suffix-background="none" suffix-border="none" suffix-color="none" suffix-font="none" suffix-other="none" suffix-padding="none" suffix-rounded="none" suffix-shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="embed-right"> ::suffix </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_suffix_and_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" suffix-text="::suffix" suffix-background="1" suffix-border="2" suffix-color="3" suffix-font="4" suffix-other="5" suffix-padding="6" suffix-rounded="7" suffix-shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="1 2 3 4 5 6 7 8 embed-right"> ::suffix </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_suffix_and_no_input_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" suffix-text="::suffix" input-background="none" input-border="none" input-color="none" input-font="none" input-other="none" input-padding="none" input-rounded="none" input-shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <input name="name" type="text" id="name" class="" />
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-right"> ::suffix </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_suffix_and_inline_input_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" suffix-text="::suffix" input-background="1" input-border="2" input-color="3" input-font="4" input-other="5" input-padding="6" input-rounded="7" input-shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <input name="name" type="text" id="name" class="1 2 3 4 5 6 7 8" />
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-right"> ::suffix </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_prefix_slot(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text">
                <x-slot name="prefix">::SOME SLOT CONTENT</x-slot>
            </x-input>
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-left"> ::SOME SLOT CONTENT </div>
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_suffix_slot(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text">
                <x-slot name="suffix">::SOME SLOT CONTENT</x-slot>
            </x-input>
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-right"> ::SOME SLOT CONTENT </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_event(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" @click="something" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow" @click="something" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_embed_and_event(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" suffix-text="$" @click="something" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" @click="something" />
                <div class="embed-background embed-border embed-color embed-font embed-other embed-padding embed-rounded embed-shadow embed-right"> $ </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_with_type_number_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="number" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_invalid_type_throws_an_exception(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="invalid-type" />
            HTML;

        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Specified HTML input type invalid');

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
