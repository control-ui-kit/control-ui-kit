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

        Config::set('themes.default.input-search.type', 'search');
        Config::set('themes.default.input-search.icon-right', 'none');
        Config::set('themes.default.input-search.icon-left', 'none');

        Config::set('themes.default.input-search.background', 'background');
        Config::set('themes.default.input-search.border', 'border');
        Config::set('themes.default.input-search.color', 'color');
        Config::set('themes.default.input-search.font', 'font');
        Config::set('themes.default.input-search.other', 'other');
        Config::set('themes.default.input-search.padding', 'padding');
        Config::set('themes.default.input-search.rounded', 'rounded');
        Config::set('themes.default.input-search.shadow', 'shadow');
        Config::set('themes.default.input-search.width', 'width');

        Config::set('themes.default.input-search.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input-search.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input-search.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input-search.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input-search.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input-search.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input-search.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input-search.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input-search.wrapper-width', 'wrapper-width');

        Config::set('themes.default.input-search.input-background', 'input-background');
        Config::set('themes.default.input-search.input-border', 'input-border');
        Config::set('themes.default.input-search.input-color', 'input-color');
        Config::set('themes.default.input-search.input-font', 'input-font');
        Config::set('themes.default.input-search.input-other', 'input-other');
        Config::set('themes.default.input-search.input-padding', 'input-padding');
        Config::set('themes.default.input-search.input-rounded', 'input-rounded');
        Config::set('themes.default.input-search.input-shadow', 'input-shadow');

        Config::set('themes.default.input-search.icon-right-background', 'search-icon-background');
        Config::set('themes.default.input-search.icon-right-border', 'search-icon-border');
        Config::set('themes.default.input-search.icon-right-color', 'search-icon-color');
        Config::set('themes.default.input-search.icon-right-size', 'search-icon-size');
        Config::set('themes.default.input-search.icon-right-other', 'search-icon-other');
        Config::set('themes.default.input-search.icon-right-padding', 'search-icon-padding');
        Config::set('themes.default.input-search.icon-right-rounded', 'search-icon-rounded');
        Config::set('themes.default.input-search.icon-right-shadow', 'search-icon-shadow');
    }

    /** @test */
    public function an_input_search_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-search name="search" />
            HTML;

        $expected = <<<'HTML'
            <input name="search" type="search" id="search" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_search_component_with_no_icon_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-search name="search" icon-right="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="search" type="search" id="search" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_search_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-search name="search" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="search" type="search" id="search" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_search_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-search name="search" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <input name="search" type="search" id="search" class="1 2 3 4 5 6 7 8 9" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_search_component_can_be_rendered_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input-search name="search" value="new_test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="search" type="search" id="search" value="new_test_value" class="background border color font other padding rounded shadow width" />
            HTML;
        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_search_component_with_icon_can_be_rendered(): void
    {
        Config::set('themes.default.input-search.icon-right', 'icon-dot');

        $template = <<<'HTML'
            <x-input-search name="search" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="search" type="search" id="search" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                <div class="search-icon-background search-icon-border search-icon-color search-icon-other search-icon-padding search-icon-rounded search-icon-shadow">
                    <svg class="search-icon-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                </div>
            HTML;
        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_input_search_component_can_be_rendered_using_override_config_styles(): void
    {
        Config::set('themes.default.input-search.background', 'config-background');
        Config::set('themes.default.input-search.border', 'config-border');
        Config::set('themes.default.input-search.color', 'config-color');
        Config::set('themes.default.input-search.font', 'config-font');
        Config::set('themes.default.input-search.other', 'config-other');
        Config::set('themes.default.input-search.padding', 'config-padding');
        Config::set('themes.default.input-search.rounded', 'config-rounded');
        Config::set('themes.default.input-search.shadow', 'config-shadow');
        Config::set('themes.default.input-search.width', 'config-width');

        $template = <<<'HTML'
            <x-input-search name="search" icon-right="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="search" type="search" id="search" class="config-background config-border config-color config-font config-other config-padding config-rounded config-shadow config-width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
