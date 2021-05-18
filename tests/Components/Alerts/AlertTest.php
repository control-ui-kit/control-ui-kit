<?php

declare(strict_types=1);

namespace Tests\Components\Alerts;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class AlertTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.alert.default-alert', 'default');

        Config::set('themes.default.alert.background', 'background');
        Config::set('themes.default.alert.border', 'border');
        Config::set('themes.default.alert.other', 'other');
        Config::set('themes.default.alert.padding', 'padding');
        Config::set('themes.default.alert.rounded', 'rounded');
        Config::set('themes.default.alert.shadow', 'shadow');
        Config::set('themes.default.alert.width', 'width');

        Config::set('themes.default.alert.text-color', 'text-color');
        Config::set('themes.default.alert.text-font', 'text-font');
        Config::set('themes.default.alert.text-size', 'text-size');
        Config::set('themes.default.alert.text-other', 'text-other');

        Config::set('themes.default.alert.title-color', 'title-color');
        Config::set('themes.default.alert.title-font', 'title-font');
        Config::set('themes.default.alert.title-size', 'title-size');
        Config::set('themes.default.alert.title-other', 'title-other');

        Config::set('themes.default.alert.icon', '');
        Config::set('themes.default.alert.icon-color', 'icon-color');
        Config::set('themes.default.alert.icon-size', 'icon-size');

        Config::set('themes.default.alert.default.background', 'default-background');
        Config::set('themes.default.alert.default.border', 'default-border');
        Config::set('themes.default.alert.default.icon', '');
        Config::set('themes.default.alert.default.icon-color', 'default-icon-color');
        Config::set('themes.default.alert.default.title-color', 'default-title-color');
        Config::set('themes.default.alert.default.text-other', 'default-text-other');

        Config::set('themes.default.alert.brand.background', 'brand-background');
        Config::set('themes.default.alert.brand.border', 'brand-border');
        Config::set('themes.default.alert.brand.icon', 'icon.dot');
        Config::set('themes.default.alert.brand.icon-color', 'brand-icon-color');
        Config::set('themes.default.alert.brand.title-color', 'brand-title-color');
        Config::set('themes.default.alert.brand.text-other', 'brand-text-other');

        Config::set('themes.default.alert.danger.background', 'danger-background');
        Config::set('themes.default.alert.danger.border', 'danger-border');
        Config::set('themes.default.alert.danger.icon', 'icon.dot');
        Config::set('themes.default.alert.danger.icon-color', 'danger-icon-color');
        Config::set('themes.default.alert.danger.title-color', 'danger-title-color');
        Config::set('themes.default.alert.danger.text-other', 'danger-text-other');

        Config::set('themes.default.alert.info.background', 'info-background');
        Config::set('themes.default.alert.info.border', 'info-border');
        Config::set('themes.default.alert.info.icon', 'icon.dot');
        Config::set('themes.default.alert.info.icon-color', 'info-icon-color');
        Config::set('themes.default.alert.info.title-color', 'info-title-color');
        Config::set('themes.default.alert.info.text-other', 'info-text-other');

        Config::set('themes.default.alert.success.background', 'success-background');
        Config::set('themes.default.alert.success.border', 'success-border');
        Config::set('themes.default.alert.success.icon', 'icon.dot');
        Config::set('themes.default.alert.success.icon-color', 'success-icon-color');
        Config::set('themes.default.alert.success.title-color', 'success-title-color');
        Config::set('themes.default.alert.success.text-other', 'success-text-other');

        Config::set('themes.default.alert.muted.background', 'muted-background');
        Config::set('themes.default.alert.muted.border', 'muted-border');
        Config::set('themes.default.alert.muted.icon', 'icon.dot');
        Config::set('themes.default.alert.muted.icon-color', 'muted-icon-color');
        Config::set('themes.default.alert.muted.title-color', 'muted-title-color');
        Config::set('themes.default.alert.muted.text-other', 'muted-text-other');

        Config::set('themes.default.alert.warning.background', 'warning-background');
        Config::set('themes.default.alert.warning.border', 'warning-border');
        Config::set('themes.default.alert.warning.icon', 'icon.dot');
        Config::set('themes.default.alert.warning.icon-color', 'warning-icon-color');
        Config::set('themes.default.alert.warning.title-color', 'warning-title-color');
        Config::set('themes.default.alert.warning.text-other', 'warning-text-other');
    }

    /** @test */
    public function a_basic_alert_component_can_be_rendered_with_no_icon(): void
    {
        $template = <<<'HTML'
            <x-alert>
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background default-background border default-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex flex-col space-y-2">
                        <div class="text-color text-alert-default-text text-font text-size text-other"> Alert content </div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_basic_alert_component_with_title_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-alert title="Some title">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background default-background border default-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex flex-col space-y-2">
                        <h3 class="title-color default-title-color title-font title-size title-other">
                            Some title
                        </h3>
                        <div class="text-color text-alert-default-text text-font text-size text-other"> Alert content </div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_default_alert_component_can_be_rendered_with_a_title(): void
    {
        $template = <<<'HTML'
            <x-alert default title="Some title">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background default-background border default-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex flex-col space-y-2">
                        <h3 class="title-color default-title-color title-font title-size title-other">
                            Some title
                        </h3>
                        <div class="text-color text-alert-default-text text-font text-size text-other"> Alert content </div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_default_alert_component_can_be_rendered_with_a_title_using_type(): void
    {
        $template = <<<'HTML'
            <x-alert type="default" title="Some title">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background default-background border default-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex flex-col space-y-2">
                        <h3 class="title-color default-title-color title-font title-size title-other">
                            Some title
                        </h3>
                        <div class="text-color text-alert-default-text text-font text-size text-other"> Alert content </div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_brand_alert_component_can_be_rendered_with_a_title(): void
    {
        $template = <<<'HTML'
            <x-alert brand title="Some title">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background brand-background border brand-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <svg class="brand-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <h3 class="title-color brand-title-color title-font title-size title-other">
                                Some title
                            </h3>
                            <div class="text-color text-alert-brand-text text-font text-size text-other"> Alert content </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_danger_alert_component_can_be_rendered_with_a_title(): void
    {
        $template = <<<'HTML'
            <x-alert danger title="Some title">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background danger-background border danger-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <svg class="danger-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <h3 class="title-color danger-title-color title-font title-size title-other">
                                Some title
                            </h3>
                            <div class="text-color text-alert-danger-text text-font text-size text-other"> Alert content </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_info_alert_component_can_be_rendered_with_a_title(): void
    {
        $template = <<<'HTML'
            <x-alert info title="Some title">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background info-background border info-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <svg class="info-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <h3 class="title-color info-title-color title-font title-size title-other">
                                Some title
                            </h3>
                            <div class="text-color text-alert-info-text text-font text-size text-other"> Alert content </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_success_alert_component_can_be_rendered_with_a_title(): void
    {
        $template = <<<'HTML'
            <x-alert success title="Some title">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background success-background border success-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <svg class="success-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <h3 class="title-color success-title-color title-font title-size title-other">
                                Some title
                            </h3>
                            <div class="text-color text-alert-success-text text-font text-size text-other"> Alert content </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_muted_alert_component_can_be_rendered_with_a_title(): void
    {
        $template = <<<'HTML'
            <x-alert muted title="Some title">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background muted-background border muted-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <svg class="muted-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <h3 class="title-color muted-title-color title-font title-size title-other">
                                Some title
                            </h3>
                            <div class="text-color text-alert-muted-text text-font text-size text-other"> Alert content </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_warning_alert_component_can_be_rendered_with_a_title(): void
    {
        $template = <<<'HTML'
            <x-alert warning title="Some title">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background warning-background border warning-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <svg class="warning-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <h3 class="title-color warning-title-color title-font title-size title-other">
                                Some title
                            </h3>
                            <div class="text-color text-alert-warning-text text-font text-size text-other"> Alert content </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_alert_component_can_be_rendered_with_no_bar_styles(): void
    {
        $template = <<<'HTML'
            <x-alert background="none" border="none" other="none" padding="none" rounded="none" shadow="none" width="none">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div>
                <div class="flex">
                    <div class="flex flex-col space-y-2">
                        <div class="text-color text-alert-default-text text-font text-size text-other"> Alert content </div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_alert_component_can_be_rendered_with_inline_bar_styles(): void
    {
        $template = <<<'HTML'
            <x-alert background="1" border="2" other="3" padding="4" rounded="5" shadow="6" width="7">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7">
                <div class="flex">
                    <div class="flex flex-col space-y-2">
                        <div class="text-color text-alert-default-text text-font text-size text-other"> Alert content </div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_alert_component_can_be_rendered_with_no_text_and_title_styles(): void
    {
        $template = <<<'HTML'
            <x-alert
                title="some title"
                text-color="none"
                text-font="none"
                text-size="none"
                text-other="none"
                title-color="none"
                title-font="none"
                title-size="none"
                title-other="none"
            >
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background default-background border default-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex flex-col space-y-2">
                        <h3 class="">
                            some title
                        </h3>
                        <div class=""> Alert content </div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_alert_component_can_be_rendered_with_inline_text_and_title_styles(): void
    {
        $template = <<<'HTML'
            <x-alert
                title="some title"
                text-color="1"
                text-font="2"
                text-size="3"
                text-other="4"
                title-color="5"
                title-font="6"
                title-size="7"
                title-other="8"
            >
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background default-background border default-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex flex-col space-y-2">
                        <h3 class="5 6 7 8">
                            some title
                        </h3>
                        <div class="1 2 3 4"> Alert content </div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_alert_component_can_be_rendered_with_inline_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-alert icon="icon.dot" icon-size="custom-size" icon-color="custom-color">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background default-background border default-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <svg class="custom-color custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <div class="text-color text-alert-default-text text-font text-size text-other"> Alert content </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_alert_component_can_be_rendered_with_no_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-alert icon="icon.dot" icon-size="none" icon-color="none">
                Alert content
            </x-alert>
            HTML;

        $expected = <<<'HTML'
            <div class="background default-background border default-border other padding rounded shadow width">
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <svg class="fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <div class="text-color text-alert-default-text text-font text-size text-other"> Alert content </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
