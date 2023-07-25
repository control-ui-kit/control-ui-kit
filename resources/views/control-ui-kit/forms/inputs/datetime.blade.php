<div class="flex space-x-1 items-center"
    @date-updated.window="setDate(event.detail);"
    x-data="{
        datetime: '',
        output: '{{ $dataFormat }}',
        date: '{{ $date }}',
        year: '{{ $year }}',
        month: '{{ $month }}',
        day: '{{ $day }}',
        hour: '{{ $hour }}',
        minute: '{{ $minute }}',
        second: '{{ $second }}',
        show_am_pm: {{ $showAmPm ? 'true' : 'false' }},
        show_seconds: {{ $showSeconds ? 'true' : 'false' }},
        am_pm: '{{ $am_pm }}',
        setDate(event) {
            if (event.name == '{{ $name }}') {
                this.year = event.year
                this.month = event.month + 1
                this.day = event.day
                this.updateTime()
            }
        },
        updateDateTime() {
            const padZero = (value) => (value < 10 ? `0${value}` : value);

            let hour = (this.show_am_pm && this.hour < 12 && this.am_pm == 'pm') ? parseInt(this.hour) + 12 : this.hour

            this.datetime = this.output
                            .replace('Y', padZero(this.year))
                            .replace('m', padZero(this.month))
                            .replace('d', padZero(this.day))
                            .replace('H', padZero(hour))
                            .replace('h', padZero(hour % 12 || 12))
                            .replace('G', hour)
                            .replace('g', hour % 12 || 12)
                            .replace('i', padZero(this.minute))
                            .replace('s', padZero(this.second))
                            .replace('a', hour >= 12 ? 'pm' : 'am')
                            .replace('A', hour >= 12 ? 'PM' : 'AM');
        },
        init() {
            this.updateDateTime()
        },
    }"
>
    <div {{ $attributes->merge($wrapperClasses())->only('class') }}>
        @if ($icon)
        <x-input-embed icon-left :icon="$icon" :styles="$iconStyles" :icon-size="$iconSize"  />
        @endif
        <input name="{{ $name }}_date"
               type="text"
               id="{{ $id }}_date"
               placeholder="{{ $liteFormat }}"
               @if ($date)
                   value="{{ $date }}"
               @endif
               {{ $attributes->merge($dateClasses('w-40')) }}
               autocomplete="off"
        />
    </div>
    <x-input-select name="{{ $name }}_hour"
                    :options="$hours"
                    required
                    width="w-16"
                    native
                    x-model="hour"
                    x-on:change="updateDateTime()"
    />
    <x-input-select name="{{ $name }}_minute"
                    :options="$minutes"
                    required
                    width="w-16"
                    native
                    x-model="minute"
                    x-on:change="updateDateTime()"
    />
    @if ($showSeconds)
        <x-input-select name="{{ $name }}_second"
                        :options="$seconds"
                        required
                        width="w-16"
                        native
                        x-show="show_seconds"
                        x-model="second"
                        x-on:change="updateDateTime()"
        />
    @endif
    <x-input-select name="{{ $name }}_am_pm"
                    :options="['am' => 'AM', 'pm' => 'PM']"
                    required
                    width="w-16"
                    native
                    x-show="show_am_pm"
                    x-model="am_pm"
                    x-on:change="updateDateTime()"
    />
    <input name="{{ $name }}" id="{{ $id }}" x-model="datetime" type="text" />
</div>
<script>
    new Litepicker({
        element: document.getElementById('{{ $id }}_date'),
        format: "{{ $liteFormat }}",
        minDate: {!! $minDate() !!},
        maxDate: {!! $maxDate() !!},
        singleMode: true,
        allowRepick: true,
        dropdowns: {
            minYear: {!! $minYear() !!},
            maxYear: {!! $maxYear() !!},
            months: true,
            years: "asc"
        },
        plugins: [{!! $getPluginsList() !!}],
        resetButton: {{ $reset }},
        scrollToDate: true,
        firstDay: {{ $firstDay }},
        lang: "{{ $lang }}",
        setup: (picker) => {
            picker.on('selected', (date1, date2) => {
                window.dispatchEvent(new CustomEvent('date-updated', {
                    'detail': {
                        'name': '{{ $name }}',
                        'date': date1,
                        'day': date1.getDate(),
                        'month': date1.getMonth(),
                        'year': date1.getFullYear(),
                    }
                }));
            });
        },
    })
</script>
