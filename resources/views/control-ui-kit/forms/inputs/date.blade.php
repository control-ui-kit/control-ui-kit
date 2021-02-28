<input name="{{ $name }}"
       type="text"
       id="{{ $id }}"
       placeholder="{{ $format }}"
       @if ($value)
           value="{{ $value }}"
       @endif
       {{ $attributes->merge($classes()) }}
       autocomplete="off" />

@if ($range)
<input name="{{ $rangeEndName }}"
       type="text"
       id="{{ $rangeEndId }}"
       placeholder="{{ $format }}"
       @if ($rangeEndValue)
           value="{{ $rangeEndValue }}"
       @endif
       {{ $attributes->merge($classes()) }}
       autocomplete="off" />
@endif

<script>
    @if ($range)
        window["updateStartDate_{{ $rangeEndName }}"] = function(date) {
            window["picker_{{ $name }}"].setStartRange(date);
            window["picker_{{ $rangeEndName }}"].setStartRange(date);
            window["picker_{{ $rangeEndName }}"].setMinDate(date);
        };

        window["updateEndDate_{{ $rangeEndName }}"] = function(date) {
            window["picker_{{ $name }}"].setEndRange(date);
            window["picker_{{ $name }}"].setMaxDate(date);
            window["picker_{{ $rangeEndName }}"].setEndRange(date);
        };
    @endif

    window["picker_{{ $name }}"] = new Pikaday({
        field: document.getElementById("{{ $id }}"),
        format: '{{ $format }}',
        @if ($minDate)
            minDate: moment("{{ $minDate }}", "{{ $format }}").toDate(),
        @endif
        @if ($maxDate)
            maxDate: moment("{{ $maxDate }}", "{{ $format }}").toDate(),
        @endif
        toString(date) {
            let day = date.getDate(moment(date, "{{ $format }}"));
            if (day < 10) {
                day = "0" + day;
            }

            let month = date.getMonth() + 1;
            if (month < 10) {
                month = "0" + month;
            }

            let year = date.getFullYear();

            if ("{{ $format }}" === "DD/MM/YYYY") {
                return `${day}/${month}/${year}`;
            } else if ("{{ $format }}" === "YYYY-MM-DD") {
                return `${year}-${month}-${day}`;
            } else if ("{{ $format }}" === "MM/DD/YYYY") {
                return `${month}/${day}/${year}`;
            }

            return date;
        },
        @if ($range)
            onSelect: function() {
                window["updateStartDate_{{ $rangeEndName }}"](this.getDate());
            }
        @endif
    });

    @if ($range)
        window["picker_{{ $rangeEndName }}"] = new Pikaday({
            field: document.getElementById("{{ $rangeEndId }}"),
            format: '{{ $format }}',
            @if ($minDate)
                minDate: moment("{{ $minDate }}", "{{ $format }}").toDate(),
            @endif
            @if ($maxDate)
                maxDate: moment("{{ $maxDate }}", "{{ $format }}").toDate(),
            @endif
            toString(date) {
                let day = date.getDate(moment(date, "{{ $format }}"));
                if (day < 10) {
                    day = "0" + day;
                }

                let month = date.getMonth() + 1;
                if (month < 10) {
                    month = "0" + month;
                }

                let year = date.getFullYear();

                if ("{{ $format }}" === "DD/MM/YYYY") {
                    return `${day}/${month}/${year}`;
                } else if ("{{ $format }}" === "YYYY-MM-DD") {
                    return `${year}-${month}-${day}`;
                } else if ("{{ $format }}" === "MM/DD/YYYY") {
                    return `${month}/${day}/${year}`;
                }

                return date;
            },
            onSelect: function() {
                window["updateEndDate_{{ $rangeEndName }}"](this.getDate());
            }
        });

        window["updateStartDate_{{ $rangeEndName }}"](window["picker_{{ $name }}"].getDate());
        window["updateEndDate_{{ $rangeEndName }}"](window["picker_{{ $rangeEndName }}"].getDate());
    @endif
</script>
