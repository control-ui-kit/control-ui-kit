<?php

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class SelectFieldTest extends ComponentTestCase
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

        Config::set('themes.default.error.color', 'color');
        Config::set('themes.default.error.font', 'font');
        Config::set('themes.default.error.other', 'other');
        Config::set('themes.default.error.padding', 'padding');

        Config::set('themes.default.form-layout-responsive.content', 'content-style');
        Config::set('themes.default.form-layout-responsive.help', 'help-style');
        Config::set('themes.default.form-layout-responsive.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-responsive.text', 'text-style');
        Config::set('themes.default.form-layout-responsive.label', 'label-style');
        Config::set('themes.default.form-layout-responsive.required-size', 'required-size');
        Config::set('themes.default.form-layout-responsive.required-color', 'required-color');
        Config::set('themes.default.form-layout-responsive.slot', 'slot-style');
        Config::set('themes.default.form-layout-responsive.wrapper', 'wrapper');

        Config::set('themes.default.input-select.please-select-text', 'Please Select ...');
        Config::set('themes.default.input-select.please-select-value', null);
        Config::set('themes.default.input-select.please-select-trans', '');

        Config::set('themes.default.input-select.button-background', 'button-background');
        Config::set('themes.default.input-select.button-border', 'button-border');
        Config::set('themes.default.input-select.button-color', 'button-color');
        Config::set('themes.default.input-select.button-font', 'button-font');
        Config::set('themes.default.input-select.button-other', 'button-other');
        Config::set('themes.default.input-select.button-padding', 'button-padding');
        Config::set('themes.default.input-select.button-rounded', 'button-rounded');
        Config::set('themes.default.input-select.button-shadow', 'button-shadow');
        Config::set('themes.default.input-select.button-width', 'button-width');

        Config::set('themes.default.input-select.check-background', 'check-background');
        Config::set('themes.default.input-select.check-border', 'check-border');
        Config::set('themes.default.input-select.check-color', 'check-color');
        Config::set('themes.default.input-select.check-font', 'check-font');
        Config::set('themes.default.input-select.check-other', 'check-other');
        Config::set('themes.default.input-select.check-padding', 'check-padding');
        Config::set('themes.default.input-select.check-rounded', 'check-rounded');
        Config::set('themes.default.input-select.check-shadow', 'check-shadow');
        Config::set('themes.default.input-select.check-active', 'check-active');
        Config::set('themes.default.input-select.check-inactive', 'check-inactive');
        Config::set('themes.default.input-select.check-icon', 'icon-check');
        Config::set('themes.default.input-select.check-icon-size', 'check-icon-size');

        Config::set('themes.default.input-select.icon', 'icon-chevron-down');
        Config::set('themes.default.input-select.icon-background', 'icon-background');
        Config::set('themes.default.input-select.icon-border', 'icon-border');
        Config::set('themes.default.input-select.icon-color', 'icon-color');
        Config::set('themes.default.input-select.icon-other', 'icon-other');
        Config::set('themes.default.input-select.icon-padding', 'icon-padding');
        Config::set('themes.default.input-select.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input-select.icon-shadow', 'icon-shadow');
        Config::set('themes.default.input-select.icon-size', 'icon-size');

        Config::set('themes.default.input-select.image-border', 'image-border');
        Config::set('themes.default.input-select.image-other', 'image-other');
        Config::set('themes.default.input-select.image-padding', 'image-padding');
        Config::set('themes.default.input-select.image-rounded', 'image-rounded');
        Config::set('themes.default.input-select.image-shadow', 'image-shadow');
        Config::set('themes.default.input-select.image-size', 'image-size');

        Config::set('themes.default.input-select.list-background', 'list-background');
        Config::set('themes.default.input-select.list-border', 'list-border');
        Config::set('themes.default.input-select.list-color', 'list-color');
        Config::set('themes.default.input-select.list-font', 'list-font');
        Config::set('themes.default.input-select.list-other', 'list-other');
        Config::set('themes.default.input-select.list-padding', 'list-padding');
        Config::set('themes.default.input-select.list-rounded', 'list-rounded');
        Config::set('themes.default.input-select.list-shadow', 'list-shadow');
        Config::set('themes.default.input-select.list-width', 'list-width');

        Config::set('themes.default.input-select.option-background', 'option-background');
        Config::set('themes.default.input-select.option-border', 'option-border');
        Config::set('themes.default.input-select.option-color', 'option-color');
        Config::set('themes.default.input-select.option-font', 'option-font');
        Config::set('themes.default.input-select.option-other', 'option-other');
        Config::set('themes.default.input-select.option-padding', 'option-padding');
        Config::set('themes.default.input-select.option-rounded', 'option-rounded');
        Config::set('themes.default.input-select.option-shadow', 'option-shadow');
        Config::set('themes.default.input-select.option-spacing', 'option-spacing');
        Config::set('themes.default.input-select.option-active', 'option-active');
        Config::set('themes.default.input-select.option-inactive', 'option-inactive');

        Config::set('themes.default.input-select.text-background', 'text-background');
        Config::set('themes.default.input-select.text-border', 'text-border');
        Config::set('themes.default.input-select.text-color', 'text-color');
        Config::set('themes.default.input-select.text-font', 'text-font');
        Config::set('themes.default.input-select.text-other', 'text-other');
        Config::set('themes.default.input-select.text-padding', 'text-padding');
        Config::set('themes.default.input-select.text-rounded', 'text-rounded');
        Config::set('themes.default.input-select.text-shadow', 'text-shadow');
        Config::set('themes.default.input-select.text-active', 'text-active');
        Config::set('themes.default.input-select.text-inactive', 'text-inactive');

        Config::set('themes.default.input-select.subtext-background', 'subtext-background');
        Config::set('themes.default.input-select.subtext-border', 'subtext-border');
        Config::set('themes.default.input-select.subtext-color', 'subtext-color');
        Config::set('themes.default.input-select.subtext-font', 'subtext-font');
        Config::set('themes.default.input-select.subtext-other', 'subtext-other');
        Config::set('themes.default.input-select.subtext-padding', 'subtext-padding');
        Config::set('themes.default.input-select.subtext-rounded', 'subtext-rounded');
        Config::set('themes.default.input-select.subtext-shadow', 'subtext-shadow');
        Config::set('themes.default.input-select.subtext-active', 'subtext-active');
        Config::set('themes.default.input-select.subtext-inactive', 'subtext-inactive');
    }

    /** @test */
    public function the_select_form_field_component_can_be_rendered(): void
    {
        $this->withViewErrors(['language' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-select
                native
                label="Language"
                name="language"
                help="Some help text"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="language" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Language</span> </p>
                    <p class="help-style">Some help text</p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <select id="language" name="language" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width">
                            <option value="" selected> Please Select ... </option>
                            <option value="1"> English </option>
                            <option value="2"> Spanish </option>
                        </select>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                    <p class="help-mobile">Some help text</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_select_form_field_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['language' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-select
                native
                label="Language"
                name="language"
                help="Some help text"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
                class="float-right"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="language" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Language</span> </p>
                    <p class="help-style">Some help text</p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <select id="language" name="language" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width">
                            <option value="" selected> Please Select ... </option>
                            <option value="1"> English </option>
                            <option value="2"> Spanish </option>
                        </select>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                    <p class="help-mobile">Some help text</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_select_form_field_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['language' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-select
                native
                label="Language"
                name="language"
                help="Some help text"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
                onclick="alert('here')"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="language" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Language</span> </p>
                    <p class="help-style">Some help text</p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <select id="language" name="language" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width" onclick="alert('here')">
                            <option value="" selected> Please Select ... </option>
                            <option value="1"> English </option>
                            <option value="2"> Spanish </option>
                        </select>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                    <p class="help-mobile">Some help text</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_select_form_field_component_can_be_rendered_with_edit_mode(): void
    {
        $this->withViewErrors(['language' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-select
                native
                label="Language"
                name="language"
                help="Some help text"
                mode="edit"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="language" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style">
                        <span>Language</span>
                        <svg class="required-color required-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M18.0002 22.001c-.193 0-.387-.056-.555-.168l-5.445-3.63-5.44497 3.63c-.348.232-.805.224-1.145-.024-.338-.247-.486-.679-.371-1.082l1.838-6.435-4.584-4.58399c-.286-.28499-.371-.716-.217-1.09.154-.373.52-.61699.924-.61699h5.382l2.72397-5.44701c.339-.677 1.45-.677 1.789 0l2.724 5.44701h5.381c.404 0 .77.24399.924.61699.154.374.069.80501-.217 1.09l-4.584 4.58399 1.838 6.435c.115.403-.033.835-.371 1.082-.176.128-.383.192-.59.192zm-6-6c.193 0 .387.057.555.168l3.736 2.491-1.252-4.384c-.101-.35-.003-.726.254-.982l3.293-3.293h-3.586c-.379 0-.725-.21399-.895-.55299l-2.105-4.211-2.10497 4.211c-.17.339-.516.55299-.895.55299h-3.586l3.293 3.293c.257.257.354.633.254.982l-1.252 4.384 3.73597-2.491c.168-.111.362-.168.555-.168z"/>
                            </svg>
                        </p>
                        <p class="help-style">Some help text</p>
                    </label>
                    <div class="content-style">
                        <div class="slot-style">
                            <select id="language" name="language" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width">
                                <option value="1" selected> English </option>
                                <option value="2"> Spanish </option>
                            </select>
                        </div>
                        <div class="color font other padding"> This is a test message </div>
                        <p class="help-mobile">Some help text</p>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_select_form_field_component_can_be_rendered_with_new_mode(): void
    {
        $this->withViewErrors(['language' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-select
                native
                label="Language"
                name="language"
                help="Some help text"
                mode="new"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="language" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style">
                        <span>Language</span>
                        <svg class="required-color required-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M18.0002 22.001c-.193 0-.387-.056-.555-.168l-5.445-3.63-5.44497 3.63c-.348.232-.805.224-1.145-.024-.338-.247-.486-.679-.371-1.082l1.838-6.435-4.584-4.58399c-.286-.28499-.371-.716-.217-1.09.154-.373.52-.61699.924-.61699h5.382l2.72397-5.44701c.339-.677 1.45-.677 1.789 0l2.724 5.44701h5.381c.404 0 .77.24399.924.61699.154.374.069.80501-.217 1.09l-4.584 4.58399 1.838 6.435c.115.403-.033.835-.371 1.082-.176.128-.383.192-.59.192zm-6-6c.193 0 .387.057.555.168l3.736 2.491-1.252-4.384c-.101-.35-.003-.726.254-.982l3.293-3.293h-3.586c-.379 0-.725-.21399-.895-.55299l-2.105-4.211-2.10497 4.211c-.17.339-.516.55299-.895.55299h-3.586l3.293 3.293c.257.257.354.633.254.982l-1.252 4.384 3.73597-2.491c.168-.111.362-.168.555-.168z"/>
                            </svg>
                        </p>
                        <p class="help-style">Some help text</p>
                    </label>
                    <div class="content-style">
                        <div class="slot-style">
                            <select id="language" name="language" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width">
                                <option value="" selected> Please Select ... </option>
                                <option value="1"> English </option>
                                <option value="2"> Spanish </option>
                            </select>
                        </div>
                        <div class="color font other padding"> This is a test message </div>
                        <p class="help-mobile">Some help text</p>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_select_form_field_component_can_be_rendered_with_different_layout(): void
    {
        $this->withViewErrors(['language' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-select
                native
                label="Language"
                name="language"
                help="Some help text"
                :options="[ 1 => 'English', 2 => 'Spanish' ]"
                layout="responsive"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="language" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Language</span> </p>
                    <p class="help-style">Some help text</p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <select id="language" name="language" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-width">
                            <option value="" selected> Please Select ... </option>
                            <option value="1"> English </option>
                            <option value="2"> Spanish </option>
                        </select>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                    <p class="help-mobile">Some help text</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
