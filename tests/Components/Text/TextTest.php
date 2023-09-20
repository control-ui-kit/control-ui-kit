<?php

declare(strict_types=1);

namespace Tests\Components\Text;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class TextTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.text.default-text', 'default');

        Config::set('themes.default.text.color', 'color');
        Config::set('themes.default.text.font', 'font');
        Config::set('themes.default.text.other', 'other');
        Config::set('themes.default.text.size', 'size');

        Config::set('themes.default.text.default.color', 'default-color');
        Config::set('themes.default.text.default.font', 'default-font');
        Config::set('themes.default.text.default.other', 'default-other');
        Config::set('themes.default.text.default.size', 'default-size');

        Config::set('themes.default.text.brand.color', 'brand-color');
        Config::set('themes.default.text.brand.font', 'brand-font');
        Config::set('themes.default.text.brand.other', 'brand-other');
        Config::set('themes.default.text.brand.size', 'brand-size');

        Config::set('themes.default.text.danger.color', 'danger-color');
        Config::set('themes.default.text.danger.font', 'danger-font');
        Config::set('themes.default.text.danger.other', 'danger-other');
        Config::set('themes.default.text.danger.size', 'danger-size');

        Config::set('themes.default.text.info.color', 'info-color');
        Config::set('themes.default.text.info.font', 'info-font');
        Config::set('themes.default.text.info.other', 'info-other');
        Config::set('themes.default.text.info.size', 'info-size');

        Config::set('themes.default.text.muted.color', 'muted-color');
        Config::set('themes.default.text.muted.font', 'muted-font');
        Config::set('themes.default.text.muted.other', 'muted-other');
        Config::set('themes.default.text.muted.size', 'muted-size');

        Config::set('themes.default.text.success.color', 'success-color');
        Config::set('themes.default.text.success.font', 'success-font');
        Config::set('themes.default.text.success.other', 'success-other');
        Config::set('themes.default.text.success.size', 'success-size');

        Config::set('themes.default.text.warning.color', 'warning-color');
        Config::set('themes.default.text.warning.font', 'warning-font');
        Config::set('themes.default.text.warning.other', 'warning-other');
        Config::set('themes.default.text.warning.size', 'warning-size');
    }

    /** @test */
    public function a_basic_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-text>Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="color default-color font default-font other default-other size default-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_basic_text_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-text color="none" font="none" other="none" size="none">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span>Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_basic_text_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-text color="custom-color" font="custom-font" other="custom-other" size="custom-size">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="custom-color custom-font custom-other custom-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_default_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-text type="default">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="color default-color font default-font other default-other size default-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_default_text_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-text default color="none" font="none" other="none" size="none">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span>Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_default_text_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-text default color="custom-color" font="custom-font" other="custom-other" size="custom-size">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="custom-color custom-font custom-other custom-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_brand_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-text type="brand">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="color brand-color font brand-font other brand-other size brand-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_brand_text_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-text brand color="none" font="none" other="none" size="none">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span>Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_brand_text_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-text brand color="custom-color" font="custom-font" other="custom-other" size="custom-size">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="custom-color custom-font custom-other custom-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_danger_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-text type="danger">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="color danger-color font danger-font other danger-other size danger-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_danger_text_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-text danger color="none" font="none" other="none" size="none">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span>Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_danger_text_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-text danger color="custom-color" font="custom-font" other="custom-other" size="custom-size">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="custom-color custom-font custom-other custom-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_info_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-text type="info">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="color info-color font info-font other info-other size info-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_info_text_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-text info color="none" font="none" other="none" size="none">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span>Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_info_text_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-text info color="custom-color" font="custom-font" other="custom-other" size="custom-size">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="custom-color custom-font custom-other custom-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_muted_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-text type="muted">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="color muted-color font muted-font other muted-other size muted-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_muted_text_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-text muted color="none" font="none" other="none" size="none">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span>Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_muted_text_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-text muted color="custom-color" font="custom-font" other="custom-other" size="custom-size">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="custom-color custom-font custom-other custom-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_success_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-text type="success">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="color success-color font success-font other success-other size success-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_success_text_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-text success color="none" font="none" other="none" size="none">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span>Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_success_text_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-text success color="custom-color" font="custom-font" other="custom-other" size="custom-size">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="custom-color custom-font custom-other custom-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_warning_text_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-text type="warning">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="color warning-color font warning-font other warning-other size warning-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_warning_text_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-text warning color="none" font="none" other="none" size="none">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span>Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_warning_text_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-text warning color="custom-color" font="custom-font" other="custom-other" size="custom-size">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="custom-color custom-font custom-other custom-size">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_basic_text_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-text class="float-right">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="color default-color font default-font other default-other size default-size float-right">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_basic_text_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-text onblur="console.log(this)">Text content</x-text>
            HTML;

        $expected = <<<'HTML'
            <span class="color default-color font default-font other default-other size default-size" onblur="console.log(this)">Text content</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
