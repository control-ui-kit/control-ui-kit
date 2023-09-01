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
        data: '{{ $setValue() }}',
    @endif
        display: '',
        picker: null,
        separator: '{{ $separator }}',
        init() {
            this.picker = flatpickr(this.$refs.display, {
                mode: 'range',
                dateFormat: '{{ $format }}',
                minDate: {!! $minDate() !!},
                maxDate: {!! $maxDate() !!},
                weekNumbers: {{ $weekNumbers ? 'true' : 'false' }},
                allowInput: true,
                onReady: (selectedDates, dateString, picker) => {
                    if (this.data) {
                        let dates = this.data.split(this.separator)
                        picker.setDate([
                            flatpickr.formatDate(flatpickr.parseDate(dates[0], '{{ $dataFormat }}'), '{{ $format }}'),
                            flatpickr.formatDate(flatpickr.parseDate(dates[1], '{{ $dataFormat }}'), '{{ $format }}'),
                        ])
                    }
                },
                onClose: (selectedDates, dateString, picker) => {
                    this.updateData()
                },
                locale: '{{ $locale() }}',
            })
            this.$watch('display', () => {
                if (flatpickr.formatDate(this.picker.selectedDates[0], '{{ $format }}') + this.separator + flatpickr.formatDate(this.picker.selectedDates[1], '{{ $format }}') !== this.display) {
                    this.picker.setDate(this.display)
                    this.data_from = flatpickr.formatDate(this.picker.selectedDates[0], '{{ $dataFormat }}')
                    this.data_to = flatpickr.formatDate(this.picker.selectedDates[1], '{{ $dataFormat }}')
                    this.data = this.data_from + '{{ $separator }}' + this.data_to
                }
            })
            this.$watch('data', () => {
                if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], '{{ $dataFormat }}') + '{{ $separator }}' + flatpickr.formatDate(this.picker.selectedDates[1], '{{ $dataFormat }}') != this.data)) {
                    let dates = this.data.split(this.separator)
                    let display_date = flatpickr.formatDate(flatpickr.parseDate(dates[0], '{{ $dataFormat }}'), '{{ $format }}') + this.picker.l10n.rangeSeparator + flatpickr.formatDate(flatpickr.parseDate(dates[1], '{{ $dataFormat }}'), '{{ $format }}')
                    this.picker.setDate(display_date)
                    this.display = display_date
                }
            })
        },
        open() {
            this.picker.open()
        },
        updateData() {
            if (this.$refs.display.value && this.picker.selectedDates.length == 2) {
                this.data_from = flatpickr.formatDate(this.picker.selectedDates[0], '{{ $dataFormat }}')
                this.data_to = flatpickr.formatDate(this.picker.selectedDates[1], '{{ $dataFormat }}')
                this.data = this.data_from + '{{ $separator }}' + this.data_to
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
           type="hidden"
           id="{{ $id }}"
        {{ $attributes->only('disabled') }}
    />
</div>
