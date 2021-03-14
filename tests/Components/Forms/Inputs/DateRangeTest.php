<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class DateRangeTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-date-range.background', 'background');
        Config::set('themes.default.input-date-range.border', 'border');
        Config::set('themes.default.input-date-range.color', 'color');
        Config::set('themes.default.input-date-range.font', 'font');
        Config::set('themes.default.input-date-range.other', 'other');
        Config::set('themes.default.input-date-range.padding', 'padding');
        Config::set('themes.default.input-date-range.rounded', 'rounded');
        Config::set('themes.default.input-date-range.shadow', 'shadow');
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "en-GB",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "en-GB",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" class="1 2 3 4 5 6 7 8" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "en-GB",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" value="21/08/2039" />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="21/08/2039" class="background border color font other padding rounded shadow" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "en-GB",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_will_render_with_plugins_disabled(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" value="01/01/2020" keyboard-navigation="false" mobile-friendly="false" />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: [],
                    resetButton: false,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "en-GB",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_will_render_with_plugins_enabled(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" value="01/01/2020" predefined-ranges />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'ranges', 'keyboardnav'],
                    resetButton: false,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "en-GB",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_will_render_with_first_day_changed(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" value="01/01/2020" first-day="4" />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 4,
                    scrollToDate: true,
                    lang: "en-GB",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_will_render_with_min_and_max_dates_added(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" value="01/01/2020" start="01/01/2019" end="01/01/2021" />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: moment("01/01/2019", "DD/MM/YYYY"),
                    maxDate: moment("01/01/2021", "DD/MM/YYYY"),
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2019,
                        maxYear: 2021,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "en-GB",
                                setup: function() {
                            this.gotoDate("01/01/2019")
                        }
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_will_render_with_language_changed(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" value="01/01/2020" lang="ru" />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "ru",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_will_render_with_reset_button_enabled(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" value="01/01/2020" reset />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: 1,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "en-GB",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_will_render_with_tooltip_enabled(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" value="01/01/2020" tooltip />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 2,
                    numberOfMonths: 2,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    splitView: true,
                    showTooltip: 1,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "en-GB",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_will_render_with_modified_columns_and_months(): void
    {
        $template = <<<'HTML'
            <x-input.date-range name="date" value="01/01/2020" columns="3" months="6" />
            HTML;

        $expected = <<<'HTML'
            <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow" autocomplete="off" />
            <script>
                getYearFromFormat = function(date, format) {
                    if (format === 'YYYY-MM-DD') {
                        return date.substr(0, 4);
                    } else if (format === 'MM/DD/YYYY') {
                        return date.substr(6, 4);
                    }

                    return date.substr(6, 4);
                };

                new Litepicker({
                    element: document.getElementById('date'),
                    format: "DD/MM/YYYY",
                    minDate: null,
                    maxDate: null,
                    singleMode: false,
                    allowRepick: true,
                    numberOfColumns: 3,
                    numberOfMonths: 6,
                    dropdowns: {
                        minYear: 2011,
                        maxYear: 2031,
                        months: true,
                        years: "asc"
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    splitView: true,
                    showTooltip: false,
                    firstDay: 0,
                    scrollToDate: true,
                    lang: "en-GB",
                        });
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
