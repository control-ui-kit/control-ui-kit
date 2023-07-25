<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class DateTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-date.background', 'background');
        Config::set('themes.default.input-date.border', 'border');
        Config::set('themes.default.input-date.color', 'color');
        Config::set('themes.default.input-date.font', 'font');
        Config::set('themes.default.input-date.other', 'other');
        Config::set('themes.default.input-date.padding', 'padding');
        Config::set('themes.default.input-date.rounded', 'rounded');
        Config::set('themes.default.input-date.shadow', 'shadow');
        Config::set('themes.default.input-date.width', 'width');

        Config::set('themes.default.input-date.icon-background', 'icon-background');
        Config::set('themes.default.input-date.icon-border', 'icon-border');
        Config::set('themes.default.input-date.icon-color', 'icon-color');
        Config::set('themes.default.input-date.icon-font', 'icon-font');
        Config::set('themes.default.input-date.icon-other', 'icon-other');
        Config::set('themes.default.input-date.icon-padding', 'icon-padding');
        Config::set('themes.default.input-date.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input-date.icon-shadow', 'icon-shadow');

        Config::set('themes.default.input.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input.wrapper-width', 'wrapper-width');

        Config::set('themes.default.input-date.first-day', 0);
        Config::set('themes.default.input-date.format', 'd/m/Y');
        Config::set('themes.default.input-date.data', 'Y-m-d');
        Config::set('themes.default.input-date.icon', 'icon-calendar');
        Config::set('themes.default.input-date.keyboard-navigation', true);
        Config::set('themes.default.input-date.lang', 'en-GB');
        Config::set('themes.default.input-date.mobile-friendly', true);
        Config::set('themes.default.input-date.reset-button', false);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'DD/MM/YYYY',
                    minDate: null,
                    maxDate: null,
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 'minYear',
                        maxYear: 'maxYear',
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <div>
                <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" class="w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'DD/MM/YYYY',
                    minDate: null,
                    maxDate: null,
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 'minYear',
                        maxYear: 'maxYear',
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9">
                <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" class="1 2 3 4 5 6 7 8 w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'DD/MM/YYYY',
                    minDate: null,
                    maxDate: null,
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 'minYear',
                        maxYear: 'maxYear',
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }

    /** @test */
    public function an_input_date_component_with_value_amended(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2039-08-21" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="21/08/2039" class="background border color font other padding rounded shadow w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'DD/MM/YYYY',
                    minDate: null,
                    maxDate: null,
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 'minYear',
                        maxYear: 'maxYear',
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_plugins_disabled(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2020-01-01" keyboard-navigation="false" mobile-friendly="false" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'DD/MM/YYYY',
                    minDate: null,
                    maxDate: null,
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 'minYear',
                        maxYear: 'maxYear',
                        months: true,
                        years: 'asc'
                    },
                    plugins: [],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_first_day_changed(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2020-01-01" first-day="4" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'DD/MM/YYYY',
                    minDate: null,
                    maxDate: null,
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 'minYear',
                        maxYear: 'maxYear',
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 4,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_min_and_max_dates_added(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2020-01-01" start="2019-01-01" end="2021-01-01" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'DD/MM/YYYY',
                    minDate: moment('01/01/2019', 'DD/MM/YYYY'),
                    maxDate: moment('01/01/2021', 'DD/MM/YYYY'),
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 2019,
                        maxYear: 2021,
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_language_changed(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2020-01-01" lang="ru" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="date" type="text" id="date" placeholder="DD/MM/YYYY" value="01/01/2020" class="background border color font other padding rounded shadow w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'DD/MM/YYYY',
                    minDate: null,
                    maxDate: null,
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 'minYear',
                        maxYear: 'maxYear',
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'ru',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_different_format(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2020-12-23" format="Y-m-d" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="date" type="text" id="date" placeholder="YYYY-MM-DD" value="2020-12-23" class="background border color font other padding rounded shadow w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'YYYY-MM-DD',
                    minDate: null,
                    maxDate: null,
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 'minYear',
                        maxYear: 'maxYear',
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_different_data_format(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="23/12/2020" format="Y-m-d" data="d/m/Y" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="date" type="text" id="date" placeholder="YYYY-MM-DD" value="2020-12-23" class="background border color font other padding rounded shadow w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'YYYY-MM-DD',
                    minDate: null,
                    maxDate: null,
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 'minYear',
                        maxYear: 'maxYear',
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_different_format_and_start_and_end_dates(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2020-12-23" format="Y-m-d" start="2019-01-01" end="2021-01-01" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="date" type="text" id="date" placeholder="YYYY-MM-DD" value="2020-12-23" class="background border color font other padding rounded shadow w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'YYYY-MM-DD',
                    minDate: moment('2019-01-01', 'YYYY-MM-DD'),
                    maxDate: moment('2021-01-01', 'YYYY-MM-DD'),
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 2019,
                        maxYear: 2021,
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: false,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }


    /** @test */
    public function an_input_date_component_will_render_with_reset_button_enabled(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="23/12/2020" format="Y-m-d" data="d/m/Y" reset-button="true" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input name="date" type="text" id="date" placeholder="YYYY-MM-DD" value="2020-12-23" class="background border color font other padding rounded shadow w-full" autocomplete="off" />
            </div>
            <script>
                new Litepicker({
                    element: document.getElementById('date'),
                    format: 'YYYY-MM-DD',
                    minDate: null,
                    maxDate: null,
                    singleMode: true,
                    allowRepick: true,
                    dropdowns: {
                        minYear: 'minYear',
                        maxYear: 'maxYear',
                        months: true,
                        years: 'asc'
                    },
                    plugins: ['mobilefriendly', 'keyboardnav'],
                    resetButton: true,
                    scrollToDate: true,
                    firstDay: 0,
                    lang: 'en-GB',
                })
            </script>
            HTML;

        $this->assertComponentRenders($this->expectedWithYearRange($expected), $template);
    }
}
