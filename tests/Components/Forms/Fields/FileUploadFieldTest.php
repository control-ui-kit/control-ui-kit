<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class FileUploadFieldTest extends ComponentTestCase
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
    }

    #[Test]
    public function the_field_file_upload_component_can_be_rendered(): void
    {
        $this->withViewErrors(['avatar' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-file-upload name="avatar" label="Avatar" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Avatar</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                            <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_file_upload_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['avatar' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-file-upload name="avatar" label="Avatar" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Avatar</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                            <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_file_upload_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['avatar' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-file-upload name="avatar" label="Avatar" onchange="previewImage(this)" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Avatar</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                            <input name="avatar" type="file" id="avatar" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" onchange="previewImage(this)" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_file_upload_component_can_be_rendered_with_accept(): void
    {
        $this->withViewErrors(['avatar' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-file-upload name="avatar" label="Avatar" accept="image/*" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Avatar</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                            <input name="avatar" type="file" id="avatar" accept="image/*" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_file_upload_component_can_be_rendered_with_multiple(): void
    {
        $this->withViewErrors(['files' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-file-upload name="files" label="Files" :multiple="true" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Files</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                            <input name="files" type="file" id="files" multiple class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
