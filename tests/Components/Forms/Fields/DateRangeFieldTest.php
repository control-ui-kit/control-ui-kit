<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class DateRangeFieldTest extends ComponentTestCase
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

    #[Test]
    public function the_field_url_component_can_be_rendered(): void
    {
        $this->withViewErrors(['range' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-date-range name="range" label="range" icon="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="range_display" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>range</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                            <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                            <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_url_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['range' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-date-range name="range" label="range" icon="none" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="range_display" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>range</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                            <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                            <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_url_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['range' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-date-range name="range" label="range" icon="none" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="range_display" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>range</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="Components.flatpickr({ mode: 'range', id: 'range', data: '', dataFormat: 'Y-m-d', format: 'd/m/Y', today: 'Today', close: 'Close', now: 'Now', clear: 'Clear', locale: 'default', weekNumbers: false, noCalendar: false, enableTime: false, enableSeconds: false, time_24hr: 24, hourIncrement: 1, minuteIncrement: 1, minDate: null, maxDate: null, linkedTo: null, linkedFrom: null, separator: '#', offset: '', yearsBefore: 100, yearsAfter: 5, showTimeZones: false, })" x-modelable="data" wire:ignore>
                            <input x-ref="display" type="text" id="range_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" onclick="alert('here')" autocomplete="off" x-on:blur="updateData()" />
                            <input name="range" x-ref="data" x-model="data" type="hidden" id="range" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
