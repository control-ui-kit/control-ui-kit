<?php

namespace Tests\Components\Tables;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ActionTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.table-action.background', 'background');
        Config::set('themes.default.table-action.border', 'border');
        Config::set('themes.default.table-action.color', 'color');
        Config::set('themes.default.table-action.font', 'font');
        Config::set('themes.default.table-action.other', 'other');
        Config::set('themes.default.table-action.padding', 'padding');
        Config::set('themes.default.table-action.rounded', 'rounded');
        Config::set('themes.default.table-action.shadow', 'shadow');
    }

    #[Test]
    public function a_table_action_component_can_be_rendered_without_href(): void
    {
        $template = <<<'HTML'
            <x-table-action icon="icon-dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color font other padding rounded shadow">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_action_component_can_be_rendered_with_href(): void
    {
        $template = <<<'HTML'
            <x-table-action icon="icon-dot" href="test.com" />
            HTML;

        $expected = <<<'HTML'
            <a href="test.com" class="background border color font other padding rounded shadow">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_action_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-table-action icon="icon-dot"
                background="none"
                border="none"
                color="none"
                font="none"
                other="none"
                padding="none"
                rounded="none"
                shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div>
                <svg class="w-5 h-5 fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_action_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-table-action icon="icon-dot"
                background="1"
                border="2"
                color="3"
                font="4"
                other="5"
                padding="6"
                rounded="7"
                shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
