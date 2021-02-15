<?php

declare(strict_types=1);

namespace Tests\Components\Tabs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class TabsTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

//        Config::set('themes.default.tabs.background', 'background');
//        Config::set('themes.default.tabs.border', 'border');
//        Config::set('themes.default.tabs.color', 'color');
//        Config::set('themes.default.tabs.font', 'font');
//        Config::set('themes.default.tabs.other', 'other');
//        Config::set('themes.default.tabs.padding', 'padding');
//        Config::set('themes.default.tabs.rounded', 'rounded');
//        Config::set('themes.default.tabs.shadow', 'shadow');
//
//        Config::set('themes.default.tabs.heading.background', 'background');
//        Config::set('themes.default.tabs.heading.border', 'border');
//        Config::set('themes.default.tabs.heading.color', 'color');
//        Config::set('themes.default.tabs.heading.font', 'font');
//        Config::set('themes.default.tabs.heading.other', 'other');
//        Config::set('themes.default.tabs.heading.padding', 'padding');
//        Config::set('themes.default.tabs.heading.rounded', 'rounded');
//        Config::set('themes.default.tabs.heading.shadow', 'shadow');
//
//        Config::set('themes.default.tabs.panel.background', 'background');
//        Config::set('themes.default.tabs.panel.border', 'border');
//        Config::set('themes.default.tabs.panel.color', 'color');
//        Config::set('themes.default.tabs.panel.font', 'font');
//        Config::set('themes.default.tabs.panel.other', 'other');
//        Config::set('themes.default.tabs.panel.padding', 'padding');
//        Config::set('themes.default.tabs.panel.rounded', 'rounded');
//        Config::set('themes.default.tabs.panel.shadow', 'shadow');
    }

    /** @test */
    public function a_tabs_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-tabs>
                <x-slot name="headings">
                    <x-tabs.heading id="profile">Profile</x-tabs.heading>
                    <x-tabs.heading id="settings">Settings</x-tabs.heading>
                </x-slot>
                <x-slot name="panels">
                    <x-tabs.panel id="profile">
                        Profile content
                    </x-tabs.panel>

                    <x-tabs.panel id="settings">
                        Settings content
                    </x-tabs.panel>
                </x-slot>
            </x-tabs>
            HTML;

        $expected = <<<'HTML'
            <div id="tabs" x-data="tabsData()" x-init="init()">
                <div class="sm:hidden">
                    <select id="tabs" name="tabs" x-model="showTab" class="block w-full focus:border-input focus:outline-none focus:ring-brand rounded">
                        <option value="profile">Profile</option>
                        <option value="settings">Settings</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <nav class="flex items-center space-x-6" aria-label="Tabs">
                        <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'border-brand cursor-default' : showTab == 'profile' , 'border-transparent hover:text-gray-700 hover:border-gray-300' : showTab != 'profile'}" class="flex items-center space-x-2 py-1.5 border-b-2 font-medium" id="tabs_profile"
            > Profile </a>
                        <a href="#tabs-settings" x-on:click="tab('settings')" :class="{ 'border-brand cursor-default' : showTab == 'settings' , 'border-transparent hover:text-gray-700 hover:border-gray-300' : showTab != 'settings'}" class="flex items-center space-x-2 py-1.5 border-b-2 font-medium" id="tabs_settings"
            > Settings </a>
                    </nav>
                </div>
                <div x-show="showTab == 'profile'" x-cloak class="py-6"> Profile content </div>
                <div x-show="showTab == 'settings'" x-cloak class="py-6"> Settings content </div>
                <script>
                    const tabsData = () => ({
                        name: 'tabs',
                        showTab:  document.querySelector('#tabs a').id.replace('tabs_', '') ,
                        tab(id) {
                            this.showTab = id;
                        },
                        init() {
                            if (window.location.hash) {
                                let name = '#tabs-';
                                if (window.location.hash.indexOf(name) !== -1) {
                                    let tab = window.location.hash.replace(name, '');
                                    if (document.querySelector('#tabs #tabs_' + tab)) {
                                        this.showTab = tab;
                                    }
                                }
                            }
                        }
                    });
                </script>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
//
//    /** @test */
//    public function a_panel_component_can_be_rendered_with_a_title(): void
//    {
//        $template = <<< HTML
//            <x-panel title="Some Title">
//                Panel content
//            </x-panel>
//            HTML;
//
//        $expected = <<< HTML
//            <div class="flex flex-col">
//                <h3 class="background border color font other padding rounded shadow">
//                    Some Title
//                </h3>
//                <div class="background border color font other padding rounded shadow">
//                Panel content
//            </div>
//            </div>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function a_panel_component_can_be_rendered_with_no_styles(): void
//    {
//        $template = <<<'HTML'
//            <x-panel background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
//                Panel content
//            </x-panel>
//            HTML;
//
//        $expected = <<<'HTML'
//            <div>
//                Panel content
//            </div>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function a_panel_component_can_be_rendered_with_inline_styles(): void
//    {
//        $template = <<<'HTML'
//            <x-panel background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">
//                Panel content
//            </x-panel>
//            HTML;
//
//        $expected = <<<'HTML'
//            <div class="1 2 3 4 5 6 7 8">
//                Panel content
//            </div>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
//
//    /** @test */
//    public function a_panel_component_can_be_rendered_with_a_dynamic_component(): void
//    {
//        $template = <<<'HTML'
//            <x-panel component="title"></x-panel>
//            HTML;
//
//        $expected = <<<'HTML'
//            <div class="background border color font other padding rounded shadow">
//                <h3 class="background border color font other padding rounded shadow"></h3>
//            </div>
//            HTML;
//
//        $this->assertComponentRenders($expected, $template);
//    }
}
