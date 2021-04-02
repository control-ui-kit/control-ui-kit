<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class PasswordTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-password.icon-left', '');

        Config::set('themes.default.input-password.background', 'background');
        Config::set('themes.default.input-password.border', 'border');
        Config::set('themes.default.input-password.color', 'color');
        Config::set('themes.default.input-password.font', 'font');
        Config::set('themes.default.input-password.other', 'other');
        Config::set('themes.default.input-password.padding', 'padding');
        Config::set('themes.default.input-password.rounded', 'rounded');
        Config::set('themes.default.input-password.shadow', 'shadow');
        Config::set('themes.default.input-password.width', 'width');
    }

    /** @test */
    public function an_input_password_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.password name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="password" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_password_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.password name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="password" id="name" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_password_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.password name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="password" id="name" class="1 2 3 4 5 6 7 8 9" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_password_component_with_placeholder_amended(): void
    {
        $template = <<<'HTML'
            <x-input.password name="name" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="password" id="name" placeholder="placeholder text" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_password_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.password name="name" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="password" id="name" value="test_value" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
