<?php

namespace Tests\Components\Forms\Inputs;

use ControlUIKit\Components\Forms\Inputs\Time;
use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class TimeManualTest extends ComponentTestCase
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

    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_24_hour_clock(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '0', minute: '0', second: '0', show_am_pm: false, show_seconds: false, am_pm: 'am', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="1"> 01 </option>
                        <option value="2"> 02 </option>
                        <option value="3"> 03 </option>
                        <option value="4"> 04 </option>
                        <option value="5"> 05 </option>
                        <option value="6"> 06 </option>
                        <option value="7"> 07 </option>
                        <option value="8"> 08 </option>
                        <option value="9"> 09 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                        <option value="12"> 12 </option>
                        <option value="13"> 13 </option>
                        <option value="14"> 14 </option>
                        <option value="15"> 15 </option>
                        <option value="16"> 16 </option>
                        <option value="17"> 17 </option>
                        <option value="18"> 18 </option>
                        <option value="19"> 19 </option>
                        <option value="20"> 20 </option>
                        <option value="21"> 21 </option>
                        <option value="22"> 22 </option>
                        <option value="23"> 23 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="15"> 15 </option>
                        <option value="30"> 30 </option>
                        <option value="45"> 45 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_12_hour_clock_and_am_time(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" show-am-pm value="09:46" />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '9', minute: '46', second: '0', show_am_pm: true, show_seconds: false, am_pm: 'am', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="1"> 01 </option>
                        <option value="2"> 02 </option>
                        <option value="3"> 03 </option>
                        <option value="4"> 04 </option>
                        <option value="5"> 05 </option>
                        <option value="6"> 06 </option>
                        <option value="7"> 07 </option>
                        <option value="8"> 08 </option>
                        <option value="9"> 09 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="15"> 15 </option>
                        <option value="30"> 30 </option>
                        <option value="45"> 45 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_12_hour_clock_and_pm_time(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" show-am-pm value="21:46" />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '9', minute: '46', second: '0', show_am_pm: true, show_seconds: false, am_pm: 'pm', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="1"> 01 </option>
                        <option value="2"> 02 </option>
                        <option value="3"> 03 </option>
                        <option value="4"> 04 </option>
                        <option value="5"> 05 </option>
                        <option value="6"> 06 </option>
                        <option value="7"> 07 </option>
                        <option value="8"> 08 </option>
                        <option value="9"> 09 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="15"> 15 </option>
                        <option value="30"> 30 </option>
                        <option value="45"> 45 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_string_hours_and_minute_options(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" hours="0,6,12,18" minutes="0,20,40" />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '0', minute: '0', second: '0', show_am_pm: false, show_seconds: false, am_pm: 'am', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="6"> 06 </option>
                        <option value="12"> 12 </option>
                        <option value="18"> 18 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="20"> 20 </option>
                        <option value="40"> 40 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_array_hours_and_minute_options(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" :hours="[0,6,12,18]" :minutes="[0,20,40]" />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '0', minute: '0', second: '0', show_am_pm: false, show_seconds: false, am_pm: 'am', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="6"> 06 </option>
                        <option value="12"> 12 </option>
                        <option value="18"> 18 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="20"> 20 </option>
                        <option value="40"> 40 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_us_time_format(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" format="g:i A" />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '0', minute: '0', second: '0', show_am_pm: true, show_seconds: false, am_pm: 'am', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="1"> 01 </option>
                        <option value="2"> 02 </option>
                        <option value="3"> 03 </option>
                        <option value="4"> 04 </option>
                        <option value="5"> 05 </option>
                        <option value="6"> 06 </option>
                        <option value="7"> 07 </option>
                        <option value="8"> 08 </option>
                        <option value="9"> 09 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="15"> 15 </option>
                        <option value="30"> 30 </option>
                        <option value="45"> 45 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_gb_time_format(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" format="H:i" />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '0', minute: '0', second: '0', show_am_pm: false, show_seconds: false, am_pm: 'am', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="1"> 01 </option>
                        <option value="2"> 02 </option>
                        <option value="3"> 03 </option>
                        <option value="4"> 04 </option>
                        <option value="5"> 05 </option>
                        <option value="6"> 06 </option>
                        <option value="7"> 07 </option>
                        <option value="8"> 08 </option>
                        <option value="9"> 09 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                        <option value="12"> 12 </option>
                        <option value="13"> 13 </option>
                        <option value="14"> 14 </option>
                        <option value="15"> 15 </option>
                        <option value="16"> 16 </option>
                        <option value="17"> 17 </option>
                        <option value="18"> 18 </option>
                        <option value="19"> 19 </option>
                        <option value="20"> 20 </option>
                        <option value="21"> 21 </option>
                        <option value="22"> 22 </option>
                        <option value="23"> 23 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="15"> 15 </option>
                        <option value="30"> 30 </option>
                        <option value="45"> 45 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_system_time_format(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" format="H:i:s" />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '0', minute: '0', second: '0', show_am_pm: false, show_seconds: false, am_pm: 'am', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="1"> 01 </option>
                        <option value="2"> 02 </option>
                        <option value="3"> 03 </option>
                        <option value="4"> 04 </option>
                        <option value="5"> 05 </option>
                        <option value="6"> 06 </option>
                        <option value="7"> 07 </option>
                        <option value="8"> 08 </option>
                        <option value="9"> 09 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                        <option value="12"> 12 </option>
                        <option value="13"> 13 </option>
                        <option value="14"> 14 </option>
                        <option value="15"> 15 </option>
                        <option value="16"> 16 </option>
                        <option value="17"> 17 </option>
                        <option value="18"> 18 </option>
                        <option value="19"> 19 </option>
                        <option value="20"> 20 </option>
                        <option value="21"> 21 </option>
                        <option value="22"> 22 </option>
                        <option value="23"> 23 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="15"> 15 </option>
                        <option value="30"> 30 </option>
                        <option value="45"> 45 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_seconds(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" show-seconds />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '0', minute: '0', second: '0', show_am_pm: false, show_seconds: true, am_pm: 'am', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="1"> 01 </option>
                        <option value="2"> 02 </option>
                        <option value="3"> 03 </option>
                        <option value="4"> 04 </option>
                        <option value="5"> 05 </option>
                        <option value="6"> 06 </option>
                        <option value="7"> 07 </option>
                        <option value="8"> 08 </option>
                        <option value="9"> 09 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                        <option value="12"> 12 </option>
                        <option value="13"> 13 </option>
                        <option value="14"> 14 </option>
                        <option value="15"> 15 </option>
                        <option value="16"> 16 </option>
                        <option value="17"> 17 </option>
                        <option value="18"> 18 </option>
                        <option value="19"> 19 </option>
                        <option value="20"> 20 </option>
                        <option value="21"> 21 </option>
                        <option value="22"> 22 </option>
                        <option value="23"> 23 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="15"> 15 </option>
                        <option value="30"> 30 </option>
                        <option value="45"> 45 </option>
                    </select>
                    <select id="time_second" name="time_second" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_seconds" x-model="second" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="1"> 01 </option>
                        <option value="2"> 02 </option>
                        <option value="3"> 03 </option>
                        <option value="4"> 04 </option>
                        <option value="5"> 05 </option>
                        <option value="6"> 06 </option>
                        <option value="7"> 07 </option>
                        <option value="8"> 08 </option>
                        <option value="9"> 09 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                        <option value="12"> 12 </option>
                        <option value="13"> 13 </option>
                        <option value="14"> 14 </option>
                        <option value="15"> 15 </option>
                        <option value="16"> 16 </option>
                        <option value="17"> 17 </option>
                        <option value="18"> 18 </option>
                        <option value="19"> 19 </option>
                        <option value="20"> 20 </option>
                        <option value="21"> 21 </option>
                        <option value="22"> 22 </option>
                        <option value="23"> 23 </option>
                        <option value="24"> 24 </option>
                        <option value="25"> 25 </option>
                        <option value="26"> 26 </option>
                        <option value="27"> 27 </option>
                        <option value="28"> 28 </option>
                        <option value="29"> 29 </option>
                        <option value="30"> 30 </option>
                        <option value="31"> 31 </option>
                        <option value="32"> 32 </option>
                        <option value="33"> 33 </option>
                        <option value="34"> 34 </option>
                        <option value="35"> 35 </option>
                        <option value="36"> 36 </option>
                        <option value="37"> 37 </option>
                        <option value="38"> 38 </option>
                        <option value="39"> 39 </option>
                        <option value="40"> 40 </option>
                        <option value="41"> 41 </option>
                        <option value="42"> 42 </option>
                        <option value="43"> 43 </option>
                        <option value="44"> 44 </option>
                        <option value="45"> 45 </option>
                        <option value="46"> 46 </option>
                        <option value="47"> 47 </option>
                        <option value="48"> 48 </option>
                        <option value="49"> 49 </option>
                        <option value="50"> 50 </option>
                        <option value="51"> 51 </option>
                        <option value="52"> 52 </option>
                        <option value="53"> 53 </option>
                        <option value="54"> 54 </option>
                        <option value="55"> 55 </option>
                        <option value="56"> 56 </option>
                        <option value="57"> 57 </option>
                        <option value="58"> 58 </option>
                        <option value="59"> 59 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_string_seconds(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" show-seconds seconds="0,10,20,30,40,50" />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '0', minute: '0', second: '0', show_am_pm: false, show_seconds: true, am_pm: 'am', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="1"> 01 </option>
                        <option value="2"> 02 </option>
                        <option value="3"> 03 </option>
                        <option value="4"> 04 </option>
                        <option value="5"> 05 </option>
                        <option value="6"> 06 </option>
                        <option value="7"> 07 </option>
                        <option value="8"> 08 </option>
                        <option value="9"> 09 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                        <option value="12"> 12 </option>
                        <option value="13"> 13 </option>
                        <option value="14"> 14 </option>
                        <option value="15"> 15 </option>
                        <option value="16"> 16 </option>
                        <option value="17"> 17 </option>
                        <option value="18"> 18 </option>
                        <option value="19"> 19 </option>
                        <option value="20"> 20 </option>
                        <option value="21"> 21 </option>
                        <option value="22"> 22 </option>
                        <option value="23"> 23 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="15"> 15 </option>
                        <option value="30"> 30 </option>
                        <option value="45"> 45 </option>
                    </select>
                    <select id="time_second" name="time_second" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_seconds" x-model="second" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="10"> 10 </option>
                        <option value="20"> 20 </option>
                        <option value="30"> 30 </option>
                        <option value="40"> 40 </option>
                        <option value="50"> 50 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_time_component_can_be_rendered_with_array_seconds(): void
    {
        $template = <<<'HTML'
            <x-input-time-manual name="time" show-seconds :seconds="[0,10,20,30,40,50]" />
            HTML;

        $expected = <<<'HTML'
            <div x-init="init()" x-data="{ time: '', output: 'H:i:s', hour: '0', minute: '0', second: '0', show_am_pm: false, show_seconds: true, am_pm: 'am', updateTime() { const padZero = (value) =>
                (value
                < 10 ? `0${value}` : value); let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour this.time = this.output.replace('H', padZero(hour)) .replace('G', hour) .replace('h', padZero(hour % 12 || 12)) .replace('g', hour % 12 || 12) .replace('i', padZero(this.minute)) .replace('s', padZero(this.second)) .replace('a', hour>
                    = 12 ? 'pm' : 'am') .replace('A', hour>= 12 ? 'PM' : 'AM'); }, init() { this.updateTime() }, }" class="flex items-center space-x-1">
                    <select id="time_hour" name="time_hour" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="hour" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="1"> 01 </option>
                        <option value="2"> 02 </option>
                        <option value="3"> 03 </option>
                        <option value="4"> 04 </option>
                        <option value="5"> 05 </option>
                        <option value="6"> 06 </option>
                        <option value="7"> 07 </option>
                        <option value="8"> 08 </option>
                        <option value="9"> 09 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                        <option value="12"> 12 </option>
                        <option value="13"> 13 </option>
                        <option value="14"> 14 </option>
                        <option value="15"> 15 </option>
                        <option value="16"> 16 </option>
                        <option value="17"> 17 </option>
                        <option value="18"> 18 </option>
                        <option value="19"> 19 </option>
                        <option value="20"> 20 </option>
                        <option value="21"> 21 </option>
                        <option value="22"> 22 </option>
                        <option value="23"> 23 </option>
                    </select>
                    <select id="time_minute" name="time_minute" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-model="minute" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="15"> 15 </option>
                        <option value="30"> 30 </option>
                        <option value="45"> 45 </option>
                    </select>
                    <select id="time_second" name="time_second" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_seconds" x-model="second" x-on:change="updateTime()">
                        <option value="0" selected> 00 </option>
                        <option value="10"> 10 </option>
                        <option value="20"> 20 </option>
                        <option value="30"> 30 </option>
                        <option value="40"> 40 </option>
                        <option value="50"> 50 </option>
                    </select>
                    <select id="time_am_pm" name="time_am_pm" class="bg-input border border-input focus:border-input focus:outline-none focus:ring-1 focus:ring-brand text-input text-sm flex items-center cursor-pointer space-x-2 py-1.5 px-3 rounded w-16" x-show="show_am_pm" x-model="am_pm" x-on:change="updateTime()">
                        <option value="am" selected> AM </option>
                        <option value="pm"> PM </option>
                    </select>
                    <input name="time" id="time" type="hidden" x-model="time" />
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
