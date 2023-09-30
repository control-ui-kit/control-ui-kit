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

        Config::set('themes.default.input.decimals', '');
        Config::set('themes.default.input.default', '');
        Config::set('themes.default.input.type', 'text');
        Config::set('themes.default.input.icon-left', '');
        Config::set('themes.default.input.icon-right', '');
        Config::set('themes.default.input.min', null);
        Config::set('themes.default.input.max', null);
        Config::set('themes.default.input.prefix-text', '');
        Config::set('themes.default.input.step', '');
        Config::set('themes.default.input.suffix-text', '');

        Config::set('themes.default.input.background', 'background');
        Config::set('themes.default.input.border', 'border');
        Config::set('themes.default.input.color', 'color');
        Config::set('themes.default.input.font', 'font');
        Config::set('themes.default.input.other', 'other');
        Config::set('themes.default.input.padding', 'padding');
        Config::set('themes.default.input.rounded', 'rounded');
        Config::set('themes.default.input.shadow', 'shadow');
        Config::set('themes.default.input.width', 'width');

        Config::set('themes.default.input.input-background', 'input-background');
        Config::set('themes.default.input.input-border', 'input-border');
        Config::set('themes.default.input.input-color', 'input-color');
        Config::set('themes.default.input.input-font', 'input-font');
        Config::set('themes.default.input.input-other', 'input-other');
        Config::set('themes.default.input.input-padding', 'input-padding');
        Config::set('themes.default.input.input-rounded', 'input-rounded');
        Config::set('themes.default.input.input-shadow', 'input-shadow');

        Config::set('themes.default.input.icon-left-background', 'icon-left-background');
        Config::set('themes.default.input.icon-left-border', 'icon-left-border');
        Config::set('themes.default.input.icon-left-color', 'icon-left-color');
        Config::set('themes.default.input.icon-left-other', 'icon-left-other');
        Config::set('themes.default.input.icon-left-padding', 'icon-left-padding');
        Config::set('themes.default.input.icon-left-rounded', 'icon-left-rounded');
        Config::set('themes.default.input.icon-left-shadow', 'icon-left-shadow');
        Config::set('themes.default.input.icon-left-size', 'icon-left-size');

        Config::set('themes.default.input.icon-right-background', 'icon-right-background');
        Config::set('themes.default.input.icon-right-border', 'icon-right-border');
        Config::set('themes.default.input.icon-right-color', 'icon-right-color');
        Config::set('themes.default.input.icon-right-other', 'icon-right-other');
        Config::set('themes.default.input.icon-right-padding', 'icon-right-padding');
        Config::set('themes.default.input.icon-right-rounded', 'icon-right-rounded');
        Config::set('themes.default.input.icon-right-shadow', 'icon-right-shadow');
        Config::set('themes.default.input.icon-right-size', 'icon-right-size');

        Config::set('themes.default.input.prefix-background', 'prefix-background');
        Config::set('themes.default.input.prefix-border', 'prefix-border');
        Config::set('themes.default.input.prefix-color', 'prefix-color');
        Config::set('themes.default.input.prefix-font', 'prefix-font');
        Config::set('themes.default.input.prefix-other', 'prefix-other');
        Config::set('themes.default.input.prefix-padding', 'prefix-padding');
        Config::set('themes.default.input.prefix-rounded', 'prefix-rounded');
        Config::set('themes.default.input.prefix-shadow', 'prefix-shadow');

        Config::set('themes.default.input.suffix-background', 'suffix-background');
        Config::set('themes.default.input.suffix-border', 'suffix-border');
        Config::set('themes.default.input.suffix-color', 'suffix-color');
        Config::set('themes.default.input.suffix-font', 'suffix-font');
        Config::set('themes.default.input.suffix-other', 'suffix-other');
        Config::set('themes.default.input.suffix-padding', 'suffix-padding');
        Config::set('themes.default.input.suffix-rounded', 'suffix-rounded');
        Config::set('themes.default.input.suffix-shadow', 'suffix-shadow');

        Config::set('themes.default.input.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input.wrapper-width', 'wrapper-width');
    }

    /** @test */
    public function an_input_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
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
            <x-input name="name" type="text" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="1 2 3 4 5 6 7 8 9" />
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
            <input name="name" type="text" id="name" class="background 1 border 2 color font other padding rounded shadow width" />
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
            <input name="name" type="text" id="name" placeholder="placeholder text" class="background border color font other padding rounded shadow width" />
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
            <input name="name" type="text" id="name" value="test_value" class="background border color font other padding rounded shadow width" />
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
        Config::set('themes.default.input-text.width', 'config-width');

        $template = <<<'HTML'
            <x-input-text name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="config-background config-border config-color config-font config-other config-padding config-rounded config-shadow config-width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_left_icon(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" icon-left="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="icon-left-background icon-left-border icon-left-color icon-left-other icon-left-padding icon-left-rounded icon-left-shadow">
                    <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
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
            <x-input name="name" type="text" icon-right="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="icon-right-background icon-right-border icon-right-color icon-right-other icon-right-padding icon-right-rounded icon-right-shadow">
                    <svg class="icon-right-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="prefix-background prefix-border prefix-color prefix-font prefix-other prefix-padding prefix-rounded prefix-shadow"> ::prefix </div>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="suffix-background suffix-border suffix-color suffix-font suffix-other suffix-padding suffix-rounded suffix-shadow"> ::suffix </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_left_icon_and_custom_size(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" icon-left="icon-dot" icon-size="custom-size" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="icon-left-background icon-left-border icon-left-color icon-left-other icon-left-padding icon-left-rounded icon-left-shadow">
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
            <x-input name="name" type="text" icon-right="icon-dot" icon-size="custom-size" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="icon-right-background icon-right-border icon-right-color icon-right-other icon-right-padding icon-right-rounded icon-right-shadow">
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
            <x-input name="name" type="text" icon-left="icon-dot" icon-background="none" icon-border="none" icon-color="none" icon-other="none" icon-padding="none" icon-rounded="none" icon-shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div>
                    <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
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
            <x-input name="name" type="text" icon-left="icon-dot" icon-background="1" icon-border="2" icon-color="3" icon-other="4" icon-padding="5" icon-rounded="6" icon-shadow="7" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="1 2 3 4 5 6 7">
                    <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div> ::prefix </div>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="1 2 3 4 5 6 7 8"> ::prefix </div>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div> ::suffix </div>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="1 2 3 4 5 6 7 8"> ::suffix </div>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" />
                <div class="suffix-background suffix-border suffix-color suffix-font suffix-other suffix-padding suffix-rounded suffix-shadow"> ::suffix </div>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" class="1 2 3 4 5 6 7 8" />
                <div class="suffix-background suffix-border suffix-color suffix-font suffix-other suffix-padding suffix-rounded suffix-shadow"> ::suffix </div>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="prefix-background prefix-border prefix-color prefix-font prefix-other prefix-padding prefix-rounded prefix-shadow"> ::SOME SLOT CONTENT </div>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="suffix-background suffix-border suffix-color suffix-font suffix-other suffix-padding suffix-rounded suffix-shadow"> ::SOME SLOT CONTENT </div>
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
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" @click="something" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_suffix_and_event(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" suffix-text="$" @click="something" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" @click="something" />
                <div class="suffix-background suffix-border suffix-color suffix-font suffix-other suffix-padding suffix-rounded suffix-shadow"> $ </div>
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
            <input name="name" type="number" id="name" class="background border color font other padding rounded shadow width" />
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
            <input name="name" type="number" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_uses_config_type_when_none_is_passed(): void
    {
        Config::set('themes.default.input.type', 'range');

        $template = <<<'HTML'
            <x-input name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="range" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_uses_config_icon_left_when_none_is_passed(): void
    {
        Config::set('themes.default.input.icon-left', 'icon-dot');

        $template = <<<'HTML'
            <x-input name="name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="icon-left-background icon-left-border icon-left-color icon-left-other icon-left-padding icon-left-rounded icon-left-shadow">
                    <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_uses_config_icon_right_when_none_is_passed(): void
    {
        Config::set('themes.default.input.icon-right', 'icon-dot');

        $template = <<<'HTML'
            <x-input name="name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="icon-right-background icon-right-border icon-right-color icon-right-other icon-right-padding icon-right-rounded icon-right-shadow">
                    <svg class="icon-right-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_input_component_uses_config_prefix_text_when_none_is_passed(): void
    {
        Config::set('themes.default.input.prefix-text', '::prefix-text');

        $template = <<<'HTML'
            <x-input name="name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="prefix-background prefix-border prefix-color prefix-font prefix-other prefix-padding prefix-rounded prefix-shadow"> ::prefix-text </div>
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_uses_config_suffix_text_when_none_is_passed(): void
    {
        Config::set('themes.default.input.suffix-text', '::suffix-text');

        $template = <<<'HTML'
            <x-input name="name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="suffix-background suffix-border suffix-color suffix-font suffix-other suffix-padding suffix-rounded suffix-shadow"> ::suffix-text </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_uses_config_min_max_step_when_none_is_passed(): void
    {
        Config::set('themes.default.input.min', 5);
        Config::set('themes.default.input.max', 100);
        Config::set('themes.default.input.step', 5);

        $template = <<<'HTML'
            <x-input name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" min="5" max="100" step="5" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_input_component_uses_config_decimals_when_none_is_passed(): void
    {
        Config::set('themes.default.input.decimals', 2);

        $template = <<<'HTML'
            <x-input name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_zero_values(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" value="0" min="0" max="0" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" value="0" min="0" max="0" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_zero_values_and_prefix(): void
    {
        $template = <<<'HTML'
            <x-input name="number" type="number" prefix-text="::prefix" value="0" min="0" max="0" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="prefix-background prefix-border prefix-color prefix-font prefix-other prefix-padding prefix-rounded prefix-shadow"> ::prefix </div>
                <input name="number" type="number" id="number" value="0" min="0" max="0" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_search_type(): void
    {
        $template = <<<'HTML'
            <x-input name="searching" type="search"/>
            HTML;

        $expected = <<<'HTML'
            <input name="searching" type="search" id="searching" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_config_default(): void
    {
        Config::set('themes.default.input.default', '::default');

        $template = <<<'HTML'
            <x-input name="name" type="text"/>
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" value="::default" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_inline_default(): void
    {
        Config::set('themes.default.input.default', '');

        $template = <<<'HTML'
            <x-input name="name" type="text" default="::inline"/>
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" value="::inline" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_inline_default_and_value(): void
    {
        Config::set('themes.default.input.default', '');

        $template = <<<'HTML'
            <x-input name="name" type="text" default="::inline" value="::value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" value="::value" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_will_render_with_inline_step(): void
    {
        $template = <<<'HTML'
            <x-input name="test" type="number" step=2.0 />
            HTML;

        $expected = <<<'HTML'
            <input name="test" type="number" id="test" step="2" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_with_default_step_can_be_disabled_inline(): void
    {
        Config::set('themes.default.input.default', '');
        Config::set('themes.default.input.step', 1);

        $template = <<<'HTML'
            <x-input name="test" type="number" step="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="test" type="number" id="test" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_with_default_min_can_be_disabled_inline(): void
    {
        Config::set('themes.default.input.min', 0);

        $template = <<<'HTML'
            <x-input name="test" type="number" min="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="test" type="number" id="test" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_with_default_max_can_be_disabled_inline(): void
    {
        Config::set('themes.default.input.max', 10);

        $template = <<<'HTML'
            <x-input name="test" type="number" max="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="test" type="number" id="test" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_wrapper_and_width_override(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" suffix-text="::suffix" width="::width" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow ::width">
                <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="suffix-background suffix-border suffix-color suffix-font suffix-other suffix-padding suffix-rounded suffix-shadow"> ::suffix </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_left_icon_and_width_override(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" icon-left="icon-dot" width="::width"  />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow ::width">
                <div class="icon-left-background icon-left-border icon-left-color icon-left-other icon-left-padding icon-left-rounded icon-left-shadow">
                    <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <input name="name" type="text" id="name" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_a_default_left_icon_disabled(): void
    {
        Config::set('themes.default.input.icon-left', 'icon-dot');

        $template = <<<'HTML'
            <x-input name="name" type="text" icon-left="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_a_default_right_icon_disabled(): void
    {
        Config::set('themes.default.input.icon-right', 'icon-dot');

        $template = <<<'HTML'
            <x-input name="name" type="text" icon-right="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_a_default_left_icon_set_to_none(): void
    {
        Config::set('themes.default.input.icon-left', 'none');

        $template = <<<'HTML'
            <x-input name="name" type="text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_a_default_right_icon_set_to_none(): void
    {
        Config::set('themes.default.input.icon-right', 'none');

        $template = <<<'HTML'
            <x-input name="name" type="text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_decimal_formatting(): void
    {
        $template = <<<'HTML'
            <x-input name="name" type="text" decimals="2" value="24.99999" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" value="25" step="0.01" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_with_min_higher_than_max_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Specified min cannot be higher than specified max');

        $template = <<<'HTML'
            <x-input name="age" value="9" min="19" max="9" step="1" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_component_with_value_lower_than_min_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Value cannot be lower than specified min');

        $template = <<<'HTML'
            <x-input name="age" value="1" min="10" max="20" step="1" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_component_with_value_higher_than_max_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Value cannot be higher than specified max');

        $template = <<<'HTML'
            <x-input name="age" value="10" min="0" max="9" step="1" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_component_with_non_numeric_step_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Number not numeric [Step]');

        $template = <<<'HTML'
            <x-input name="age" value="9" min="0" max="9" step="s" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_component_with_non_numeric_min_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Number not numeric [Min]');

        $template = <<<'HTML'
            <x-input name="age" value="9" min="s" max="9" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_component_with_non_numeric_max_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Number not numeric [Max]');

        $template = <<<'HTML'
            <x-input name="age" value="9" min="0" max="z" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input name="search" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <input name="search" type="text" id="search" class="background border color font other padding rounded shadow width float-right" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_icon_and_custom_class(): void
    {
        Config::set('themes.default.input.icon-right', 'icon-dot');

        $template = <<<'HTML'
            <x-input name="search" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width float-right">
                <input name="search" type="text" id="search" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="icon-right-background icon-right-border icon-right-color icon-right-other icon-right-padding icon-right-rounded icon-right-shadow">
                    <svg class="icon-right-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input name="search" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <input name="search" type="text" id="search" class="background border color font other padding rounded shadow width" onclick="alert('here')" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_component_can_be_rendered_with_icon_and_custom_attribute(): void
    {
        Config::set('themes.default.input.icon-right', 'icon-dot');

        $template = <<<'HTML'
            <x-input name="search" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="search" type="text" id="search" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" onclick="alert('here')" />
                <div class="icon-right-background icon-right-border icon-right-color icon-right-other icon-right-padding icon-right-rounded icon-right-shadow">
                    <svg class="icon-right-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
