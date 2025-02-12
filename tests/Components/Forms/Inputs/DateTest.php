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

        Config::set('app.locale', 'en_GB');
        Config::set('app.timezone', 'UTC');
        Config::set('control-ui-kit.user_timezone', 'UTC');

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

        Config::set('themes.default.input-date.timezone-background', 'timezone-background');
        Config::set('themes.default.input-date.timezone-border', 'timezone-border');
        Config::set('themes.default.input-date.timezone-color', 'timezone-color');
        Config::set('themes.default.input-date.timezone-font', 'timezone-font');
        Config::set('themes.default.input-date.timezone-other', 'timezone-other');
        Config::set('themes.default.input-date.timezone-padding', 'timezone-padding');
        Config::set('themes.default.input-date.timezone-rounded', 'timezone-rounded');
        Config::set('themes.default.input-date.timezone-shadow', 'timezone-shadow');
        Config::set('themes.default.input-date.timezone-width', 'timezone-width');

        Config::set('themes.default.input.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input.wrapper-width', 'wrapper-width');

        Config::set('themes.default.input-date.mode', 'single');
        Config::set('themes.default.input-date.data', 'Y-m-d');
        Config::set('themes.default.input-date.format', 'd/m/Y');
        Config::set('themes.default.input-date.icon', 'icon-calendar');
        Config::set('themes.default.input-date.week-numbers', false);
        Config::set('themes.default.input-date.years-before', 100);
        Config::set('themes.default.input-date.years-after', 5);

        Config::set('themes.default.input-date.clock-type', 24);
        Config::set('themes.default.input-date.hour-step', 1);
        Config::set('themes.default.input-date.minute-step', 1);
        Config::set('themes.default.input-date.show-time', false);
        Config::set('themes.default.input-date.show-seconds', false);
        Config::set('themes.default.input-date.time-only', false);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_specific_id(): void
    {
        $template = <<<'HTML'
            <x-input-date name="foo" id="bar" icon="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'bar', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="bar_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="foo" x-ref="data" x-model="data" type="hidden" id="bar" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="1 2 3 4 5 6 7 8 w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_passed_in_date(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2039-08-21" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '2039-08-21', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_will_rendered_with_week_numbers(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" week-numbers />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: true, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_min_and_max_dates_added(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2020-01-01" min="2019-01-01" max="2021-01-01" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '2020-01-01', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: '01/01/2019', maxDate: '01/01/2021', linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_language_changed(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2020-01-01" lang="fr" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '2020-01-01', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'fr', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_a_different_display_format(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="2020-12-23" format="Y-m-d" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '2020-12-23', dataFormat: 'Y-m-d', format: 'Y-m-d', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="YYYY-MM-DD" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_will_render_with_different_data_format(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" value="23/12/2020" format="Y-m-d" data="d/m/Y" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '23/12/2020', dataFormat: 'd/m/Y', format: 'Y-m-d', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="YYYY-MM-DD" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_time_no_seconds(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" show-time />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '417' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_only_time(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" time-only />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: true, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '417' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_time_including_seconds(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" show-time show-seconds />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: true, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '417' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_time_and_12_hour_clock(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" show-time clock-type="12" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: false, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '417' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_time_and_step_increments(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" show-time hour-step="6" minute-step="15" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 6, minuteIncrement: 15, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '417' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_linked_to_input(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date_from" icon="none" linked-to="date_to" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date_from', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: 'date_to', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_from_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date_from" x-ref="data" x-model="data" type="hidden" id="date_from" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_linked_from_input(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date_to" icon="none" linked-from="date_to" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date_to', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: 'date_to', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_to_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date_to" x-ref="data" x-model="data" type="hidden" id="date_to" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_time_showing_based_on_format(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" format="m/d/Y g:i:s A" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'm/d/Y h:i:S K', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: true, time_24hr: false, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '417' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="MM/DD/YYYY HH:MM:SS AM/PM" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_custom_year_before_and_after(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" years-before="5" years-after="3" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 5, yearsAfter: 3, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_user_timezone_differs_to_app(): void
    {
        Config::set('control-ui-kit.user_timezone', 'Test');

        $template = <<<'HTML'
            <x-input-date name="date" icon="none" show-time />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0' , yearsBefore: 100, yearsAfter: 5, showTimeZones: true, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
                <select x-ref="offset" x-model="offset" x-show="showTimeZones" class="timezone-background timezone-border timezone-color timezone-font timezone-other timezone-padding timezone-rounded timezone-shadow timezone-width">
                    <option value="0" data-offset="0">Africa/Abidjan (UTC +0)</option>
                    <option value="1" data-offset="0">Africa/Accra (UTC +0)</option>
                    <option value="2" data-offset="3">Africa/Addis Ababa (UTC +3)</option>
                    <option value="3" data-offset="1">Africa/Algiers (UTC +1)</option>
                    <option value="4" data-offset="3">Africa/Asmara (UTC +3)</option>
                    <option value="5" data-offset="0">Africa/Bamako (UTC +0)</option>
                    <option value="6" data-offset="1">Africa/Bangui (UTC +1)</option>
                    <option value="7" data-offset="0">Africa/Banjul (UTC +0)</option>
                    <option value="8" data-offset="0">Africa/Bissau (UTC +0)</option>
                    <option value="9" data-offset="2">Africa/Blantyre (UTC +2)</option>
                    <option value="10" data-offset="1">Africa/Brazzaville (UTC +1)</option>
                    <option value="11" data-offset="2">Africa/Bujumbura (UTC +2)</option>
                    <option value="12" data-offset="2">Africa/Cairo (UTC +2)</option>
                    <option value="13" data-offset="1">Africa/Casablanca (UTC +1)</option>
                    <option value="14" data-offset="1">Africa/Ceuta (UTC +1)</option>
                    <option value="15" data-offset="0">Africa/Conakry (UTC +0)</option>
                    <option value="16" data-offset="0">Africa/Dakar (UTC +0)</option>
                    <option value="17" data-offset="3">Africa/Dar es Salaam (UTC +3)</option>
                    <option value="18" data-offset="3">Africa/Djibouti (UTC +3)</option>
                    <option value="19" data-offset="1">Africa/Douala (UTC +1)</option>
                    <option value="20" data-offset="1">Africa/El Aaiun (UTC +1)</option>
                    <option value="21" data-offset="0">Africa/Freetown (UTC +0)</option>
                    <option value="22" data-offset="2">Africa/Gaborone (UTC +2)</option>
                    <option value="23" data-offset="2">Africa/Harare (UTC +2)</option>
                    <option value="24" data-offset="2">Africa/Johannesburg (UTC +2)</option>
                    <option value="25" data-offset="2">Africa/Juba (UTC +2)</option>
                    <option value="26" data-offset="3">Africa/Kampala (UTC +3)</option>
                    <option value="27" data-offset="2">Africa/Khartoum (UTC +2)</option>
                    <option value="28" data-offset="2">Africa/Kigali (UTC +2)</option>
                    <option value="29" data-offset="1">Africa/Kinshasa (UTC +1)</option>
                    <option value="30" data-offset="1">Africa/Lagos (UTC +1)</option>
                    <option value="31" data-offset="1">Africa/Libreville (UTC +1)</option>
                    <option value="32" data-offset="0">Africa/Lome (UTC +0)</option>
                    <option value="33" data-offset="1">Africa/Luanda (UTC +1)</option>
                    <option value="34" data-offset="2">Africa/Lubumbashi (UTC +2)</option>
                    <option value="35" data-offset="2">Africa/Lusaka (UTC +2)</option>
                    <option value="36" data-offset="1">Africa/Malabo (UTC +1)</option>
                    <option value="37" data-offset="2">Africa/Maputo (UTC +2)</option>
                    <option value="38" data-offset="2">Africa/Maseru (UTC +2)</option>
                    <option value="39" data-offset="2">Africa/Mbabane (UTC +2)</option>
                    <option value="40" data-offset="3">Africa/Mogadishu (UTC +3)</option>
                    <option value="41" data-offset="0">Africa/Monrovia (UTC +0)</option>
                    <option value="42" data-offset="3">Africa/Nairobi (UTC +3)</option>
                    <option value="43" data-offset="1">Africa/Ndjamena (UTC +1)</option>
                    <option value="44" data-offset="1">Africa/Niamey (UTC +1)</option>
                    <option value="45" data-offset="0">Africa/Nouakchott (UTC +0)</option>
                    <option value="46" data-offset="0">Africa/Ouagadougou (UTC +0)</option>
                    <option value="47" data-offset="1">Africa/Porto-Novo (UTC +1)</option>
                    <option value="48" data-offset="0">Africa/Sao Tome (UTC +0)</option>
                    <option value="49" data-offset="2">Africa/Tripoli (UTC +2)</option>
                    <option value="50" data-offset="1">Africa/Tunis (UTC +1)</option>
                    <option value="51" data-offset="2">Africa/Windhoek (UTC +2)</option>
                    <option value="52" data-offset="-10">America/Adak (UTC -10)</option>
                    <option value="53" data-offset="-9">America/Anchorage (UTC -9)</option>
                    <option value="54" data-offset="-4">America/Anguilla (UTC -4)</option>
                    <option value="55" data-offset="-4">America/Antigua (UTC -4)</option>
                    <option value="56" data-offset="-3">America/Araguaina (UTC -3)</option>
                    <option value="57" data-offset="-3">America/Argentina/Buenos Aires (UTC -3)</option>
                    <option value="58" data-offset="-3">America/Argentina/Catamarca (UTC -3)</option>
                    <option value="59" data-offset="-3">America/Argentina/Cordoba (UTC -3)</option>
                    <option value="60" data-offset="-3">America/Argentina/Jujuy (UTC -3)</option>
                    <option value="61" data-offset="-3">America/Argentina/La Rioja (UTC -3)</option>
                    <option value="62" data-offset="-3">America/Argentina/Mendoza (UTC -3)</option>
                    <option value="63" data-offset="-3">America/Argentina/Rio Gallegos (UTC -3)</option>
                    <option value="64" data-offset="-3">America/Argentina/Salta (UTC -3)</option>
                    <option value="65" data-offset="-3">America/Argentina/San Juan (UTC -3)</option>
                    <option value="66" data-offset="-3">America/Argentina/San Luis (UTC -3)</option>
                    <option value="67" data-offset="-3">America/Argentina/Tucuman (UTC -3)</option>
                    <option value="68" data-offset="-3">America/Argentina/Ushuaia (UTC -3)</option>
                    <option value="69" data-offset="-4">America/Aruba (UTC -4)</option>
                    <option value="70" data-offset="-3">America/Asuncion (UTC -3)</option>
                    <option value="71" data-offset="-5">America/Atikokan (UTC -5)</option>
                    <option value="72" data-offset="-3">America/Bahia (UTC -3)</option>
                    <option value="73" data-offset="-6">America/Bahia Banderas (UTC -6)</option>
                    <option value="74" data-offset="-4">America/Barbados (UTC -4)</option>
                    <option value="75" data-offset="-3">America/Belem (UTC -3)</option>
                    <option value="76" data-offset="-6">America/Belize (UTC -6)</option>
                    <option value="77" data-offset="-4">America/Blanc-Sablon (UTC -4)</option>
                    <option value="78" data-offset="-4">America/Boa Vista (UTC -4)</option>
                    <option value="79" data-offset="-5">America/Bogota (UTC -5)</option>
                    <option value="80" data-offset="-7">America/Boise (UTC -7)</option>
                    <option value="81" data-offset="-7">America/Cambridge Bay (UTC -7)</option>
                    <option value="82" data-offset="-4">America/Campo Grande (UTC -4)</option>
                    <option value="83" data-offset="-5">America/Cancun (UTC -5)</option>
                    <option value="84" data-offset="-4">America/Caracas (UTC -4)</option>
                    <option value="85" data-offset="-3">America/Cayenne (UTC -3)</option>
                    <option value="86" data-offset="-5">America/Cayman (UTC -5)</option>
                    <option value="87" data-offset="-6">America/Chicago (UTC -6)</option>
                    <option value="88" data-offset="-6">America/Chihuahua (UTC -6)</option>
                    <option value="89" data-offset="-7">America/Ciudad Juarez (UTC -7)</option>
                    <option value="90" data-offset="-6">America/Costa Rica (UTC -6)</option>
                    <option value="91" data-offset="-7">America/Creston (UTC -7)</option>
                    <option value="92" data-offset="-4">America/Cuiaba (UTC -4)</option>
                    <option value="93" data-offset="-4">America/Curacao (UTC -4)</option>
                    <option value="94" data-offset="0">America/Danmarkshavn (UTC +0)</option>
                    <option value="95" data-offset="-7">America/Dawson (UTC -7)</option>
                    <option value="96" data-offset="-7">America/Dawson Creek (UTC -7)</option>
                    <option value="97" data-offset="-7">America/Denver (UTC -7)</option>
                    <option value="98" data-offset="-5">America/Detroit (UTC -5)</option>
                    <option value="99" data-offset="-4">America/Dominica (UTC -4)</option>
                    <option value="100" data-offset="-7">America/Edmonton (UTC -7)</option>
                    <option value="101" data-offset="-5">America/Eirunepe (UTC -5)</option>
                    <option value="102" data-offset="-6">America/El Salvador (UTC -6)</option>
                    <option value="103" data-offset="-7">America/Fort Nelson (UTC -7)</option>
                    <option value="104" data-offset="-3">America/Fortaleza (UTC -3)</option>
                    <option value="105" data-offset="-4">America/Glace Bay (UTC -4)</option>
                    <option value="106" data-offset="-4">America/Goose Bay (UTC -4)</option>
                    <option value="107" data-offset="-5">America/Grand Turk (UTC -5)</option>
                    <option value="108" data-offset="-4">America/Grenada (UTC -4)</option>
                    <option value="109" data-offset="-4">America/Guadeloupe (UTC -4)</option>
                    <option value="110" data-offset="-6">America/Guatemala (UTC -6)</option>
                    <option value="111" data-offset="-5">America/Guayaquil (UTC -5)</option>
                    <option value="112" data-offset="-4">America/Guyana (UTC -4)</option>
                    <option value="113" data-offset="-4">America/Halifax (UTC -4)</option>
                    <option value="114" data-offset="-5">America/Havana (UTC -5)</option>
                    <option value="115" data-offset="-7">America/Hermosillo (UTC -7)</option>
                    <option value="116" data-offset="-5">America/Indiana/Indianapolis (UTC -5)</option>
                    <option value="117" data-offset="-6">America/Indiana/Knox (UTC -6)</option>
                    <option value="118" data-offset="-5">America/Indiana/Marengo (UTC -5)</option>
                    <option value="119" data-offset="-5">America/Indiana/Petersburg (UTC -5)</option>
                    <option value="120" data-offset="-6">America/Indiana/Tell City (UTC -6)</option>
                    <option value="121" data-offset="-5">America/Indiana/Vevay (UTC -5)</option>
                    <option value="122" data-offset="-5">America/Indiana/Vincennes (UTC -5)</option>
                    <option value="123" data-offset="-5">America/Indiana/Winamac (UTC -5)</option>
                    <option value="124" data-offset="-7">America/Inuvik (UTC -7)</option>
                    <option value="125" data-offset="-5">America/Iqaluit (UTC -5)</option>
                    <option value="126" data-offset="-5">America/Jamaica (UTC -5)</option>
                    <option value="127" data-offset="-9">America/Juneau (UTC -9)</option>
                    <option value="128" data-offset="-5">America/Kentucky/Louisville (UTC -5)</option>
                    <option value="129" data-offset="-5">America/Kentucky/Monticello (UTC -5)</option>
                    <option value="130" data-offset="-4">America/Kralendijk (UTC -4)</option>
                    <option value="131" data-offset="-4">America/La Paz (UTC -4)</option>
                    <option value="132" data-offset="-5">America/Lima (UTC -5)</option>
                    <option value="133" data-offset="-8">America/Los Angeles (UTC -8)</option>
                    <option value="134" data-offset="-4">America/Lower Princes (UTC -4)</option>
                    <option value="135" data-offset="-3">America/Maceio (UTC -3)</option>
                    <option value="136" data-offset="-6">America/Managua (UTC -6)</option>
                    <option value="137" data-offset="-4">America/Manaus (UTC -4)</option>
                    <option value="138" data-offset="-4">America/Marigot (UTC -4)</option>
                    <option value="139" data-offset="-4">America/Martinique (UTC -4)</option>
                    <option value="140" data-offset="-6">America/Matamoros (UTC -6)</option>
                    <option value="141" data-offset="-7">America/Mazatlan (UTC -7)</option>
                    <option value="142" data-offset="-6">America/Menominee (UTC -6)</option>
                    <option value="143" data-offset="-6">America/Merida (UTC -6)</option>
                    <option value="144" data-offset="-9">America/Metlakatla (UTC -9)</option>
                    <option value="145" data-offset="-6">America/Mexico City (UTC -6)</option>
                    <option value="146" data-offset="-3">America/Miquelon (UTC -3)</option>
                    <option value="147" data-offset="-4">America/Moncton (UTC -4)</option>
                    <option value="148" data-offset="-6">America/Monterrey (UTC -6)</option>
                    <option value="149" data-offset="-3">America/Montevideo (UTC -3)</option>
                    <option value="150" data-offset="-4">America/Montserrat (UTC -4)</option>
                    <option value="151" data-offset="-5">America/Nassau (UTC -5)</option>
                    <option value="152" data-offset="-5">America/New York (UTC -5)</option>
                    <option value="153" data-offset="-9">America/Nome (UTC -9)</option>
                    <option value="154" data-offset="-2">America/Noronha (UTC -2)</option>
                    <option value="155" data-offset="-6">America/North Dakota/Beulah (UTC -6)</option>
                    <option value="156" data-offset="-6">America/North Dakota/Center (UTC -6)</option>
                    <option value="157" data-offset="-6">America/North Dakota/New Salem (UTC -6)</option>
                    <option value="158" data-offset="-2">America/Nuuk (UTC -2)</option>
                    <option value="159" data-offset="-6">America/Ojinaga (UTC -6)</option>
                    <option value="160" data-offset="-5">America/Panama (UTC -5)</option>
                    <option value="161" data-offset="-3">America/Paramaribo (UTC -3)</option>
                    <option value="162" data-offset="-7">America/Phoenix (UTC -7)</option>
                    <option value="163" data-offset="-5">America/Port-au-Prince (UTC -5)</option>
                    <option value="164" data-offset="-4">America/Port of Spain (UTC -4)</option>
                    <option value="165" data-offset="-4">America/Porto Velho (UTC -4)</option>
                    <option value="166" data-offset="-4">America/Puerto Rico (UTC -4)</option>
                    <option value="167" data-offset="-3">America/Punta Arenas (UTC -3)</option>
                    <option value="168" data-offset="-6">America/Rankin Inlet (UTC -6)</option>
                    <option value="169" data-offset="-3">America/Recife (UTC -3)</option>
                    <option value="170" data-offset="-6">America/Regina (UTC -6)</option>
                    <option value="171" data-offset="-6">America/Resolute (UTC -6)</option>
                    <option value="172" data-offset="-5">America/Rio Branco (UTC -5)</option>
                    <option value="173" data-offset="-3">America/Santarem (UTC -3)</option>
                    <option value="174" data-offset="-3">America/Santiago (UTC -3)</option>
                    <option value="175" data-offset="-4">America/Santo Domingo (UTC -4)</option>
                    <option value="176" data-offset="-3">America/Sao Paulo (UTC -3)</option>
                    <option value="177" data-offset="-2">America/Scoresbysund (UTC -2)</option>
                    <option value="178" data-offset="-9">America/Sitka (UTC -9)</option>
                    <option value="179" data-offset="-4">America/St Barthelemy (UTC -4)</option>
                    <option value="180" data-offset="-3.5">America/St Johns (UTC -3.5)</option>
                    <option value="181" data-offset="-4">America/St Kitts (UTC -4)</option>
                    <option value="182" data-offset="-4">America/St Lucia (UTC -4)</option>
                    <option value="183" data-offset="-4">America/St Thomas (UTC -4)</option>
                    <option value="184" data-offset="-4">America/St Vincent (UTC -4)</option>
                    <option value="185" data-offset="-6">America/Swift Current (UTC -6)</option>
                    <option value="186" data-offset="-6">America/Tegucigalpa (UTC -6)</option>
                    <option value="187" data-offset="-4">America/Thule (UTC -4)</option>
                    <option value="188" data-offset="-8">America/Tijuana (UTC -8)</option>
                    <option value="189" data-offset="-5">America/Toronto (UTC -5)</option>
                    <option value="190" data-offset="-4">America/Tortola (UTC -4)</option>
                    <option value="191" data-offset="-8">America/Vancouver (UTC -8)</option>
                    <option value="192" data-offset="-7">America/Whitehorse (UTC -7)</option>
                    <option value="193" data-offset="-6">America/Winnipeg (UTC -6)</option>
                    <option value="194" data-offset="-9">America/Yakutat (UTC -9)</option>
                    <option value="195" data-offset="8">Antarctica/Casey (UTC +8)</option>
                    <option value="196" data-offset="7">Antarctica/Davis (UTC +7)</option>
                    <option value="197" data-offset="10">Antarctica/DumontDUrville (UTC +10)</option>
                    <option value="198" data-offset="11">Antarctica/Macquarie (UTC +11)</option>
                    <option value="199" data-offset="5">Antarctica/Mawson (UTC +5)</option>
                    <option value="200" data-offset="13">Antarctica/McMurdo (UTC +13)</option>
                    <option value="201" data-offset="-3">Antarctica/Palmer (UTC -3)</option>
                    <option value="202" data-offset="-3">Antarctica/Rothera (UTC -3)</option>
                    <option value="203" data-offset="3">Antarctica/Syowa (UTC +3)</option>
                    <option value="204" data-offset="0">Antarctica/Troll (UTC +0)</option>
                    <option value="205" data-offset="5">Antarctica/Vostok (UTC +5)</option>
                    <option value="206" data-offset="1">Arctic/Longyearbyen (UTC +1)</option>
                    <option value="207" data-offset="3">Asia/Aden (UTC +3)</option>
                    <option value="208" data-offset="5">Asia/Almaty (UTC +5)</option>
                    <option value="209" data-offset="3">Asia/Amman (UTC +3)</option>
                    <option value="210" data-offset="12">Asia/Anadyr (UTC +12)</option>
                    <option value="211" data-offset="5">Asia/Aqtau (UTC +5)</option>
                    <option value="212" data-offset="5">Asia/Aqtobe (UTC +5)</option>
                    <option value="213" data-offset="5">Asia/Ashgabat (UTC +5)</option>
                    <option value="214" data-offset="5">Asia/Atyrau (UTC +5)</option>
                    <option value="215" data-offset="3">Asia/Baghdad (UTC +3)</option>
                    <option value="216" data-offset="3">Asia/Bahrain (UTC +3)</option>
                    <option value="217" data-offset="4">Asia/Baku (UTC +4)</option>
                    <option value="218" data-offset="7">Asia/Bangkok (UTC +7)</option>
                    <option value="219" data-offset="7">Asia/Barnaul (UTC +7)</option>
                    <option value="220" data-offset="2">Asia/Beirut (UTC +2)</option>
                    <option value="221" data-offset="6">Asia/Bishkek (UTC +6)</option>
                    <option value="222" data-offset="8">Asia/Brunei (UTC +8)</option>
                    <option value="223" data-offset="9">Asia/Chita (UTC +9)</option>
                    <option value="224" data-offset="5.5">Asia/Colombo (UTC +5.5)</option>
                    <option value="225" data-offset="3">Asia/Damascus (UTC +3)</option>
                    <option value="226" data-offset="6">Asia/Dhaka (UTC +6)</option>
                    <option value="227" data-offset="9">Asia/Dili (UTC +9)</option>
                    <option value="228" data-offset="4">Asia/Dubai (UTC +4)</option>
                    <option value="229" data-offset="5">Asia/Dushanbe (UTC +5)</option>
                    <option value="230" data-offset="2">Asia/Famagusta (UTC +2)</option>
                    <option value="231" data-offset="2">Asia/Gaza (UTC +2)</option>
                    <option value="232" data-offset="2">Asia/Hebron (UTC +2)</option>
                    <option value="233" data-offset="7">Asia/Ho Chi Minh (UTC +7)</option>
                    <option value="234" data-offset="8">Asia/Hong Kong (UTC +8)</option>
                    <option value="235" data-offset="7">Asia/Hovd (UTC +7)</option>
                    <option value="236" data-offset="8">Asia/Irkutsk (UTC +8)</option>
                    <option value="237" data-offset="7">Asia/Jakarta (UTC +7)</option>
                    <option value="238" data-offset="9">Asia/Jayapura (UTC +9)</option>
                    <option value="239" data-offset="2">Asia/Jerusalem (UTC +2)</option>
                    <option value="240" data-offset="4.5">Asia/Kabul (UTC +4.5)</option>
                    <option value="241" data-offset="12">Asia/Kamchatka (UTC +12)</option>
                    <option value="242" data-offset="5">Asia/Karachi (UTC +5)</option>
                    <option value="243" data-offset="5.75">Asia/Kathmandu (UTC +5.75)</option>
                    <option value="244" data-offset="9">Asia/Khandyga (UTC +9)</option>
                    <option value="245" data-offset="5.5">Asia/Kolkata (UTC +5.5)</option>
                    <option value="246" data-offset="7">Asia/Krasnoyarsk (UTC +7)</option>
                    <option value="247" data-offset="8">Asia/Kuala Lumpur (UTC +8)</option>
                    <option value="248" data-offset="8">Asia/Kuching (UTC +8)</option>
                    <option value="249" data-offset="3">Asia/Kuwait (UTC +3)</option>
                    <option value="250" data-offset="8">Asia/Macau (UTC +8)</option>
                    <option value="251" data-offset="11">Asia/Magadan (UTC +11)</option>
                    <option value="252" data-offset="8">Asia/Makassar (UTC +8)</option>
                    <option value="253" data-offset="8">Asia/Manila (UTC +8)</option>
                    <option value="254" data-offset="4">Asia/Muscat (UTC +4)</option>
                    <option value="255" data-offset="2">Asia/Nicosia (UTC +2)</option>
                    <option value="256" data-offset="7">Asia/Novokuznetsk (UTC +7)</option>
                    <option value="257" data-offset="7">Asia/Novosibirsk (UTC +7)</option>
                    <option value="258" data-offset="6">Asia/Omsk (UTC +6)</option>
                    <option value="259" data-offset="5">Asia/Oral (UTC +5)</option>
                    <option value="260" data-offset="7">Asia/Phnom Penh (UTC +7)</option>
                    <option value="261" data-offset="7">Asia/Pontianak (UTC +7)</option>
                    <option value="262" data-offset="9">Asia/Pyongyang (UTC +9)</option>
                    <option value="263" data-offset="3">Asia/Qatar (UTC +3)</option>
                    <option value="264" data-offset="5">Asia/Qostanay (UTC +5)</option>
                    <option value="265" data-offset="5">Asia/Qyzylorda (UTC +5)</option>
                    <option value="266" data-offset="3">Asia/Riyadh (UTC +3)</option>
                    <option value="267" data-offset="11">Asia/Sakhalin (UTC +11)</option>
                    <option value="268" data-offset="5">Asia/Samarkand (UTC +5)</option>
                    <option value="269" data-offset="9">Asia/Seoul (UTC +9)</option>
                    <option value="270" data-offset="8">Asia/Shanghai (UTC +8)</option>
                    <option value="271" data-offset="8">Asia/Singapore (UTC +8)</option>
                    <option value="272" data-offset="11">Asia/Srednekolymsk (UTC +11)</option>
                    <option value="273" data-offset="8">Asia/Taipei (UTC +8)</option>
                    <option value="274" data-offset="5">Asia/Tashkent (UTC +5)</option>
                    <option value="275" data-offset="4">Asia/Tbilisi (UTC +4)</option>
                    <option value="276" data-offset="3.5">Asia/Tehran (UTC +3.5)</option>
                    <option value="277" data-offset="6">Asia/Thimphu (UTC +6)</option>
                    <option value="278" data-offset="9">Asia/Tokyo (UTC +9)</option>
                    <option value="279" data-offset="7">Asia/Tomsk (UTC +7)</option>
                    <option value="280" data-offset="8">Asia/Ulaanbaatar (UTC +8)</option>
                    <option value="281" data-offset="6">Asia/Urumqi (UTC +6)</option>
                    <option value="282" data-offset="10">Asia/Ust-Nera (UTC +10)</option>
                    <option value="283" data-offset="7">Asia/Vientiane (UTC +7)</option>
                    <option value="284" data-offset="10">Asia/Vladivostok (UTC +10)</option>
                    <option value="285" data-offset="9">Asia/Yakutsk (UTC +9)</option>
                    <option value="286" data-offset="6.5">Asia/Yangon (UTC +6.5)</option>
                    <option value="287" data-offset="5">Asia/Yekaterinburg (UTC +5)</option>
                    <option value="288" data-offset="4">Asia/Yerevan (UTC +4)</option>
                    <option value="289" data-offset="-1">Atlantic/Azores (UTC -1)</option>
                    <option value="290" data-offset="-4">Atlantic/Bermuda (UTC -4)</option>
                    <option value="291" data-offset="0">Atlantic/Canary (UTC +0)</option>
                    <option value="292" data-offset="-1">Atlantic/Cape Verde (UTC -1)</option>
                    <option value="293" data-offset="0">Atlantic/Faroe (UTC +0)</option>
                    <option value="294" data-offset="0">Atlantic/Madeira (UTC +0)</option>
                    <option value="295" data-offset="0">Atlantic/Reykjavik (UTC +0)</option>
                    <option value="296" data-offset="-2">Atlantic/South Georgia (UTC -2)</option>
                    <option value="297" data-offset="0">Atlantic/St Helena (UTC +0)</option>
                    <option value="298" data-offset="-3">Atlantic/Stanley (UTC -3)</option>
                    <option value="299" data-offset="10.5">Australia/Adelaide (UTC +10.5)</option>
                    <option value="300" data-offset="10">Australia/Brisbane (UTC +10)</option>
                    <option value="301" data-offset="10.5">Australia/Broken Hill (UTC +10.5)</option>
                    <option value="302" data-offset="9.5">Australia/Darwin (UTC +9.5)</option>
                    <option value="303" data-offset="8.75">Australia/Eucla (UTC +8.75)</option>
                    <option value="304" data-offset="11">Australia/Hobart (UTC +11)</option>
                    <option value="305" data-offset="10">Australia/Lindeman (UTC +10)</option>
                    <option value="306" data-offset="11">Australia/Lord Howe (UTC +11)</option>
                    <option value="307" data-offset="11">Australia/Melbourne (UTC +11)</option>
                    <option value="308" data-offset="8">Australia/Perth (UTC +8)</option>
                    <option value="309" data-offset="11">Australia/Sydney (UTC +11)</option>
                    <option value="310" data-offset="1">Europe/Amsterdam (UTC +1)</option>
                    <option value="311" data-offset="1">Europe/Andorra (UTC +1)</option>
                    <option value="312" data-offset="4">Europe/Astrakhan (UTC +4)</option>
                    <option value="313" data-offset="2">Europe/Athens (UTC +2)</option>
                    <option value="314" data-offset="1">Europe/Belgrade (UTC +1)</option>
                    <option value="315" data-offset="1">Europe/Berlin (UTC +1)</option>
                    <option value="316" data-offset="1">Europe/Bratislava (UTC +1)</option>
                    <option value="317" data-offset="1">Europe/Brussels (UTC +1)</option>
                    <option value="318" data-offset="2">Europe/Bucharest (UTC +2)</option>
                    <option value="319" data-offset="1">Europe/Budapest (UTC +1)</option>
                    <option value="320" data-offset="1">Europe/Busingen (UTC +1)</option>
                    <option value="321" data-offset="2">Europe/Chisinau (UTC +2)</option>
                    <option value="322" data-offset="1">Europe/Copenhagen (UTC +1)</option>
                    <option value="323" data-offset="0">Europe/Dublin (UTC +0)</option>
                    <option value="324" data-offset="1">Europe/Gibraltar (UTC +1)</option>
                    <option value="325" data-offset="0">Europe/Guernsey (UTC +0)</option>
                    <option value="326" data-offset="2">Europe/Helsinki (UTC +2)</option>
                    <option value="327" data-offset="0">Europe/Isle of Man (UTC +0)</option>
                    <option value="328" data-offset="3">Europe/Istanbul (UTC +3)</option>
                    <option value="329" data-offset="0">Europe/Jersey (UTC +0)</option>
                    <option value="330" data-offset="2">Europe/Kaliningrad (UTC +2)</option>
                    <option value="331" data-offset="3">Europe/Kirov (UTC +3)</option>
                    <option value="332" data-offset="2">Europe/Kyiv (UTC +2)</option>
                    <option value="333" data-offset="0">Europe/Lisbon (UTC +0)</option>
                    <option value="334" data-offset="1">Europe/Ljubljana (UTC +1)</option>
                    <option value="335" data-offset="0">Europe/London (UTC +0)</option>
                    <option value="336" data-offset="1">Europe/Luxembourg (UTC +1)</option>
                    <option value="337" data-offset="1">Europe/Madrid (UTC +1)</option>
                    <option value="338" data-offset="1">Europe/Malta (UTC +1)</option>
                    <option value="339" data-offset="2">Europe/Mariehamn (UTC +2)</option>
                    <option value="340" data-offset="3">Europe/Minsk (UTC +3)</option>
                    <option value="341" data-offset="1">Europe/Monaco (UTC +1)</option>
                    <option value="342" data-offset="3">Europe/Moscow (UTC +3)</option>
                    <option value="343" data-offset="1">Europe/Oslo (UTC +1)</option>
                    <option value="344" data-offset="1">Europe/Paris (UTC +1)</option>
                    <option value="345" data-offset="1">Europe/Podgorica (UTC +1)</option>
                    <option value="346" data-offset="1">Europe/Prague (UTC +1)</option>
                    <option value="347" data-offset="2">Europe/Riga (UTC +2)</option>
                    <option value="348" data-offset="1">Europe/Rome (UTC +1)</option>
                    <option value="349" data-offset="4">Europe/Samara (UTC +4)</option>
                    <option value="350" data-offset="1">Europe/San Marino (UTC +1)</option>
                    <option value="351" data-offset="1">Europe/Sarajevo (UTC +1)</option>
                    <option value="352" data-offset="4">Europe/Saratov (UTC +4)</option>
                    <option value="353" data-offset="3">Europe/Simferopol (UTC +3)</option>
                    <option value="354" data-offset="1">Europe/Skopje (UTC +1)</option>
                    <option value="355" data-offset="2">Europe/Sofia (UTC +2)</option>
                    <option value="356" data-offset="1">Europe/Stockholm (UTC +1)</option>
                    <option value="357" data-offset="2">Europe/Tallinn (UTC +2)</option>
                    <option value="358" data-offset="1">Europe/Tirane (UTC +1)</option>
                    <option value="359" data-offset="4">Europe/Ulyanovsk (UTC +4)</option>
                    <option value="360" data-offset="1">Europe/Vaduz (UTC +1)</option>
                    <option value="361" data-offset="1">Europe/Vatican (UTC +1)</option>
                    <option value="362" data-offset="1">Europe/Vienna (UTC +1)</option>
                    <option value="363" data-offset="2">Europe/Vilnius (UTC +2)</option>
                    <option value="364" data-offset="3">Europe/Volgograd (UTC +3)</option>
                    <option value="365" data-offset="1">Europe/Warsaw (UTC +1)</option>
                    <option value="366" data-offset="1">Europe/Zagreb (UTC +1)</option>
                    <option value="367" data-offset="1">Europe/Zurich (UTC +1)</option>
                    <option value="368" data-offset="3">Indian/Antananarivo (UTC +3)</option>
                    <option value="369" data-offset="6">Indian/Chagos (UTC +6)</option>
                    <option value="370" data-offset="7">Indian/Christmas (UTC +7)</option>
                    <option value="371" data-offset="6.5">Indian/Cocos (UTC +6.5)</option>
                    <option value="372" data-offset="3">Indian/Comoro (UTC +3)</option>
                    <option value="373" data-offset="5">Indian/Kerguelen (UTC +5)</option>
                    <option value="374" data-offset="4">Indian/Mahe (UTC +4)</option>
                    <option value="375" data-offset="5">Indian/Maldives (UTC +5)</option>
                    <option value="376" data-offset="4">Indian/Mauritius (UTC +4)</option>
                    <option value="377" data-offset="3">Indian/Mayotte (UTC +3)</option>
                    <option value="378" data-offset="4">Indian/Reunion (UTC +4)</option>
                    <option value="379" data-offset="13">Pacific/Apia (UTC +13)</option>
                    <option value="380" data-offset="13">Pacific/Auckland (UTC +13)</option>
                    <option value="381" data-offset="11">Pacific/Bougainville (UTC +11)</option>
                    <option value="382" data-offset="13.75">Pacific/Chatham (UTC +13.75)</option>
                    <option value="383" data-offset="10">Pacific/Chuuk (UTC +10)</option>
                    <option value="384" data-offset="-5">Pacific/Easter (UTC -5)</option>
                    <option value="385" data-offset="11">Pacific/Efate (UTC +11)</option>
                    <option value="386" data-offset="13">Pacific/Fakaofo (UTC +13)</option>
                    <option value="387" data-offset="12">Pacific/Fiji (UTC +12)</option>
                    <option value="388" data-offset="12">Pacific/Funafuti (UTC +12)</option>
                    <option value="389" data-offset="-6">Pacific/Galapagos (UTC -6)</option>
                    <option value="390" data-offset="-9">Pacific/Gambier (UTC -9)</option>
                    <option value="391" data-offset="11">Pacific/Guadalcanal (UTC +11)</option>
                    <option value="392" data-offset="10">Pacific/Guam (UTC +10)</option>
                    <option value="393" data-offset="-10">Pacific/Honolulu (UTC -10)</option>
                    <option value="394" data-offset="13">Pacific/Kanton (UTC +13)</option>
                    <option value="395" data-offset="14">Pacific/Kiritimati (UTC +14)</option>
                    <option value="396" data-offset="11">Pacific/Kosrae (UTC +11)</option>
                    <option value="397" data-offset="12">Pacific/Kwajalein (UTC +12)</option>
                    <option value="398" data-offset="12">Pacific/Majuro (UTC +12)</option>
                    <option value="399" data-offset="-9.5">Pacific/Marquesas (UTC -9.5)</option>
                    <option value="400" data-offset="-11">Pacific/Midway (UTC -11)</option>
                    <option value="401" data-offset="12">Pacific/Nauru (UTC +12)</option>
                    <option value="402" data-offset="-11">Pacific/Niue (UTC -11)</option>
                    <option value="403" data-offset="12">Pacific/Norfolk (UTC +12)</option>
                    <option value="404" data-offset="11">Pacific/Noumea (UTC +11)</option>
                    <option value="405" data-offset="-11">Pacific/Pago Pago (UTC -11)</option>
                    <option value="406" data-offset="9">Pacific/Palau (UTC +9)</option>
                    <option value="407" data-offset="-8">Pacific/Pitcairn (UTC -8)</option>
                    <option value="408" data-offset="11">Pacific/Pohnpei (UTC +11)</option>
                    <option value="409" data-offset="10">Pacific/Port Moresby (UTC +10)</option>
                    <option value="410" data-offset="-10">Pacific/Rarotonga (UTC -10)</option>
                    <option value="411" data-offset="10">Pacific/Saipan (UTC +10)</option>
                    <option value="412" data-offset="-10">Pacific/Tahiti (UTC -10)</option>
                    <option value="413" data-offset="12">Pacific/Tarawa (UTC +12)</option>
                    <option value="414" data-offset="13">Pacific/Tongatapu (UTC +13)</option>
                    <option value="415" data-offset="12">Pacific/Wake (UTC +12)</option>
                    <option value="416" data-offset="12">Pacific/Wallis (UTC +12)</option>
                    <option value="417" data-offset="0">UTC (UTC +0)</option>
                </select>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_no_timezone_styles(): void
    {
        Config::set('control-ui-kit.user_timezone', 'Test');

        $template = <<<'HTML'
            <x-input-date name="date" icon="none" show-time timezone-background="none" timezone-border="none" timezone-color="none" timezone-font="none" timezone-other="none" timezone-padding="none" timezone-rounded="none" timezone-shadow="none" timezone-width="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0' , yearsBefore: 100, yearsAfter: 5, showTimeZones: true, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
                <select x-ref="offset" x-model="offset" x-show="showTimeZones" class="">
                    <option value="0" data-offset="0">Africa/Abidjan (UTC +0)</option>
                    <option value="1" data-offset="0">Africa/Accra (UTC +0)</option>
                    <option value="2" data-offset="3">Africa/Addis Ababa (UTC +3)</option>
                    <option value="3" data-offset="1">Africa/Algiers (UTC +1)</option>
                    <option value="4" data-offset="3">Africa/Asmara (UTC +3)</option>
                    <option value="5" data-offset="0">Africa/Bamako (UTC +0)</option>
                    <option value="6" data-offset="1">Africa/Bangui (UTC +1)</option>
                    <option value="7" data-offset="0">Africa/Banjul (UTC +0)</option>
                    <option value="8" data-offset="0">Africa/Bissau (UTC +0)</option>
                    <option value="9" data-offset="2">Africa/Blantyre (UTC +2)</option>
                    <option value="10" data-offset="1">Africa/Brazzaville (UTC +1)</option>
                    <option value="11" data-offset="2">Africa/Bujumbura (UTC +2)</option>
                    <option value="12" data-offset="2">Africa/Cairo (UTC +2)</option>
                    <option value="13" data-offset="1">Africa/Casablanca (UTC +1)</option>
                    <option value="14" data-offset="1">Africa/Ceuta (UTC +1)</option>
                    <option value="15" data-offset="0">Africa/Conakry (UTC +0)</option>
                    <option value="16" data-offset="0">Africa/Dakar (UTC +0)</option>
                    <option value="17" data-offset="3">Africa/Dar es Salaam (UTC +3)</option>
                    <option value="18" data-offset="3">Africa/Djibouti (UTC +3)</option>
                    <option value="19" data-offset="1">Africa/Douala (UTC +1)</option>
                    <option value="20" data-offset="1">Africa/El Aaiun (UTC +1)</option>
                    <option value="21" data-offset="0">Africa/Freetown (UTC +0)</option>
                    <option value="22" data-offset="2">Africa/Gaborone (UTC +2)</option>
                    <option value="23" data-offset="2">Africa/Harare (UTC +2)</option>
                    <option value="24" data-offset="2">Africa/Johannesburg (UTC +2)</option>
                    <option value="25" data-offset="2">Africa/Juba (UTC +2)</option>
                    <option value="26" data-offset="3">Africa/Kampala (UTC +3)</option>
                    <option value="27" data-offset="2">Africa/Khartoum (UTC +2)</option>
                    <option value="28" data-offset="2">Africa/Kigali (UTC +2)</option>
                    <option value="29" data-offset="1">Africa/Kinshasa (UTC +1)</option>
                    <option value="30" data-offset="1">Africa/Lagos (UTC +1)</option>
                    <option value="31" data-offset="1">Africa/Libreville (UTC +1)</option>
                    <option value="32" data-offset="0">Africa/Lome (UTC +0)</option>
                    <option value="33" data-offset="1">Africa/Luanda (UTC +1)</option>
                    <option value="34" data-offset="2">Africa/Lubumbashi (UTC +2)</option>
                    <option value="35" data-offset="2">Africa/Lusaka (UTC +2)</option>
                    <option value="36" data-offset="1">Africa/Malabo (UTC +1)</option>
                    <option value="37" data-offset="2">Africa/Maputo (UTC +2)</option>
                    <option value="38" data-offset="2">Africa/Maseru (UTC +2)</option>
                    <option value="39" data-offset="2">Africa/Mbabane (UTC +2)</option>
                    <option value="40" data-offset="3">Africa/Mogadishu (UTC +3)</option>
                    <option value="41" data-offset="0">Africa/Monrovia (UTC +0)</option>
                    <option value="42" data-offset="3">Africa/Nairobi (UTC +3)</option>
                    <option value="43" data-offset="1">Africa/Ndjamena (UTC +1)</option>
                    <option value="44" data-offset="1">Africa/Niamey (UTC +1)</option>
                    <option value="45" data-offset="0">Africa/Nouakchott (UTC +0)</option>
                    <option value="46" data-offset="0">Africa/Ouagadougou (UTC +0)</option>
                    <option value="47" data-offset="1">Africa/Porto-Novo (UTC +1)</option>
                    <option value="48" data-offset="0">Africa/Sao Tome (UTC +0)</option>
                    <option value="49" data-offset="2">Africa/Tripoli (UTC +2)</option>
                    <option value="50" data-offset="1">Africa/Tunis (UTC +1)</option>
                    <option value="51" data-offset="2">Africa/Windhoek (UTC +2)</option>
                    <option value="52" data-offset="-10">America/Adak (UTC -10)</option>
                    <option value="53" data-offset="-9">America/Anchorage (UTC -9)</option>
                    <option value="54" data-offset="-4">America/Anguilla (UTC -4)</option>
                    <option value="55" data-offset="-4">America/Antigua (UTC -4)</option>
                    <option value="56" data-offset="-3">America/Araguaina (UTC -3)</option>
                    <option value="57" data-offset="-3">America/Argentina/Buenos Aires (UTC -3)</option>
                    <option value="58" data-offset="-3">America/Argentina/Catamarca (UTC -3)</option>
                    <option value="59" data-offset="-3">America/Argentina/Cordoba (UTC -3)</option>
                    <option value="60" data-offset="-3">America/Argentina/Jujuy (UTC -3)</option>
                    <option value="61" data-offset="-3">America/Argentina/La Rioja (UTC -3)</option>
                    <option value="62" data-offset="-3">America/Argentina/Mendoza (UTC -3)</option>
                    <option value="63" data-offset="-3">America/Argentina/Rio Gallegos (UTC -3)</option>
                    <option value="64" data-offset="-3">America/Argentina/Salta (UTC -3)</option>
                    <option value="65" data-offset="-3">America/Argentina/San Juan (UTC -3)</option>
                    <option value="66" data-offset="-3">America/Argentina/San Luis (UTC -3)</option>
                    <option value="67" data-offset="-3">America/Argentina/Tucuman (UTC -3)</option>
                    <option value="68" data-offset="-3">America/Argentina/Ushuaia (UTC -3)</option>
                    <option value="69" data-offset="-4">America/Aruba (UTC -4)</option>
                    <option value="70" data-offset="-3">America/Asuncion (UTC -3)</option>
                    <option value="71" data-offset="-5">America/Atikokan (UTC -5)</option>
                    <option value="72" data-offset="-3">America/Bahia (UTC -3)</option>
                    <option value="73" data-offset="-6">America/Bahia Banderas (UTC -6)</option>
                    <option value="74" data-offset="-4">America/Barbados (UTC -4)</option>
                    <option value="75" data-offset="-3">America/Belem (UTC -3)</option>
                    <option value="76" data-offset="-6">America/Belize (UTC -6)</option>
                    <option value="77" data-offset="-4">America/Blanc-Sablon (UTC -4)</option>
                    <option value="78" data-offset="-4">America/Boa Vista (UTC -4)</option>
                    <option value="79" data-offset="-5">America/Bogota (UTC -5)</option>
                    <option value="80" data-offset="-7">America/Boise (UTC -7)</option>
                    <option value="81" data-offset="-7">America/Cambridge Bay (UTC -7)</option>
                    <option value="82" data-offset="-4">America/Campo Grande (UTC -4)</option>
                    <option value="83" data-offset="-5">America/Cancun (UTC -5)</option>
                    <option value="84" data-offset="-4">America/Caracas (UTC -4)</option>
                    <option value="85" data-offset="-3">America/Cayenne (UTC -3)</option>
                    <option value="86" data-offset="-5">America/Cayman (UTC -5)</option>
                    <option value="87" data-offset="-6">America/Chicago (UTC -6)</option>
                    <option value="88" data-offset="-6">America/Chihuahua (UTC -6)</option>
                    <option value="89" data-offset="-7">America/Ciudad Juarez (UTC -7)</option>
                    <option value="90" data-offset="-6">America/Costa Rica (UTC -6)</option>
                    <option value="91" data-offset="-7">America/Creston (UTC -7)</option>
                    <option value="92" data-offset="-4">America/Cuiaba (UTC -4)</option>
                    <option value="93" data-offset="-4">America/Curacao (UTC -4)</option>
                    <option value="94" data-offset="0">America/Danmarkshavn (UTC +0)</option>
                    <option value="95" data-offset="-7">America/Dawson (UTC -7)</option>
                    <option value="96" data-offset="-7">America/Dawson Creek (UTC -7)</option>
                    <option value="97" data-offset="-7">America/Denver (UTC -7)</option>
                    <option value="98" data-offset="-5">America/Detroit (UTC -5)</option>
                    <option value="99" data-offset="-4">America/Dominica (UTC -4)</option>
                    <option value="100" data-offset="-7">America/Edmonton (UTC -7)</option>
                    <option value="101" data-offset="-5">America/Eirunepe (UTC -5)</option>
                    <option value="102" data-offset="-6">America/El Salvador (UTC -6)</option>
                    <option value="103" data-offset="-7">America/Fort Nelson (UTC -7)</option>
                    <option value="104" data-offset="-3">America/Fortaleza (UTC -3)</option>
                    <option value="105" data-offset="-4">America/Glace Bay (UTC -4)</option>
                    <option value="106" data-offset="-4">America/Goose Bay (UTC -4)</option>
                    <option value="107" data-offset="-5">America/Grand Turk (UTC -5)</option>
                    <option value="108" data-offset="-4">America/Grenada (UTC -4)</option>
                    <option value="109" data-offset="-4">America/Guadeloupe (UTC -4)</option>
                    <option value="110" data-offset="-6">America/Guatemala (UTC -6)</option>
                    <option value="111" data-offset="-5">America/Guayaquil (UTC -5)</option>
                    <option value="112" data-offset="-4">America/Guyana (UTC -4)</option>
                    <option value="113" data-offset="-4">America/Halifax (UTC -4)</option>
                    <option value="114" data-offset="-5">America/Havana (UTC -5)</option>
                    <option value="115" data-offset="-7">America/Hermosillo (UTC -7)</option>
                    <option value="116" data-offset="-5">America/Indiana/Indianapolis (UTC -5)</option>
                    <option value="117" data-offset="-6">America/Indiana/Knox (UTC -6)</option>
                    <option value="118" data-offset="-5">America/Indiana/Marengo (UTC -5)</option>
                    <option value="119" data-offset="-5">America/Indiana/Petersburg (UTC -5)</option>
                    <option value="120" data-offset="-6">America/Indiana/Tell City (UTC -6)</option>
                    <option value="121" data-offset="-5">America/Indiana/Vevay (UTC -5)</option>
                    <option value="122" data-offset="-5">America/Indiana/Vincennes (UTC -5)</option>
                    <option value="123" data-offset="-5">America/Indiana/Winamac (UTC -5)</option>
                    <option value="124" data-offset="-7">America/Inuvik (UTC -7)</option>
                    <option value="125" data-offset="-5">America/Iqaluit (UTC -5)</option>
                    <option value="126" data-offset="-5">America/Jamaica (UTC -5)</option>
                    <option value="127" data-offset="-9">America/Juneau (UTC -9)</option>
                    <option value="128" data-offset="-5">America/Kentucky/Louisville (UTC -5)</option>
                    <option value="129" data-offset="-5">America/Kentucky/Monticello (UTC -5)</option>
                    <option value="130" data-offset="-4">America/Kralendijk (UTC -4)</option>
                    <option value="131" data-offset="-4">America/La Paz (UTC -4)</option>
                    <option value="132" data-offset="-5">America/Lima (UTC -5)</option>
                    <option value="133" data-offset="-8">America/Los Angeles (UTC -8)</option>
                    <option value="134" data-offset="-4">America/Lower Princes (UTC -4)</option>
                    <option value="135" data-offset="-3">America/Maceio (UTC -3)</option>
                    <option value="136" data-offset="-6">America/Managua (UTC -6)</option>
                    <option value="137" data-offset="-4">America/Manaus (UTC -4)</option>
                    <option value="138" data-offset="-4">America/Marigot (UTC -4)</option>
                    <option value="139" data-offset="-4">America/Martinique (UTC -4)</option>
                    <option value="140" data-offset="-6">America/Matamoros (UTC -6)</option>
                    <option value="141" data-offset="-7">America/Mazatlan (UTC -7)</option>
                    <option value="142" data-offset="-6">America/Menominee (UTC -6)</option>
                    <option value="143" data-offset="-6">America/Merida (UTC -6)</option>
                    <option value="144" data-offset="-9">America/Metlakatla (UTC -9)</option>
                    <option value="145" data-offset="-6">America/Mexico City (UTC -6)</option>
                    <option value="146" data-offset="-3">America/Miquelon (UTC -3)</option>
                    <option value="147" data-offset="-4">America/Moncton (UTC -4)</option>
                    <option value="148" data-offset="-6">America/Monterrey (UTC -6)</option>
                    <option value="149" data-offset="-3">America/Montevideo (UTC -3)</option>
                    <option value="150" data-offset="-4">America/Montserrat (UTC -4)</option>
                    <option value="151" data-offset="-5">America/Nassau (UTC -5)</option>
                    <option value="152" data-offset="-5">America/New York (UTC -5)</option>
                    <option value="153" data-offset="-9">America/Nome (UTC -9)</option>
                    <option value="154" data-offset="-2">America/Noronha (UTC -2)</option>
                    <option value="155" data-offset="-6">America/North Dakota/Beulah (UTC -6)</option>
                    <option value="156" data-offset="-6">America/North Dakota/Center (UTC -6)</option>
                    <option value="157" data-offset="-6">America/North Dakota/New Salem (UTC -6)</option>
                    <option value="158" data-offset="-2">America/Nuuk (UTC -2)</option>
                    <option value="159" data-offset="-6">America/Ojinaga (UTC -6)</option>
                    <option value="160" data-offset="-5">America/Panama (UTC -5)</option>
                    <option value="161" data-offset="-3">America/Paramaribo (UTC -3)</option>
                    <option value="162" data-offset="-7">America/Phoenix (UTC -7)</option>
                    <option value="163" data-offset="-5">America/Port-au-Prince (UTC -5)</option>
                    <option value="164" data-offset="-4">America/Port of Spain (UTC -4)</option>
                    <option value="165" data-offset="-4">America/Porto Velho (UTC -4)</option>
                    <option value="166" data-offset="-4">America/Puerto Rico (UTC -4)</option>
                    <option value="167" data-offset="-3">America/Punta Arenas (UTC -3)</option>
                    <option value="168" data-offset="-6">America/Rankin Inlet (UTC -6)</option>
                    <option value="169" data-offset="-3">America/Recife (UTC -3)</option>
                    <option value="170" data-offset="-6">America/Regina (UTC -6)</option>
                    <option value="171" data-offset="-6">America/Resolute (UTC -6)</option>
                    <option value="172" data-offset="-5">America/Rio Branco (UTC -5)</option>
                    <option value="173" data-offset="-3">America/Santarem (UTC -3)</option>
                    <option value="174" data-offset="-3">America/Santiago (UTC -3)</option>
                    <option value="175" data-offset="-4">America/Santo Domingo (UTC -4)</option>
                    <option value="176" data-offset="-3">America/Sao Paulo (UTC -3)</option>
                    <option value="177" data-offset="-2">America/Scoresbysund (UTC -2)</option>
                    <option value="178" data-offset="-9">America/Sitka (UTC -9)</option>
                    <option value="179" data-offset="-4">America/St Barthelemy (UTC -4)</option>
                    <option value="180" data-offset="-3.5">America/St Johns (UTC -3.5)</option>
                    <option value="181" data-offset="-4">America/St Kitts (UTC -4)</option>
                    <option value="182" data-offset="-4">America/St Lucia (UTC -4)</option>
                    <option value="183" data-offset="-4">America/St Thomas (UTC -4)</option>
                    <option value="184" data-offset="-4">America/St Vincent (UTC -4)</option>
                    <option value="185" data-offset="-6">America/Swift Current (UTC -6)</option>
                    <option value="186" data-offset="-6">America/Tegucigalpa (UTC -6)</option>
                    <option value="187" data-offset="-4">America/Thule (UTC -4)</option>
                    <option value="188" data-offset="-8">America/Tijuana (UTC -8)</option>
                    <option value="189" data-offset="-5">America/Toronto (UTC -5)</option>
                    <option value="190" data-offset="-4">America/Tortola (UTC -4)</option>
                    <option value="191" data-offset="-8">America/Vancouver (UTC -8)</option>
                    <option value="192" data-offset="-7">America/Whitehorse (UTC -7)</option>
                    <option value="193" data-offset="-6">America/Winnipeg (UTC -6)</option>
                    <option value="194" data-offset="-9">America/Yakutat (UTC -9)</option>
                    <option value="195" data-offset="8">Antarctica/Casey (UTC +8)</option>
                    <option value="196" data-offset="7">Antarctica/Davis (UTC +7)</option>
                    <option value="197" data-offset="10">Antarctica/DumontDUrville (UTC +10)</option>
                    <option value="198" data-offset="11">Antarctica/Macquarie (UTC +11)</option>
                    <option value="199" data-offset="5">Antarctica/Mawson (UTC +5)</option>
                    <option value="200" data-offset="13">Antarctica/McMurdo (UTC +13)</option>
                    <option value="201" data-offset="-3">Antarctica/Palmer (UTC -3)</option>
                    <option value="202" data-offset="-3">Antarctica/Rothera (UTC -3)</option>
                    <option value="203" data-offset="3">Antarctica/Syowa (UTC +3)</option>
                    <option value="204" data-offset="0">Antarctica/Troll (UTC +0)</option>
                    <option value="205" data-offset="5">Antarctica/Vostok (UTC +5)</option>
                    <option value="206" data-offset="1">Arctic/Longyearbyen (UTC +1)</option>
                    <option value="207" data-offset="3">Asia/Aden (UTC +3)</option>
                    <option value="208" data-offset="5">Asia/Almaty (UTC +5)</option>
                    <option value="209" data-offset="3">Asia/Amman (UTC +3)</option>
                    <option value="210" data-offset="12">Asia/Anadyr (UTC +12)</option>
                    <option value="211" data-offset="5">Asia/Aqtau (UTC +5)</option>
                    <option value="212" data-offset="5">Asia/Aqtobe (UTC +5)</option>
                    <option value="213" data-offset="5">Asia/Ashgabat (UTC +5)</option>
                    <option value="214" data-offset="5">Asia/Atyrau (UTC +5)</option>
                    <option value="215" data-offset="3">Asia/Baghdad (UTC +3)</option>
                    <option value="216" data-offset="3">Asia/Bahrain (UTC +3)</option>
                    <option value="217" data-offset="4">Asia/Baku (UTC +4)</option>
                    <option value="218" data-offset="7">Asia/Bangkok (UTC +7)</option>
                    <option value="219" data-offset="7">Asia/Barnaul (UTC +7)</option>
                    <option value="220" data-offset="2">Asia/Beirut (UTC +2)</option>
                    <option value="221" data-offset="6">Asia/Bishkek (UTC +6)</option>
                    <option value="222" data-offset="8">Asia/Brunei (UTC +8)</option>
                    <option value="223" data-offset="9">Asia/Chita (UTC +9)</option>
                    <option value="224" data-offset="5.5">Asia/Colombo (UTC +5.5)</option>
                    <option value="225" data-offset="3">Asia/Damascus (UTC +3)</option>
                    <option value="226" data-offset="6">Asia/Dhaka (UTC +6)</option>
                    <option value="227" data-offset="9">Asia/Dili (UTC +9)</option>
                    <option value="228" data-offset="4">Asia/Dubai (UTC +4)</option>
                    <option value="229" data-offset="5">Asia/Dushanbe (UTC +5)</option>
                    <option value="230" data-offset="2">Asia/Famagusta (UTC +2)</option>
                    <option value="231" data-offset="2">Asia/Gaza (UTC +2)</option>
                    <option value="232" data-offset="2">Asia/Hebron (UTC +2)</option>
                    <option value="233" data-offset="7">Asia/Ho Chi Minh (UTC +7)</option>
                    <option value="234" data-offset="8">Asia/Hong Kong (UTC +8)</option>
                    <option value="235" data-offset="7">Asia/Hovd (UTC +7)</option>
                    <option value="236" data-offset="8">Asia/Irkutsk (UTC +8)</option>
                    <option value="237" data-offset="7">Asia/Jakarta (UTC +7)</option>
                    <option value="238" data-offset="9">Asia/Jayapura (UTC +9)</option>
                    <option value="239" data-offset="2">Asia/Jerusalem (UTC +2)</option>
                    <option value="240" data-offset="4.5">Asia/Kabul (UTC +4.5)</option>
                    <option value="241" data-offset="12">Asia/Kamchatka (UTC +12)</option>
                    <option value="242" data-offset="5">Asia/Karachi (UTC +5)</option>
                    <option value="243" data-offset="5.75">Asia/Kathmandu (UTC +5.75)</option>
                    <option value="244" data-offset="9">Asia/Khandyga (UTC +9)</option>
                    <option value="245" data-offset="5.5">Asia/Kolkata (UTC +5.5)</option>
                    <option value="246" data-offset="7">Asia/Krasnoyarsk (UTC +7)</option>
                    <option value="247" data-offset="8">Asia/Kuala Lumpur (UTC +8)</option>
                    <option value="248" data-offset="8">Asia/Kuching (UTC +8)</option>
                    <option value="249" data-offset="3">Asia/Kuwait (UTC +3)</option>
                    <option value="250" data-offset="8">Asia/Macau (UTC +8)</option>
                    <option value="251" data-offset="11">Asia/Magadan (UTC +11)</option>
                    <option value="252" data-offset="8">Asia/Makassar (UTC +8)</option>
                    <option value="253" data-offset="8">Asia/Manila (UTC +8)</option>
                    <option value="254" data-offset="4">Asia/Muscat (UTC +4)</option>
                    <option value="255" data-offset="2">Asia/Nicosia (UTC +2)</option>
                    <option value="256" data-offset="7">Asia/Novokuznetsk (UTC +7)</option>
                    <option value="257" data-offset="7">Asia/Novosibirsk (UTC +7)</option>
                    <option value="258" data-offset="6">Asia/Omsk (UTC +6)</option>
                    <option value="259" data-offset="5">Asia/Oral (UTC +5)</option>
                    <option value="260" data-offset="7">Asia/Phnom Penh (UTC +7)</option>
                    <option value="261" data-offset="7">Asia/Pontianak (UTC +7)</option>
                    <option value="262" data-offset="9">Asia/Pyongyang (UTC +9)</option>
                    <option value="263" data-offset="3">Asia/Qatar (UTC +3)</option>
                    <option value="264" data-offset="5">Asia/Qostanay (UTC +5)</option>
                    <option value="265" data-offset="5">Asia/Qyzylorda (UTC +5)</option>
                    <option value="266" data-offset="3">Asia/Riyadh (UTC +3)</option>
                    <option value="267" data-offset="11">Asia/Sakhalin (UTC +11)</option>
                    <option value="268" data-offset="5">Asia/Samarkand (UTC +5)</option>
                    <option value="269" data-offset="9">Asia/Seoul (UTC +9)</option>
                    <option value="270" data-offset="8">Asia/Shanghai (UTC +8)</option>
                    <option value="271" data-offset="8">Asia/Singapore (UTC +8)</option>
                    <option value="272" data-offset="11">Asia/Srednekolymsk (UTC +11)</option>
                    <option value="273" data-offset="8">Asia/Taipei (UTC +8)</option>
                    <option value="274" data-offset="5">Asia/Tashkent (UTC +5)</option>
                    <option value="275" data-offset="4">Asia/Tbilisi (UTC +4)</option>
                    <option value="276" data-offset="3.5">Asia/Tehran (UTC +3.5)</option>
                    <option value="277" data-offset="6">Asia/Thimphu (UTC +6)</option>
                    <option value="278" data-offset="9">Asia/Tokyo (UTC +9)</option>
                    <option value="279" data-offset="7">Asia/Tomsk (UTC +7)</option>
                    <option value="280" data-offset="8">Asia/Ulaanbaatar (UTC +8)</option>
                    <option value="281" data-offset="6">Asia/Urumqi (UTC +6)</option>
                    <option value="282" data-offset="10">Asia/Ust-Nera (UTC +10)</option>
                    <option value="283" data-offset="7">Asia/Vientiane (UTC +7)</option>
                    <option value="284" data-offset="10">Asia/Vladivostok (UTC +10)</option>
                    <option value="285" data-offset="9">Asia/Yakutsk (UTC +9)</option>
                    <option value="286" data-offset="6.5">Asia/Yangon (UTC +6.5)</option>
                    <option value="287" data-offset="5">Asia/Yekaterinburg (UTC +5)</option>
                    <option value="288" data-offset="4">Asia/Yerevan (UTC +4)</option>
                    <option value="289" data-offset="-1">Atlantic/Azores (UTC -1)</option>
                    <option value="290" data-offset="-4">Atlantic/Bermuda (UTC -4)</option>
                    <option value="291" data-offset="0">Atlantic/Canary (UTC +0)</option>
                    <option value="292" data-offset="-1">Atlantic/Cape Verde (UTC -1)</option>
                    <option value="293" data-offset="0">Atlantic/Faroe (UTC +0)</option>
                    <option value="294" data-offset="0">Atlantic/Madeira (UTC +0)</option>
                    <option value="295" data-offset="0">Atlantic/Reykjavik (UTC +0)</option>
                    <option value="296" data-offset="-2">Atlantic/South Georgia (UTC -2)</option>
                    <option value="297" data-offset="0">Atlantic/St Helena (UTC +0)</option>
                    <option value="298" data-offset="-3">Atlantic/Stanley (UTC -3)</option>
                    <option value="299" data-offset="10.5">Australia/Adelaide (UTC +10.5)</option>
                    <option value="300" data-offset="10">Australia/Brisbane (UTC +10)</option>
                    <option value="301" data-offset="10.5">Australia/Broken Hill (UTC +10.5)</option>
                    <option value="302" data-offset="9.5">Australia/Darwin (UTC +9.5)</option>
                    <option value="303" data-offset="8.75">Australia/Eucla (UTC +8.75)</option>
                    <option value="304" data-offset="11">Australia/Hobart (UTC +11)</option>
                    <option value="305" data-offset="10">Australia/Lindeman (UTC +10)</option>
                    <option value="306" data-offset="11">Australia/Lord Howe (UTC +11)</option>
                    <option value="307" data-offset="11">Australia/Melbourne (UTC +11)</option>
                    <option value="308" data-offset="8">Australia/Perth (UTC +8)</option>
                    <option value="309" data-offset="11">Australia/Sydney (UTC +11)</option>
                    <option value="310" data-offset="1">Europe/Amsterdam (UTC +1)</option>
                    <option value="311" data-offset="1">Europe/Andorra (UTC +1)</option>
                    <option value="312" data-offset="4">Europe/Astrakhan (UTC +4)</option>
                    <option value="313" data-offset="2">Europe/Athens (UTC +2)</option>
                    <option value="314" data-offset="1">Europe/Belgrade (UTC +1)</option>
                    <option value="315" data-offset="1">Europe/Berlin (UTC +1)</option>
                    <option value="316" data-offset="1">Europe/Bratislava (UTC +1)</option>
                    <option value="317" data-offset="1">Europe/Brussels (UTC +1)</option>
                    <option value="318" data-offset="2">Europe/Bucharest (UTC +2)</option>
                    <option value="319" data-offset="1">Europe/Budapest (UTC +1)</option>
                    <option value="320" data-offset="1">Europe/Busingen (UTC +1)</option>
                    <option value="321" data-offset="2">Europe/Chisinau (UTC +2)</option>
                    <option value="322" data-offset="1">Europe/Copenhagen (UTC +1)</option>
                    <option value="323" data-offset="0">Europe/Dublin (UTC +0)</option>
                    <option value="324" data-offset="1">Europe/Gibraltar (UTC +1)</option>
                    <option value="325" data-offset="0">Europe/Guernsey (UTC +0)</option>
                    <option value="326" data-offset="2">Europe/Helsinki (UTC +2)</option>
                    <option value="327" data-offset="0">Europe/Isle of Man (UTC +0)</option>
                    <option value="328" data-offset="3">Europe/Istanbul (UTC +3)</option>
                    <option value="329" data-offset="0">Europe/Jersey (UTC +0)</option>
                    <option value="330" data-offset="2">Europe/Kaliningrad (UTC +2)</option>
                    <option value="331" data-offset="3">Europe/Kirov (UTC +3)</option>
                    <option value="332" data-offset="2">Europe/Kyiv (UTC +2)</option>
                    <option value="333" data-offset="0">Europe/Lisbon (UTC +0)</option>
                    <option value="334" data-offset="1">Europe/Ljubljana (UTC +1)</option>
                    <option value="335" data-offset="0">Europe/London (UTC +0)</option>
                    <option value="336" data-offset="1">Europe/Luxembourg (UTC +1)</option>
                    <option value="337" data-offset="1">Europe/Madrid (UTC +1)</option>
                    <option value="338" data-offset="1">Europe/Malta (UTC +1)</option>
                    <option value="339" data-offset="2">Europe/Mariehamn (UTC +2)</option>
                    <option value="340" data-offset="3">Europe/Minsk (UTC +3)</option>
                    <option value="341" data-offset="1">Europe/Monaco (UTC +1)</option>
                    <option value="342" data-offset="3">Europe/Moscow (UTC +3)</option>
                    <option value="343" data-offset="1">Europe/Oslo (UTC +1)</option>
                    <option value="344" data-offset="1">Europe/Paris (UTC +1)</option>
                    <option value="345" data-offset="1">Europe/Podgorica (UTC +1)</option>
                    <option value="346" data-offset="1">Europe/Prague (UTC +1)</option>
                    <option value="347" data-offset="2">Europe/Riga (UTC +2)</option>
                    <option value="348" data-offset="1">Europe/Rome (UTC +1)</option>
                    <option value="349" data-offset="4">Europe/Samara (UTC +4)</option>
                    <option value="350" data-offset="1">Europe/San Marino (UTC +1)</option>
                    <option value="351" data-offset="1">Europe/Sarajevo (UTC +1)</option>
                    <option value="352" data-offset="4">Europe/Saratov (UTC +4)</option>
                    <option value="353" data-offset="3">Europe/Simferopol (UTC +3)</option>
                    <option value="354" data-offset="1">Europe/Skopje (UTC +1)</option>
                    <option value="355" data-offset="2">Europe/Sofia (UTC +2)</option>
                    <option value="356" data-offset="1">Europe/Stockholm (UTC +1)</option>
                    <option value="357" data-offset="2">Europe/Tallinn (UTC +2)</option>
                    <option value="358" data-offset="1">Europe/Tirane (UTC +1)</option>
                    <option value="359" data-offset="4">Europe/Ulyanovsk (UTC +4)</option>
                    <option value="360" data-offset="1">Europe/Vaduz (UTC +1)</option>
                    <option value="361" data-offset="1">Europe/Vatican (UTC +1)</option>
                    <option value="362" data-offset="1">Europe/Vienna (UTC +1)</option>
                    <option value="363" data-offset="2">Europe/Vilnius (UTC +2)</option>
                    <option value="364" data-offset="3">Europe/Volgograd (UTC +3)</option>
                    <option value="365" data-offset="1">Europe/Warsaw (UTC +1)</option>
                    <option value="366" data-offset="1">Europe/Zagreb (UTC +1)</option>
                    <option value="367" data-offset="1">Europe/Zurich (UTC +1)</option>
                    <option value="368" data-offset="3">Indian/Antananarivo (UTC +3)</option>
                    <option value="369" data-offset="6">Indian/Chagos (UTC +6)</option>
                    <option value="370" data-offset="7">Indian/Christmas (UTC +7)</option>
                    <option value="371" data-offset="6.5">Indian/Cocos (UTC +6.5)</option>
                    <option value="372" data-offset="3">Indian/Comoro (UTC +3)</option>
                    <option value="373" data-offset="5">Indian/Kerguelen (UTC +5)</option>
                    <option value="374" data-offset="4">Indian/Mahe (UTC +4)</option>
                    <option value="375" data-offset="5">Indian/Maldives (UTC +5)</option>
                    <option value="376" data-offset="4">Indian/Mauritius (UTC +4)</option>
                    <option value="377" data-offset="3">Indian/Mayotte (UTC +3)</option>
                    <option value="378" data-offset="4">Indian/Reunion (UTC +4)</option>
                    <option value="379" data-offset="13">Pacific/Apia (UTC +13)</option>
                    <option value="380" data-offset="13">Pacific/Auckland (UTC +13)</option>
                    <option value="381" data-offset="11">Pacific/Bougainville (UTC +11)</option>
                    <option value="382" data-offset="13.75">Pacific/Chatham (UTC +13.75)</option>
                    <option value="383" data-offset="10">Pacific/Chuuk (UTC +10)</option>
                    <option value="384" data-offset="-5">Pacific/Easter (UTC -5)</option>
                    <option value="385" data-offset="11">Pacific/Efate (UTC +11)</option>
                    <option value="386" data-offset="13">Pacific/Fakaofo (UTC +13)</option>
                    <option value="387" data-offset="12">Pacific/Fiji (UTC +12)</option>
                    <option value="388" data-offset="12">Pacific/Funafuti (UTC +12)</option>
                    <option value="389" data-offset="-6">Pacific/Galapagos (UTC -6)</option>
                    <option value="390" data-offset="-9">Pacific/Gambier (UTC -9)</option>
                    <option value="391" data-offset="11">Pacific/Guadalcanal (UTC +11)</option>
                    <option value="392" data-offset="10">Pacific/Guam (UTC +10)</option>
                    <option value="393" data-offset="-10">Pacific/Honolulu (UTC -10)</option>
                    <option value="394" data-offset="13">Pacific/Kanton (UTC +13)</option>
                    <option value="395" data-offset="14">Pacific/Kiritimati (UTC +14)</option>
                    <option value="396" data-offset="11">Pacific/Kosrae (UTC +11)</option>
                    <option value="397" data-offset="12">Pacific/Kwajalein (UTC +12)</option>
                    <option value="398" data-offset="12">Pacific/Majuro (UTC +12)</option>
                    <option value="399" data-offset="-9.5">Pacific/Marquesas (UTC -9.5)</option>
                    <option value="400" data-offset="-11">Pacific/Midway (UTC -11)</option>
                    <option value="401" data-offset="12">Pacific/Nauru (UTC +12)</option>
                    <option value="402" data-offset="-11">Pacific/Niue (UTC -11)</option>
                    <option value="403" data-offset="12">Pacific/Norfolk (UTC +12)</option>
                    <option value="404" data-offset="11">Pacific/Noumea (UTC +11)</option>
                    <option value="405" data-offset="-11">Pacific/Pago Pago (UTC -11)</option>
                    <option value="406" data-offset="9">Pacific/Palau (UTC +9)</option>
                    <option value="407" data-offset="-8">Pacific/Pitcairn (UTC -8)</option>
                    <option value="408" data-offset="11">Pacific/Pohnpei (UTC +11)</option>
                    <option value="409" data-offset="10">Pacific/Port Moresby (UTC +10)</option>
                    <option value="410" data-offset="-10">Pacific/Rarotonga (UTC -10)</option>
                    <option value="411" data-offset="10">Pacific/Saipan (UTC +10)</option>
                    <option value="412" data-offset="-10">Pacific/Tahiti (UTC -10)</option>
                    <option value="413" data-offset="12">Pacific/Tarawa (UTC +12)</option>
                    <option value="414" data-offset="13">Pacific/Tongatapu (UTC +13)</option>
                    <option value="415" data-offset="12">Pacific/Wake (UTC +12)</option>
                    <option value="416" data-offset="12">Pacific/Wallis (UTC +12)</option>
                    <option value="417" data-offset="0">UTC (UTC +0)</option>
                </select>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_inline_timezone_styles(): void
    {
        Config::set('control-ui-kit.user_timezone', 'Test');

        $template = <<<'HTML'
            <x-input-date name="date" icon="none" show-time timezone-background="1" timezone-border="2" timezone-color="3" timezone-font="4" timezone-other="5" timezone-padding="6" timezone-rounded="7" timezone-shadow="8" timezone-width="9" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0' , yearsBefore: 100, yearsAfter: 5, showTimeZones: true, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
                <select x-ref="offset" x-model="offset" x-show="showTimeZones" class="1 2 3 4 5 6 7 8 9">
                    <option value="0" data-offset="0">Africa/Abidjan (UTC +0)</option>
                    <option value="1" data-offset="0">Africa/Accra (UTC +0)</option>
                    <option value="2" data-offset="3">Africa/Addis Ababa (UTC +3)</option>
                    <option value="3" data-offset="1">Africa/Algiers (UTC +1)</option>
                    <option value="4" data-offset="3">Africa/Asmara (UTC +3)</option>
                    <option value="5" data-offset="0">Africa/Bamako (UTC +0)</option>
                    <option value="6" data-offset="1">Africa/Bangui (UTC +1)</option>
                    <option value="7" data-offset="0">Africa/Banjul (UTC +0)</option>
                    <option value="8" data-offset="0">Africa/Bissau (UTC +0)</option>
                    <option value="9" data-offset="2">Africa/Blantyre (UTC +2)</option>
                    <option value="10" data-offset="1">Africa/Brazzaville (UTC +1)</option>
                    <option value="11" data-offset="2">Africa/Bujumbura (UTC +2)</option>
                    <option value="12" data-offset="2">Africa/Cairo (UTC +2)</option>
                    <option value="13" data-offset="1">Africa/Casablanca (UTC +1)</option>
                    <option value="14" data-offset="1">Africa/Ceuta (UTC +1)</option>
                    <option value="15" data-offset="0">Africa/Conakry (UTC +0)</option>
                    <option value="16" data-offset="0">Africa/Dakar (UTC +0)</option>
                    <option value="17" data-offset="3">Africa/Dar es Salaam (UTC +3)</option>
                    <option value="18" data-offset="3">Africa/Djibouti (UTC +3)</option>
                    <option value="19" data-offset="1">Africa/Douala (UTC +1)</option>
                    <option value="20" data-offset="1">Africa/El Aaiun (UTC +1)</option>
                    <option value="21" data-offset="0">Africa/Freetown (UTC +0)</option>
                    <option value="22" data-offset="2">Africa/Gaborone (UTC +2)</option>
                    <option value="23" data-offset="2">Africa/Harare (UTC +2)</option>
                    <option value="24" data-offset="2">Africa/Johannesburg (UTC +2)</option>
                    <option value="25" data-offset="2">Africa/Juba (UTC +2)</option>
                    <option value="26" data-offset="3">Africa/Kampala (UTC +3)</option>
                    <option value="27" data-offset="2">Africa/Khartoum (UTC +2)</option>
                    <option value="28" data-offset="2">Africa/Kigali (UTC +2)</option>
                    <option value="29" data-offset="1">Africa/Kinshasa (UTC +1)</option>
                    <option value="30" data-offset="1">Africa/Lagos (UTC +1)</option>
                    <option value="31" data-offset="1">Africa/Libreville (UTC +1)</option>
                    <option value="32" data-offset="0">Africa/Lome (UTC +0)</option>
                    <option value="33" data-offset="1">Africa/Luanda (UTC +1)</option>
                    <option value="34" data-offset="2">Africa/Lubumbashi (UTC +2)</option>
                    <option value="35" data-offset="2">Africa/Lusaka (UTC +2)</option>
                    <option value="36" data-offset="1">Africa/Malabo (UTC +1)</option>
                    <option value="37" data-offset="2">Africa/Maputo (UTC +2)</option>
                    <option value="38" data-offset="2">Africa/Maseru (UTC +2)</option>
                    <option value="39" data-offset="2">Africa/Mbabane (UTC +2)</option>
                    <option value="40" data-offset="3">Africa/Mogadishu (UTC +3)</option>
                    <option value="41" data-offset="0">Africa/Monrovia (UTC +0)</option>
                    <option value="42" data-offset="3">Africa/Nairobi (UTC +3)</option>
                    <option value="43" data-offset="1">Africa/Ndjamena (UTC +1)</option>
                    <option value="44" data-offset="1">Africa/Niamey (UTC +1)</option>
                    <option value="45" data-offset="0">Africa/Nouakchott (UTC +0)</option>
                    <option value="46" data-offset="0">Africa/Ouagadougou (UTC +0)</option>
                    <option value="47" data-offset="1">Africa/Porto-Novo (UTC +1)</option>
                    <option value="48" data-offset="0">Africa/Sao Tome (UTC +0)</option>
                    <option value="49" data-offset="2">Africa/Tripoli (UTC +2)</option>
                    <option value="50" data-offset="1">Africa/Tunis (UTC +1)</option>
                    <option value="51" data-offset="2">Africa/Windhoek (UTC +2)</option>
                    <option value="52" data-offset="-10">America/Adak (UTC -10)</option>
                    <option value="53" data-offset="-9">America/Anchorage (UTC -9)</option>
                    <option value="54" data-offset="-4">America/Anguilla (UTC -4)</option>
                    <option value="55" data-offset="-4">America/Antigua (UTC -4)</option>
                    <option value="56" data-offset="-3">America/Araguaina (UTC -3)</option>
                    <option value="57" data-offset="-3">America/Argentina/Buenos Aires (UTC -3)</option>
                    <option value="58" data-offset="-3">America/Argentina/Catamarca (UTC -3)</option>
                    <option value="59" data-offset="-3">America/Argentina/Cordoba (UTC -3)</option>
                    <option value="60" data-offset="-3">America/Argentina/Jujuy (UTC -3)</option>
                    <option value="61" data-offset="-3">America/Argentina/La Rioja (UTC -3)</option>
                    <option value="62" data-offset="-3">America/Argentina/Mendoza (UTC -3)</option>
                    <option value="63" data-offset="-3">America/Argentina/Rio Gallegos (UTC -3)</option>
                    <option value="64" data-offset="-3">America/Argentina/Salta (UTC -3)</option>
                    <option value="65" data-offset="-3">America/Argentina/San Juan (UTC -3)</option>
                    <option value="66" data-offset="-3">America/Argentina/San Luis (UTC -3)</option>
                    <option value="67" data-offset="-3">America/Argentina/Tucuman (UTC -3)</option>
                    <option value="68" data-offset="-3">America/Argentina/Ushuaia (UTC -3)</option>
                    <option value="69" data-offset="-4">America/Aruba (UTC -4)</option>
                    <option value="70" data-offset="-3">America/Asuncion (UTC -3)</option>
                    <option value="71" data-offset="-5">America/Atikokan (UTC -5)</option>
                    <option value="72" data-offset="-3">America/Bahia (UTC -3)</option>
                    <option value="73" data-offset="-6">America/Bahia Banderas (UTC -6)</option>
                    <option value="74" data-offset="-4">America/Barbados (UTC -4)</option>
                    <option value="75" data-offset="-3">America/Belem (UTC -3)</option>
                    <option value="76" data-offset="-6">America/Belize (UTC -6)</option>
                    <option value="77" data-offset="-4">America/Blanc-Sablon (UTC -4)</option>
                    <option value="78" data-offset="-4">America/Boa Vista (UTC -4)</option>
                    <option value="79" data-offset="-5">America/Bogota (UTC -5)</option>
                    <option value="80" data-offset="-7">America/Boise (UTC -7)</option>
                    <option value="81" data-offset="-7">America/Cambridge Bay (UTC -7)</option>
                    <option value="82" data-offset="-4">America/Campo Grande (UTC -4)</option>
                    <option value="83" data-offset="-5">America/Cancun (UTC -5)</option>
                    <option value="84" data-offset="-4">America/Caracas (UTC -4)</option>
                    <option value="85" data-offset="-3">America/Cayenne (UTC -3)</option>
                    <option value="86" data-offset="-5">America/Cayman (UTC -5)</option>
                    <option value="87" data-offset="-6">America/Chicago (UTC -6)</option>
                    <option value="88" data-offset="-6">America/Chihuahua (UTC -6)</option>
                    <option value="89" data-offset="-7">America/Ciudad Juarez (UTC -7)</option>
                    <option value="90" data-offset="-6">America/Costa Rica (UTC -6)</option>
                    <option value="91" data-offset="-7">America/Creston (UTC -7)</option>
                    <option value="92" data-offset="-4">America/Cuiaba (UTC -4)</option>
                    <option value="93" data-offset="-4">America/Curacao (UTC -4)</option>
                    <option value="94" data-offset="0">America/Danmarkshavn (UTC +0)</option>
                    <option value="95" data-offset="-7">America/Dawson (UTC -7)</option>
                    <option value="96" data-offset="-7">America/Dawson Creek (UTC -7)</option>
                    <option value="97" data-offset="-7">America/Denver (UTC -7)</option>
                    <option value="98" data-offset="-5">America/Detroit (UTC -5)</option>
                    <option value="99" data-offset="-4">America/Dominica (UTC -4)</option>
                    <option value="100" data-offset="-7">America/Edmonton (UTC -7)</option>
                    <option value="101" data-offset="-5">America/Eirunepe (UTC -5)</option>
                    <option value="102" data-offset="-6">America/El Salvador (UTC -6)</option>
                    <option value="103" data-offset="-7">America/Fort Nelson (UTC -7)</option>
                    <option value="104" data-offset="-3">America/Fortaleza (UTC -3)</option>
                    <option value="105" data-offset="-4">America/Glace Bay (UTC -4)</option>
                    <option value="106" data-offset="-4">America/Goose Bay (UTC -4)</option>
                    <option value="107" data-offset="-5">America/Grand Turk (UTC -5)</option>
                    <option value="108" data-offset="-4">America/Grenada (UTC -4)</option>
                    <option value="109" data-offset="-4">America/Guadeloupe (UTC -4)</option>
                    <option value="110" data-offset="-6">America/Guatemala (UTC -6)</option>
                    <option value="111" data-offset="-5">America/Guayaquil (UTC -5)</option>
                    <option value="112" data-offset="-4">America/Guyana (UTC -4)</option>
                    <option value="113" data-offset="-4">America/Halifax (UTC -4)</option>
                    <option value="114" data-offset="-5">America/Havana (UTC -5)</option>
                    <option value="115" data-offset="-7">America/Hermosillo (UTC -7)</option>
                    <option value="116" data-offset="-5">America/Indiana/Indianapolis (UTC -5)</option>
                    <option value="117" data-offset="-6">America/Indiana/Knox (UTC -6)</option>
                    <option value="118" data-offset="-5">America/Indiana/Marengo (UTC -5)</option>
                    <option value="119" data-offset="-5">America/Indiana/Petersburg (UTC -5)</option>
                    <option value="120" data-offset="-6">America/Indiana/Tell City (UTC -6)</option>
                    <option value="121" data-offset="-5">America/Indiana/Vevay (UTC -5)</option>
                    <option value="122" data-offset="-5">America/Indiana/Vincennes (UTC -5)</option>
                    <option value="123" data-offset="-5">America/Indiana/Winamac (UTC -5)</option>
                    <option value="124" data-offset="-7">America/Inuvik (UTC -7)</option>
                    <option value="125" data-offset="-5">America/Iqaluit (UTC -5)</option>
                    <option value="126" data-offset="-5">America/Jamaica (UTC -5)</option>
                    <option value="127" data-offset="-9">America/Juneau (UTC -9)</option>
                    <option value="128" data-offset="-5">America/Kentucky/Louisville (UTC -5)</option>
                    <option value="129" data-offset="-5">America/Kentucky/Monticello (UTC -5)</option>
                    <option value="130" data-offset="-4">America/Kralendijk (UTC -4)</option>
                    <option value="131" data-offset="-4">America/La Paz (UTC -4)</option>
                    <option value="132" data-offset="-5">America/Lima (UTC -5)</option>
                    <option value="133" data-offset="-8">America/Los Angeles (UTC -8)</option>
                    <option value="134" data-offset="-4">America/Lower Princes (UTC -4)</option>
                    <option value="135" data-offset="-3">America/Maceio (UTC -3)</option>
                    <option value="136" data-offset="-6">America/Managua (UTC -6)</option>
                    <option value="137" data-offset="-4">America/Manaus (UTC -4)</option>
                    <option value="138" data-offset="-4">America/Marigot (UTC -4)</option>
                    <option value="139" data-offset="-4">America/Martinique (UTC -4)</option>
                    <option value="140" data-offset="-6">America/Matamoros (UTC -6)</option>
                    <option value="141" data-offset="-7">America/Mazatlan (UTC -7)</option>
                    <option value="142" data-offset="-6">America/Menominee (UTC -6)</option>
                    <option value="143" data-offset="-6">America/Merida (UTC -6)</option>
                    <option value="144" data-offset="-9">America/Metlakatla (UTC -9)</option>
                    <option value="145" data-offset="-6">America/Mexico City (UTC -6)</option>
                    <option value="146" data-offset="-3">America/Miquelon (UTC -3)</option>
                    <option value="147" data-offset="-4">America/Moncton (UTC -4)</option>
                    <option value="148" data-offset="-6">America/Monterrey (UTC -6)</option>
                    <option value="149" data-offset="-3">America/Montevideo (UTC -3)</option>
                    <option value="150" data-offset="-4">America/Montserrat (UTC -4)</option>
                    <option value="151" data-offset="-5">America/Nassau (UTC -5)</option>
                    <option value="152" data-offset="-5">America/New York (UTC -5)</option>
                    <option value="153" data-offset="-9">America/Nome (UTC -9)</option>
                    <option value="154" data-offset="-2">America/Noronha (UTC -2)</option>
                    <option value="155" data-offset="-6">America/North Dakota/Beulah (UTC -6)</option>
                    <option value="156" data-offset="-6">America/North Dakota/Center (UTC -6)</option>
                    <option value="157" data-offset="-6">America/North Dakota/New Salem (UTC -6)</option>
                    <option value="158" data-offset="-2">America/Nuuk (UTC -2)</option>
                    <option value="159" data-offset="-6">America/Ojinaga (UTC -6)</option>
                    <option value="160" data-offset="-5">America/Panama (UTC -5)</option>
                    <option value="161" data-offset="-3">America/Paramaribo (UTC -3)</option>
                    <option value="162" data-offset="-7">America/Phoenix (UTC -7)</option>
                    <option value="163" data-offset="-5">America/Port-au-Prince (UTC -5)</option>
                    <option value="164" data-offset="-4">America/Port of Spain (UTC -4)</option>
                    <option value="165" data-offset="-4">America/Porto Velho (UTC -4)</option>
                    <option value="166" data-offset="-4">America/Puerto Rico (UTC -4)</option>
                    <option value="167" data-offset="-3">America/Punta Arenas (UTC -3)</option>
                    <option value="168" data-offset="-6">America/Rankin Inlet (UTC -6)</option>
                    <option value="169" data-offset="-3">America/Recife (UTC -3)</option>
                    <option value="170" data-offset="-6">America/Regina (UTC -6)</option>
                    <option value="171" data-offset="-6">America/Resolute (UTC -6)</option>
                    <option value="172" data-offset="-5">America/Rio Branco (UTC -5)</option>
                    <option value="173" data-offset="-3">America/Santarem (UTC -3)</option>
                    <option value="174" data-offset="-3">America/Santiago (UTC -3)</option>
                    <option value="175" data-offset="-4">America/Santo Domingo (UTC -4)</option>
                    <option value="176" data-offset="-3">America/Sao Paulo (UTC -3)</option>
                    <option value="177" data-offset="-2">America/Scoresbysund (UTC -2)</option>
                    <option value="178" data-offset="-9">America/Sitka (UTC -9)</option>
                    <option value="179" data-offset="-4">America/St Barthelemy (UTC -4)</option>
                    <option value="180" data-offset="-3.5">America/St Johns (UTC -3.5)</option>
                    <option value="181" data-offset="-4">America/St Kitts (UTC -4)</option>
                    <option value="182" data-offset="-4">America/St Lucia (UTC -4)</option>
                    <option value="183" data-offset="-4">America/St Thomas (UTC -4)</option>
                    <option value="184" data-offset="-4">America/St Vincent (UTC -4)</option>
                    <option value="185" data-offset="-6">America/Swift Current (UTC -6)</option>
                    <option value="186" data-offset="-6">America/Tegucigalpa (UTC -6)</option>
                    <option value="187" data-offset="-4">America/Thule (UTC -4)</option>
                    <option value="188" data-offset="-8">America/Tijuana (UTC -8)</option>
                    <option value="189" data-offset="-5">America/Toronto (UTC -5)</option>
                    <option value="190" data-offset="-4">America/Tortola (UTC -4)</option>
                    <option value="191" data-offset="-8">America/Vancouver (UTC -8)</option>
                    <option value="192" data-offset="-7">America/Whitehorse (UTC -7)</option>
                    <option value="193" data-offset="-6">America/Winnipeg (UTC -6)</option>
                    <option value="194" data-offset="-9">America/Yakutat (UTC -9)</option>
                    <option value="195" data-offset="8">Antarctica/Casey (UTC +8)</option>
                    <option value="196" data-offset="7">Antarctica/Davis (UTC +7)</option>
                    <option value="197" data-offset="10">Antarctica/DumontDUrville (UTC +10)</option>
                    <option value="198" data-offset="11">Antarctica/Macquarie (UTC +11)</option>
                    <option value="199" data-offset="5">Antarctica/Mawson (UTC +5)</option>
                    <option value="200" data-offset="13">Antarctica/McMurdo (UTC +13)</option>
                    <option value="201" data-offset="-3">Antarctica/Palmer (UTC -3)</option>
                    <option value="202" data-offset="-3">Antarctica/Rothera (UTC -3)</option>
                    <option value="203" data-offset="3">Antarctica/Syowa (UTC +3)</option>
                    <option value="204" data-offset="0">Antarctica/Troll (UTC +0)</option>
                    <option value="205" data-offset="5">Antarctica/Vostok (UTC +5)</option>
                    <option value="206" data-offset="1">Arctic/Longyearbyen (UTC +1)</option>
                    <option value="207" data-offset="3">Asia/Aden (UTC +3)</option>
                    <option value="208" data-offset="5">Asia/Almaty (UTC +5)</option>
                    <option value="209" data-offset="3">Asia/Amman (UTC +3)</option>
                    <option value="210" data-offset="12">Asia/Anadyr (UTC +12)</option>
                    <option value="211" data-offset="5">Asia/Aqtau (UTC +5)</option>
                    <option value="212" data-offset="5">Asia/Aqtobe (UTC +5)</option>
                    <option value="213" data-offset="5">Asia/Ashgabat (UTC +5)</option>
                    <option value="214" data-offset="5">Asia/Atyrau (UTC +5)</option>
                    <option value="215" data-offset="3">Asia/Baghdad (UTC +3)</option>
                    <option value="216" data-offset="3">Asia/Bahrain (UTC +3)</option>
                    <option value="217" data-offset="4">Asia/Baku (UTC +4)</option>
                    <option value="218" data-offset="7">Asia/Bangkok (UTC +7)</option>
                    <option value="219" data-offset="7">Asia/Barnaul (UTC +7)</option>
                    <option value="220" data-offset="2">Asia/Beirut (UTC +2)</option>
                    <option value="221" data-offset="6">Asia/Bishkek (UTC +6)</option>
                    <option value="222" data-offset="8">Asia/Brunei (UTC +8)</option>
                    <option value="223" data-offset="9">Asia/Chita (UTC +9)</option>
                    <option value="224" data-offset="5.5">Asia/Colombo (UTC +5.5)</option>
                    <option value="225" data-offset="3">Asia/Damascus (UTC +3)</option>
                    <option value="226" data-offset="6">Asia/Dhaka (UTC +6)</option>
                    <option value="227" data-offset="9">Asia/Dili (UTC +9)</option>
                    <option value="228" data-offset="4">Asia/Dubai (UTC +4)</option>
                    <option value="229" data-offset="5">Asia/Dushanbe (UTC +5)</option>
                    <option value="230" data-offset="2">Asia/Famagusta (UTC +2)</option>
                    <option value="231" data-offset="2">Asia/Gaza (UTC +2)</option>
                    <option value="232" data-offset="2">Asia/Hebron (UTC +2)</option>
                    <option value="233" data-offset="7">Asia/Ho Chi Minh (UTC +7)</option>
                    <option value="234" data-offset="8">Asia/Hong Kong (UTC +8)</option>
                    <option value="235" data-offset="7">Asia/Hovd (UTC +7)</option>
                    <option value="236" data-offset="8">Asia/Irkutsk (UTC +8)</option>
                    <option value="237" data-offset="7">Asia/Jakarta (UTC +7)</option>
                    <option value="238" data-offset="9">Asia/Jayapura (UTC +9)</option>
                    <option value="239" data-offset="2">Asia/Jerusalem (UTC +2)</option>
                    <option value="240" data-offset="4.5">Asia/Kabul (UTC +4.5)</option>
                    <option value="241" data-offset="12">Asia/Kamchatka (UTC +12)</option>
                    <option value="242" data-offset="5">Asia/Karachi (UTC +5)</option>
                    <option value="243" data-offset="5.75">Asia/Kathmandu (UTC +5.75)</option>
                    <option value="244" data-offset="9">Asia/Khandyga (UTC +9)</option>
                    <option value="245" data-offset="5.5">Asia/Kolkata (UTC +5.5)</option>
                    <option value="246" data-offset="7">Asia/Krasnoyarsk (UTC +7)</option>
                    <option value="247" data-offset="8">Asia/Kuala Lumpur (UTC +8)</option>
                    <option value="248" data-offset="8">Asia/Kuching (UTC +8)</option>
                    <option value="249" data-offset="3">Asia/Kuwait (UTC +3)</option>
                    <option value="250" data-offset="8">Asia/Macau (UTC +8)</option>
                    <option value="251" data-offset="11">Asia/Magadan (UTC +11)</option>
                    <option value="252" data-offset="8">Asia/Makassar (UTC +8)</option>
                    <option value="253" data-offset="8">Asia/Manila (UTC +8)</option>
                    <option value="254" data-offset="4">Asia/Muscat (UTC +4)</option>
                    <option value="255" data-offset="2">Asia/Nicosia (UTC +2)</option>
                    <option value="256" data-offset="7">Asia/Novokuznetsk (UTC +7)</option>
                    <option value="257" data-offset="7">Asia/Novosibirsk (UTC +7)</option>
                    <option value="258" data-offset="6">Asia/Omsk (UTC +6)</option>
                    <option value="259" data-offset="5">Asia/Oral (UTC +5)</option>
                    <option value="260" data-offset="7">Asia/Phnom Penh (UTC +7)</option>
                    <option value="261" data-offset="7">Asia/Pontianak (UTC +7)</option>
                    <option value="262" data-offset="9">Asia/Pyongyang (UTC +9)</option>
                    <option value="263" data-offset="3">Asia/Qatar (UTC +3)</option>
                    <option value="264" data-offset="5">Asia/Qostanay (UTC +5)</option>
                    <option value="265" data-offset="5">Asia/Qyzylorda (UTC +5)</option>
                    <option value="266" data-offset="3">Asia/Riyadh (UTC +3)</option>
                    <option value="267" data-offset="11">Asia/Sakhalin (UTC +11)</option>
                    <option value="268" data-offset="5">Asia/Samarkand (UTC +5)</option>
                    <option value="269" data-offset="9">Asia/Seoul (UTC +9)</option>
                    <option value="270" data-offset="8">Asia/Shanghai (UTC +8)</option>
                    <option value="271" data-offset="8">Asia/Singapore (UTC +8)</option>
                    <option value="272" data-offset="11">Asia/Srednekolymsk (UTC +11)</option>
                    <option value="273" data-offset="8">Asia/Taipei (UTC +8)</option>
                    <option value="274" data-offset="5">Asia/Tashkent (UTC +5)</option>
                    <option value="275" data-offset="4">Asia/Tbilisi (UTC +4)</option>
                    <option value="276" data-offset="3.5">Asia/Tehran (UTC +3.5)</option>
                    <option value="277" data-offset="6">Asia/Thimphu (UTC +6)</option>
                    <option value="278" data-offset="9">Asia/Tokyo (UTC +9)</option>
                    <option value="279" data-offset="7">Asia/Tomsk (UTC +7)</option>
                    <option value="280" data-offset="8">Asia/Ulaanbaatar (UTC +8)</option>
                    <option value="281" data-offset="6">Asia/Urumqi (UTC +6)</option>
                    <option value="282" data-offset="10">Asia/Ust-Nera (UTC +10)</option>
                    <option value="283" data-offset="7">Asia/Vientiane (UTC +7)</option>
                    <option value="284" data-offset="10">Asia/Vladivostok (UTC +10)</option>
                    <option value="285" data-offset="9">Asia/Yakutsk (UTC +9)</option>
                    <option value="286" data-offset="6.5">Asia/Yangon (UTC +6.5)</option>
                    <option value="287" data-offset="5">Asia/Yekaterinburg (UTC +5)</option>
                    <option value="288" data-offset="4">Asia/Yerevan (UTC +4)</option>
                    <option value="289" data-offset="-1">Atlantic/Azores (UTC -1)</option>
                    <option value="290" data-offset="-4">Atlantic/Bermuda (UTC -4)</option>
                    <option value="291" data-offset="0">Atlantic/Canary (UTC +0)</option>
                    <option value="292" data-offset="-1">Atlantic/Cape Verde (UTC -1)</option>
                    <option value="293" data-offset="0">Atlantic/Faroe (UTC +0)</option>
                    <option value="294" data-offset="0">Atlantic/Madeira (UTC +0)</option>
                    <option value="295" data-offset="0">Atlantic/Reykjavik (UTC +0)</option>
                    <option value="296" data-offset="-2">Atlantic/South Georgia (UTC -2)</option>
                    <option value="297" data-offset="0">Atlantic/St Helena (UTC +0)</option>
                    <option value="298" data-offset="-3">Atlantic/Stanley (UTC -3)</option>
                    <option value="299" data-offset="10.5">Australia/Adelaide (UTC +10.5)</option>
                    <option value="300" data-offset="10">Australia/Brisbane (UTC +10)</option>
                    <option value="301" data-offset="10.5">Australia/Broken Hill (UTC +10.5)</option>
                    <option value="302" data-offset="9.5">Australia/Darwin (UTC +9.5)</option>
                    <option value="303" data-offset="8.75">Australia/Eucla (UTC +8.75)</option>
                    <option value="304" data-offset="11">Australia/Hobart (UTC +11)</option>
                    <option value="305" data-offset="10">Australia/Lindeman (UTC +10)</option>
                    <option value="306" data-offset="11">Australia/Lord Howe (UTC +11)</option>
                    <option value="307" data-offset="11">Australia/Melbourne (UTC +11)</option>
                    <option value="308" data-offset="8">Australia/Perth (UTC +8)</option>
                    <option value="309" data-offset="11">Australia/Sydney (UTC +11)</option>
                    <option value="310" data-offset="1">Europe/Amsterdam (UTC +1)</option>
                    <option value="311" data-offset="1">Europe/Andorra (UTC +1)</option>
                    <option value="312" data-offset="4">Europe/Astrakhan (UTC +4)</option>
                    <option value="313" data-offset="2">Europe/Athens (UTC +2)</option>
                    <option value="314" data-offset="1">Europe/Belgrade (UTC +1)</option>
                    <option value="315" data-offset="1">Europe/Berlin (UTC +1)</option>
                    <option value="316" data-offset="1">Europe/Bratislava (UTC +1)</option>
                    <option value="317" data-offset="1">Europe/Brussels (UTC +1)</option>
                    <option value="318" data-offset="2">Europe/Bucharest (UTC +2)</option>
                    <option value="319" data-offset="1">Europe/Budapest (UTC +1)</option>
                    <option value="320" data-offset="1">Europe/Busingen (UTC +1)</option>
                    <option value="321" data-offset="2">Europe/Chisinau (UTC +2)</option>
                    <option value="322" data-offset="1">Europe/Copenhagen (UTC +1)</option>
                    <option value="323" data-offset="0">Europe/Dublin (UTC +0)</option>
                    <option value="324" data-offset="1">Europe/Gibraltar (UTC +1)</option>
                    <option value="325" data-offset="0">Europe/Guernsey (UTC +0)</option>
                    <option value="326" data-offset="2">Europe/Helsinki (UTC +2)</option>
                    <option value="327" data-offset="0">Europe/Isle of Man (UTC +0)</option>
                    <option value="328" data-offset="3">Europe/Istanbul (UTC +3)</option>
                    <option value="329" data-offset="0">Europe/Jersey (UTC +0)</option>
                    <option value="330" data-offset="2">Europe/Kaliningrad (UTC +2)</option>
                    <option value="331" data-offset="3">Europe/Kirov (UTC +3)</option>
                    <option value="332" data-offset="2">Europe/Kyiv (UTC +2)</option>
                    <option value="333" data-offset="0">Europe/Lisbon (UTC +0)</option>
                    <option value="334" data-offset="1">Europe/Ljubljana (UTC +1)</option>
                    <option value="335" data-offset="0">Europe/London (UTC +0)</option>
                    <option value="336" data-offset="1">Europe/Luxembourg (UTC +1)</option>
                    <option value="337" data-offset="1">Europe/Madrid (UTC +1)</option>
                    <option value="338" data-offset="1">Europe/Malta (UTC +1)</option>
                    <option value="339" data-offset="2">Europe/Mariehamn (UTC +2)</option>
                    <option value="340" data-offset="3">Europe/Minsk (UTC +3)</option>
                    <option value="341" data-offset="1">Europe/Monaco (UTC +1)</option>
                    <option value="342" data-offset="3">Europe/Moscow (UTC +3)</option>
                    <option value="343" data-offset="1">Europe/Oslo (UTC +1)</option>
                    <option value="344" data-offset="1">Europe/Paris (UTC +1)</option>
                    <option value="345" data-offset="1">Europe/Podgorica (UTC +1)</option>
                    <option value="346" data-offset="1">Europe/Prague (UTC +1)</option>
                    <option value="347" data-offset="2">Europe/Riga (UTC +2)</option>
                    <option value="348" data-offset="1">Europe/Rome (UTC +1)</option>
                    <option value="349" data-offset="4">Europe/Samara (UTC +4)</option>
                    <option value="350" data-offset="1">Europe/San Marino (UTC +1)</option>
                    <option value="351" data-offset="1">Europe/Sarajevo (UTC +1)</option>
                    <option value="352" data-offset="4">Europe/Saratov (UTC +4)</option>
                    <option value="353" data-offset="3">Europe/Simferopol (UTC +3)</option>
                    <option value="354" data-offset="1">Europe/Skopje (UTC +1)</option>
                    <option value="355" data-offset="2">Europe/Sofia (UTC +2)</option>
                    <option value="356" data-offset="1">Europe/Stockholm (UTC +1)</option>
                    <option value="357" data-offset="2">Europe/Tallinn (UTC +2)</option>
                    <option value="358" data-offset="1">Europe/Tirane (UTC +1)</option>
                    <option value="359" data-offset="4">Europe/Ulyanovsk (UTC +4)</option>
                    <option value="360" data-offset="1">Europe/Vaduz (UTC +1)</option>
                    <option value="361" data-offset="1">Europe/Vatican (UTC +1)</option>
                    <option value="362" data-offset="1">Europe/Vienna (UTC +1)</option>
                    <option value="363" data-offset="2">Europe/Vilnius (UTC +2)</option>
                    <option value="364" data-offset="3">Europe/Volgograd (UTC +3)</option>
                    <option value="365" data-offset="1">Europe/Warsaw (UTC +1)</option>
                    <option value="366" data-offset="1">Europe/Zagreb (UTC +1)</option>
                    <option value="367" data-offset="1">Europe/Zurich (UTC +1)</option>
                    <option value="368" data-offset="3">Indian/Antananarivo (UTC +3)</option>
                    <option value="369" data-offset="6">Indian/Chagos (UTC +6)</option>
                    <option value="370" data-offset="7">Indian/Christmas (UTC +7)</option>
                    <option value="371" data-offset="6.5">Indian/Cocos (UTC +6.5)</option>
                    <option value="372" data-offset="3">Indian/Comoro (UTC +3)</option>
                    <option value="373" data-offset="5">Indian/Kerguelen (UTC +5)</option>
                    <option value="374" data-offset="4">Indian/Mahe (UTC +4)</option>
                    <option value="375" data-offset="5">Indian/Maldives (UTC +5)</option>
                    <option value="376" data-offset="4">Indian/Mauritius (UTC +4)</option>
                    <option value="377" data-offset="3">Indian/Mayotte (UTC +3)</option>
                    <option value="378" data-offset="4">Indian/Reunion (UTC +4)</option>
                    <option value="379" data-offset="13">Pacific/Apia (UTC +13)</option>
                    <option value="380" data-offset="13">Pacific/Auckland (UTC +13)</option>
                    <option value="381" data-offset="11">Pacific/Bougainville (UTC +11)</option>
                    <option value="382" data-offset="13.75">Pacific/Chatham (UTC +13.75)</option>
                    <option value="383" data-offset="10">Pacific/Chuuk (UTC +10)</option>
                    <option value="384" data-offset="-5">Pacific/Easter (UTC -5)</option>
                    <option value="385" data-offset="11">Pacific/Efate (UTC +11)</option>
                    <option value="386" data-offset="13">Pacific/Fakaofo (UTC +13)</option>
                    <option value="387" data-offset="12">Pacific/Fiji (UTC +12)</option>
                    <option value="388" data-offset="12">Pacific/Funafuti (UTC +12)</option>
                    <option value="389" data-offset="-6">Pacific/Galapagos (UTC -6)</option>
                    <option value="390" data-offset="-9">Pacific/Gambier (UTC -9)</option>
                    <option value="391" data-offset="11">Pacific/Guadalcanal (UTC +11)</option>
                    <option value="392" data-offset="10">Pacific/Guam (UTC +10)</option>
                    <option value="393" data-offset="-10">Pacific/Honolulu (UTC -10)</option>
                    <option value="394" data-offset="13">Pacific/Kanton (UTC +13)</option>
                    <option value="395" data-offset="14">Pacific/Kiritimati (UTC +14)</option>
                    <option value="396" data-offset="11">Pacific/Kosrae (UTC +11)</option>
                    <option value="397" data-offset="12">Pacific/Kwajalein (UTC +12)</option>
                    <option value="398" data-offset="12">Pacific/Majuro (UTC +12)</option>
                    <option value="399" data-offset="-9.5">Pacific/Marquesas (UTC -9.5)</option>
                    <option value="400" data-offset="-11">Pacific/Midway (UTC -11)</option>
                    <option value="401" data-offset="12">Pacific/Nauru (UTC +12)</option>
                    <option value="402" data-offset="-11">Pacific/Niue (UTC -11)</option>
                    <option value="403" data-offset="12">Pacific/Norfolk (UTC +12)</option>
                    <option value="404" data-offset="11">Pacific/Noumea (UTC +11)</option>
                    <option value="405" data-offset="-11">Pacific/Pago Pago (UTC -11)</option>
                    <option value="406" data-offset="9">Pacific/Palau (UTC +9)</option>
                    <option value="407" data-offset="-8">Pacific/Pitcairn (UTC -8)</option>
                    <option value="408" data-offset="11">Pacific/Pohnpei (UTC +11)</option>
                    <option value="409" data-offset="10">Pacific/Port Moresby (UTC +10)</option>
                    <option value="410" data-offset="-10">Pacific/Rarotonga (UTC -10)</option>
                    <option value="411" data-offset="10">Pacific/Saipan (UTC +10)</option>
                    <option value="412" data-offset="-10">Pacific/Tahiti (UTC -10)</option>
                    <option value="413" data-offset="12">Pacific/Tarawa (UTC +12)</option>
                    <option value="414" data-offset="13">Pacific/Tongatapu (UTC +13)</option>
                    <option value="415" data-offset="12">Pacific/Wake (UTC +12)</option>
                    <option value="416" data-offset="12">Pacific/Wallis (UTC +12)</option>
                    <option value="417" data-offset="0">UTC (UTC +0)</option>
                </select>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width float-right" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" onblur="console.log(this)" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" onblur="console.log(this)" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
