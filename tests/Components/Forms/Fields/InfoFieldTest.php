<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class InfoFieldTest extends ComponentTestCase
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
    public function the_field_email_component_can_be_rendered(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-info name="info" label="Info" value="Some text goes here" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-font label-wrapper">
                    <p class="label-text"> <span>Info</span> </p>
                </label>
                <div class="field-wrapper">
                    <div class="slot-wrapper">
                        <div>Some text goes here</div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
