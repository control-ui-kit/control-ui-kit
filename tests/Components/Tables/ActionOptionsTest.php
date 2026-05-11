<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ActionOptionsTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.dropdown-menu.background', 'background');
        Config::set('themes.default.dropdown-menu.border', 'border');
        Config::set('themes.default.dropdown-menu.color', 'color');
        Config::set('themes.default.dropdown-menu.font', 'font');
        Config::set('themes.default.dropdown-menu.other', 'other');
        Config::set('themes.default.dropdown-menu.padding', 'padding');
        Config::set('themes.default.dropdown-menu.rounded', 'rounded');
        Config::set('themes.default.dropdown-menu.shadow', 'shadow');
    }

    #[Test]
    public function a_table_action_options_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-action-options />
            HTML;

        $expected = <<<'HTML'
            <div class="relative " x-data="{ open: false }" x-cloak>
                <svg class="w-5 h-5 fill-current cursor-pointer hover:text-brand-500" @click.prevent="open = !open" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.5 10.5C4.32843 10.5 5 9.82843 5 9s-.67157-1.5-1.5-1.5S2 8.17157 2 9s.67157 1.5 1.5 1.5zM9 10.5c.82843 0 1.5-.67157 1.5-1.5S9.82843 7.5 9 7.5 7.5 8.17157 7.5 9s.67157 1.5 1.5 1.5zM14.5 10.5c.8284 0 1.5-.67157 1.5-1.5s-.6716-1.5-1.5-1.5S13 8.17157 13 9s.6716 1.5 1.5 1.5z"/>
                    </svg>
                    <div class="background border color font other right-0 top-0 z-40 w-max rounded shadow" x-show="open" @click.away="open = false" x-on:mouseleave="timeout = setTimeout(() => { open = false }, 300)"> </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_action_options_component_can_be_rendered_with_a_custom_icon(): void
    {
        $template = <<<'HTML'
            <x-table-action-options icon="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="relative " x-data="{ open: false }" x-cloak>
                <svg class="w-5 h-5 fill-current cursor-pointer hover:text-brand-500" @click.prevent="open = !open" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                    <div class="background border color font other right-0 top-0 z-40 w-max rounded shadow" x-show="open" @click.away="open = false" x-on:mouseleave="timeout = setTimeout(() => { open = false }, 300)"> </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
