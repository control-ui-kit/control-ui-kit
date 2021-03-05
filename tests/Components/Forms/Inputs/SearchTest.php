<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class SearchTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-search.background', 'background');
        Config::set('themes.default.input-search.border', 'border');
        Config::set('themes.default.input-search.color', 'color');
        Config::set('themes.default.input-search.font', 'font');
        Config::set('themes.default.input-search.other', 'other');
        Config::set('themes.default.input-search.padding', 'padding');
        Config::set('themes.default.input-search.rounded', 'rounded');
        Config::set('themes.default.input-search.shadow', 'shadow');
    }

    /** @test */
    public function an_input_search_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.search name="search" value="1" icon-left="" icon-border="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="search" type="search" id="search" value="1" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_search_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.search name="name" value="1" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="1" min="0" max="100" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_search_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.search name="name" value="1" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="1" min="0" max="100" class="1 2 3 4 5 6 7 8" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_search_component_can_be_rendered_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.search name="name" value="new_test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="new_test_value" min="0" max="100" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
