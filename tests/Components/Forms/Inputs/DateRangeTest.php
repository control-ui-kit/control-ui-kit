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

        Config::set('app.locale', 'en_GB');

        Config::set('themes.default.input-date-range.background', 'background');
        Config::set('themes.default.input-date-range.border', 'border');
        Config::set('themes.default.input-date-range.color', 'color');
        Config::set('themes.default.input-date-range.font', 'font');
        Config::set('themes.default.input-date-range.other', 'other');
        Config::set('themes.default.input-date-range.padding', 'padding');
        Config::set('themes.default.input-date-range.rounded', 'rounded');
        Config::set('themes.default.input-date-range.shadow', 'shadow');
        Config::set('themes.default.input-date-range.width', 'width');

        Config::set('themes.default.input-date-range.icon-background', 'icon-background');
        Config::set('themes.default.input-date-range.icon-border', 'icon-border');
        Config::set('themes.default.input-date-range.icon-color', 'icon-color');
        Config::set('themes.default.input-date-range.icon-font', 'icon-font');
        Config::set('themes.default.input-date-range.icon-other', 'icon-other');
        Config::set('themes.default.input-date-range.icon-padding', 'icon-padding');
        Config::set('themes.default.input-date-range.icon-rounded', 'icon-rounded');
        Config::set('themes.default.input-date-range.icon-shadow', 'icon-shadow');

        Config::set('themes.default.input.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input.wrapper-width', 'wrapper-width');

        Config::set('themes.default.input-date-range.week-numbers', false);
        Config::set('themes.default.input-date-range.format', 'd/m/Y');
        Config::set('themes.default.input-date-range.data', 'Y-m-d');
        Config::set('themes.default.input-date-range.icon', 'icon-calendar');
        Config::set('themes.default.input-date-range.separator', '#');
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered_with_specific_id(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" id="date_range" icon="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'date_range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="date_range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="date_range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8 9" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="1 2 3 4 5 6 7 8 w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered_with_passed_in_string_date_range(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" value="2021-01-05#2021-01-10" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '2021-01-05#2021-01-10', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered_with_passed_in_array_date_range(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" :value="['2021-01-05', '2021-01-10']" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '2021-01-05#2021-01-10', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered_with_passed_in_individual_dates_for_range(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" from="2021-01-05" to="2021-01-10" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '2021-01-05#2021-01-10', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_input_date_range_component_will_rendered_with_week_numbers(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" week-numbers />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: true, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_input_date_range_component_will_render_with_language_changed(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" lang="fr" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'fr', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
                <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_input_date_range_component_will_render_with_a_different_display_format(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" format="Y-m-d" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'Y-m-d', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="YYYY-MM-DD" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_will_render_with_different_data_format(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" format="Y-m-d" data="d/m/Y" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'd/m/Y', format: 'Y-m-d', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="YYYY-MM-DD" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width float-right" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_range_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-date-range name="range" icon="none" onblur="console.log(this)" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" onblur="console.log(this)" autocomplete="off" x-on:blur="updateData()" />
                <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
