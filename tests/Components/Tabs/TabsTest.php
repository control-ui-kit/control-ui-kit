<?php

declare(strict_types=1);

namespace Tests\Components\Tabs;

use ControlUIKit\Components\Tabs\Tabs;
use ControlUIKit\Exceptions\ControlUIKitException;
use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class TabsTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.tabs.background', 'background');
        Config::set('themes.default.tabs.border', 'border');
        Config::set('themes.default.tabs.color', 'color');
        Config::set('themes.default.tabs.font', 'font');
        Config::set('themes.default.tabs.other', 'other');
        Config::set('themes.default.tabs.padding', 'padding');
        Config::set('themes.default.tabs.rounded', 'rounded');
        Config::set('themes.default.tabs.shadow', 'shadow');
        Config::set('themes.default.tabs.breakpoint', 'sm');
        Config::set('themes.default.tabs.position', 'top');
        Config::set('themes.default.tabs.query', 't');
        Config::set('themes.default.tabs.select-spacing', 'select-spacing');
        Config::set('themes.default.tabs.spacing', 'spacing');
        Config::set('themes.default.tabs.side-gap', 'side-gap');
        Config::set('themes.default.tabs.side-heading', 'side-heading');
        Config::set('themes.default.tabs.side-spacing', 'side-spacing');
        Config::set('themes.default.tabs.side-width', 'side-width');

        Config::set('themes.default.input-select.please-select-text', 'Please Select ...');
        Config::set('themes.default.input-select.please-select-value', null);
        Config::set('themes.default.input-select.please-select-trans', '');
        Config::set('themes.default.input-select.button-background', 'button-background');
        Config::set('themes.default.input-select.button-border', 'button-border');
        Config::set('themes.default.input-select.button-color', 'button-color');
        Config::set('themes.default.input-select.button-font', 'button-font');
        Config::set('themes.default.input-select.button-other', 'button-other');
        Config::set('themes.default.input-select.button-padding', 'button-padding');
        Config::set('themes.default.input-select.button-rounded', 'button-rounded');
        Config::set('themes.default.input-select.button-shadow', 'button-shadow');
        Config::set('themes.default.input-select.button-width', 'button-width');

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

        Config::set('themes.default.tabs-panel.background', 'background');
        Config::set('themes.default.tabs-panel.border', 'border');
        Config::set('themes.default.tabs-panel.color', 'color');
        Config::set('themes.default.tabs-panel.font', 'font');
        Config::set('themes.default.tabs-panel.other', 'other');
        Config::set('themes.default.tabs-panel.padding', 'padding');
        Config::set('themes.default.tabs-panel.rounded', 'rounded');
        Config::set('themes.default.tabs-panel.shadow', 'shadow');
    }

    #[Test]
    public function a_tabs_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-tabs>
                <x-slot name="headings">
                    <x-tabs-heading id="profile">Profile</x-tabs-heading>
                    <x-tabs-heading id="settings">Settings</x-tabs-heading>
                </x-slot>
                <x-slot name="panels">
                    <x-tabs-panel id="profile">
                        Profile content
                    </x-tabs-panel>

                    <x-tabs-panel id="settings">
                        Settings content
                    </x-tabs-panel>
                </x-slot>
            </x-tabs>
            HTML;

        $expected = <<<'HTML'
            <div id="tabs" x-data="tabsData()" x-init="init()" class="background border color font other padding rounded shadow">
                <div class="sm:hidden select-spacing">
                    <div class="relative w-full">
                        <select id="tabs" name="tabs" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow appearance-none w-full" x-model="showTab">
                            <option value="profile" selected> Profile </option>
                            <option value="settings"> Settings </option>
                        </select>
                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="hidden sm:block overflow-x-auto">
                        <nav class="flex items-center flex-wrap spacing" aria-label="Tabs">
                            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile"> Profile </a>
                            <a href="#tabs-settings" x-on:click="tab('settings')" :class="{ 'active' : showTab == 'settings' , 'inactive' : showTab != 'settings'}" class="background border color font other padding rounded shadow" id="tabs_settings"> Settings </a>
                        </nav>
                    </div>
                    <div x-show="showTab == 'profile'" x-cloak class="background border color font other padding rounded shadow"> Profile content </div>
                    <div x-show="showTab == 'settings'" x-cloak class="background border color font other padding rounded shadow"> Settings content </div>
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

    #[Test]
    public function a_tabs_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-tabs background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" spacing="none">
                <x-slot name="headings">
                    <x-tabs-heading id="profile">Profile</x-tabs-heading>
                    <x-tabs-heading id="settings">Settings</x-tabs-heading>
                </x-slot>
                <x-slot name="panels">
                    <x-tabs-panel id="profile">
                        Profile content
                    </x-tabs-panel>

                    <x-tabs-panel id="settings">
                        Settings content
                    </x-tabs-panel>
                </x-slot>
            </x-tabs>
            HTML;

        $expected = <<<'HTML'
            <div id="tabs" x-data="tabsData()" x-init="init()">
                <div class="sm:hidden select-spacing">
                    <div class="relative w-full">
                        <select id="tabs" name="tabs" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow appearance-none w-full" x-model="showTab">
                            <option value="profile" selected> Profile </option>
                            <option value="settings"> Settings </option>
                        </select>
                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="hidden sm:block overflow-x-auto">
                        <nav class="flex items-center flex-wrap " aria-label="Tabs">
                            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile"> Profile </a>
                            <a href="#tabs-settings" x-on:click="tab('settings')" :class="{ 'active' : showTab == 'settings' , 'inactive' : showTab != 'settings'}" class="background border color font other padding rounded shadow" id="tabs_settings"> Settings </a>
                        </nav>
                    </div>
                    <div x-show="showTab == 'profile'" x-cloak class="background border color font other padding rounded shadow"> Profile content </div>
                    <div x-show="showTab == 'settings'" x-cloak class="background border color font other padding rounded shadow"> Settings content </div>
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

    #[Test]
    public function a_tabs_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-tabs background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" spacing="9" select-spacing="10">
                <x-slot name="headings">
                    <x-tabs-heading id="profile">Profile</x-tabs-heading>
                    <x-tabs-heading id="settings">Settings</x-tabs-heading>
                </x-slot>
                <x-slot name="panels">
                    <x-tabs-panel id="profile">
                        Profile content
                    </x-tabs-panel>

                    <x-tabs-panel id="settings">
                        Settings content
                    </x-tabs-panel>
                </x-slot>
            </x-tabs>
            HTML;

        $expected = <<<'HTML'
            <div id="tabs" x-data="tabsData()" x-init="init()" class="1 2 3 4 5 6 7 8">
                <div class="sm:hidden 10">
                    <div class="relative w-full">
                        <select id="tabs" name="tabs" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow appearance-none w-full" x-model="showTab">
                            <option value="profile" selected> Profile </option>
                            <option value="settings"> Settings </option>
                        </select>
                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="hidden sm:block overflow-x-auto">
                        <nav class="flex items-center flex-wrap 9" aria-label="Tabs">
                            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile"> Profile </a>
                            <a href="#tabs-settings" x-on:click="tab('settings')" :class="{ 'active' : showTab == 'settings' , 'inactive' : showTab != 'settings'}" class="background border color font other padding rounded shadow" id="tabs_settings"> Settings </a>
                        </nav>
                    </div>
                    <div x-show="showTab == 'profile'" x-cloak class="background border color font other padding rounded shadow"> Profile content </div>
                    <div x-show="showTab == 'settings'" x-cloak class="background border color font other padding rounded shadow"> Settings content </div>
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

    #[Test]
    public function a_tabs_component_can_be_rendered_with_a_custom_breakpoint(): void
    {
        $template = <<<'HTML'
            <x-tabs breakpoint="md">
                <x-slot name="headings">
                    <x-tabs-heading id="profile">Profile</x-tabs-heading>
                    <x-tabs-heading id="settings">Settings</x-tabs-heading>
                </x-slot>
                <x-slot name="panels">
                    <x-tabs-panel id="profile">
                        Profile content
                    </x-tabs-panel>

                    <x-tabs-panel id="settings">
                        Settings content
                    </x-tabs-panel>
                </x-slot>
            </x-tabs>
            HTML;

        $expected = <<<'HTML'
            <div id="tabs" x-data="tabsData()" x-init="init()" class="background border color font other padding rounded shadow">
                <div class="md:hidden select-spacing">
                    <div class="relative w-full">
                        <select id="tabs" name="tabs" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow appearance-none w-full" x-model="showTab">
                            <option value="profile" selected> Profile </option>
                            <option value="settings"> Settings </option>
                        </select>
                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="hidden md:block overflow-x-auto">
                        <nav class="flex items-center flex-wrap spacing" aria-label="Tabs">
                            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile"> Profile </a>
                            <a href="#tabs-settings" x-on:click="tab('settings')" :class="{ 'active' : showTab == 'settings' , 'inactive' : showTab != 'settings'}" class="background border color font other padding rounded shadow" id="tabs_settings"> Settings </a>
                        </nav>
                    </div>
                    <div x-show="showTab == 'profile'" x-cloak class="background border color font other padding rounded shadow"> Profile content </div>
                    <div x-show="showTab == 'settings'" x-cloak class="background border color font other padding rounded shadow"> Settings content </div>
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

    #[Test]
    public function a_tabs_component_can_be_rendered_in_the_side_position(): void
    {
        $template = <<<'HTML'
            <x-tabs position="side">
                <x-slot name="headings">
                    <x-tabs-heading id="profile">Profile</x-tabs-heading>
                    <x-tabs-heading id="settings">Settings</x-tabs-heading>
                </x-slot>
                <x-slot name="panels">
                    <x-tabs-panel id="profile">
                        Profile content
                    </x-tabs-panel>

                    <x-tabs-panel id="settings">
                        Settings content
                    </x-tabs-panel>
                </x-slot>
            </x-tabs>
            HTML;

        $expected = <<<'HTML'
            <div id="tabs" x-data="tabsData()" x-init="init()" class="background border color font other padding rounded shadow">
                <div class="sm:hidden select-spacing">
                    <div class="relative w-full">
                        <select id="tabs" name="tabs" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow appearance-none w-full" x-model="showTab">
                            <option value="profile" selected> Profile </option>
                            <option value="settings"> Settings </option>
                        </select>
                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="sm:flex side-gap">
                        <nav class="hidden sm:flex shrink-0 flex-col side-width side-spacing side-heading" aria-label="Tabs">
                            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile"> Profile </a>
                            <a href="#tabs-settings" x-on:click="tab('settings')" :class="{ 'active' : showTab == 'settings' , 'inactive' : showTab != 'settings'}" class="background border color font other padding rounded shadow" id="tabs_settings"> Settings </a>
                        </nav>
                        <div class="flex-1 min-w-0">
                            <div x-show="showTab == 'profile'" x-cloak class="background border color font other padding rounded shadow"> Profile content </div>
                            <div x-show="showTab == 'settings'" x-cloak class="background border color font other padding rounded shadow"> Settings content </div>
                        </div>
                    </div>
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

    #[Test]
    public function a_tabs_component_can_be_rendered_in_the_side_position_from_the_theme(): void
    {
        Config::set('themes.default.tabs.position', 'side');

        $template = <<<'HTML'
            <x-tabs>
                <x-slot name="headings">
                    <x-tabs-heading id="profile">Profile</x-tabs-heading>
                </x-slot>
                <x-slot name="panels">
                    <x-tabs-panel id="profile">
                        Profile content
                    </x-tabs-panel>
                </x-slot>
            </x-tabs>
            HTML;

        $expected = <<<'HTML'
            <div id="tabs" x-data="tabsData()" x-init="init()" class="background border color font other padding rounded shadow">
                <div class="sm:hidden select-spacing">
                    <div class="relative w-full">
                        <select id="tabs" name="tabs" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow appearance-none w-full" x-model="showTab">
                            <option value="profile" selected> Profile </option>
                        </select>
                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="sm:flex side-gap">
                        <nav class="hidden sm:flex shrink-0 flex-col side-width side-spacing side-heading" aria-label="Tabs">
                            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile"> Profile </a>
                        </nav>
                        <div class="flex-1 min-w-0">
                            <div x-show="showTab == 'profile'" x-cloak class="background border color font other padding rounded shadow"> Profile content </div>
                        </div>
                    </div>
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

    #[Test]
    public function a_side_tabs_component_can_be_rendered_with_inline_side_styles_and_a_custom_breakpoint(): void
    {
        $template = <<<'HTML'
            <x-tabs position="side" breakpoint="lg" side-gap="gap-x-10" side-heading="1" side-spacing="space-y-3" side-width="min-w-60">
                <x-slot name="headings">
                    <x-tabs-heading id="profile">Profile</x-tabs-heading>
                </x-slot>
                <x-slot name="panels">
                    <x-tabs-panel id="profile">
                        Profile content
                    </x-tabs-panel>
                </x-slot>
            </x-tabs>
            HTML;

        $expected = <<<'HTML'
            <div id="tabs" x-data="tabsData()" x-init="init()" class="background border color font other padding rounded shadow">
                <div class="lg:hidden select-spacing">
                    <div class="relative w-full">
                        <select id="tabs" name="tabs" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow appearance-none w-full" x-model="showTab">
                            <option value="profile" selected> Profile </option>
                        </select>
                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="lg:flex gap-x-10">
                        <nav class="hidden lg:flex shrink-0 flex-col min-w-60 space-y-3 1" aria-label="Tabs">
                            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile"> Profile </a>
                        </nav>
                        <div class="flex-1 min-w-0">
                            <div x-show="showTab == 'profile'" x-cloak class="background border color font other padding rounded shadow"> Profile content </div>
                        </div>
                    </div>
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

    #[Test]
    public function a_side_tabs_component_can_be_rendered_with_no_side_styles(): void
    {
        $template = <<<'HTML'
            <x-tabs position="side" side-gap="none" side-heading="none" side-spacing="none" side-width="none">
                <x-slot name="headings">
                    <x-tabs-heading id="profile">Profile</x-tabs-heading>
                </x-slot>
                <x-slot name="panels">
                    <x-tabs-panel id="profile">
                        Profile content
                    </x-tabs-panel>
                </x-slot>
            </x-tabs>
            HTML;

        $expected = <<<'HTML'
            <div id="tabs" x-data="tabsData()" x-init="init()" class="background border color font other padding rounded shadow">
                <div class="sm:hidden select-spacing">
                    <div class="relative w-full">
                        <select id="tabs" name="tabs" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow appearance-none w-full" x-model="showTab">
                            <option value="profile" selected> Profile </option>
                        </select>
                        <span class="border-l border-input text-input absolute flex items-center pointer-events-none px-2.5 inset-y-0 right-0">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="sm:flex ">
                        <nav class="hidden sm:flex shrink-0 flex-col " aria-label="Tabs">
                            <a href="#tabs-profile" x-on:click="tab('profile')" :class="{ 'active' : showTab == 'profile' , 'inactive' : showTab != 'profile'}" class="background border color font other padding rounded shadow" id="tabs_profile"> Profile </a>
                        </nav>
                        <div class="flex-1 min-w-0">
                            <div x-show="showTab == 'profile'" x-cloak class="background border color font other padding rounded shadow"> Profile content </div>
                        </div>
                    </div>
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

    #[Test]
    public function a_tabs_component_throws_an_exception_when_given_an_invalid_position(): void
    {
        $this->expectException(ControlUIKitException::class);
        $this->expectExceptionMessage('Tabs position [bottom] is invalid, please use one of [top, side]');

        new Tabs(position: 'bottom');
    }

    #[Test]
    public function a_tabs_component_throws_an_exception_when_the_theme_position_is_invalid(): void
    {
        Config::set('themes.default.tabs.position', 'bottom');

        $this->expectException(ControlUIKitException::class);
        $this->expectExceptionMessage('Tabs position [bottom] is invalid, please use one of [top, side]');

        new Tabs;
    }

    #[Test]
    public function a_tab_can_be_opened_by_id_from_the_query_string(): void
    {
        request()->query->set('t', 'royalty');

        $rendered = $this->renderTabs($this->threeTabs());

        $this->assertStringContainsString("showTab:  'royalty'", $rendered);
        $this->assertStringContainsString('<option value="royalty" selected>', $rendered);
    }

    #[Test]
    public function a_tab_can_be_opened_by_its_position_in_the_query_string(): void
    {
        request()->query->set('t', '2');

        $rendered = $this->renderTabs($this->threeTabs());

        $this->assertStringContainsString("showTab:  'settings'", $rendered);
        $this->assertStringContainsString('<option value="settings" selected>', $rendered);
    }

    #[Test]
    public function a_position_in_the_query_string_is_one_based(): void
    {
        request()->query->set('t', '1');

        $rendered = $this->renderTabs($this->threeTabs());

        $this->assertStringContainsString("showTab:  'profile'", $rendered);
    }

    #[Test]
    public function a_position_past_the_last_rendered_tab_is_ignored(): void
    {
        request()->query->set('t', '4');

        $this->assertStringContainsString(
            'showTab:  document.querySelector',
            $this->renderTabs($this->threeTabs())
        );
    }

    #[Test]
    public function a_position_of_zero_is_ignored(): void
    {
        request()->query->set('t', '0');

        $this->assertStringContainsString(
            'showTab:  document.querySelector',
            $this->renderTabs($this->threeTabs())
        );
    }

    #[Test]
    public function a_query_string_naming_no_rendered_tab_is_ignored(): void
    {
        request()->query->set('t', 'billing');

        $this->assertStringContainsString(
            'showTab:  document.querySelector',
            $this->renderTabs($this->threeTabs())
        );
    }

    #[Test]
    public function an_empty_query_string_value_is_ignored(): void
    {
        request()->query->set('t', '');

        $this->assertStringContainsString(
            'showTab:  document.querySelector',
            $this->renderTabs($this->threeTabs())
        );
    }

    #[Test]
    public function an_array_query_string_value_is_ignored(): void
    {
        request()->query->set('t', ['royalty']);

        $this->assertStringContainsString(
            'showTab:  document.querySelector',
            $this->renderTabs($this->threeTabs())
        );
    }

    #[Test]
    public function the_query_string_parameter_can_be_renamed(): void
    {
        request()->query->set('t', 'royalty');
        request()->query->set('b', 'settings');

        $rendered = $this->renderTabs($this->threeTabs('query="b"'));

        $this->assertStringContainsString("showTab:  'settings'", $rendered);
    }

    #[Test]
    public function the_query_string_can_be_switched_off(): void
    {
        request()->query->set('t', 'royalty');

        $this->assertStringContainsString(
            'showTab:  document.querySelector',
            $this->renderTabs($this->threeTabs('query="none"'))
        );
    }

    #[Test]
    public function the_query_string_takes_precedence_over_the_selected_attribute(): void
    {
        request()->query->set('t', 'royalty');

        $rendered = $this->renderTabs($this->threeTabs('selected="settings"'));

        $this->assertStringContainsString("showTab:  'royalty'", $rendered);
    }

    #[Test]
    public function the_selected_attribute_is_used_when_the_query_string_asks_for_nothing(): void
    {
        $rendered = $this->renderTabs($this->threeTabs('selected="settings"'));

        $this->assertStringContainsString("showTab:  'settings'", $rendered);
        $this->assertStringContainsString('<option value="settings" selected>', $rendered);
    }

    #[Test]
    public function the_selected_attribute_is_used_when_the_query_string_names_no_rendered_tab(): void
    {
        request()->query->set('t', 'billing');

        $this->assertStringContainsString(
            "showTab:  'settings'",
            $this->renderTabs($this->threeTabs('selected="settings"'))
        );
    }

    /**
     * Rendered and indented the same way assertComponentRenders() does it, so these
     * assertions can be written against the same normalised markup as the tests above.
     */
    private function renderTabs(string $template): string
    {
        return $this->indent((string) $this->blade($template));
    }

    /**
     * Three tabs whose ids are not their positions, so a test cannot pass by confusing one
     * for the other.
     */
    private function threeTabs(string $attributes = ''): string
    {
        return <<<HTML
            <x-tabs {$attributes}>
                <x-slot name="headings">
                    <x-tabs-heading id="profile">Profile</x-tabs-heading>
                    <x-tabs-heading id="settings">Settings</x-tabs-heading>
                    <x-tabs-heading id="royalty">Royalty</x-tabs-heading>
                </x-slot>
                <x-slot name="panels">
                    <x-tabs-panel id="profile">Profile content</x-tabs-panel>
                    <x-tabs-panel id="settings">Settings content</x-tabs-panel>
                    <x-tabs-panel id="royalty">Royalty content</x-tabs-panel>
                </x-slot>
            </x-tabs>
            HTML;
    }
}
