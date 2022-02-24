<?php

declare(strict_types=1);

namespace Tests\Components\Buttons;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Tests\Components\ComponentTestCase;

class LogoutTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

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

        Route::post('logout', function() {
            // ...
        })->name('logout');
    }

    /** @test */
    public function a_text_logout_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-logout />
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://localhost/logout">
                <input type="hidden" name="_token" value="">
                <button type="submit"> Log Out </button>
            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_text_logout_component_with_action_and_attributes_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-logout action="http://example.com" class="text-gray-500">Sign Out</x-logout>
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://example.com">
                <input type="hidden" name="_token" value="">
                <button type="submit" class="text-gray-500"> Sign Out </button>
            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_default_button_logout_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-logout default />
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://localhost/logout">
                <input type="hidden" name="_token" value="">
                <button class="background default-background border default-border color default-color cursor font other padding rounded shadow" type="submit"> Log Out </button>
            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_brand_button_logout_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-logout brand>Sign Out</x-logout>
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://localhost/logout">
                <input type="hidden" name="_token" value="">
                <button class="background brand-background border brand-border color brand-color cursor font other padding rounded shadow" type="submit"> Sign Out </button>
            </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_brand_button_logout_component_with_icon_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-logout brand icon="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://localhost/logout">
                <input type="hidden" name="_token" value="">
                <button class="background brand-background border brand-border color brand-color cursor font other padding rounded shadow" type="submit">
                    <svg class="icon-size fill-current brand-icon" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                        <span>Log Out</span>
                    </button>
                </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_icon_only_button_logout_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-logout brand icon-only icon="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <form method="POST" action="http://localhost/logout">
                <input type="hidden" name="_token" value="">
                <button class="background brand-background border brand-border color brand-color cursor font other padding rounded shadow" type="submit">
                    <svg class="icon-size fill-current brand-icon" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </button>
                </form>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
