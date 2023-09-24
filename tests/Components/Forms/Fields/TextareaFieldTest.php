<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class TextareaFieldTest extends ComponentTestCase
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

        Config::set('themes.default.input-textarea.prefix-text', '');

        Config::set('themes.default.input-textarea.background', 'background');
        Config::set('themes.default.input-textarea.border', 'border');
        Config::set('themes.default.input-textarea.color', 'color');
        Config::set('themes.default.input-textarea.font', 'font');
        Config::set('themes.default.input-textarea.other', 'other');
        Config::set('themes.default.input-textarea.padding', 'padding');
        Config::set('themes.default.input-textarea.rounded', 'rounded');
        Config::set('themes.default.input-textarea.shadow', 'shadow');
        Config::set('themes.default.input-textarea.width', 'width');
    }

    /** @test */
    public function the_field_url_component_can_be_rendered(): void
    {
        $this->withViewErrors(['biog' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-textarea name="biog" label="Biog" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="biog" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Biog</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <textarea name="biog" id="biog" rows="4" class="background border color font other padding rounded shadow width"></textarea>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
