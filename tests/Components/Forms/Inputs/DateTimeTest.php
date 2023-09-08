<?php

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class DateTimeTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('app.locale', 'en_GB');

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

        Config::set('themes.default.input-date.week-numbers', false);
        Config::set('themes.default.input-date.show-time', false);
        Config::set('themes.default.input-date.show-seconds', false);
        Config::set('themes.default.input-date.time-only', false);
        Config::set('themes.default.input-date.clock-type', 24);
        Config::set('themes.default.input-date.hour-step', 1);
        Config::set('themes.default.input-date.minute-step', 1);
        Config::set('themes.default.input-date.format', 'd/m/Y H:i');
        Config::set('themes.default.input-date.data', 'Y-m-d H:i:S');
        Config::set('themes.default.input-date.icon', 'icon-calendar');

        Config::set('themes.default.input-datetime.show-seconds', false);
        Config::set('themes.default.input-datetime.clock-type', 24);
        Config::set('themes.default.input-datetime.hour-step', 1);
        Config::set('themes.default.input-datetime.minute-step', 1);
        Config::set('themes.default.input-datetime.format', 'd/m/Y H:i');
        Config::set('themes.default.input-datetime.data', 'Y-m-d H:i:s');
        Config::set('themes.default.input-datetime.icon', 'icon-calendar');
    }

    /** @test */
    public function an_input_datetime_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-datetime name="datetime" icon="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', data: '' , dataFormat: 'Y-m-d H:i:S', format: 'd/m/Y H:i', today: 'Today', close: 'Close', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', })" x-modelable="data" wire:ignore
            >
                <input name="datetime_display" x-ref="display" type="text" id="datetime_display" placeholder="DD/MM/YYYY HH:MM" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="datetime" x-ref="data" x-model="data" type="hidden" id="datetime" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_datetime_component_can_be_rendered_including_seconds(): void
    {
        $template = <<<'HTML'
            <x-input-datetime name="datetime" icon="none" show-seconds />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', data: '' , dataFormat: 'Y-m-d H:i:S', format: 'd/m/Y H:i', today: 'Today', close: 'Close', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: true, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', })" x-modelable="data" wire:ignore
            >
                <input name="datetime_display" x-ref="display" type="text" id="datetime_display" placeholder="DD/MM/YYYY HH:MM" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="datetime" x-ref="data" x-model="data" type="hidden" id="datetime" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_datetime_component_can_be_rendered_with_12_hour_clock(): void
    {
        $template = <<<'HTML'
            <x-input-datetime name="datetime" icon="none" clock-type="12" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', data: '' , dataFormat: 'Y-m-d H:i:S', format: 'd/m/Y H:i', today: 'Today', close: 'Close', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: false, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', })" x-modelable="data" wire:ignore
            >
                <input name="datetime_display" x-ref="display" type="text" id="datetime_display" placeholder="DD/MM/YYYY HH:MM" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="datetime" x-ref="data" x-model="data" type="hidden" id="datetime" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_datetime_component_can_be_rendered_with_step_increments(): void
    {
        $template = <<<'HTML'
            <x-input-datetime name="datetime" icon="none" hour-step="6" minute-step="15" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', data: '' , dataFormat: 'Y-m-d H:i:S', format: 'd/m/Y H:i', today: 'Today', close: 'Close', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: true, enableSeconds: false, time_24hr: true, hourIncrement: 6, minuteIncrement: 15, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', })" x-modelable="data" wire:ignore
            >
                <input name="datetime_display" x-ref="display" type="text" id="datetime_display" placeholder="DD/MM/YYYY HH:MM" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="datetime" x-ref="data" x-model="data" type="hidden" id="datetime" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
