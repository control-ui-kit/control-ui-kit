<div {{ $attributes->merge($wrapperClasses())->only('class') }}>
    @if ($icon)
    <x-input-embed icon-left :icon="$icon" :styles="$iconStyles" :icon-size="$iconSize"  />
    @endif
    <input name="{{ $name }}"
           type="text"
           id="{{ $id }}"
           placeholder="{{ $liteFormat }}"
           @if ($value)
               value="{{ $value }}"
           @endif
           {{ $attributes->merge($classes()) }}
           autocomplete="off" />
</div>
<script>
    new Litepicker({
        element: document.getElementById('{{ $id }}'),
        format: '{{ $liteFormat }}',
        minDate: {!! $minDate() !!},
        maxDate: {!! $maxDate() !!},
        singleMode: true,
        allowRepick: true,
        dropdowns: {
            minYear: {!! $minYear() !!},
            maxYear: {!! $maxYear() !!},
            months: true,
            years: 'asc'
        },
        plugins: [{!! $getPluginsList() !!}],
        resetButton: {{ $resetButton ? 'true' : 'false' }},
        scrollToDate: true,
        firstDay: {{ $firstDay }},
        lang: '{{ $lang }}',
    })
</script>
