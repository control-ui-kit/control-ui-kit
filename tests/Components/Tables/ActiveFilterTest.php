<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ActiveFilterTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.table-active-filter.background', 'background');
        Config::set('themes.default.table-active-filter.border', 'border');
        Config::set('themes.default.table-active-filter.color', 'color');
        Config::set('themes.default.table-active-filter.font', 'font');
        Config::set('themes.default.table-active-filter.other', 'other');
        Config::set('themes.default.table-active-filter.padding', 'padding');
        Config::set('themes.default.table-active-filter.rounded', 'rounded');
        Config::set('themes.default.table-active-filter.shadow', 'shadow');

        Config::set('themes.default.table-active-filter.icon', 'icon-close');
        Config::set('themes.default.table-active-filter.icon-background', 'icon-background');
        Config::set('themes.default.table-active-filter.icon-border', 'icon-border');
        Config::set('themes.default.table-active-filter.icon-color', 'icon-color');
        Config::set('themes.default.table-active-filter.icon-other', 'icon-other');
        Config::set('themes.default.table-active-filter.icon-padding', 'icon-padding');
        Config::set('themes.default.table-active-filter.icon-rounded', 'icon-rounded');
        Config::set('themes.default.table-active-filter.icon-shadow', 'icon-shadow');
        Config::set('themes.default.table-active-filter.icon-size', 'icon-size');
    }

    #[Test]
    public function a_table_active_filter_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-active-filter name="::name" label="::label" text="::text" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow">
                <div> <span class="text-active-filter/60">::label:</span> <span class="text-active-filter">::text</span> </div>
                <a class="flex items-center focus:outline-hidden focus:ring-0 cursor-pointer">
                    <svg class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow icon-size fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                    </a>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_active_filter_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table-active-filter name="::name" label="::label" text="::text"
                 background="none"
                 border="none"
                 color="none"
                 font="none"
                 other="none"
                 padding="none"
                 rounded="none"
                 shadow="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div>
                <div> <span class="text-active-filter/60">::label:</span> <span class="text-active-filter">::text</span> </div>
                <a class="flex items-center focus:outline-hidden focus:ring-0 cursor-pointer">
                    <svg class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow icon-size fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                    </a>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_active_filter_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-table-active-filter name="::name" label="::label" text="::text"
                background="custom-background"
                border="custom-border"
                color="custom-color"
                font="custom-font"
                other="custom-other"
                padding="custom-padding"
                rounded="custom-rounded"
                shadow="custom-shadow"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow">
                <div> <span class="text-active-filter/60">::label:</span> <span class="text-active-filter">::text</span> </div>
                <a class="flex items-center focus:outline-hidden focus:ring-0 cursor-pointer">
                    <svg class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow icon-size fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                    </a>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_active_filter_component_can_be_rendered_with_no_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-table-active-filter name="::name" label="::label" text="::text"
                 icon-background="none"
                 icon-border="none"
                 icon-color="none"
                 icon-other="none"
                 icon-padding="none"
                 icon-rounded="none"
                 icon-shadow="none"
                 icon-size="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow">
                <div> <span class="text-active-filter/60">::label:</span> <span class="text-active-filter">::text</span> </div>
                <a class="flex items-center focus:outline-hidden focus:ring-0 cursor-pointer">
                    <svg class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                    </a>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_active_filter_component_can_be_rendered_with_inline_icon_styles(): void
    {
        $template = <<<'HTML'
            <x-table-active-filter name="::name" label="::label" text="::text"
                icon-background="custom-background"
                icon-border="custom-border"
                icon-color="custom-color"
                icon-other="custom-other"
                icon-padding="custom-padding"
                icon-rounded="custom-rounded"
                icon-shadow="custom-shadow"
                icon-size="custom-size"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow">
                <div> <span class="text-active-filter/60">::label:</span> <span class="text-active-filter">::text</span> </div>
                <a class="flex items-center focus:outline-hidden focus:ring-0 cursor-pointer">
                    <svg class="custom-background custom-border custom-color custom-other custom-padding custom-rounded custom-shadow custom-size fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
                        </svg>
                    </a>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_active_filter_component_can_be_rendered_with_custom_icon(): void
    {
        $template = <<<'HTML'
            <x-table-active-filter name="::name" label="::label" text="::text" icon="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow">
                <div> <span class="text-active-filter/60">::label:</span> <span class="text-active-filter">::text</span> </div>
                <a class="flex items-center focus:outline-hidden focus:ring-0 cursor-pointer">
                    <svg class="icon-background icon-border icon-color icon-other icon-padding icon-rounded icon-shadow icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </a>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
