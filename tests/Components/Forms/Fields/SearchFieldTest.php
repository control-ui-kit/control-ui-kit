<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class SearchFieldTest extends ComponentTestCase
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

        Config::set('themes.default.input-search.background', 'background');
        Config::set('themes.default.input-search.border', 'border');
        Config::set('themes.default.input-search.color', 'color');
        Config::set('themes.default.input-search.font', 'font');
        Config::set('themes.default.input-search.other', 'other');
        Config::set('themes.default.input-search.padding', 'padding');
        Config::set('themes.default.input-search.rounded', 'rounded');
        Config::set('themes.default.input-search.shadow', 'shadow');
        Config::set('themes.default.input-search.width', 'width');

        Config::set('themes.default.input-search.icon-left', '');
        Config::set('themes.default.input-search.icon-left-border', '');
        Config::set('themes.default.input-search.icon-left-padding', '');
    }

    /** @test */
    public function the_field_search_component_can_be_rendered(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-search name="track" label="Track" placeholder="Track Name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Track</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="track" type="search" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_field_search_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-search name="track" label="Track" placeholder="Track Name" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Track</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="track" type="search" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_field_search_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-search name="track" label="Track" placeholder="Track Name" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Track</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="track" type="search" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" onclick="alert('here')" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
