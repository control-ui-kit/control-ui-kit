<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class CheckboxTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-checkbox.background', 'background');
        Config::set('themes.default.input-checkbox.border', 'border');
        Config::set('themes.default.input-checkbox.color', 'color');
        Config::set('themes.default.input-checkbox.layout', 'layout');
        Config::set('themes.default.input-checkbox.other', 'other');
        Config::set('themes.default.input-checkbox.padding', 'padding');

        Config::set('themes.default.input-checkbox.input-background', 'input-background');
        Config::set('themes.default.input-checkbox.input-border', 'input-border');
        Config::set('themes.default.input-checkbox.input-other', 'input-other');
        Config::set('themes.default.input-checkbox.input-rounded', 'input-rounded');
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-checkbox name="name" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding">
                <input name="name" type="checkbox" id="name" value="1" class="input-background input-border input-other input-rounded" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-checkbox name="name" background="none" border="none" color="none" layout="none" other="none" padding="none" input-background="none" input-border="none" input-other="none" input-rounded="none" />
            HTML;

        $expected = <<<'HTML'
            <div>
                <input name="name" type="checkbox" id="name" value="1" class="" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-checkbox name="name" background="1" border="2" color="3" layout="4" other="5" padding="6" input-background="7" input-border="8" input-other="9" input-rounded="10" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6">
                <input name="name" type="checkbox" id="name" value="1" class="7 8 9 10" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_amended_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input-checkbox name="name" value="new_test_value" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding">
                <input name="name" type="checkbox" id="name_new_test_value" value="new_test_value" class="input-background input-border input-other input-rounded" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_checked_shorthand(): void
    {
        $template = <<<'HTML'
            <x-input-checkbox name="name" checked />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding">
                <input name="name" type="checkbox" id="name" value="1" checked class="input-background input-border input-other input-rounded" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_checked_true(): void
    {
        $template = <<<'HTML'
            <x-input-checkbox name="name" checked="true" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding">
                <input name="name" type="checkbox" id="name" value="1" checked class="input-background input-border input-other input-rounded" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_checked_checked(): void
    {
        $template = <<<'HTML'
            <x-input-checkbox name="name" checked="checked" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding">
                <input name="name" type="checkbox" id="name" value="1" checked class="input-background input-border input-other input-rounded" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_checked_value(): void
    {
        $template = <<<'HTML'
            @php $value = "1"; @endphp
            <x-input-checkbox name="name" :checked="$value" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding">
                <input name="name" type="checkbox" id="name" value="1" checked class="input-background input-border input-other input-rounded" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_not_checked_value(): void
    {
        $template = <<<'HTML'
            @php $value = "0"; @endphp
            <x-input-checkbox name="name" :checked="$value" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding">
                <input name="name" type="checkbox" id="name" value="1" class="input-background input-border input-other input-rounded" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_checked_value_and_explicit_value(): void
    {
        $template = <<<'HTML'
            @php $value = "yes"; @endphp
            <x-input-checkbox name="name" value="yes" :checked="$value" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding">
                <input name="name" type="checkbox" id="name_yes" value="yes" checked class="input-background input-border input-other input-rounded" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_not_checked_value_and_explicit_value(): void
    {
        $template = <<<'HTML'
            @php $value = "no"; @endphp
            <x-input-checkbox name="name" value="yes" :checked="$value" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding">
                <input name="name" type="checkbox" id="name_yes" value="yes" class="input-background input-border input-other input-rounded" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-checkbox name="name" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding float-right">
                <input name="name" type="checkbox" id="name" value="1" class="input-background input-border input-other input-rounded" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_checkbox_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-checkbox name="name" onblur="console.log(this)" />
            HTML;

        $expected = <<<'HTML'
            <div class="background border color layout other padding">
                <input name="name" type="checkbox" id="name" value="1" class="input-background input-border input-other input-rounded" onblur="console.log(this)" />
                <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                </svg>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
