<?php

declare(strict_types=1);

namespace Tests\Components\Code;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class InlineTest extends ComponentTestCase
{
    #[Test]
    public function a_code_inline_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-code>echo 'hello';</x-code>
            HTML;

        $expected = <<<'HTML'
            <span class="bg-app px-0.5 text-brand rounded font-semibold">echo 'hello';</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
