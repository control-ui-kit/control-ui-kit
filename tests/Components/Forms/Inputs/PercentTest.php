<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class PercentTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-percent.icon-right', 'none');
        Config::set('themes.default.input-percent.icon-left', 'none');
        Config::set('themes.default.input-percent.min', 2);
        Config::set('themes.default.input-percent.max', 98);
        Config::set('themes.default.input-percent.step', 2);

        Config::set('themes.default.input-percent.background', 'background');
        Config::set('themes.default.input-percent.border', 'border');
        Config::set('themes.default.input-percent.color', 'color');
        Config::set('themes.default.input-percent.font', 'font');
        Config::set('themes.default.input-percent.other', 'other');
        Config::set('themes.default.input-percent.padding', 'padding');
        Config::set('themes.default.input-percent.rounded', 'rounded');
        Config::set('themes.default.input-percent.shadow', 'shadow');

        Config::set('themes.default.input-percent.input-background', 'input-background');
        Config::set('themes.default.input-percent.input-border', 'input-border');
        Config::set('themes.default.input-percent.input-color', 'input-color');
        Config::set('themes.default.input-percent.input-font', 'input-font');
        Config::set('themes.default.input-percent.input-other', 'input-other');
        Config::set('themes.default.input-percent.input-padding', 'input-padding');
        Config::set('themes.default.input-percent.input-rounded', 'input-rounded');
        Config::set('themes.default.input-percent.input-shadow', 'input-shadow');

        Config::set('themes.default.input-percent.icon-left-background', 'icon-left-background');
        Config::set('themes.default.input-percent.icon-left-border', 'icon-left-border');
        Config::set('themes.default.input-percent.icon-left-color', 'icon-left-color');
        Config::set('themes.default.input-percent.icon-left-font', 'icon-left-font');
        Config::set('themes.default.input-percent.icon-left-other', 'icon-left-other');
        Config::set('themes.default.input-percent.icon-left-padding', 'icon-left-padding');
        Config::set('themes.default.input-percent.icon-left-rounded', 'icon-left-rounded');
        Config::set('themes.default.input-percent.icon-left-shadow', 'icon-left-shadow');
        Config::set('themes.default.input-percent.icon-left-size', 'icon-left-size');

        Config::set('themes.default.input-percent.icon-right-background', 'icon-right-background');
        Config::set('themes.default.input-percent.icon-right-border', 'icon-right-border');
        Config::set('themes.default.input-percent.icon-right-color', 'icon-right-color');
        Config::set('themes.default.input-percent.icon-right-font', 'icon-right-font');
        Config::set('themes.default.input-percent.icon-right-other', 'icon-right-other');
        Config::set('themes.default.input-percent.icon-right-padding', 'icon-right-padding');
        Config::set('themes.default.input-percent.icon-right-rounded', 'icon-right-rounded');
        Config::set('themes.default.input-percent.icon-right-shadow', 'icon-right-shadow');
        Config::set('themes.default.input-percent.icon-right-size', 'icon-right-size');

        Config::set('themes.default.input-percent.prefix-background', 'prefix-background');
        Config::set('themes.default.input-percent.prefix-border', 'prefix-border');
        Config::set('themes.default.input-percent.prefix-color', 'prefix-color');
        Config::set('themes.default.input-percent.prefix-font', 'prefix-font');
        Config::set('themes.default.input-percent.prefix-other', 'prefix-other');
        Config::set('themes.default.input-percent.prefix-padding', 'prefix-padding');
        Config::set('themes.default.input-percent.prefix-rounded', 'prefix-rounded');
        Config::set('themes.default.input-percent.prefix-shadow', 'prefix-shadow');

        Config::set('themes.default.input-percent.suffix-background', 'suffix-background');
        Config::set('themes.default.input-percent.suffix-border', 'suffix-border');
        Config::set('themes.default.input-percent.suffix-color', 'suffix-color');
        Config::set('themes.default.input-percent.suffix-font', 'suffix-font');
        Config::set('themes.default.input-percent.suffix-other', 'suffix-other');
        Config::set('themes.default.input-percent.suffix-padding', 'suffix-padding');
        Config::set('themes.default.input-percent.suffix-rounded', 'suffix-rounded');
        Config::set('themes.default.input-percent.suffix-shadow', 'suffix-shadow');

        Config::set('themes.default.input-percent.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input-percent.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input-percent.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input-percent.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input-percent.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input-percent.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input-percent.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input-percent.wrapper-shadow', 'wrapper-shadow');
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.percent name="name" value="1" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="1" min="2" max="98" step="2" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.percent name="name" value="1" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="1" min="2" max="98" step="2" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.percent name="name" value="1" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="1" min="2" max="98" step="2" class="1 2 3 4 5 6 7 8" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.percent name="name" value="new_test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="new_test_value" min="2" max="98" step="2" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
