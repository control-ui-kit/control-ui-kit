<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class EmailFieldTest extends ComponentTestCase
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

        Config::set('themes.default.input-email.prefix-text', '');

        Config::set('themes.default.input-email.background', 'background');
        Config::set('themes.default.input-email.border', 'border');
        Config::set('themes.default.input-email.color', 'color');
        Config::set('themes.default.input-email.font', 'font');
        Config::set('themes.default.input-email.other', 'other');
        Config::set('themes.default.input-email.padding', 'padding');
        Config::set('themes.default.input-email.rounded', 'rounded');
        Config::set('themes.default.input-email.shadow', 'shadow');
        Config::set('themes.default.input-email.width', 'width');
    }

    /** @test */
    public function the_field_email_component_can_be_rendered(): void
    {
        $this->withViewErrors(['email' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-email name="email" label="email" placeholder="Email Name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="email" class="label-font label-wrapper">
                    <p class="label-text"> <span>email</span> </p>
                </label>
                <div class="field-wrapper">
                    <div class="slot-wrapper">
                        <input name="email" type="email" id="email" placeholder="Email Name" class="background border color font other padding rounded shadow width" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
