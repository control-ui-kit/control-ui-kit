<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class DateFieldTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.label.background', 'label-background');
        Config::set('themes.default.label.border', 'label-border');
        Config::set('themes.default.label.color', 'label-color');
        Config::set('themes.default.label.font', 'label-font');
        Config::set('themes.default.label.other', 'label-other');
        Config::set('themes.default.label.padding', 'label-padding');
        Config::set('themes.default.label.rounded', 'label-rounded');
        Config::set('themes.default.label.shadow', 'label-shadow');

        Config::set('themes.default.error.color', 'color');
        Config::set('themes.default.error.font', 'font');
        Config::set('themes.default.error.other', 'other');
        Config::set('themes.default.error.padding', 'padding');

        Config::set('themes.default.form-layout-responsive.content', 'content-style');
        Config::set('themes.default.form-layout-responsive.help', 'help-style');
        Config::set('themes.default.form-layout-responsive.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-responsive.text', 'text-style');
        Config::set('themes.default.form-layout-responsive.label', 'label-style');
        Config::set('themes.default.form-layout-responsive.required-size', 'required-size');
        Config::set('themes.default.form-layout-responsive.required-color', 'required-color');
        Config::set('themes.default.form-layout-responsive.slot', 'slot-style');
        Config::set('themes.default.form-layout-responsive.wrapper', 'wrapper');

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
    public function the_field_date_component_can_be_rendered(): void
    {
        $this->withViewErrors(['date' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-date name="date" label="date" icon="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="date_display" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>date</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'single', id: 'date', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: true, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: '', linkedFrom: '', separator: '#', offset: '0', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                            <input x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                            <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
