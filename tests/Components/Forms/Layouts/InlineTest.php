<?php

namespace Tests\Components\Forms\Layouts;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class InlineTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.label.background', 'label-background');
        Config::set('themes.default.label.border', 'label-border');
        Config::set('themes.default.label.color', 'label-color');
        Config::set('themes.default.label.font', 'label-font');
        Config::set('themes.default.label.other', 'label-other');
        Config::set('themes.default.label.padding', 'label-padding');
        Config::set('themes.default.label.rounded', 'label-rounded');
        Config::set('themes.default.label.shadow', 'label-shadow');

        Config::set('themes.default.error.color', 'error-color');
        Config::set('themes.default.error.font', 'error-font');
        Config::set('themes.default.error.other', 'error-other');
        Config::set('themes.default.error.padding', 'error-padding');

        Config::set('themes.default.form-layout-inline.content', 'content-style');
        Config::set('themes.default.form-layout-inline.help', 'help-style');
        Config::set('themes.default.form-layout-inline.text', 'text-style');
        Config::set('themes.default.form-layout-inline.label', 'label-style');
        Config::set('themes.default.form-layout-inline.required-size', 'required-size');
        Config::set('themes.default.form-layout-inline.required-color', 'required-color');
        Config::set('themes.default.form-layout-inline.slot', 'slot-style');
        Config::set('themes.default.form-layout-inline.wrapper', 'wrapper');

        Config::set('themes.default.input-text.background', 'background');
        Config::set('themes.default.input-text.border', 'border');
        Config::set('themes.default.input-text.color', 'color');
        Config::set('themes.default.input-text.font', 'font');
        Config::set('themes.default.input-text.other', 'other');
        Config::set('themes.default.input-text.padding', 'padding');
        Config::set('themes.default.input-text.rounded', 'rounded');
        Config::set('themes.default.input-text.shadow', 'shadow');
        Config::set('themes.default.input-text.width', 'width');
    }

    #[Test]
    public function the_inline_layout_component_can_be_rendered(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-form-layout-inline name="test" label="::Label" help="::Help" required>::SLOT</x-form-layout-inline>
            HTML;

        $expected = <<<'HTML'
            <div>
                <div class="wrapper">
                    <label for="test" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                        <p class="text-style">
                            <span>::Label</span>
                            <svg class="required-color required-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M18.0002 22.001c-.193 0-.387-.056-.555-.168l-5.445-3.63-5.44497 3.63c-.348.232-.805.224-1.145-.024-.338-.247-.486-.679-.371-1.082l1.838-6.435-4.584-4.58399c-.286-.28499-.371-.716-.217-1.09.154-.373.52-.61699.924-.61699h5.382l2.72397-5.44701c.339-.677 1.45-.677 1.789 0l2.724 5.44701h5.381c.404 0 .77.24399.924.61699.154.374.069.80501-.217 1.09l-4.584 4.58399 1.838 6.435c.115.403-.033.835-.371 1.082-.176.128-.383.192-.59.192zm-6-6c.193 0 .387.057.555.168l3.736 2.491-1.252-4.384c-.101-.35-.003-.726.254-.982l3.293-3.293h-3.586c-.379 0-.725-.21399-.895-.55299l-2.105-4.211-2.10497 4.211c-.17.339-.516.55299-.895.55299h-3.586l3.293 3.293c.257.257.354.633.254.982l-1.252 4.384 3.73597-2.491c.168-.111.362-.168.555-.168z"/>
                                </svg>
                            </p>
                        </label>
                        <div class="content-style">
                            <div class="slot-style"> ::SLOT </div>
                            <div class="error-color error-font error-other error-padding"> This is a test message </div>
                        </div>
                    </div>
                    <p class="help-style">::Help</p>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_inline_layout_component_can_be_rendered_with_no_styles(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-form-layout-inline name="test" label="::Label" help="::Help" required

                content="none"
                label-style="none"
                text="none"
                help-style="none"
                required-color="none"
                required-size="none"
                slot="none"
                wrapper="none"

                error-color="none"
                error-font="none"
                error-other="none"
                error-padding="none"

                label-background="none"
                label-border="none"
                label-color="none"
                label-font="none"
                label-other="none"
                label-padding="none"
                label-rounded="none"
                label-shadow="none"

                >::SLOT</x-form-layout-inline>
            HTML;

        $expected = <<<'HTML'
            <div>
                <div class="">
                    <label for="test" class="">
                        <p class="">
                            <span>::Label</span>
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M18.0002 22.001c-.193 0-.387-.056-.555-.168l-5.445-3.63-5.44497 3.63c-.348.232-.805.224-1.145-.024-.338-.247-.486-.679-.371-1.082l1.838-6.435-4.584-4.58399c-.286-.28499-.371-.716-.217-1.09.154-.373.52-.61699.924-.61699h5.382l2.72397-5.44701c.339-.677 1.45-.677 1.789 0l2.724 5.44701h5.381c.404 0 .77.24399.924.61699.154.374.069.80501-.217 1.09l-4.584 4.58399 1.838 6.435c.115.403-.033.835-.371 1.082-.176.128-.383.192-.59.192zm-6-6c.193 0 .387.057.555.168l3.736 2.491-1.252-4.384c-.101-.35-.003-.726.254-.982l3.293-3.293h-3.586c-.379 0-.725-.21399-.895-.55299l-2.105-4.211-2.10497 4.211c-.17.339-.516.55299-.895.55299h-3.586l3.293 3.293c.257.257.354.633.254.982l-1.252 4.384 3.73597-2.491c.168-.111.362-.168.555-.168z"/>
                                </svg>
                            </p>
                        </label>
                        <div class="">
                            <div class=""> ::SLOT </div>
                            <div> This is a test message </div>
                        </div>
                    </div>
                    <p class="">::Help</p>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_inline_layout_component_can_be_rendered_with_inline_styles(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-form-layout-inline name="test" label="::Label" help="::Help" required

                content="1"
                label-style="2"
                text="3"
                help-style="4"
                required-color="5"
                required-size="6"
                slot="7"
                wrapper="8"

                error-color="9"
                error-font="10"
                error-other="11"
                error-padding="12"

                label-background="13"
                label-border="14"
                label-color="15"
                label-font="16"
                label-other="17"
                label-padding="18"
                label-rounded="19"
                label-shadow="20"

                >::SLOT</x-form-layout-inline>
            HTML;

        $expected = <<<'HTML'
            <div>
                <div class="8">
                    <label for="test" class="13 14 15 16 17 18 19 20 2">
                        <p class="3">
                            <span>::Label</span>
                            <svg class="5 6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M18.0002 22.001c-.193 0-.387-.056-.555-.168l-5.445-3.63-5.44497 3.63c-.348.232-.805.224-1.145-.024-.338-.247-.486-.679-.371-1.082l1.838-6.435-4.584-4.58399c-.286-.28499-.371-.716-.217-1.09.154-.373.52-.61699.924-.61699h5.382l2.72397-5.44701c.339-.677 1.45-.677 1.789 0l2.724 5.44701h5.381c.404 0 .77.24399.924.61699.154.374.069.80501-.217 1.09l-4.584 4.58399 1.838 6.435c.115.403-.033.835-.371 1.082-.176.128-.383.192-.59.192zm-6-6c.193 0 .387.057.555.168l3.736 2.491-1.252-4.384c-.101-.35-.003-.726.254-.982l3.293-3.293h-3.586c-.379 0-.725-.21399-.895-.55299l-2.105-4.211-2.10497 4.211c-.17.339-.516.55299-.895.55299h-3.586l3.293 3.293c.257.257.354.633.254.982l-1.252 4.384 3.73597-2.491c.168-.111.362-.168.555-.168z"/>
                                </svg>
                            </p>
                        </label>
                        <div class="1">
                            <div class="7"> ::SLOT </div>
                            <div class="9 10 11 12"> This is a test message </div>
                        </div>
                    </div>
                    <p class="4">::Help</p>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_inline_layout_component_can_be_rendered_with_slot_and_custom_class(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-form-layout-inline name="test" label="::Label" help="::Help" class="float-right">::SLOT</x-form-layout-inline>
            HTML;

        $expected = <<<'HTML'
            <div class="float-right">
                <div class="wrapper">
                    <label for="test" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                        <p class="text-style"> <span>::Label</span> </p>
                    </label>
                    <div class="content-style">
                        <div class="slot-style"> ::SLOT </div>
                        <div class="error-color error-font error-other error-padding"> This is a test message </div>
                    </div>
                </div>
                <p class="help-style">::Help</p>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_inline_layout_component_can_be_rendered_with_input_and_custom_class(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-form-layout-inline name="test" label="::Label" help="::Help" class="float-right" input="input-text" />
            HTML;

        $expected = <<<'HTML'
            <div class="float-right">
                <div class="wrapper">
                    <label for="test" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                        <p class="text-style"> <span>::Label</span> </p>
                    </label>
                    <div class="content-style">
                        <div class="slot-style">
                            <input name="test" type="text" id="test" class="background border color font other padding rounded shadow width" />
                        </div>
                        <div class="error-color error-font error-other error-padding"> This is a test message </div>
                    </div>
                </div>
                <p class="help-style">::Help</p>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_inline_layout_component_can_be_rendered_with_slot_and_custom_attribute(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-form-layout-inline name="test" label="::Label" help="::Help" onblur="test()">::SLOT</x-form-layout-inline>
            HTML;

        $expected = <<<'HTML'
            <div>
                <div class="wrapper">
                    <label for="test" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                        <p class="text-style"> <span>::Label</span> </p>
                    </label>
                    <div class="content-style">
                        <div class="slot-style" onblur="test()"> ::SLOT </div>
                        <div class="error-color error-font error-other error-padding"> This is a test message </div>
                    </div>
                </div>
                <p class="help-style">::Help</p>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_inline_layout_component_can_be_rendered_with_input_and_custom_attribute(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-form-layout-inline name="test" label="::Label" help="::Help" input="input-text" onblur="test()" />
            HTML;

        $expected = <<<'HTML'
            <div>
                <div class="wrapper">
                    <label for="test" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                        <p class="text-style"> <span>::Label</span> </p>
                    </label>
                    <div class="content-style">
                        <div class="slot-style">
                            <input name="test" type="text" id="test" class="background border color font other padding rounded shadow width" onblur="test()" />
                        </div>
                        <div class="error-color error-font error-other error-padding"> This is a test message </div>
                    </div>
                </div>
                <p class="help-style">::Help</p>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
