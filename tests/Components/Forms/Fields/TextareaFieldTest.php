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
                <label for="biog" class="label-font label-wrapper">
                    <p class="label-text"> <span>Biog</span> </p>
                </label>
                <div class="field-wrapper">
                    <div class="slot-wrapper">
                        <textarea name="biog" id="biog" rows="4" class="background border color font other padding rounded shadow width"></textarea>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
