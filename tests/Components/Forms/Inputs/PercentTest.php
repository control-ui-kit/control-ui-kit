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

        Config::set('themes.default.input-percent.default', '');
        Config::set('themes.default.input-percent.onblur', '');
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
        Config::set('themes.default.input-percent.width', 'width');
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-percent name="name" value="50" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="50" min="2" max="98" step="2" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-percent name="name" value="50" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="50" min="2" max="98" step="2" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-percent name="name" value="50" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="number" id="name" value="50" min="2" max="98" step="2" class="1 2 3 4 5 6 7 8 9" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_with_defaults_can_be_disabled_inline(): void
    {
        Config::set('themes.default.input-percent.step', 2);
        Config::set('themes.default.input-percent.min', 2);
        Config::set('themes.default.input-percent.max', 2);

        $template = <<<'HTML'
            <x-input-percent name="test" step="none" min="none" max="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="test" type="number" id="test" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
