@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div {{ $attributes->merge($wrapperClasses())->only(['class', 'x-model']) }}
    x-data="Components.flatpickr({
        mode: 'single',
        id: '{{ $id }}',
        data:@if($wireModel) @entangle($wireModel){{ $wireSuffix }} @else '{{ $value }}'@endif,
        dataFormat: '{{ $dataFormat }}',
        format: '{{ $format }}',
        today: '{{ $today }}',
        close: '{{ $close }}',
        now: '{{ $now }}',
        clear: '{{ $clear }}',
        locale: '{{ $locale() }}',
        weekNumbers: {{ $weekNumbers ? 'true' : 'false' }},
        noCalendar: {{ $timeOnly ? 'true' : 'false' }},
        enableTime: {{ $timeOnly || $showTime ? 'true' : 'false' }},
        enableSeconds: {{ $showSeconds ? 'true' : 'false' }},
        time_24hr: {{ $clockType === '24' ? 'true' : 'false' }},
        hourIncrement: {{ $hourStep }},
        minuteIncrement: {{ $minuteStep }},
        minDate: {!! $minDate() !!},
        maxDate: {!! $maxDate() !!},
        linkedTo: '{{ $linkedTo }}',
        linkedFrom: '{{ $linkedFrom }}',
        separator: '#',
        offset:@if ($timeOnly || $showTime) '{{ $offset }}' @else '0'@endif,
        yearsBefore: {{ $yearsBefore }},
        yearsAfter: {{ $yearsAfter }},
        showTimeZones: {{ $showTimeZones ? 'true' : 'false' }},
    })"
    x-modelable="data"
    wire:ignore>
    @if ($langOverride && $lang !== 'en_GB')
    <script src="https://npmcdn.com/flatpickr/dist/l10n/{{ $lang }}.js"></script>
    @endif
    @if ($icon)
    <a x-on:click="open()">
        <x-input-embed icon-left :icon="$icon" :styles="$iconStyles" :icon-size="$iconSize" />
    </a>
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
    @if (($timeOnly || $showTime) && $showTimeZones)
    <select x-ref="offset" x-model="offset" x-show="showTimeZones" class="{{ $timezoneClasses() }}">
        @foreach($timezones as $key => $timezone)
        <option value="{{ $key }}" data-offset="{{ $timezone['offset'] }}">{{ $timezone['name'] }} (UTC {{ $timezone['formatted'] }})</option>
        @endforeach
    </select>
    @endif
</div>
