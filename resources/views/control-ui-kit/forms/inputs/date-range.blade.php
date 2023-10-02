@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div {{ $attributes->merge($wrapperClasses())->only(['class', 'x-model']) }}
    x-data="Components.flatpickr({
        mode: 'range',
        id: '{{ $id }}',
        data:@if($wireModel) @entangle($wireModel){{ $wireSuffix }} @else '{{ $setValue() }}'@endif,
        dataFormat: '{{ $dataFormat }}',
        format: '{{ $format }}',
        today: '{{ $today }}',
        close: '{{ $close }}',
        now: '{{ $now }}',
        clear: '{{ $clear }}',
        locale: '{{ $locale() }}',
        weekNumbers: {{ $weekNumbers ? 'true' : 'false' }},
        noCalendar: false,
        enableTime: false,
        enableSeconds: false,
        time_24hr: 24,
        hourIncrement: 1,
        minuteIncrement: 1,
        minDate: {!! $minDate() !!},
        maxDate: {!! $maxDate() !!},
        linkedTo: null,
        linkedFrom: null,
        separator: '#',
        offset: '',
        yearsBefore: {{ $yearsBefore }},
        yearsAfter: {{ $yearsAfter }},
        showTimeZones: false,
    })"
    x-modelable="data"
    wire:ignore>
    @if ($langOverride)
        <script src="https://npmcdn.com/flatpickr/dist/l10n/{{ $lang }}.js"></script>
    @endif
    @if ($icon)
        <x-input-embed icon-left :icon="$icon" :styles="$iconStyles" :icon-size="$iconSize" x-on:click="open()" />
    @endif
    <input x-ref="display"
           type="text"
           id="{{ $id }}_display"
           placeholder="{{ $displayFormat }}"
           {{ $attributes->whereDoesntStartWith(['x-model', 'wire:model', 'class'])->merge($classes()) }}
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
