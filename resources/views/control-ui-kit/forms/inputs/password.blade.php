<input
    name="{{ $name }}"
    type="password"
    id="{{ $id }}"
    @if($value)value="{{ $value }}"@endif
    @if($placeholder)placeholder="{{ $placeholder }}"@endif
    {{ $attributes->merge($classes()) }} />
