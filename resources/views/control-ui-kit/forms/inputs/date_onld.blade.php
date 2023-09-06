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
            if (this.data === null) {
                this.data = '';
            }
            this.picker = flatpickr(this.$refs.display, {
                mode: 'single',
                @if ($timeOnly)
                noCalendar: true, @endif
                @if ($timeOnly || $showTime)
                enableTime: true,
                time_24hr:@if($clockType === '24') true,@else false,@endif
                defaultHour: 0,
                defaultMinute: 0,
                hourIncrement: {{ $hourStep }},
                minuteIncrement: {{ $minuteStep }},
                enableSeconds:@if ($showSeconds) true,@else false,@endif
                @endif
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
                plugins: [
                    ShortcutButtonsPlugin({
                        button: [
                            {
                                label: '{{ trans('Today') }}'
                            },
                            {
                                label: '{{ trans('Close') }}'
                            }
                        ],
                        onClick: (index, fp) => {
                            let date;
                            switch (index) {
                                case 0:
                                    fp.setDate(new Date())
                                break;
                                case 1:
                                    fp.close()
                                break;
                            }

                        }
                    })
                ],
            })
            this.$watch('display', () => {
                if (this.display && flatpickr.formatDate(this.picker.selectedDates[0], '{{ $format }}') !== this.display) {
                    this.picker.setDate(this.display)
                    this.data = flatpickr.formatDate(this.picker.selectedDates[0], '{{ $dataFormat }}')
                }
            })
            this.$watch('data', () => {
                if (this.data && (this.picker.selectedDates.length === 0 || flatpickr.formatDate(this.picker.selectedDates[0], '{{ $dataFormat }}') != this.data)) {
                    let display_date = flatpickr.formatDate(flatpickr.parseDate(this.data, '{{ $dataFormat }}'), '{{ $format }}')
                    this.picker.setDate(display_date)
                    this.display = display_date
                    if (this.picker.selectedDates[0] === undefined) {
                        this.data = ''
                        this.display = ''
                    }
                } else if (! this.data) {
                    this.picker.setDate(null)
                }
                @if ($linkedTo || $linkedFrom)
                this.updateLinkedDates()
                @endif
            })
            @if ($linkedTo || $linkedFrom)
            $nextTick(() => {
                if (this.data) {
                    let date = flatpickr.formatDate(flatpickr.parseDate(this.data, '{{ $dataFormat }}'), '{{ $format }}')
                    @if ($linkedTo)
                    document.querySelector('#{{ $linkedTo }}_display')._flatpickr.set('minDate', date)
                    @endif
                    @if ($linkedFrom)
                    document.querySelector('#{{ $linkedFrom }}_display')._flatpickr.set('maxDate', date)
                    @endif
                }
            })
            @endif
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
            @if ($linkedTo || $linkedFrom)
            this.updateLinkedDates()
            @endif
        }
        @if ($linkedTo || $linkedFrom)
        , updateLinkedDates() {
            @if ($linkedTo)
            document.querySelector('#{{ $linkedTo }}_display')._flatpickr.set('minDate', this.picker.selectedDates[0])
            @endif
            @if ($linkedFrom)
            document.querySelector('#{{ $linkedFrom }}_display')._flatpickr.set('maxDate', this.picker.selectedDates[0])
            @endif
        }
        @endif
    }"
    x-modelable="data"
    wire:ignore
>
    @if ($langOverride && $lang !== 'en_GB')
        <script src="https://npmcdn.com/flatpickr/dist/l10n/{{ $lang }}.js"></script>
    @endif
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
