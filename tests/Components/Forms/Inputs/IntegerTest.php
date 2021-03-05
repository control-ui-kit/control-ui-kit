<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class IntegerTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-integer.background', 'background');
        Config::set('themes.default.input-integer.border', 'border');
        Config::set('themes.default.input-integer.color', 'color');
        Config::set('themes.default.input-integer.font', 'font');
        Config::set('themes.default.input-integer.other', 'other');
        Config::set('themes.default.input-integer.padding', 'padding');
        Config::set('themes.default.input-integer.rounded', 'rounded');
        Config::set('themes.default.input-integer.shadow', 'shadow');
    }

    /** @test */
    public function an_input_integer_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.integer name="number" />
            HTML;

        $expected = <<<'HTML'
            <input name="number" type="number" id="number" step="1" class="background border color font other padding rounded shadow" />
            <script>
                window["field_number"] = document.getElementById('number');

                window["field_number"].addEventListener('blur', () => {
                    // If the minimum is set and the value is below minimum, set to minimum
                    if (typeof window["field_number"].getAttribute('min') === "string") {
                        if (parseInt(window["field_number"].value) < (window["field_number"].getAttribute('min'))) {
                            window["field_number"].value = window["field_number"].getAttribute('min');
                        }
                    }

                    // If the maximum is set and the value is above maximum, set to maximum
                    if (typeof window["field_number"].getAttribute('max') === "string") {
                        if (parseInt(window["field_number"].value)> (window["field_number"].getAttribute('max'))) {
                            window["field_number"].value = window["field_number"].getAttribute('max');
                        }
                    }
                });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_integer_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.integer name="number" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="number" type="number" id="number" step="1" />
            <script>
                window["field_number"] = document.getElementById('number');

                window["field_number"].addEventListener('blur', () => {
                    // If the minimum is set and the value is below minimum, set to minimum
                    if (typeof window["field_number"].getAttribute('min') === "string") {
                        if (parseInt(window["field_number"].value) < (window["field_number"].getAttribute('min'))) {
                            window["field_number"].value = window["field_number"].getAttribute('min');
                        }
                    }

                    // If the maximum is set and the value is above maximum, set to maximum
                    if (typeof window["field_number"].getAttribute('max') === "string") {
                        if (parseInt(window["field_number"].value)> (window["field_number"].getAttribute('max'))) {
                            window["field_number"].value = window["field_number"].getAttribute('max');
                        }
                    }
                });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_integer_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.integer name="number" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <input name="number" type="number" id="number" step="1" class="1 2 3 4 5 6 7 8" />
            <script>
                window["field_number"] = document.getElementById('number');

                window["field_number"].addEventListener('blur', () => {
                    // If the minimum is set and the value is below minimum, set to minimum
                    if (typeof window["field_number"].getAttribute('min') === "string") {
                        if (parseInt(window["field_number"].value) < (window["field_number"].getAttribute('min'))) {
                            window["field_number"].value = window["field_number"].getAttribute('min');
                        }
                    }

                    // If the maximum is set and the value is above maximum, set to maximum
                    if (typeof window["field_number"].getAttribute('max') === "string") {
                        if (parseInt(window["field_number"].value)> (window["field_number"].getAttribute('max'))) {
                            window["field_number"].value = window["field_number"].getAttribute('max');
                        }
                    }
                });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_integer_component_with_step_amount_amended(): void
    {
        $template = <<<'HTML'
            <x-input.integer name="number" step="3" />
            HTML;

        $expected = <<<'HTML'
            <input name="number" type="number" id="number" step="3" class="background border color font other padding rounded shadow" />
            <script>
                window["field_number"] = document.getElementById('number');

                window["field_number"].addEventListener('blur', () => {
                    // If the minimum is set and the value is below minimum, set to minimum
                    if (typeof window["field_number"].getAttribute('min') === "string") {
                        if (parseInt(window["field_number"].value) < (window["field_number"].getAttribute('min'))) {
                            window["field_number"].value = window["field_number"].getAttribute('min');
                        }
                    }

                    // If the maximum is set and the value is above maximum, set to maximum
                    if (typeof window["field_number"].getAttribute('max') === "string") {
                        if (parseInt(window["field_number"].value)> (window["field_number"].getAttribute('max'))) {
                            window["field_number"].value = window["field_number"].getAttribute('max');
                        }
                    }
                });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_integer_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.integer name="number" step="909" />
            HTML;

        $expected = <<<'HTML'
            <input name="number" type="number" id="number" step="909" class="background border color font other padding rounded shadow" />
            <script>
                window["field_number"] = document.getElementById('number');

                window["field_number"].addEventListener('blur', () => {
                    // If the minimum is set and the value is below minimum, set to minimum
                    if (typeof window["field_number"].getAttribute('min') === "string") {
                        if (parseInt(window["field_number"].value) < (window["field_number"].getAttribute('min'))) {
                            window["field_number"].value = window["field_number"].getAttribute('min');
                        }
                    }

                    // If the maximum is set and the value is above maximum, set to maximum
                    if (typeof window["field_number"].getAttribute('max') === "string") {
                        if (parseInt(window["field_number"].value)> (window["field_number"].getAttribute('max'))) {
                            window["field_number"].value = window["field_number"].getAttribute('max');
                        }
                    }
                });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
