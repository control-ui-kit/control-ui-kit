<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class InfoFieldTest extends ComponentTestCase
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
    }

    #[Test]
    public function the_field_info_component_can_be_rendered_with_value(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-info name="info" label="Info" value="Some text goes here" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Info</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div>Some text goes here</div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_info_component_can_be_rendered_with_slot(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-info name="info" label="Info">Some text goes here</x-field-info>
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Info</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div>Some text goes here</div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_info_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-info name="info" label="Info" value="Some text goes here" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Info</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div>Some text goes here</div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_info_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-info name="info" label="Info" value="Some text goes here" onclick="test()" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Info</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div onclick="test()">Some text goes here</div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
