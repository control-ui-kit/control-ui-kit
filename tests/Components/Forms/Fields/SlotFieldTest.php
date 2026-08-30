<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class SlotFieldTest extends ComponentTestCase
{
    protected function setUp(): void
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
                    <div class="text-style"> <span>Slot</span> </div>
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
                    <div class="text-style"> <span>Slot</span> </div>
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
                    <div class="text-style"> <span>Slot</span> </div>
                </label>
                <div class="content-style">
                    <div class="slot-style" onclick="test()"> Some text goes here </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /**
     * x-field-slot has no input of its own to hand to x-form-field, so it renders its layout
     * directly - which meant the layout received a tooltip with no type, and the type is what
     * the template gates the tooltip on. The tooltip was accepted and then silently dropped.
     */
    #[Test]
    public function the_field_slot_component_renders_a_tooltip(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-slot name="isrc_prefix" label="ISRC Prefix" tooltip="The prefix new codes are built from.">
                <input type="text" name="isrc_prefix" />
            </x-field-slot>
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('The prefix new codes are built from.', $rendered);

        // The default type is the question-mark icon beside the label, not an input wrapper.
        $this->assertStringContainsString('@mouseenter="show($el)"', $rendered);
    }

    /**
     * A form posted over XHR never reaches Laravel's error bag - the 422 comes back as JSON and
     * the page is never re-rendered - so a field can name the Alpine object its errors arrive
     * in instead, and the same error element renders them client-side.
     */
    #[Test]
    public function the_field_slot_component_renders_errors_from_an_alpine_source(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-slot name="description" label="Description" alpine-errors="ui.expenseErrors">
                <input type="text" name="description" />
            </x-field-slot>
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('x-show="ui.expenseErrors?.description"', $rendered);
        $this->assertStringContainsString('x-text="Array.isArray(ui.expenseErrors?.description)', $rendered);
    }

    /**
     * Without one it stays on the server bag, so nothing else changes.
     */
    #[Test]
    public function the_field_slot_component_renders_nothing_for_a_field_with_no_error(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-slot name="description" label="Description">
                <input type="text" name="description" />
            </x-field-slot>
            HTML;

        $this->assertStringNotContainsString('x-show="', (string) $this->blade($template));
    }
}
