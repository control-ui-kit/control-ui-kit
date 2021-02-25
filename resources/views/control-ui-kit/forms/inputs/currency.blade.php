<input
    name="{{ $name }}"
    type="number"
    id="{{ $id }}"
    step="any"
    @if($value)value="{{ $value }}"@endif
    @if($placeholder)placeholder="{{ $placeholder }}"@endif
    {{ $attributes->merge($classes()) }} />
