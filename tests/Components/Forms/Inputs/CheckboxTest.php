<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class CheckboxTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-checkbox.background', 'background');
        Config::set('themes.default.input-checkbox.border', 'border');
        Config::set('themes.default.input-checkbox.color', 'color');
        Config::set('themes.default.input-checkbox.font', 'font');
        Config::set('themes.default.input-checkbox.other', 'other');
        Config::set('themes.default.input-checkbox.padding', 'padding');
        Config::set('themes.default.input-checkbox.rounded', 'rounded');
        Config::set('themes.default.input-checkbox.shadow', 'shadow');
    }

    /** @test */
    public function an_input_checkbox_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.checkbox name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name" value="1" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_checkbox_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.checkbox name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name" value="1" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_checkbox_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.checkbox name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name" value="1" class="1 2 3 4 5 6 7 8" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_checkbox_component_can_be_amended_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.checkbox name="name" value="new_test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name_new_test_value" value="new_test_value" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_checkbox_component_can_be_rendered_with_checked_shorthand(): void
    {
        $template = <<<'HTML'
            <x-input.checkbox name="name" checked />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name" value="1" checked class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_checkbox_component_can_be_rendered_with_checked_true(): void
    {
        $template = <<<'HTML'
            <x-input.checkbox name="name" checked="true" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name" value="1" checked class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_checkbox_component_can_be_rendered_with_checked_checked(): void
    {
        $template = <<<'HTML'
            <x-input.checkbox name="name" checked="checked" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name" value="1" checked class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_checkbox_component_can_be_rendered_with_checked_value(): void
    {
        $template = <<<'HTML'
            @php $value = "1"; @endphp
            <x-input.checkbox name="name" :checked="$value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name" value="1" checked class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_checkbox_component_can_be_rendered_with_not_checked_value(): void
    {
        $template = <<<'HTML'
            @php $value = "0"; @endphp
            <x-input.checkbox name="name" :checked="$value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name" value="1" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_checkbox_component_can_be_rendered_with_checked_value_and_explicit_value(): void
    {
        $template = <<<'HTML'
            @php $value = "yes"; @endphp
            <x-input.checkbox name="name" value="yes" :checked="$value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name_yes" value="yes" checked class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_checkbox_component_can_be_rendered_with_not_checked_value_and_explicit_value(): void
    {
        $template = <<<'HTML'
            @php $value = "no"; @endphp
            <x-input.checkbox name="name" value="yes" :checked="$value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="checkbox" id="name_yes" value="yes" class="background border color font other padding rounded shadow" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
