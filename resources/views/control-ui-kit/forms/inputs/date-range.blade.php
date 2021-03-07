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
        @if ($start)
            minDate: moment("{{ $start }}", "{{ $format }}"),
        @endif
        @if ($end)
            maxDate: moment("{{ $end }}", "{{ $format }}"),
        @endif
        singleMode: false,
        allowRepick: true,
        numberOfColumns: 2,
        numberOfMonths: 2,
        dropdowns: {
            minYear: @if ($start) getYearFromFormat("{{ $start }}", "{{ $format }}") @else new Date().getFullYear() - 15 @endif,
            maxYear: @if ($end) getYearFromFormat("{{ $end }}", "{{ $format }}") @else new Date().getFullYear() + 5 @endif,
            months: true,
            years: "asc"
        },
        resetButton: true,
        scrollToDate: false,
        splitView: true,
        showTooltip: false
    });
</script>
