<?php

declare(strict_types=1);

namespace Tests\Components\Tabs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class PanelTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.tabs-panel.background', 'background');
        Config::set('themes.default.tabs-panel.border', 'border');
        Config::set('themes.default.tabs-panel.color', 'color');
        Config::set('themes.default.tabs-panel.font', 'font');
        Config::set('themes.default.tabs-panel.other', 'other');
        Config::set('themes.default.tabs-panel.padding', 'padding');
        Config::set('themes.default.tabs-panel.rounded', 'rounded');
        Config::set('themes.default.tabs-panel.shadow', 'shadow');
    }

    /** @test */
    public function a_tabs_panel_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-tabs.panel id="profile">
                Profile content
            </x-tabs.panel>
            HTML;

        $expected = <<<'HTML'
            <div x-show="showTab == 'profile'" x-cloak class="background border color font other padding rounded shadow"> Profile content </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_tabs_panel_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-tabs.panel id="profile" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">
                Profile content
            </x-tabs.panel>
            HTML;

        $expected = <<<'HTML'
            <div x-show="showTab == 'profile'" x-cloak> Profile content </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_tabs_panel_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-tabs.panel id="profile" background="a" border="b" color="c" font="d" other="e" padding="f" rounded="g" shadow="h">
                Profile content
            </x-tabs.panel>
            HTML;

        $expected = <<<'HTML'
            <div x-show="showTab == 'profile'" x-cloak class="a b c d e f g h"> Profile content </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_tabs_panel_component_can_be_rendered_with_additional_attributes(): void
    {
        $template = <<<'HTML'
            <x-tabs.panel id="profile" padding="none" wire:model="something">
                Profile content
            </x-tabs.panel>
            HTML;

        $expected = <<<'HTML'
            <div x-show="showTab == 'profile'" x-cloak class="background border color font other rounded shadow" wire:model="something"> Profile content </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
