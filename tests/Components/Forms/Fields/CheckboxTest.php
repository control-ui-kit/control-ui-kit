<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class CheckboxTest extends ComponentTestCase
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
        Config::set('themes.default.form-layout-inline.error-text', 'error-text');
        Config::set('themes.default.form-layout-inline.help-desktop', 'help-desktop');
        Config::set('themes.default.form-layout-inline.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-inline.label-text', 'label-text');
        Config::set('themes.default.form-layout-inline.label-wrapper', 'label-wrapper');
        Config::set('themes.default.form-layout-inline.required-icon-size', 'required-icon-size');
        Config::set('themes.default.form-layout-inline.required-icon-color', 'required-icon-color');
        Config::set('themes.default.form-layout-inline.slot-wrapper', 'slot-wrapper');
        Config::set('themes.default.form-layout-inline.wrapper', 'wrapper');

        Config::set('themes.default.input-checkbox.background', 'background');
        Config::set('themes.default.input-checkbox.border', 'border');
        Config::set('themes.default.input-checkbox.color', 'color');
        Config::set('themes.default.input-checkbox.other', 'other');
        Config::set('themes.default.input-checkbox.padding', 'padding');
        Config::set('themes.default.input-checkbox.rounded', 'rounded');
        Config::set('themes.default.input-checkbox.shadow', 'shadow');
    }

    /** @test */
    public function the_field_checkbox_component_can_be_rendered(): void
    {
        $this->withViewErrors(['enable' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-checkbox name="enable" label="Enable" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="enable" class="label-font label-wrapper">
                    <p class="label-text"> <span>Enable</span> </p>
                </label>
                <div class="field-wrapper">
                    <div class="slot-wrapper">
                        <input name="enable" type="checkbox" id="enable" value="1" class="background border color other padding rounded shadow" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
