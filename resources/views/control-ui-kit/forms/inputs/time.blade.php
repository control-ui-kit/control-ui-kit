<div
    x-init="init()"
    x-data="{
        time: '',
        output: '{{ $output }}',
        hour: '{{ $hour }}',
        minute: '{{ $minute }}',
        second: '{{ $second ?? 0 }}',
        show_am_pm: {{ $showAmPm ? 'true' : 'false' }},
        show_seconds: {{ $showSeconds ? 'true' : 'false' }},
        am_pm: '{{ $am_pm }}',
        updateTime() {
            const padZero = (value) => (value < 10 ? `0${value}` : value);

            let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour

            this.time = this.output.replace('H', padZero(hour))
                            .replace('h', padZero(hour % 12 || 12))
                            .replace('g', hour % 12 || 12)
                            .replace('i', padZero(this.minute))
                            .replace('s', padZero(this.second))
                            .replace('a', hour >= 12 ? 'pm' : 'am')
                            .replace('A', hour >= 12 ? 'PM' : 'AM');
        },
        init() {
            this.updateTime()
        },
    }"
    {{ $attributes->merge($classes()) }}>
    <x-input-select name="{{ $name }}_hour"
                    :options="$hours"
                    required
                    width="w-16"
                    native
                    x-model="hour"
                    x-on:change="updateTime()"
    />
    <x-input-select name="{{ $name }}_minute"
                    :options="$minutes"
                    required
                    width="w-16"
                    native
                    x-model="minute"
                    x-on:change="updateTime()"
    />
    @if ($showSeconds)
    <x-input-select name="{{ $name }}_second"
                    :options="$seconds"
                    required
                    width="w-16"
                    native
                    x-show="show_seconds"
                    x-model="second"
                    x-on:change="updateTime()"
    />
    @endif
    <x-input-select name="{{ $name }}_am_pm"
                    :options="['am' => 'AM', 'pm' => 'PM']"
                    required
                    width="w-16"
                    native
                    x-show="show_am_pm"
                    x-model="am_pm"
                    x-on:change="updateTime()"
    />
    <input name="{{ $name }}" id="{{ $id }}" type="hidden" x-model="time" />
</div>
