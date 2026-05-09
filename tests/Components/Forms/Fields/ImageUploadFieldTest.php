<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ImageUploadFieldTest extends ComponentTestCase
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
    public function the_field_image_upload_component_can_be_rendered(): void
    {
        $this->withViewErrors(['avatar' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-image-upload name="avatar" label="Avatar" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="avatar" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Avatar</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputImageUpload()" class="container-above">
                            <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                                <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                            </div>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_image_upload_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['avatar' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-image-upload name="avatar" label="Avatar" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="avatar" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Avatar</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputImageUpload()" class="container-above">
                            <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                                <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                            </div>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_image_upload_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['avatar' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-image-upload name="avatar" label="Avatar" data-test="foo" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="avatar" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Avatar</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputImageUpload()" class="container-above">
                            <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                                <input name="avatar" type="file" id="avatar" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" data-test="foo" />
                            </div>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_image_upload_component_can_be_rendered_with_accept(): void
    {
        $this->withViewErrors(['avatar' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-image-upload name="avatar" label="Avatar" accept="image/*" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="avatar" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Avatar</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data="Components.inputImageUpload()" class="container-above">
                            <img x-show="src" x-cloak :src="src" class="preview-background preview-border preview-color preview-other preview-padding preview-rounded preview-shadow preview-width preview-height" />
                            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                                <input name="avatar" type="file" id="avatar" accept="image/*" x-on:change="previewImage($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                            </div>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
