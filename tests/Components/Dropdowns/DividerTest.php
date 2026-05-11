<?php

declare(strict_types=1);

namespace Tests\Components\Dropdowns;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class DividerTest extends ComponentTestCase
{
    #[Test]
    public function a_dropdown_divider_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-dropdown-divider />
            HTML;

        $expected = <<<'HTML'
            <div class="border-b border-nav-bar-divider"></div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
