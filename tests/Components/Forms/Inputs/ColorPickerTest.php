<?php

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class ColorPickerTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-color-picker.color-position', null);
        Config::set('themes.default.input-color-picker.icon-left', null);
        Config::set('themes.default.input-color-picker.wrapper-width', 'picker-width');

        Config::set('themes.default.input-color-picker.popup', 'right');
        Config::set('themes.default.input-color-picker.template', 'right');
        Config::set('themes.default.input-color-picker.layout', 'default');
        Config::set('themes.default.input-color-picker.alpha', false);
        Config::set('themes.default.input-color-picker.editor', true);
        Config::set('themes.default.input-color-picker.onchange', null);
        Config::set('themes.default.input-color-picker.default-color', '#000000');

        Config::set('themes.default.input-color-picker.color-background', 'color-background');
        Config::set('themes.default.input-color-picker.color-border', 'color-border');
        Config::set('themes.default.input-color-picker.color-color', 'color-color');
        Config::set('themes.default.input-color-picker.color-font', 'color-font');
        Config::set('themes.default.input-color-picker.color-other', 'color-other');
        Config::set('themes.default.input-color-picker.color-padding', 'color-padding');
        Config::set('themes.default.input-color-picker.color-rounded', 'color-rounded');
        Config::set('themes.default.input-color-picker.color-shadow', 'color-shadow');

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
    public function an_input_color_picker_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-color-picker name="color" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-color-picker
                name="color"
                background="none"
                border="none"
                color="none"
                font="none"
                other="none"
                padding="none"
                rounded="none"
                shadow="none"
                width="none"
                input-background="none"
                input-border="none"
                input-color="none"
                input-font="none"
                input-other="none"
                input-padding="none"
                input-rounded="none"
                input-shadow="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-color-picker
                name="color"
                background="1"
                border="2"
                color="3"
                font="4"
                other="5"
                padding="6"
                rounded="7"
                shadow="8"
                width="9"
                input-background="10"
                input-border="11"
                input-color="12"
                input-font="13"
                input-other="14"
                input-padding="15"
                input-rounded="16"
                input-shadow="17"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="1 2 3 4 5 6 7 8 9">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="10 11 12 13 14 15 16 17" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_can_be_rendered_with_custom_id(): void
    {
        $template = <<<'HTML'
            <x-input-color-picker name="color" id="color-picker" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <input type="text" id="color-picker" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_can_be_rendered_with_left_icon_and_right_color_display(): void
    {
        Config::set('themes.default.input-color-picker.icon-left', 'icon-dot');
        Config::set('themes.default.input-color-picker.color-position', 'right');

        $template = <<<'HTML'
            <x-input-color-picker name="color" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <div class="icon-left-background icon-left-border icon-left-color icon-left-other icon-left-padding icon-left-rounded icon-left-shadow">
                    <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <div x-ref="color" class="color-background color-border color-font color-other color-padding color-rounded color-shadow" wire:ignore></div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_can_be_rendered_with_right_icon_and_left_color_display(): void
    {
        Config::set('themes.default.input-color-picker.icon-right', 'icon-dot');
        Config::set('themes.default.input-color-picker.color-position', 'left');

        $template = <<<'HTML'
            <x-input-color-picker name="color" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <div x-ref="color" class="color-background color-border color-font color-other color-padding color-rounded color-shadow" wire:ignore></div>
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
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
    public function an_input_color_picker_component_can_be_rendered_with_custom_popup(): void
    {
        $template = <<<'HTML'
            <x-input-color-picker name="color" popup="left" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'left', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_can_be_rendered_with_alpha_enabled(): void
    {
        $template = <<<'HTML'
            <x-input-color-picker name="color" alpha />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: true, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_can_be_rendered_with_editor_disabled_inline(): void
    {
        Config::set('themes.default.input-color-picker.editor', true);

        $template = <<<'HTML'
            <x-input-color-picker name="color" no-editor />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: false, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_can_be_rendered_with_editor_enabled_inline(): void
    {
        Config::set('themes.default.input-color-picker.editor', false);

        $template = <<<'HTML'
            <x-input-color-picker name="color" show-editor />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_can_be_rendered_with_onchange(): void
    {
        $template = <<<'HTML'
            <x-input-color-picker name="color" onchange="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: 'alert(\&#039;here\&#039;)', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_can_be_rendered_with_default_color_change(): void
    {
        $template = <<<'HTML'
            <x-input-color-picker name="color" default-color="#FF0000" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#FF0000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_with_no_icon_and_custom_class_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-color-picker name="color" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width float-right">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_with_icon_and_custom_class_can_be_rendered(): void
    {
        Config::set('themes.default.input-color-picker.icon-left', 'icon-dot');
        Config::set('themes.default.input-color-picker.color-position', 'right');

        $template = <<<'HTML'
            <x-input-color-picker name="color" class="float-right"  />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width float-right">
                <div class="icon-left-background icon-left-border icon-left-color icon-left-other icon-left-padding icon-left-rounded icon-left-shadow">
                    <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    <div x-ref="color" class="color-background color-border color-font color-other color-padding color-rounded color-shadow" wire:ignore></div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_with_no_icon_and_custom_attribute_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-color-picker name="color" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" onclick="alert('here')" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_color_picker_component_with_custom_attribute_can_be_rendered(): void
    {
        Config::set('themes.default.input-color-picker.icon-left', 'icon-dot');
        Config::set('themes.default.input-color-picker.color-position', 'right');

        $template = <<<'HTML'
            <x-input-color-picker name="color" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputColorPicker({ value: null, popup: 'right', alpha: false, editor: true, onchange: '', default: '#000000' })" x-ref="wrapper" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow picker-width">
                <div class="icon-left-background icon-left-border icon-left-color icon-left-other icon-left-padding icon-left-rounded icon-left-shadow">
                    <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <input type="text" id="color" name="color" x-ref="picker" x-model.lazy="value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" onclick="alert('here')" />
                    <div x-ref="color" class="color-background color-border color-font color-other color-padding color-rounded color-shadow" wire:ignore></div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
