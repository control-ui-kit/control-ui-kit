<?php

declare(strict_types=1);

namespace Tests\Components\Markdown;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ToCTest extends ComponentTestCase
{
    #[Test]
    public function a_toc_component_can_render_markdown_to_html(): void
    {
        $template = <<<'HTML'
            <x-toc>
            # Hello World

            Blade UI components are **awesome**.

            ## Sub Title level 2

            Some content.

            ### Sub Sub Title level 3

            #### Sub Sub Title level 4

            Some content.

            ## Other Sub Title level 2

            ### Sub Sub Title level 3

            Some content.
            </x-toc>
            HTML;

        $expected = <<<'HTML'
            <ul>
                <li>
                    <a href="#sub-title-level-2"> Sub Title level 2 </a>
                    <ul>
                        <li>
                            <a href="#sub-sub-title-level-3"> Sub Sub Title level 3 </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#other-sub-title-level-2"> Other Sub Title level 2 </a>
                    <ul>
                        <li>
                            <a href="#sub-sub-title-level-3"> Sub Sub Title level 3 </a>
                        </li>
                    </ul>
                </li>
            </ul>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_toc_component_can_accepts_a_base_url(): void
    {
        $template = <<<'HTML'
            <x-toc url="http://example.com/foo">
            # Hello World

            Blade UI components are **awesome**.

            ## Sub Title level 2

            Some content.

            ### Sub Sub Title level 3

            Some content.
            </x-toc>
            HTML;

        $expected = <<<'HTML'
            <ul>
                <li>
                    <a href="http://example.com/foo#sub-title-level-2"> Sub Title level 2 </a>
                    <ul>
                        <li>
                            <a href="http://example.com/foo#sub-sub-title-level-3"> Sub Sub Title level 3 </a>
                        </li>
                    </ul>
                </li>
            </ul>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_toc_component_skips_headings_in_code_blocks(): void
    {
        $template = <<<'HTML'
            <x-toc>
            # Hello World

            Blade UI components are **awesome**.

            ## Sub Title level 2

                ## Code Snippet Header

            Some content.

            ```
            ## Code Snippet Header
            ```
            </x-toc>
            HTML;

        $expected = <<<'HTML'
            <ul>
                <li>
                    <a href="#sub-title-level-2"> Sub Title level 2 </a>
                </li>
            </ul>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
