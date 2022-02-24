<?php

declare(strict_types=1);

namespace Tests\Components\Buttons;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class ButtonTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.button.primary-button', 'default');

        Config::set('themes.default.button.background', 'background');
        Config::set('themes.default.button.border', 'border');
        Config::set('themes.default.button.color', 'color');
        Config::set('themes.default.button.cursor', 'cursor');
        Config::set('themes.default.button.disabled', 'disabled');
        Config::set('themes.default.button.font', 'font');
        Config::set('themes.default.button.icon-size', 'icon-size');
        Config::set('themes.default.button.other', 'other');
        Config::set('themes.default.button.padding', 'padding');
        Config::set('themes.default.button.rounded', 'rounded');
        Config::set('themes.default.button.shadow', 'shadow');

        Config::set('themes.default.button.default.background', 'default-background');
        Config::set('themes.default.button.default.border', 'default-border');
        Config::set('themes.default.button.default.color', 'default-color');
        Config::set('themes.default.button.default.icon', 'default-icon');

        Config::set('themes.default.button.brand.background', 'brand-background');
        Config::set('themes.default.button.brand.border', 'brand-border');
        Config::set('themes.default.button.brand.color', 'brand-color');
        Config::set('themes.default.button.brand.icon', 'brand-icon');

        Config::set('themes.default.button.danger.background', 'danger-background');
        Config::set('themes.default.button.danger.border', 'danger-border');
        Config::set('themes.default.button.danger.color', 'danger-color');
        Config::set('themes.default.button.danger.icon', 'danger-icon');

        Config::set('themes.default.button.info.background', 'info-background');
        Config::set('themes.default.button.info.border', 'info-border');
        Config::set('themes.default.button.info.color', 'info-color');
        Config::set('themes.default.button.info.icon', 'info-icon');

        Config::set('themes.default.button.success.background', 'success-background');
        Config::set('themes.default.button.success.border', 'success-border');
        Config::set('themes.default.button.success.color', 'success-color');
        Config::set('themes.default.button.success.icon', 'success-icon');

        Config::set('themes.default.button.link.background', 'link-background');
        Config::set('themes.default.button.link.border', 'link-border');
        Config::set('themes.default.button.link.color', 'link-color');
        Config::set('themes.default.button.link.icon', 'link-icon');

        Config::set('themes.default.button.muted.background', 'muted-background');
        Config::set('themes.default.button.muted.border', 'muted-border');
        Config::set('themes.default.button.muted.color', 'muted-color');
        Config::set('themes.default.button.muted.icon', 'muted-icon');

        Config::set('themes.default.button.warning.background', 'warning-background');
        Config::set('themes.default.button.warning.border', 'warning-border');
        Config::set('themes.default.button.warning.color', 'warning-color');
        Config::set('themes.default.button.warning.icon', 'warning-icon');
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_text_and_no_slot(): void
    {
        $template = <<<'HTML'
            <x-button text="Click Me" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_trans_and_no_slot(): void
    {
        $template = <<<'HTML'
            <x-button trans="some.test.lang.string" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="button"> some.test.lang.string </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_no_set_style(): void
    {
        $template = <<<'HTML'
            <x-button>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_primary_button_changed_in_config_to_brand(): void
    {
        Config::set('themes.default.button.primary-button', 'brand');

        $template = <<<'HTML'
            <x-button>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background brand-background border brand-border color brand-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_primary_button_changed_in_config_to_invalid(): void
    {
        Config::set('themes.default.button.primary-button', 'invalid');

        $template = <<<'HTML'
            <x-button>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_default_styles(): void
    {
        $template = <<<'HTML'
            <x-button bstyle="default">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_default_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-button default>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_brand_styles(): void
    {
        $template = <<<'HTML'
            <x-button bstyle="brand">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background brand-background border brand-border color brand-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_brand_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-button brand>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background brand-background border brand-border color brand-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_danger_styles(): void
    {
        $template = <<<'HTML'
            <x-button bstyle="danger">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background danger-background border danger-border color danger-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_danger_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-button danger>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background danger-background border danger-border color danger-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_info_styles(): void
    {
        $template = <<<'HTML'
            <x-button bstyle="info">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background info-background border info-border color info-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_info_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-button info>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background info-background border info-border color info-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_link_styles(): void
    {
        $template = <<<'HTML'
            <x-button bstyle="link">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background link-background border link-border color link-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_link_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-button link>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background link-background border link-border color link-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_success_styles(): void
    {
        $template = <<<'HTML'
            <x-button bstyle="success">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background success-background border success-border color success-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_success_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-button success>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background success-background border success-border color success-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_muted_styles(): void
    {
        $template = <<<'HTML'
            <x-button bstyle="muted">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background muted-background border muted-border color muted-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_muted_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-button muted>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background muted-background border muted-border color muted-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function a_button_component_can_be_rendered_with_warning_styles(): void
    {
        $template = <<<'HTML'
            <x-button bstyle="warning">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background warning-background border warning-border color warning-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_warning_styles_shorthand(): void
    {
        $template = <<<'HTML'
            <x-button warning>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background warning-background border warning-border color warning-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function a_button_component_can_be_rendered_with_invalid_styles(): void
    {
        $template = <<<'HTML'
            <x-button bstyle="invalid">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_a_type(): void
    {
        $template = <<<'HTML'
            <x-button type="submit">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="submit"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_a_href(): void
    {
        $template = <<<'HTML'
            <x-button href="https://example.com">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <a href="https://example.com" class="background default-background border default-border color default-color cursor font other padding rounded shadow" role="button"> Click Me </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_a_href_and_a_target(): void
    {
        $template = <<<'HTML'
            <x-button href="https://example.com" target="_blank">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <a href="https://example.com" class="background default-background border default-border color default-color cursor font other padding rounded shadow" target="_blank" role="button"> Click Me </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_an_alpine_onclick(): void
    {
        $template = <<<'HTML'
            <x-button x-on:click="click()">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" x-on:click="click()" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_an_alpine_onclick_shorthand(): void
    {
        $template = <<<'HTML'
            <x-button @click="click()">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" @click="click()" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_an_icon(): void
    {
        $template = <<<'HTML'
            <x-button icon="icon-dot">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="button">
                <svg class="icon-size fill-current default-icon" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                    <span>Click Me</span>
                </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_danger_button_component_can_be_rendered_with_an_icon(): void
    {
        $template = <<<'HTML'
            <x-button danger icon="icon-dot">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background danger-background border danger-border color danger-color cursor font other padding rounded shadow" type="button">
                <svg class="icon-size fill-current danger-icon" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                    <span>Click Me</span>
                </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_an_icon_updated_size(): void
    {
        $template = <<<'HTML'
            <x-button icon="icon-dot" icon-size="::new-size">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="button">
                <svg class="::new-size fill-current default-icon" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                    <span>Click Me</span>
                </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function a_button_component_can_be_rendered_with_an_icon_updated_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-button icon="icon-dot" icon-style="::some-class">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="button">
                <svg class="icon-size fill-current ::some-class" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                    <span>Click Me</span>
                </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-button icon="none" background="none" border="none" color="none" cursor="none" font="none" other="none" padding="none" rounded="none" shadow="none" icon-style="none">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_with_icon_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-button icon="icon-dot" background="none" border="none" color="none" cursor="none" font="none" icon-style="none" other="none" padding="none" rounded="none" shadow="none">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button type="button">
                <svg class="icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                    <span>Click Me</span>
                </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_with_icon_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-button background="1" border="2" color="3" cursor="4" font="5" other="6" padding="7" rounded="8" shadow="9">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="1 2 3 4 5 6 7 8 9" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_as_disabled_with_bool(): void
    {
        $template = <<<'HTML'
            <x-button disabled>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color disabled font other padding rounded shadow" disabled type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_as_disabled_with_attribute(): void
    {
        $template = <<<'HTML'
            <x-button disabled="disabled">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color disabled font other padding rounded shadow" disabled type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_href_button_component_can_be_rendered_as_disabled_with_bool(): void
    {
        $template = <<<'HTML'
            <x-button href="http://example.com" disabled>Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color disabled font other padding rounded shadow" disabled type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_href_button_component_can_be_rendered_as_disabled_with_attribute(): void
    {
        $template = <<<'HTML'
            <x-button href="http://example.com" disabled="disabled">Click Me</x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color disabled font other padding rounded shadow" disabled type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_button_component_can_be_rendered_updated_styles(): void
    {
        $template = <<<'HTML'
            <x-button danger icon="icon-dot" rounded="none" shadow="my-shadow" @click="doDelete">
                Delete
            </x-button>
            HTML;

        $expected = <<<'HTML'
            <button class="background danger-background border danger-border color danger-color cursor font other padding my-shadow" @click="doDelete" type="button">
                <svg class="icon-size fill-current danger-icon" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                    <span>Delete</span>
                </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
