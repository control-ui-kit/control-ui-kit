<?php

declare(strict_types=1);

namespace Tests\Components\Tabs;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class HeadingTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.tabs-heading.background', 'background');
        Config::set('themes.default.tabs-heading.border', 'border');
        Config::set('themes.default.tabs-heading.color', 'color');
        Config::set('themes.default.tabs-heading.font', 'font');
        Config::set('themes.default.tabs-heading.other', 'other');
        Config::set('themes.default.tabs-heading.padding', 'padding');
        Config::set('themes.default.tabs-heading.rounded', 'rounded');
        Config::set('themes.default.tabs-heading.shadow', 'shadow');
        Config::set('themes.default.tabs-heading.active', 'active');
        Config::set('themes.default.tabs-heading.inactive', 'inactive');
        Config::set('themes.default.tabs-heading.icon-size', 'icon-size');
    }

    #[Test]
    public function a_tabs_heading_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-tabs-heading id="profile">
                Heading content
            </x-tabs-heading>
            HTML;

        $expected = <<<'HTML'
            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile"> Heading content </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tabs_heading_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-tabs-heading id="profile" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" active="none" inactive="none">
                Heading content
            </x-tabs-heading>
            HTML;

        $expected = <<<'HTML'
            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ '' : showTab == 'profile' , '' : showTab != 'profile'}" id="tabs_profile"> Heading content </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tabs_heading_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-tabs-heading id="profile" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" active="9" inactive="10">
                Heading content
            </x-tabs-heading>
            HTML;

        $expected = <<<'HTML'
            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ '9' : showTab == 'profile' , '10' : showTab != 'profile'}" class="1 2 3 4 5 6 7 8" id="tabs_profile"> Heading content </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tabs_heading_component_can_be_rendered_with_an_icon(): void
    {
        $template = <<<'HTML'
            <x-tabs-heading id="profile" icon="icon-dot">
                Heading content
            </x-tabs-heading>
            HTML;

        $expected = <<<'HTML'
            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile">
                <svg class="icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                    <span>Heading content</span>
                </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tabs_heading_component_can_be_rendered_with_an_icon_and_custom_icon_size(): void
    {
        $template = <<<'HTML'
            <x-tabs-heading id="profile" icon="icon-dot" icon-size="::new-size">
                Heading content
            </x-tabs-heading>
            HTML;

        $expected = <<<'HTML'
            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile">
                <svg class="::new-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                    <span>Heading content</span>
                </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
