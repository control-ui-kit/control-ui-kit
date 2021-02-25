<input
    name="{{ $name }}"
    type="number"
    id="{{ $id }}"
    step="0.01"
    @if($value)value="{{ $value }}"@endif
    @if($placeholder)placeholder="{{ $placeholder }}"@endif
    {{ $attributes->merge($classes()) }} />
