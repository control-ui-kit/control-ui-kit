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
    getYearFromFormat = function(date, format) {
        if (format === 'YYYY-MM-DD') {
            return date.substr(0, 4);
        } else if (format === 'MM/DD/YYYY') {
            return date.substr(6, 4);
        }

        return date.substr(6, 4);
    };

    new Litepicker({
        element: document.getElementById('{{ $id }}'),
        format: "{{ $format }}",
        minDate: {!! $minDate() !!},
        maxDate: {!! $maxDate() !!},
        singleMode: false,
        allowRepick: true,
        numberOfColumns: {{ $columns }},
        numberOfMonths: {{ $months }},
        dropdowns: {
            minYear: {!! $minYear() !!},
            maxYear: {!! $maxYear() !!},
            months: true,
            years: "asc"
        },
        plugins: [{!! $getPluginsList() !!}],
        resetButton: {{ $reset }},
        splitView: {{ $split }},
        showTooltip: {{ $tooltip }},
        firstDay: {{ $firstDay }},
        scrollToDate: true,
        lang: "{{ $lang }}",
        @if ($minDate() !== "null")
            setup: function() {
                this.gotoDate("{{ $minDate(true) }}")
            }
        @endif
    });
</script>
