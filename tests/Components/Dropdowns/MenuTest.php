<?php

declare(strict_types=1);

namespace Tests\Components\Dropdowns;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class MenuTest extends ComponentTestCase
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
    public function a_dropdown_menu_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-dropdown-menu>Menu Item</x-dropdown-menu>
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow"> Menu Item
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_dropdown_menu_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-dropdown-menu
                background="none"
                border="none"
                color="none"
                font="none"
                other="none"
                padding="none"
                rounded="none"
                shadow="none">Menu Item</x-dropdown-menu>
            HTML;

        $expected = <<<'HTML'
            <div> Menu Item
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_dropdown_menu_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-dropdown-menu
                background="1"
                border="2"
                color="3"
                font="4"
                other="5"
                padding="6"
                rounded="7"
                shadow="8">Menu Item</x-dropdown-menu>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8"> Menu Item
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
