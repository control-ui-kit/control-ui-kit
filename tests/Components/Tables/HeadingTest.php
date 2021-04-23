<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class HeadingTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.table-heading.align', 'align');
        Config::set('themes.default.table-heading.background', 'background');
        Config::set('themes.default.table-heading.border', 'border');
        Config::set('themes.default.table-heading.color', 'color');
        Config::set('themes.default.table-heading.font', 'font');
        Config::set('themes.default.table-heading.icon-size', 'icon-size');
        Config::set('themes.default.table-heading.other', 'other');
        Config::set('themes.default.table-heading.padding', 'padding');
        Config::set('themes.default.table-heading.rounded', 'rounded');
        Config::set('themes.default.table-heading.shadow', 'shadow');
        Config::set('themes.default.table-heading.sort-link', 'sort-link');
        Config::set('themes.default.table-heading.width', 'width');

        Config::set('themes.default.table-heading.field-order', 'order');
        Config::set('themes.default.table-heading.field-sort', 'sort');
        Config::set('themes.default.table-heading.icon-asc', 'icon.caret-up');
        Config::set('themes.default.table-heading.icon-desc', 'icon.caret-down');
    }

    /** @test */
    public function a_table_heading_component_basic_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading>::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_basic_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table.heading
                align="none"
                background="none"
                border="none"
                color="none"
                font="none"
                other="none"
                padding="none"
                rounded="none"
                shadow="none"
                width="none"
            >::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th>::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_basic_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-table.heading
                background="1"
                border="2"
                color="3"
                font="4"
                other="5"
                padding="6"
                rounded="7"
                shadow="8"
                width="9"
            >::Table Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align 1 2 3 4 5 6 7 8 9">::Table Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_align_shorthand_left_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading left>::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="text-left background border color font other padding rounded shadow width">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_align_attribute_left_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading align="left">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="text-left background border color font other padding rounded shadow width">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_align_shorthand_right_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading right>::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="text-right background border color font other padding rounded shadow width">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_align_attribute_right_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading align="right">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="text-right background border color font other padding rounded shadow width">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_align_shorthand_center_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading center>::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="text-center background border color font other padding rounded shadow width">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_align_attribute_center_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading align="center">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="text-center background border color font other padding rounded shadow width">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_href_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading href="http://example.com">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://example.com" class="sort-link">::Some Heading</a>
            </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_alpine_onclick_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading @onclick="someClick">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width" @onclick="someClick">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_alpine_xonclick_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading x-on:onclick="someClick">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width" x-on:onclick="someClick">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function a_table_heading_component_with_onclick_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading onclick="someClick()">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width" onclick="someClick()">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_and_href_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading field="example" href="http://example.com">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://example.com?order=example&amp;sort=asc" class="sort-link">
                    <span>::Some Heading</span>
                    <span class="relative flex items-center">
                        <svg class="icon-size fill-current opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M17 14l-5-5-5 5h10z"/>
                            </svg>
                        </span>
                    </a>
                </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_and_href_and_current_sort_asc_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading field="example" href="http://example.com" currentOrder="example" currentSort="asc">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://example.com?order=example&amp;sort=desc" class="sort-link">
                    <span>::Some Heading</span>
                    <span class="relative flex items-center">
                        <svg class="icon-size fill-current group-hover:opacity-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M17 14l-5-5-5 5h10z"/>
                            </svg>
                            <svg class="icon-size fill-current opacity-0 group-hover:opacity-100 absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7 9l5 5 5-5H7z"/>
                                </svg>
                            </span>
                        </a>
                    </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_and_href_and_current_sort_desc_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading field="example" href="http://example.com" currentOrder="example" currentSort="desc">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://example.com?order=example&amp;sort=asc" class="sort-link">
                    <span>::Some Heading</span>
                    <span class="relative flex items-center">
                        <svg class="icon-size fill-current group-hover:opacity-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7 9l5 5 5-5H7z"/>
                            </svg>
                            <svg class="icon-size fill-current opacity-0 group-hover:opacity-100 absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M17 14l-5-5-5 5h10z"/>
                                </svg>
                            </span>
                        </a>
                    </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading field="example">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://localhost?order=example&amp;sort=asc" class="sort-link">
                    <span>::Some Heading</span>
                    <span class="relative flex items-center">
                        <svg class="icon-size fill-current opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M17 14l-5-5-5 5h10z"/>
                            </svg>
                        </span>
                    </a>
                </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_and_current_sort_asc_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading field="example" currentOrder="example" currentSort="asc">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://localhost?order=example&amp;sort=desc" class="sort-link">
                    <span>::Some Heading</span>
                    <span class="relative flex items-center">
                        <svg class="icon-size fill-current group-hover:opacity-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M17 14l-5-5-5 5h10z"/>
                            </svg>
                            <svg class="icon-size fill-current opacity-0 group-hover:opacity-100 absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M7 9l5 5 5-5H7z"/>
                                </svg>
                            </span>
                        </a>
                    </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_and_current_sort_desc_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading field="example" currentOrder="example" currentSort="desc">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://localhost?order=example&amp;sort=asc" class="sort-link">
                    <span>::Some Heading</span>
                    <span class="relative flex items-center">
                        <svg class="icon-size fill-current group-hover:opacity-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M7 9l5 5 5-5H7z"/>
                            </svg>
                            <svg class="icon-size fill-current opacity-0 group-hover:opacity-100 absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M17 14l-5-5-5 5h10z"/>
                                </svg>
                            </span>
                        </a>
                    </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_and_icon_size_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading field="example" icon-size="::some-size">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://localhost?order=example&amp;sort=asc" class="sort-link">
                    <span>::Some Heading</span>
                    <span class="relative flex items-center">
                        <svg class="::some-size fill-current opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M17 14l-5-5-5 5h10z"/>
                            </svg>
                        </span>
                    </a>
                </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_and_anchor_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading field="example" anchor="cheese">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://localhost?order=example&amp;sort=asc#cheese" class="sort-link">
                    <span>::Some Heading</span>
                    <span class="relative flex items-center">
                        <svg class="icon-size fill-current opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M17 14l-5-5-5 5h10z"/>
                            </svg>
                        </span>
                    </a>
                </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_href_and_anchor_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading href="http://example.com" field="example" anchor="cheese">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://example.com?order=example&amp;sort=asc#cheese" class="sort-link">
                    <span>::Some Heading</span>
                    <span class="relative flex items-center">
                        <svg class="icon-size fill-current opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M17 14l-5-5-5 5h10z"/>
                            </svg>
                        </span>
                    </a>
                </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_and_disabled_icons_can_be_rendered(): void
    {
        Config::set('themes.default.table-heading.icon-asc', '');
        Config::set('themes.default.table-heading.icon-desc', '');

        $template = <<<'HTML'
            <x-table.heading field="example">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow width">
                <a href="http://localhost?order=example&amp;sort=asc" class="sort-link"> ::Some Heading </a>
            </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_and_alignment_can_be_rendered(): void
    {
        Config::set('themes.default.table-heading.icon-asc', '');
        Config::set('themes.default.table-heading.icon-desc', '');

        $template = <<<'HTML'
            <x-table.heading field="example" right>::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="text-right background border color font other padding rounded shadow width">
                <a href="http://localhost?order=example&amp;sort=asc" class="sort-link"> ::Some Heading </a>
            </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
