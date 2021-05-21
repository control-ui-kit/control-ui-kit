<?php

declare(strict_types=1);

namespace Tests\Components\Text;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class LinkTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.link.default-text', 'default');

        Config::set('themes.default.link.color', 'color');
        Config::set('themes.default.link.font', 'font');
        Config::set('themes.default.link.other', 'other');
        Config::set('themes.default.link.size', 'size');

        Config::set('themes.default.link.default.color', 'default-color');
        Config::set('themes.default.link.default.font', 'default-font');
        Config::set('themes.default.link.default.other', 'default-other');
        Config::set('themes.default.link.default.size', 'default-size');

        Config::set('themes.default.link.brand.color', 'brand-color');
        Config::set('themes.default.link.brand.font', 'brand-font');
        Config::set('themes.default.link.brand.other', 'brand-other');
        Config::set('themes.default.link.brand.size', 'brand-size');

        Config::set('themes.default.link.danger.color', 'danger-color');
        Config::set('themes.default.link.danger.font', 'danger-font');
        Config::set('themes.default.link.danger.other', 'danger-other');
        Config::set('themes.default.link.danger.size', 'danger-size');

        Config::set('themes.default.link.info.color', 'info-color');
        Config::set('themes.default.link.info.font', 'info-font');
        Config::set('themes.default.link.info.other', 'info-other');
        Config::set('themes.default.link.info.size', 'info-size');

        Config::set('themes.default.link.muted.color', 'muted-color');
        Config::set('themes.default.link.muted.font', 'muted-font');
        Config::set('themes.default.link.muted.other', 'muted-other');
        Config::set('themes.default.link.muted.size', 'muted-size');

        Config::set('themes.default.link.success.color', 'success-color');
        Config::set('themes.default.link.success.font', 'success-font');
        Config::set('themes.default.link.success.other', 'success-other');
        Config::set('themes.default.link.success.size', 'success-size');

        Config::set('themes.default.link.warning.color', 'warning-color');
        Config::set('themes.default.link.warning.font', 'warning-font');
        Config::set('themes.default.link.warning.other', 'warning-other');
        Config::set('themes.default.link.warning.size', 'warning-size');
    }

    /** @test */
    public function a_basic_link_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-link>Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="color default-color font default-font other default-other size default-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_basic_link_component_can_be_rendered_with_href(): void
    {
        $template = <<<'HTML'
            <x-link href="https://example.com">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="color default-color font default-font other default-other size default-size" href="https://example.com">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_basic_link_component_can_be_rendered_with_onclick(): void
    {
        $template = <<<'HTML'
            <x-link @click="doSomething()">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="color default-color font default-font other default-other size default-size" @click="doSomething()">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_basic_link_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-link color="none" font="none" other="none" size="none">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a>Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_basic_link_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-link color="custom-color" font="custom-font" other="custom-other" size="custom-size">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="custom-color custom-font custom-other custom-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_default_link_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-link type="default">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="color default-color font default-font other default-other size default-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_default_link_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-link default color="none" font="none" other="none" size="none">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a>Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_default_link_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-link default color="custom-color" font="custom-font" other="custom-other" size="custom-size">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="custom-color custom-font custom-other custom-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_brand_link_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-link type="brand">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="color brand-color font brand-font other brand-other size brand-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_brand_link_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-link brand color="none" font="none" other="none" size="none">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a>Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_brand_link_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-link brand color="custom-color" font="custom-font" other="custom-other" size="custom-size">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="custom-color custom-font custom-other custom-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_danger_link_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-link type="danger">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="color danger-color font danger-font other danger-other size danger-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_danger_link_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-link danger color="none" font="none" other="none" size="none">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a>Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_danger_link_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-link danger color="custom-color" font="custom-font" other="custom-other" size="custom-size">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="custom-color custom-font custom-other custom-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_info_link_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-link type="info">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="color info-color font info-font other info-other size info-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_info_link_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-link info color="none" font="none" other="none" size="none">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a>Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_info_link_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-link info color="custom-color" font="custom-font" other="custom-other" size="custom-size">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="custom-color custom-font custom-other custom-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_muted_link_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-link type="muted">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="color muted-color font muted-font other muted-other size muted-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_muted_link_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-link muted color="none" font="none" other="none" size="none">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a>Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_muted_link_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-link muted color="custom-color" font="custom-font" other="custom-other" size="custom-size">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="custom-color custom-font custom-other custom-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_success_link_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-link type="success">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="color success-color font success-font other success-other size success-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_success_link_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-link success color="none" font="none" other="none" size="none">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a>Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_success_link_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-link success color="custom-color" font="custom-font" other="custom-other" size="custom-size">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="custom-color custom-font custom-other custom-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_warning_link_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-link type="warning">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="color warning-color font warning-font other warning-other size warning-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_warning_link_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-link warning color="none" font="none" other="none" size="none">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a>Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_warning_link_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-link warning color="custom-color" font="custom-font" other="custom-other" size="custom-size">Link content</x-link>
            HTML;

        $expected = <<<'HTML'
            <a class="custom-color custom-font custom-other custom-size">Link content</a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
