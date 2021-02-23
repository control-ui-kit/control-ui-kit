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
        Config::set('themes.default.table-heading.icon-asc', 'icon.chevron-up');
        Config::set('themes.default.table-heading.icon-desc', 'icon.chevron-down');
        Config::set('themes.default.table-heading.icon-size', 'icon-size');
        Config::set('themes.default.table-heading.other', 'other');
        Config::set('themes.default.table-heading.padding', 'padding');
        Config::set('themes.default.table-heading.rounded', 'rounded');
        Config::set('themes.default.table-heading.shadow', 'shadow');
        Config::set('themes.default.table-heading.sort-link', 'sort-link');
    }

    /** @test */
    public function a_table_heading_component_basic_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading>::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_basic_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table.heading align="none"
                             background="none"
                             border="none"
                             color="none"
                             font="none"
                             other="none"
                             padding="none"
                             rounded="none"
                             shadow="none">
                ::Some Heading
            </x-table.heading>
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
            <x-table.heading background="1"
                             border="2"
                             color="3"
                             font="4"
                             other="5"
                             padding="6"
                             rounded="7"
                             shadow="8"
            >::Table Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align 1 2 3 4 5 6 7 8">::Table Heading</th>
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
            <th class="text-left background border color font other padding rounded shadow">::Some Heading</th>
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
            <th class="text-left background border color font other padding rounded shadow">::Some Heading</th>
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
            <th class="text-right background border color font other padding rounded shadow">::Some Heading</th>
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
            <th class="text-right background border color font other padding rounded shadow">::Some Heading</th>
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
            <th class="text-center background border color font other padding rounded shadow">::Some Heading</th>
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
            <th class="text-center background border color font other padding rounded shadow">::Some Heading</th>
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
            <th class="align background border color font other padding rounded shadow">
                <a href="http://example.com"> ::Some Heading </a>
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
            <th class="align background border color font other padding rounded shadow" @onclick="someClick">::Some Heading</th>
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
            <th class="align background border color font other padding rounded shadow" x-on:onclick="someClick">::Some Heading</th>
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
            <th class="align background border color font other padding rounded shadow" onclick="someClick()">::Some Heading</th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_table_heading_component_with_sorting_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table.heading name="example" href="http://example.com">::Some Heading</x-table.heading>
            HTML;

        $expected = <<<'HTML'
            <th class="align background border color font other padding rounded shadow">
                <a href="http://example.com?orderby=example&sort=asc" class="sort-link">
                    <span>::Some Heading</span>
                    <svg class="icon-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M7.11508 8.29502l-1.41 1.41L11.7051 15.705l6-5.99998-1.41-1.41-4.59 4.57998-4.59002-4.57998z"/>
                        </svg>
                    </a>
                </th>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
