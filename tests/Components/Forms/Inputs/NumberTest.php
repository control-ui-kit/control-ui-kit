<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use ControlUIKit\Exceptions\InputNumberException;
use Illuminate\Support\Facades\Config;
use Illuminate\View\ViewException;
use Tests\Components\ComponentTestCase;

class NumberTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-number.default', '');
        Config::set('themes.default.input-number.onblur', '');
        Config::set('themes.default.input-number.step', '');

        Config::set('themes.default.input-number.background', 'background');
        Config::set('themes.default.input-number.border', 'border');
        Config::set('themes.default.input-number.color', 'color');
        Config::set('themes.default.input-number.font', 'font');
        Config::set('themes.default.input-number.other', 'other');
        Config::set('themes.default.input-number.padding', 'padding');
        Config::set('themes.default.input-number.rounded', 'rounded');
        Config::set('themes.default.input-number.shadow', 'shadow');
        Config::set('themes.default.input-number.width', 'width');
    }

    /** @test */
    public function an_input_number_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" />
            HTML;

        $expected = <<<'HTML'
            <input name="age" type="number" id="age" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="age" type="number" id="age" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <input name="age" type="number" id="age" class="1 2 3 4 5 6 7 8 9" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_with_placeholder_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <input name="age" type="number" id="age" placeholder="placeholder text" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_with_value_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" value="4" />
            HTML;

        $expected = <<<'HTML'
            <input name="age" type="number" id="age" value="4" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_with_min_max_and_step_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="0" max="9" step="1" />
            HTML;

        $expected = <<<'HTML'
            <input name="age" type="number" id="age" value="9" min="0" max="9" step="1" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_with_onblur_and_no_decimals_can_be_rendered(): void
    {
        Config::set('themes.default.input-number.onblur',  '_controlNumber(this, {{ $decimals }}, {{ $min }}, {{ $max }}, {{ $fixed }})');

        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="0" max="9" step="1" />
            HTML;

        $expected = <<<'HTML'
            <input name="age" type="number" id="age" value="9" onblur="_controlNumber(this, 0, 0, 9, false)" min="0" max="9" step="1" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_with_onblur_and_min_and_max_needs_onblur_to_validate_the_min_and_max(): void
    {
        Config::set('themes.default.input-number.onblur',  '_controlNumber(this, {{ $decimals }}, {{ $min }}, {{ $max }}, {{ $fixed }})');

        $template = <<<'HTML'
            <x-input-number name="age" value="25" min="10" max="90" step="1" />
            HTML;

        $expected = <<<'HTML'
            <input name="age" type="number" id="age" value="25" onblur="_controlNumber(this, 0, 10, 90, false)" min="10" max="90" step="1" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_number_component_with_min_higher_than_max_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Specified min cannot be higher than specified max');

        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="19" max="9" step="1" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_number_component_with_value_lower_than_min_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Value cannot be lower than specified min');

        $template = <<<'HTML'
            <x-input-number name="age" value="1" min="10" max="20" step="1" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_number_component_with_value_higher_than_max_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Value cannot be higher than specified max');

        $template = <<<'HTML'
            <x-input-number name="age" value="10" min="0" max="9" step="1" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_number_component_with_non_numeric_step_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Number not numeric [Step]');

        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="0" max="9" step="s" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_number_component_with_non_numeric_min_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Number not numeric [Min]');

        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="s" max="9" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    /** @test */
    public function an_input_number_component_with_non_numeric_max_throws_an_exception(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Number not numeric [Max]');

        $template = <<<'HTML'
            <x-input-number name="age" value="9" min="0" max="z" />
            HTML;

        $this->assertComponentRenders('', $template);
    }
}
