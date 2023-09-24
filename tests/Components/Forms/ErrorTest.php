<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class ErrorTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.error.color', 'color');
        Config::set('themes.default.error.font', 'font');
        Config::set('themes.default.error.other', 'other');
        Config::set('themes.default.error.padding', 'padding');
    }

    /** @test */
    public function an_error_can_be_rendered(): void
    {
        $this->withViewErrors(['test' => 'This is a test message.']);

        $template = <<<'HTML'
            <x-error field="test" />
            HTML;

        $expected = <<<'HTML'
            <div class="color font other padding"> This is a test message. </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_error_can_be_rendered_with_slot(): void
    {
        $this->withViewErrors(['first_name' => ['Incorrect first name.', 'Needs at least 5 characters.']]);

        $template = <<<'HTML'
            <x-error field="first_name">
                <ul>
                    @foreach ($component->messages($errors) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-error>
            HTML;

        $expected = <<<'HTML'
            <div class="color font other padding">
                <ul>
                    <li>Incorrect first name.</li>
                    <li>Needs at least 5 characters.</li>
                </ul>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_error_can_be_rendered_with_no_styles(): void
    {
        $this->withViewErrors(['test' => 'This is a test message.']);

        $template = <<<'HTML'
            <x-error field="test" color="none" font="none" other="none" padding="none" />
            HTML;

        $expected = <<<'HTML'
            <div> This is a test message. </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_error_can_be_rendered_with_inline_styles(): void
    {
        $this->withViewErrors(['test' => 'This is a test message.']);

        $template = <<<'HTML'
            <x-error field="test" color="custom_color" font="custom_font" other="custom_other" padding="custom_padding" />
            HTML;

        $expected = <<<'HTML'
            <div class="custom_color custom_font custom_other custom_padding"> This is a test message. </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_error_can_be_rendered_with_array_styles(): void
    {
        $this->withViewErrors(['test' => 'This is a test message.']);

        $template = <<<'HTML'
            <x-error field="test" :styles="[
                'color' => 'custom_color',
                'font' => 'custom_font',
                'other' => 'custom_other',
                'padding' => 'custom_padding',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div class="custom_color custom_font custom_other custom_padding"> This is a test message. </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
