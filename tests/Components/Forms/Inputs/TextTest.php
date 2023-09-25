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
        Config::set('themes.default.input-text.width', 'width');

        Config::set('themes.default.input-text.input-background', 'input-background');
        Config::set('themes.default.input-text.input-border', 'input-border');
        Config::set('themes.default.input-text.input-color', 'input-color');
        Config::set('themes.default.input-text.input-font', 'input-font');
        Config::set('themes.default.input-text.input-other', 'input-other');
        Config::set('themes.default.input-text.input-padding', 'input-padding');
        Config::set('themes.default.input-text.input-rounded', 'input-rounded');
        Config::set('themes.default.input-text.input-shadow', 'input-shadow');

        Config::set('themes.default.input-text.icon-left-background', 'icon-left-background');
        Config::set('themes.default.input-text.icon-left-border', 'icon-left-border');
        Config::set('themes.default.input-text.icon-left-color', 'icon-left-color');
        Config::set('themes.default.input-text.icon-left-other', 'icon-left-other');
        Config::set('themes.default.input-text.icon-left-padding', 'icon-left-padding');
        Config::set('themes.default.input-text.icon-left-rounded', 'icon-left-rounded');
        Config::set('themes.default.input-text.icon-left-shadow', 'icon-left-shadow');
        Config::set('themes.default.input-text.icon-left-size', 'icon-left-size');

        Config::set('themes.default.input-text.icon-right-background', 'icon-right-background');
        Config::set('themes.default.input-text.icon-right-border', 'icon-right-border');
        Config::set('themes.default.input-text.icon-right-color', 'icon-right-color');
        Config::set('themes.default.input-text.icon-right-other', 'icon-right-other');
        Config::set('themes.default.input-text.icon-right-padding', 'icon-right-padding');
        Config::set('themes.default.input-text.icon-right-rounded', 'icon-right-rounded');
        Config::set('themes.default.input-text.icon-right-shadow', 'icon-right-shadow');
        Config::set('themes.default.input-text.icon-right-size', 'icon-right-size');

        Config::set('themes.default.input-text.prefix-background', 'prefix-background');
        Config::set('themes.default.input-text.prefix-border', 'prefix-border');
        Config::set('themes.default.input-text.prefix-color', 'prefix-color');
        Config::set('themes.default.input-text.prefix-font', 'prefix-font');
        Config::set('themes.default.input-text.prefix-other', 'prefix-other');
        Config::set('themes.default.input-text.prefix-padding', 'prefix-padding');
        Config::set('themes.default.input-text.prefix-rounded', 'prefix-rounded');
        Config::set('themes.default.input-text.prefix-shadow', 'prefix-shadow');

        Config::set('themes.default.input-text.suffix-background', 'suffix-background');
        Config::set('themes.default.input-text.suffix-border', 'suffix-border');
        Config::set('themes.default.input-text.suffix-color', 'suffix-color');
        Config::set('themes.default.input-text.suffix-font', 'suffix-font');
        Config::set('themes.default.input-text.suffix-other', 'suffix-other');
        Config::set('themes.default.input-text.suffix-padding', 'suffix-padding');
        Config::set('themes.default.input-text.suffix-rounded', 'suffix-rounded');
        Config::set('themes.default.input-text.suffix-shadow', 'suffix-shadow');

        Config::set('themes.default.input-text.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input-text.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input-text.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input-text.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input-text.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input-text.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input-text.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input-text.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input-text.wrapper-width', 'wrapper-width');
    }

    /** @test */
    public function an_input_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
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
            <x-input-text name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="1 2 3 4 5 6 7 8 9" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_can_be_rendered_with_appended_styles(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" background="...1" border="...2"/>
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background 1 border 2 color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_with_placeholder_amended(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" placeholder="placeholder text" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" value="test_value" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_can_be_rendered_using_override_config_styles(): void
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
    public function an_input_text_component_can_be_rendered_with_left_icon(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" icon-left="icon-dot" />
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
    public function an_input_text_component_can_be_rendered_with_default_left_icon(): void
    {
        Config::set('themes.default.input-text.icon-left', 'icon-dot');

        $template = <<<'HTML'
            <x-input-text name="name" />
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
    public function an_input_text_component_can_be_rendered_with_default_left_icon_disabled(): void
    {
        Config::set('themes.default.input-text.icon-left', 'icon-dot');

        $template = <<<'HTML'
            <x-input-text name="name" icon-left="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_can_be_rendered_with_right_icon(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" icon-right="icon-dot" />
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
    public function an_input_text_component_can_be_rendered_with_prefix(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" prefix-text="::prefix" />
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
    public function an_input_text_component_can_be_rendered_with_suffix(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" suffix-text="::suffix" />
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
    public function an_input_text_component_can_be_rendered_with_left_icon_and_custom_size(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" icon-left="icon-dot" icon-size="custom-size" />
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
    public function an_input_text_component_can_be_rendered_with_right_icon_and_custom_size(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" icon-right="icon-dot" icon-size="custom-size" />
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
    public function an_input_text_component_can_be_rendered_with_left_icon_and_no_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" icon-left="icon-dot" icon-background="none" icon-border="none" icon-color="none" icon-other="none" icon-padding="none" icon-rounded="none" icon-shadow="none" />
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
    public function an_input_text_component_can_be_rendered_with_left_icon_and_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" icon-left="icon-dot" icon-background="1" icon-border="2" icon-color="3" icon-other="4" icon-padding="5" icon-rounded="6" icon-shadow="7" />
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
    public function an_input_text_component_can_be_rendered_with_prefix_and_no_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" prefix-text="::prefix" prefix-background="none" prefix-border="none" prefix-color="none" prefix-font="none" prefix-other="none" prefix-padding="none" prefix-rounded="none" prefix-shadow="none" />
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
    public function an_input_text_component_can_be_rendered_with_prefix_and_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" prefix-text="::prefix" prefix-background="1" prefix-border="2" prefix-color="3" prefix-font="4" prefix-other="5" prefix-padding="6" prefix-rounded="7" prefix-shadow="8" />
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
    public function an_input_text_component_can_be_rendered_with_suffix_and_no_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" suffix-text="::suffix" suffix-background="none" suffix-border="none" suffix-color="none" suffix-font="none" suffix-other="none" suffix-padding="none" suffix-rounded="none" suffix-shadow="none" />
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
    public function an_input_text_component_can_be_rendered_with_suffix_and_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" suffix-text="::suffix" suffix-background="1" suffix-border="2" suffix-color="3" suffix-font="4" suffix-other="5" suffix-padding="6" suffix-rounded="7" suffix-shadow="8" />
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
    public function an_input_text_component_can_be_rendered_with_suffix_and_no_input_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" suffix-text="::suffix" input-background="none" input-border="none" input-color="none" input-font="none" input-other="none" input-padding="none" input-rounded="none" input-shadow="none" />
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
    public function an_input_text_component_can_be_rendered_with_suffix_and_inline_input_styles(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" suffix-text="::suffix" input-background="1" input-border="2" input-color="3" input-font="4" input-other="5" input-padding="6" input-rounded="7" input-shadow="8" />
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
    public function an_input_text_component_can_be_rendered_with_prefix_slot(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name">
                <x-slot name="prefix">::SOME SLOT CONTENT</x-slot>
            </x-input-text>
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
    public function an_input_text_component_can_be_rendered_with_suffix_slot(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name">
                <x-slot name="suffix">::SOME SLOT CONTENT</x-slot>
            </x-input-text>
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
    public function an_input_text_component_can_be_rendered_with_event(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" @click="something" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" @click="something" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_can_be_rendered_with_embed_and_event(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" suffix-text="$" @click="something" />
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
    public function an_input_text_component_can_be_rendered_with_maxlength(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" maxlength="3" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" maxlength="3" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width float-right" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_text_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-text name="name" onblur="test()" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="text" id="name" class="background border color font other padding rounded shadow width" onblur="test()" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
