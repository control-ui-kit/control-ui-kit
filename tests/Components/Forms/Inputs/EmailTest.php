<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class EmailTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-email.placeholder', '');
        Config::set('themes.default.input-email.prefix-text', '');

        Config::set('themes.default.input-email.background', 'background');
        Config::set('themes.default.input-email.border', 'border');
        Config::set('themes.default.input-email.color', 'color');
        Config::set('themes.default.input-email.font', 'font');
        Config::set('themes.default.input-email.other', 'other');
        Config::set('themes.default.input-email.padding', 'padding');
        Config::set('themes.default.input-email.rounded', 'rounded');
        Config::set('themes.default.input-email.shadow', 'shadow');
        Config::set('themes.default.input-email.width', 'width');
    }

    #[Test]
    public function an_input_email_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-email name="name" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="email" id="name" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_email_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-email name="name" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="email" id="name" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_email_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-email name="name" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="email" id="name" class="1 2 3 4 5 6 7 8 9" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_email_component_with_placeholder_amended(): void
    {
        $template = <<<'HTML'
            <x-input-email name="name" placeholder="placeholder text" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="email" id="name" placeholder="placeholder text" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_email_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input-email name="name" value="test_value" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="email" id="name" value="test_value" class="background border color font other padding rounded shadow width" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_email_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-email name="name" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="email" id="name" class="background border color font other padding rounded shadow width float-right" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_email_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-email name="name" onblur="test()" />
            HTML;

        $expected = <<<'HTML'
            <input name="name" type="email" id="name" class="background border color font other padding rounded shadow width" onblur="test()" />
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
