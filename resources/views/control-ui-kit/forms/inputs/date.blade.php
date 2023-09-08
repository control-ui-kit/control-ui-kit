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
    x-data="Components.flatpickr({
        mode: 'single',
        data: @if($wireModel) @entangle($wireModel){{ $defer.$live }} @else '{{ $value }}' @endif,
        dataFormat: '{{ $dataFormat }}',
        format: '{{ $format }}',
        today: '{{ $today }}',
        close: '{{ $close }}',
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
    })"
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
