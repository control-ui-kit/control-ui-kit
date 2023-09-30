<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class PasswordTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-password.icon-left', '');
        Config::set('themes.default.input-password.icon-left-show', '');
        Config::set('themes.default.input-password.icon-right', '');
        Config::set('themes.default.input-password.icon-right-show', '');

        Config::set('themes.default.input-password.background', 'background');
        Config::set('themes.default.input-password.border', 'border');
        Config::set('themes.default.input-password.color', 'color');
        Config::set('themes.default.input-password.font', 'font');
        Config::set('themes.default.input-password.other', 'other');
        Config::set('themes.default.input-password.padding', 'padding');
        Config::set('themes.default.input-password.rounded', 'rounded');
        Config::set('themes.default.input-password.shadow', 'shadow');
        Config::set('themes.default.input-password.width', 'width');

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
    public function an_input_password_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-password name="name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" x-cloak x-data="Components.inputPassword()">
                <input name="name" id="name" x-bind:type="type" value="" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_password_component_can_be_rendered_left_icon_and_show_icon(): void
    {
        $template = <<<'HTML'
            <x-input-password name="name" icon-left="icon-dot" icon-left-show="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" x-cloak x-data="Components.inputPassword()">
                <div class="icon-left-background icon-left-border icon-left-color icon-left-other icon-left-padding icon-left-rounded icon-left-shadow" x-show="type == 'password'" x-on:click="showToggle">
                    <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <div class="icon-left-background icon-left-border icon-left-color icon-left-other icon-left-padding icon-left-rounded icon-left-shadow" x-show="type == 'text'" x-on:click="showToggle">
                        <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                        <input name="name" id="name" x-bind:type="type" value="" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_password_component_can_be_rendered_right_icon_and_show_icon(): void
    {
        $template = <<<'HTML'
            <x-input-password name="name" icon-right="icon-dot" icon-right-show="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" x-cloak x-data="Components.inputPassword()">
                <input name="name" id="name" x-bind:type="type" value="" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="icon-right-background icon-right-border icon-right-color icon-right-other icon-right-padding icon-right-rounded icon-right-shadow" x-show="type == 'password'" x-on:click="showToggle">
                    <svg class="icon-right-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <div class="icon-right-background icon-right-border icon-right-color icon-right-other icon-right-padding icon-right-rounded icon-right-shadow" x-show="type == 'text'" x-on:click="showToggle">
                        <svg class="icon-right-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_password_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-password name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" input-background="none" input-border="none" input-color="none" input-font="none" input-other="none" input-padding="none" input-rounded="none" input-shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-cloak x-data="Components.inputPassword()">
                <input name="name" id="name" x-bind:type="type" value="" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_password_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-password name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" input-background="10" input-border="11" input-color="12" input-font="13" input-other="14" input-padding="15" input-rounded="16" input-shadow="17" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9" x-cloak x-data="Components.inputPassword()">
                <input name="name" id="name" x-bind:type="type" value="" class="10 11 12 13 14 15 16 17" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_password_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input-password name="name" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" x-cloak x-data="Components.inputPassword()">
                <input name="name" id="name" x-bind:type="type" value="test_value" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_input_url_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-password name="name" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width float-right" x-cloak x-data="Components.inputPassword()">
                <input name="name" id="name" x-bind:type="type" value="" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_url_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-password name="name" onblur="test()" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" x-cloak x-data="Components.inputPassword()">
                <input name="name" id="name" x-bind:type="type" value="" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" onblur="test()" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_url_component_can_be_rendered_with_wire_model_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-password name="name" wire:model="test" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" x-cloak x-data="Components.inputPassword()">
                <input name="name" id="name" x-bind:type="type" value="" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" wire:model="test" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_input_password_component_can_be_rendered_with_no_peak_disabling_icons(): void
    {
        Config::set('themes.default.input-password.icon-left', 'icon-eye');
        Config::set('themes.default.input-password.icon-left-show', 'icon-invisible');
        Config::set('themes.default.input-password.icon-right', 'icon-eye');
        Config::set('themes.default.input-password.icon-right-show', 'icon-invisible');

        $template = <<<'HTML'
            <x-input-password name="name" no-peak />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width" x-cloak x-data="Components.inputPassword()">
                <input name="name" id="name" x-bind:type="type" value="" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
