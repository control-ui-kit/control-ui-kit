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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: true, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: true, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: false, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 6, minuteIncrement: 15, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'm/d/Y h:i:S K', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: true, time_24hr: false, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0' , yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
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
                    <option value="0" data-offset="0">UTC (UTC +0)</option>
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
                    <option value="0" data-offset="0">UTC (UTC +0)</option>
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
                    <option value="0" data-offset="0">UTC (UTC +0)</option>
                </select>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
