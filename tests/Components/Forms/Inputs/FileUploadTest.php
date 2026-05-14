<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class FileUploadTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-file-upload.icon-left', '');
        Config::set('themes.default.input-file-upload.icon-left-show', '');
        Config::set('themes.default.input-file-upload.icon-right', '');
        Config::set('themes.default.input-file-upload.icon-right-show', '');

        Config::set('themes.default.input-file-upload.accept', '');
        Config::set('themes.default.input-file-upload.capture', '');

        Config::set('themes.default.input.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input.wrapper-width', 'wrapper-width');

        Config::set('themes.default.input-file-upload.input-background', 'input-background');
        Config::set('themes.default.input-file-upload.input-border', 'input-border');
        Config::set('themes.default.input-file-upload.input-color', 'input-color');
        Config::set('themes.default.input-file-upload.input-font', 'input-font');
        Config::set('themes.default.input-file-upload.input-other', 'input-other');
        Config::set('themes.default.input-file-upload.input-padding', 'input-padding');
        Config::set('themes.default.input-file-upload.input-rounded', 'input-rounded');
        Config::set('themes.default.input-file-upload.input-shadow', 'input-shadow');

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
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" input-background="none" input-border="none" input-color="none" input-font="none" input-other="none" input-padding="none" input-rounded="none" input-shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div>
                <input name="avatar" type="file" id="avatar" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" input-background="10" input-border="11" input-color="12" input-font="13" input-other="14" input-padding="15" input-rounded="16" input-shadow="17" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9">
                <input name="avatar" type="file" id="avatar" class="10 11 12 13 14 15 16 17" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_appended_styles(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" background="... foo" border="... bar" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background foo wrapper-border bar wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_custom_id(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" id="custom-id" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="custom-id" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_accept(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" accept="image/*" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="avatar" accept="image/*" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_multiple_accept_types(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="documents" accept=".pdf,.doc,.docx" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="documents" type="file" id="documents" accept=".pdf,.doc,.docx" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_accept_from_config(): void
    {
        Config::set('themes.default.input-file-upload.accept', 'image/*');

        $template = <<<'HTML'
            <x-input-file-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="avatar" accept="image/*" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_accept_suppressed(): void
    {
        Config::set('themes.default.input-file-upload.accept', 'image/*');

        $template = <<<'HTML'
            <x-input-file-upload name="avatar" accept="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_multiple(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="files" :multiple="true" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="files" type="file" id="files" multiple class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_accept_and_multiple(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="images" accept="image/*" :multiple="true" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="images" type="file" id="images" accept="image/*" multiple class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_capture_environment(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="photo" capture="environment" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="photo" type="file" id="photo" capture="environment" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_capture_user(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="selfie" capture="user" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="selfie" type="file" id="selfie" capture="user" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_capture_from_config(): void
    {
        Config::set('themes.default.input-file-upload.capture', 'environment');

        $template = <<<'HTML'
            <x-input-file-upload name="photo" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="photo" type="file" id="photo" capture="environment" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_required(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" required-input />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="avatar" required class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_override_wrapper_config_styles(): void
    {
        Config::set('themes.default.input.wrapper-background', 'config-wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'config-wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'config-wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'config-wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'config-wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'config-wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'config-wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'config-wrapper-shadow');
        Config::set('themes.default.input.wrapper-width', 'config-wrapper-width');

        $template = <<<'HTML'
            <x-input-file-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div class="config-wrapper-background config-wrapper-border config-wrapper-color config-wrapper-font config-wrapper-other config-wrapper-padding config-wrapper-rounded config-wrapper-shadow config-wrapper-width">
                <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_override_input_config_styles(): void
    {
        Config::set('themes.default.input-file-upload.input-background', 'config-input-background');
        Config::set('themes.default.input-file-upload.input-border', 'config-input-border');
        Config::set('themes.default.input-file-upload.input-color', 'config-input-color');
        Config::set('themes.default.input-file-upload.input-font', 'config-input-font');
        Config::set('themes.default.input-file-upload.input-other', 'config-input-other');
        Config::set('themes.default.input-file-upload.input-padding', 'config-input-padding');
        Config::set('themes.default.input-file-upload.input-rounded', 'config-input-rounded');
        Config::set('themes.default.input-file-upload.input-shadow', 'config-input-shadow');

        $template = <<<'HTML'
            <x-input-file-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="avatar" class="config-input-background config-input-border config-input-color config-input-font config-input-other config-input-padding config-input-rounded config-input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width float-right">
                <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" onchange="previewImage(this)" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" onchange="previewImage(this)" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_value_is_not_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" value="some-file.jpg" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_icon_left(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" icon-left="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <div class="icon-left-background icon-left-border icon-left-color icon-left-other icon-left-padding icon-left-rounded icon-left-shadow" x-on:click="showToggle">
                    <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                    <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_file_upload_component_can_be_rendered_with_icon_right(): void
    {
        $template = <<<'HTML'
            <x-input-file-upload name="avatar" icon-right="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="icon-right-background icon-right-border icon-right-color icon-right-other icon-right-padding icon-right-rounded icon-right-shadow" x-on:click="showToggle">
                    <svg class="icon-right-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
