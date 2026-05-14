<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class FormFieldTest extends ComponentTestCase
{
    protected function setUp(): void
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

        Config::set('themes.default.form-layout-stacked.content', 'content-style');
        Config::set('themes.default.form-layout-stacked.help', 'help-style');
        Config::set('themes.default.form-layout-stacked.text', 'text-style');
        Config::set('themes.default.form-layout-stacked.label', 'label-style');
        Config::set('themes.default.form-layout-stacked.required-size', 'required-size');
        Config::set('themes.default.form-layout-stacked.required-color', 'required-color');
        Config::set('themes.default.form-layout-stacked.slot', 'slot-style');
        Config::set('themes.default.form-layout-stacked.underneath', 'underneath-style');
        Config::set('themes.default.form-layout-stacked.wrapper', 'wrapper');

        Config::set('themes.default.form-layout-responsive.content', 'r-content-style');
        Config::set('themes.default.form-layout-responsive.help', 'r-help-style');
        Config::set('themes.default.form-layout-responsive.help-mobile', 'r-help-mobile');
        Config::set('themes.default.form-layout-responsive.text', 'r-text-style');
        Config::set('themes.default.form-layout-responsive.label', 'r-label-style');
        Config::set('themes.default.form-layout-responsive.required-size', 'r-required-size');
        Config::set('themes.default.form-layout-responsive.required-color', 'r-required-color');
        Config::set('themes.default.form-layout-responsive.slot', 'r-slot-style');
        Config::set('themes.default.form-layout-responsive.underneath', 'r-underneath-style');
        Config::set('themes.default.form-layout-responsive.wrapper', 'r-wrapper');

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
    public function a_form_field_component_delegates_to_the_stacked_layout(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-form-field layout="stacked" name="test" label="::Label" help="::Help" input="text" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="test" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>::Label</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="test" type="text" id="test" class="background border color font other padding rounded shadow width" />
                    </div>
                    <div class="error-color error-font error-other error-padding"> This is a test message </div>
                    <p class="help-style">::Help</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_form_field_component_normalises_input_type_by_prefixing_input(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        // input="text" should be normalised to "input-text" for the layout component
        $template = <<<'HTML'
            <x-form-field layout="stacked" name="test" label="::Label" input="text" />
            HTML;

        $expected = <<<'HTML'
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_form_field_component_passes_help_text_to_layout(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-form-field layout="stacked" name="test" label="::Label" help="::Help" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="test" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>::Label</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style"></div>
                    <p class="help-style">::Help</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_form_field_component_passes_underneath_text_to_layout(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-form-field layout="stacked" name="test" label="::Label" input="text" underneath="::Underneath" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="test" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>::Label</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="test" type="text" id="test" class="background border color font other padding rounded shadow width" />
                    </div>
                    <div class="error-color error-font error-other error-padding"> This is a test message </div>
                    <p class="underneath-style">::Underneath</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_form_field_component_defaults_to_responsive_layout_when_no_layout_is_specified(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-form-field name="test" label="::Label" />
            HTML;

        $expected = <<<'HTML'
            <div class="r-wrapper">
                <label for="test" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow r-label-style">
                    <p class="r-text-style"> <span>::Label</span> </p>
                </label>
                <div class="r-content-style">
                    <div class="r-slot-style"></div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
