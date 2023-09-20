<?php

namespace Tests\Components\Forms\Layouts;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class InlineTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.label.font', 'label-font');

        Config::set('themes.default.error.color', 'color');
        Config::set('themes.default.error.font', 'font');
        Config::set('themes.default.error.other', 'other');
        Config::set('themes.default.error.padding', 'padding');

        Config::set('themes.default.form-layout-inline.field-wrapper', 'field-wrapper');
        Config::set('themes.default.form-layout-inline.help-desktop', 'help-desktop');
        Config::set('themes.default.form-layout-inline.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-inline.label-text', 'label-text');
        Config::set('themes.default.form-layout-inline.label-wrapper', 'label-wrapper');
        Config::set('themes.default.form-layout-inline.required-icon-size', 'required-icon-size');
        Config::set('themes.default.form-layout-inline.required-icon-color', 'required-icon-color');
        Config::set('themes.default.form-layout-inline.slot-wrapper', 'slot-wrapper');
        Config::set('themes.default.form-layout-inline.wrapper', 'wrapper');
    }

    /** @test */
    public function the_inline_layout_component_can_be_rendered(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-form-layout-inline name="test" label="::Label" help="::Help" required>::SLOT</x-form-layout-inline>
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="test" class="label-font label-wrapper">
                    <p class="label-text">
                        <span>::Label</span>
                        <svg class="required-icon-color required-icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M18.0002 22.001c-.193 0-.387-.056-.555-.168l-5.445-3.63-5.44497 3.63c-.348.232-.805.224-1.145-.024-.338-.247-.486-.679-.371-1.082l1.838-6.435-4.584-4.58399c-.286-.28499-.371-.716-.217-1.09.154-.373.52-.61699.924-.61699h5.382l2.72397-5.44701c.339-.677 1.45-.677 1.789 0l2.724 5.44701h5.381c.404 0 .77.24399.924.61699.154.374.069.80501-.217 1.09l-4.584 4.58399 1.838 6.435c.115.403-.033.835-.371 1.082-.176.128-.383.192-.59.192zm-6-6c.193 0 .387.057.555.168l3.736 2.491-1.252-4.384c-.101-.35-.003-.726.254-.982l3.293-3.293h-3.586c-.379 0-.725-.21399-.895-.55299l-2.105-4.211-2.10497 4.211c-.17.339-.516.55299-.895.55299h-3.586l3.293 3.293c.257.257.354.633.254.982l-1.252 4.384 3.73597-2.491c.168-.111.362-.168.555-.168z"/>
                            </svg>
                        </p>
                        <p class="help-desktop">::Help</p>
                    </label>
                    <div class="field-wrapper">
                        <div class="slot-wrapper"> ::SLOT </div>
                        <div class="color font other padding"> This is a test message </div>
                        <p class="help-mobile">::Help</p>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
