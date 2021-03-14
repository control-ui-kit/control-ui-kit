<input
    name="{{ $name }}"
    type="number"
    id="{{ $id }}"
    step="{{ $step }}"
    @if($min)min="{{ $min }}"@endif
    @if($max)max="{{ $max }}"@endif
    @if($value)value="{{ $value }}"@endif
    @if($placeholder)placeholder="{{ $placeholder }}"@endif
    {{ $attributes->merge($classes()) }} />
<script>
    window["field_{{ $id }}"] = document.getElementById('{{ $id }}');

    window["field_{{ $id }}"].addEventListener('blur', () => {
        // If the minimum is set and the value is below minimum, set to minimum
        if (typeof window["field_{{ $id }}"].getAttribute('min') === "string") {
            if (parseInt(window["field_{{ $id }}"].value) < (window["field_{{ $id }}"].getAttribute('min'))) {
                window["field_{{ $id }}"].value = window["field_{{ $id }}"].getAttribute('min');
            }
        }

        // If the maximum is set and the value is above maximum, set to maximum
        if (typeof window["field_{{ $id }}"].getAttribute('max') === "string") {
            if (parseInt(window["field_{{ $id }}"].value) > (window["field_{{ $id }}"].getAttribute('max'))) {
                window["field_{{ $id }}"].value = window["field_{{ $id }}"].getAttribute('max');
            }
        }
    });
</script>

