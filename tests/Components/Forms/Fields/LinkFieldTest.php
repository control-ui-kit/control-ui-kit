<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class LinkFieldTest extends ComponentTestCase
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

        Config::set('themes.default.link.default-text', 'default');

        Config::set('themes.default.link.color', 'link-color');
        Config::set('themes.default.link.font', 'link-font');
        Config::set('themes.default.link.other', 'link-other');
        Config::set('themes.default.link.size', 'link-size');

        Config::set('themes.default.link.default.color', 'default-color');
        Config::set('themes.default.link.default.font', 'default-font');
        Config::set('themes.default.link.default.other', 'default-other');
        Config::set('themes.default.link.default.size', 'default-size');
    }

    #[Test]
    public function the_field_link_component_can_be_rendered_with_value(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-link name="link" label="Link" href="https://example.com" value="Visit Site" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Link</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <a class="link-color text-brand hover:text-brand-hover link-font link-other link-size" href="https://example.com">Visit Site</a>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_link_component_can_be_rendered_with_slot(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-link name="link" label="Link" href="https://example.com">Visit Site</x-field-link>
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Link</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <a class="link-color text-brand hover:text-brand-hover link-font link-other link-size" href="https://example.com">Visit Site</a>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_link_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-link name="link" label="Link" href="https://example.com" value="Visit Site" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Link</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <a class="link-color text-brand hover:text-brand-hover link-font link-other link-size" href="https://example.com">Visit Site</a>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_link_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-link name="link" label="Link" href="https://example.com" value="Visit Site" target="_blank" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Link</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <a class="link-color text-brand hover:text-brand-hover link-font link-other link-size" href="https://example.com" target="_blank">Visit Site</a>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
