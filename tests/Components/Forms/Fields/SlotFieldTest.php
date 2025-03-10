<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class SlotFieldTest extends ComponentTestCase
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
    public function the_field_slot_component_can_be_rendered(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-slot name="slot" label="Slot">Some text goes here</x-field-slot>
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="slot" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Slot</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style"> Some text goes here </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_slot_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-slot name="slot" label="Slot" class="float-right">Some text goes here</x-field-slot>
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="slot" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Slot</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style"> Some text goes here </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_slot_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-slot name="slot" label="Slot" onclick="test()">Some text goes here</x-field-slot>
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="slot" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Slot</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style" onclick="test()"> Some text goes here </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
