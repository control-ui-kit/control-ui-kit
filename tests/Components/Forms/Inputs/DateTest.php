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
        Config::set('themes.default.input-date.format', 'd/m/Y');
        Config::set('themes.default.input-date.data', 'Y-m-d');
        Config::set('themes.default.input-date.icon', 'icon-calendar');
    }

    /** @test */
    public function an_input_date_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="foo_display" x-ref="display" type="text" id="bar_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="1 2 3 4 5 6 7 8 9" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="1 2 3 4 5 6 7 8 w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '2039-08-21', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: true, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '2020-01-01', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'd/m/Y', minDate: '01/01/2019', maxDate: '01/01/2021', weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '2020-01-01', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'fr', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '2020-12-23', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'Y-m-d', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'Y-m-d')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'Y-m-d') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="YYYY-MM-DD" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '23/12/2020', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'Y-m-d', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'd/m/Y'), 'Y-m-d')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'd/m/Y'), 'Y-m-d') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="YYYY-MM-DD" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_date_component_can_be_rendered_with_time(): void
    {
        $template = <<<'HTML'
            <x-input-date name="date" icon="none" show-time />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', enableTime: true, time_24hr: true, defaultHour: 0, defaultMinute: 0, hourIncrement: 1, minuteIncrement: 1, enableSeconds: false, dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', noCalendar: true, enableTime: true, time_24hr: true, defaultHour: 0, defaultMinute: 0, hourIncrement: 1, minuteIncrement: 1, enableSeconds: false, dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', enableTime: true, time_24hr: true, defaultHour: 0, defaultMinute: 0, hourIncrement: 1, minuteIncrement: 1, enableSeconds: true, dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', enableTime: true, time_24hr: false, defaultHour: 0, defaultMinute: 0, hourIncrement: 1, minuteIncrement: 1, enableSeconds: false, dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', enableTime: true, time_24hr: true, defaultHour: 0, defaultMinute: 0, hourIncrement: 6, minuteIncrement: 15, enableSeconds: false, dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } this.updateLinkedDates() }) $nextTick(() => { if (this.data) { let date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') document.querySelector('#date_to_display')._flatpickr.set('minDate', date) } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } this.updateLinkedDates() } , updateLinkedDates() { document.querySelector('#date_to_display')._flatpickr.set('minDate', this.picker.selectedDates[0]) } }" x-modelable="data" wire:ignore
            >
                <input name="date_from_display" x-ref="display" type="text" id="date_from_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', dateFormat: 'd/m/Y', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'd/m/Y') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') this.picker.setDate(display_date) this.display = display_date } this.updateLinkedDates() }) $nextTick(() => { if (this.data) { let date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'd/m/Y') document.querySelector('#date_to_display')._flatpickr.set('maxDate', date) } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } this.updateLinkedDates() } , updateLinkedDates() { document.querySelector('#date_to_display')._flatpickr.set('maxDate', this.picker.selectedDates[0]) } }" x-modelable="data" wire:ignore
            >
                <input name="date_to_display" x-ref="display" type="text" id="date_to_display" placeholder="DD/MM/YYYY" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
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
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow width" x-data="{ data: '', display: '', picker: null, init() { this.picker = flatpickr(this.$refs.display, { mode: 'single', enableTime: true, time_24hr: false, defaultHour: 0, defaultMinute: 0, hourIncrement: 1, minuteIncrement: 1, enableSeconds: true, dateFormat: 'm/d/Y h:i:S K', minDate: null, maxDate: null, weekNumbers: false, allowInput: true, onReady: (selectedDates, dateString, picker) =>
                { if (this.data) { picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'm/d/Y h:i:S K')) } }, onClose: (selectedDates, dateString, picker) => { this.updateData() }, locale: 'default', }) this.$watch('display', () => { if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], 'm/d/Y h:i:S K') !== this.display) { this.picker.setDate(this.display) this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } }) this.$watch('data', () => { if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') != this.data)) { let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, 'Y-m-d'), 'm/d/Y h:i:S K') this.picker.setDate(display_date) this.display = display_date } }) }, open() { this.picker.open() }, updateData() { if (this.$refs.display.value) { this.data = flatpickr.formatDate(this.picker.selectedDates[0], 'Y-m-d') } else { this.data = '' } } }" x-modelable="data" wire:ignore
            >
                <input name="date_display" x-ref="display" type="text" id="date_display" placeholder="MM/DD/YYYY HH:MM:SS AM/PM" class="background border color font other padding rounded shadow w-full" autocomplete="off" x-on:blur="updateData()" />
                <input name="date" x-ref="data" x-model="data" type="hidden" id="date" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
