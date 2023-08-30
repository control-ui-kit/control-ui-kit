@php
    $wireModel = null;
    $wireKey = null;
    $defer = null;
    $live = null;
    foreach ($attributes as $k => $v) {
        if (str_starts_with($k, 'wire:model')) {
            $wireModel = $v;
            $wireKey = $k;
            $defer = str_contains($k, '.defer') ? '.defer' : '';
            $live = str_contains($k, '.live') ? '.live' : '';
            break;
        }
    }
@endphp
<div {{ $attributes->merge($wrapperClasses())->only(['class', 'x-model']) }}
    x-data="{
    @if($wireModel)
        data: @entangle($wireModel){{ $defer.$live }},
    @else
        data: '{{ $value }}',
    @endif
        display: '',
        picker: null,
        init() {
            this.picker = flatpickr(this.$refs.display, {
                mode: 'single',
                @if ($showTime)
                enableTime: true,
                time_24hr:@if($clockType === '24') true,@else false,@endif
                defaultHour: 0,
                defaultMinute: 0, @endif
                @if ($showTime && $showSeconds)
                enableSeconds: true, @endif
                dateFormat: '{{ $format }}',
                minDate: {!! $minDate() !!},
                maxDate: {!! $maxDate() !!},
                weekNumbers: {{ $weekNumbers ? 'true' : 'false' }},
                allowInput: true,
                onReady: (selectedDates, dateString, picker) => {
                    if (this.data) {
                        picker.setDate(flatpickr.formatDate(flatpickr.parseDate(this.data, '{{ $dataFormat }}'), '{{ $format }}'))
                    }
                },
                onClose: (selectedDates, dateString, picker) => {
                    this.updateData()
                },
                locale: '{{ $locale() }}',
            })
            this.$watch('display', () => {
                if (flatpickr.formatDate(this.picker.selectedDates[0], '{{ $format }}') !== this.display) {
                    this.picker.setDate(this.display)
                    this.data = flatpickr.formatDate(this.picker.selectedDates[0], '{{ $dataFormat }}')
                }
            })
            this.$watch('data', () => {
                if (this.data && flatpickr.formatDate(this.picker.selectedDates[0], '{{ $dataFormat }}') != this.data) {
                    let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, '{{ $dataFormat }}'), '{{ $format }}')
                    this.picker.setDate(display_date)
                    this.display = display_date
                }
            })
        },
        open() {
            this.picker.open()
        },
        updateData() {
            if (this.$refs.display.value) {
                this.data = flatpickr.formatDate(this.picker.selectedDates[0], '{{ $dataFormat }}')
            } else {
                this.data = ''
            }
        }
    }"
    x-modelable="data"
    wire:ignore
>
    @if ($icon)
        <a x-on:click="open()">
            <x-input-embed icon-left :icon="$icon" :styles="$iconStyles" :icon-size="$iconSize"  />
        </a>
    @endif
    <input name="{{ $name }}_display"
           x-ref="display"
           type="text"
           id="{{ $id }}_display"
           placeholder="{{ $displayFormat }}"
           {{ $attributes->except(['x-model' , $wireKey])->merge($classes()) }}
           autocomplete="off"
           x-on:blur="updateData()"
    />
    <input name="{{ $name }}"
           x-ref="data"
           x-model="data"
           type="text"
           id="{{ $id }}"
           {{ $attributes->only('disabled') }}
    />
</div>
