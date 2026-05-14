<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ImageUploadTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-image-upload.accept', '');
        Config::set('themes.default.input-image-upload.capture', '');
        Config::set('themes.default.input-image-upload.display', 'above');
        Config::set('themes.default.input-image-upload.container-above', 'container-above');
        Config::set('themes.default.input-image-upload.container-inline', 'container-inline');

        Config::set('themes.default.input.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input.wrapper-width', 'wrapper-width');

        Config::set('themes.default.input-image-upload.input-background', 'input-background');
        Config::set('themes.default.input-image-upload.input-border', 'input-border');
        Config::set('themes.default.input-image-upload.input-color', 'input-color');
        Config::set('themes.default.input-image-upload.input-font', 'input-font');
        Config::set('themes.default.input-image-upload.input-other', 'input-other');
        Config::set('themes.default.input-image-upload.input-padding', 'input-padding');
        Config::set('themes.default.input-image-upload.input-rounded', 'input-rounded');
        Config::set('themes.default.input-image-upload.input-shadow', 'input-shadow');

        Config::set('themes.default.input-image-upload.preview-background', 'preview-background');
        Config::set('themes.default.input-image-upload.preview-border', 'preview-border');
        Config::set('themes.default.input-image-upload.preview-color', 'preview-color');
        Config::set('themes.default.input-image-upload.preview-other', 'preview-other');
        Config::set('themes.default.input-image-upload.preview-padding', 'preview-padding');
        Config::set('themes.default.input-image-upload.preview-rounded', 'preview-rounded');
        Config::set('themes.default.input-image-upload.preview-shadow', 'preview-shadow');
        Config::set('themes.default.input-image-upload.preview-width', 'preview-width');
        Config::set('themes.default.input-image-upload.preview-height', 'preview-height');
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_inline_display(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" display="inline" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-inline">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" input-background="none" input-border="none" input-color="none" input-font="none" input-other="none" input-padding="none" input-rounded="none" input-shadow="none" preview-background="none" preview-border="none" preview-color="none" preview-other="none" preview-padding="none" preview-rounded="none" preview-shadow="none" preview-width="none" preview-height="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" />
                <div>
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" input-background="10" input-border="11" input-color="12" input-font="13" input-other="14" input-padding="15" input-rounded="16" input-shadow="17" preview-background="1" preview-border="2" preview-color="3" preview-other="4" preview-padding="5" preview-rounded="6" preview-shadow="7" preview-width="8" preview-height="9" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="1 2 3 4 5 6 7 8 9" />
                <div class="1 2 3 4 5 6 7 8 9">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="10 11 12 13 14 15 16 17" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_appended_styles(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" background="... foo" border="... bar" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background foo wrapper-border bar wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_custom_id(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" id="custom-id" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="custom-id" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_accept(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" accept="image/*" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" accept="image/*" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_accept_from_config(): void
    {
        Config::set('themes.default.input-image-upload.accept', 'image/jpeg,image/png');

        $template = <<<'HTML'
            <x-input-image-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" accept="image/jpeg,image/png" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_accept_suppressed(): void
    {
        Config::set('themes.default.input-image-upload.accept', 'image/jpeg,image/png');

        $template = <<<'HTML'
            <x-input-image-upload name="avatar" accept="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_capture_environment(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" capture="environment" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" capture="environment" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_capture_user(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" capture="user" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" capture="user" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_capture_from_config(): void
    {
        Config::set('themes.default.input-image-upload.capture', 'environment');

        $template = <<<'HTML'
            <x-input-image-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" capture="environment" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_required(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" required-input />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" required x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_display_from_config(): void
    {
        Config::set('themes.default.input-image-upload.display', 'inline');

        $template = <<<'HTML'
            <x-input-image-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-inline">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_value_is_not_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" value="some-image.jpg" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" class="mt-4" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above mt-4">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-image-upload name="avatar" data-test="foo" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" data-test="foo" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_override_wrapper_config_styles(): void
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
            <x-input-image-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="config-wrapper-background config-wrapper-border config-wrapper-color config-wrapper-font config-wrapper-other config-wrapper-padding config-wrapper-rounded config-wrapper-shadow config-wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_override_input_config_styles(): void
    {
        Config::set('themes.default.input-image-upload.input-background', 'config-input-background');
        Config::set('themes.default.input-image-upload.input-border', 'config-input-border');
        Config::set('themes.default.input-image-upload.input-color', 'config-input-color');
        Config::set('themes.default.input-image-upload.input-font', 'config-input-font');
        Config::set('themes.default.input-image-upload.input-other', 'config-input-other');
        Config::set('themes.default.input-image-upload.input-padding', 'config-input-padding');
        Config::set('themes.default.input-image-upload.input-rounded', 'config-input-rounded');
        Config::set('themes.default.input-image-upload.input-shadow', 'config-input-shadow');

        $template = <<<'HTML'
            <x-input-image-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="config-input-background config-input-border config-input-color config-input-font config-input-other config-input-padding config-input-rounded config-input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_image_upload_component_can_be_rendered_with_override_preview_config_styles(): void
    {
        Config::set('themes.default.input-image-upload.preview-background', 'config-preview-background');
        Config::set('themes.default.input-image-upload.preview-border', 'config-preview-border');
        Config::set('themes.default.input-image-upload.preview-color', 'config-preview-color');
        Config::set('themes.default.input-image-upload.preview-other', 'config-preview-other');
        Config::set('themes.default.input-image-upload.preview-padding', 'config-preview-padding');
        Config::set('themes.default.input-image-upload.preview-rounded', 'config-preview-rounded');
        Config::set('themes.default.input-image-upload.preview-shadow', 'config-preview-shadow');
        Config::set('themes.default.input-image-upload.preview-width', 'config-preview-width');
        Config::set('themes.default.input-image-upload.preview-height', 'config-preview-height');

        $template = <<<'HTML'
            <x-input-image-upload name="avatar" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputImageUpload()" class="container-above">
                <img x-show="src" x-cloak :src="src" class="config-preview-background config-preview-border config-preview-color config-preview-other config-preview-padding config-preview-rounded config-preview-shadow config-preview-width config-preview-height" />
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                    <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
