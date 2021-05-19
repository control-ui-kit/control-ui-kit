<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class LabelTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.label.background', 'background');
        Config::set('themes.default.label.border', 'border');
        Config::set('themes.default.label.color', 'color');
        Config::set('themes.default.label.font', 'font');
        Config::set('themes.default.label.other', 'other');
        Config::set('themes.default.label.padding', 'padding');
        Config::set('themes.default.label.rounded', 'rounded');
        Config::set('themes.default.label.shadow', 'shadow');
    }

    /** @test */
    public function a_label_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-label for="test">The Label</x-label>
            HTML;

        $expected = <<<'HTML'
            <label for="test" class="background border color font other padding rounded shadow">The Label</label>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_label_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-label
                for="test"
                background="none"
                border="none"
                color="none"
                font="none"
                other="none"
                padding="none"
                rounded="none"
                shadow="none"
            >The Label</x-label>
            HTML;

        $expected = <<<'HTML'
            <label for="test">The Label</label>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_label_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-label
                for="test"
                background="1"
                border="2"
                color="3"
                font="4"
                other="5"
                padding="6"
                rounded="7"
                shadow="8"
            >The Label</x-label>
            HTML;

        $expected = <<<'HTML'
            <label for="test" class="1 2 3 4 5 6 7 8">The Label</label>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
