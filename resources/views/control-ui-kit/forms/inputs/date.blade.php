<input name="{{ $name }}"
       type="text"
       id="{{ $id }}"
       placeholder="{{ $format }}"
       @if ($value)
           value="{{ $value }}"
       @endif
       {{ $attributes->merge($classes()) }}
       autocomplete="off" />
<script>
    new Litepicker({
        element: document.getElementById('{{ $id }}'),
        format: "{{ $format }}",
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
    })
</script>
