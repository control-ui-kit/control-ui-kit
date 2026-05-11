<?php

declare(strict_types=1);

namespace Tests\Components\Code;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class BlockTest extends ComponentTestCase
{
    #[Test]
    public function a_code_block_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-code-block>echo 'hello';</x-code-block>
            HTML;

        $expected = <<<'HTML'
            <div class="rounded-lg p-4 mt-4" style="background-color: #252525">
                <pre class="scrollbar-none language-html"><code class="scrolling-touch language-html">echo 'hello';</code></pre>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_code_block_component_can_be_rendered_with_php_language(): void
    {
        $template = <<<'HTML'
            <x-code-block language="php">echo 'hello';</x-code-block>
            HTML;

        $expected = <<<'HTML'
            <div class="rounded-lg p-4 mt-4" style="background-color: #252525">
                <pre class="scrollbar-none language-html"><code class="scrolling-touch language-php">echo 'hello';</code></pre>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_code_block_component_can_be_rendered_with_javascript_language(): void
    {
        $template = <<<'HTML'
            <x-code-block language="javascript">console.log('hello');</x-code-block>
            HTML;

        $expected = <<<'HTML'
            <div class="rounded-lg p-4 mt-4" style="background-color: #252525">
                <pre class="scrollbar-none language-html"><code class="scrolling-touch language-javascript">console.log('hello');</code></pre>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
