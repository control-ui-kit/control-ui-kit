<?php

declare(strict_types=1);

namespace Tests\Components\Dropdowns;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class OptionTest extends ComponentTestCase
{
    #[Test]
    public function a_dropdown_option_component_can_be_rendered_without_url(): void
    {
        $template = <<<'HTML'
            <x-dropdown-option>Menu Item</x-dropdown-option>
            HTML;

        $expected = <<<'HTML'
            <a class="px-4 py-2 text-sm w-full flex items-center space-x-3 justify-between cursor-pointer group text-nowrap text-nav-bar-option hover:text-nav-bar-option-hover hover:bg-nav-bar-option-hover hover:no-underline"> Menu Item
            </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_dropdown_option_component_can_be_rendered_with_url(): void
    {
        $template = <<<'HTML'
            <x-dropdown-option url="https://example.com">Menu Item</x-dropdown-option>
            HTML;

        $expected = <<<'HTML'
            <a href="https://example.com" class="px-4 py-2 text-sm w-full flex items-center space-x-3 justify-between cursor-pointer group text-nowrap text-nav-bar-option hover:text-nav-bar-option-hover hover:bg-nav-bar-option-hover hover:no-underline"> Menu Item
            </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
