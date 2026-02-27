<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ErrorBagTest extends ComponentTestCase
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

        Config::set('themes.default.alert.danger.background', 'danger-background');
        Config::set('themes.default.alert.danger.border', 'danger-border');
        Config::set('themes.default.alert.danger.icon', 'icon-dot');
        Config::set('themes.default.alert.danger.icon-color', 'danger-icon-color');
        Config::set('themes.default.alert.danger.title-color', 'danger-title-color');
        Config::set('themes.default.alert.danger.text-other', 'danger-text-other');
    }

    #[Test]
    public function an_error_bag_component_can_be_rendered_when_errors_are_present(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-error-bag />
            HTML;

        $expected = <<<'HTML'
            <div class="background danger-background border danger-border other padding rounded shadow width">
                <div class="flex items-center">
                    <div class="shrink-0 mr-3">
                        <svg class="danger-icon-color icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="3" cy="3" r="3"/>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <div class="text-color text-alert-danger-text text-font text-size text-other">
                                <ul class="list-disc pl-5">
                                    <li>This is a test message</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_error_bag_component_can_be_rendered_when_no_errors_are_present(): void
    {
        $template = <<<'HTML'
            <x-error-bag />
            HTML;

        $expected = '';

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_error_bag_component_can_be_rendered_with_warning_type_and_custom_icon(): void
    {
        $this->withViewErrors(['test' => 'This is a test message']);

        $template = <<<'HTML'
            <x-error-bag type="default" icon="icon-options" icon-color="custom-color" background="custom-background" />
            HTML;

        $expected = <<<'HTML'
            <div class="custom-background border default-border other padding rounded shadow width">
                <div class="flex items-center">
                    <div class="shrink-0 mr-3">
                        <svg class="custom-color icon-size fill-current" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.5 10.5C4.32843 10.5 5 9.82843 5 9s-.67157-1.5-1.5-1.5S2 8.17157 2 9s.67157 1.5 1.5 1.5zM9 10.5c.82843 0 1.5-.67157 1.5-1.5S9.82843 7.5 9 7.5 7.5 8.17157 7.5 9s.67157 1.5 1.5 1.5zM14.5 10.5c.8284 0 1.5-.67157 1.5-1.5s-.6716-1.5-1.5-1.5S13 8.17157 13 9s.6716 1.5 1.5 1.5z"/>
                            </svg>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <div class="text-color text-alert-default-text text-font text-size text-other">
                                <ul class="list-disc pl-5">
                                    <li>This is a test message</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
