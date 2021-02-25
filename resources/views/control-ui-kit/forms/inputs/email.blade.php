<input
    name="{{ $name }}"
    type="email"
    id="{{ $id }}"
    @if($value)value="{{ $value }}"@endif
    @if($placeholder)placeholder="{{ $placeholder }}"@endif
    {{ $attributes->merge($classes()) }} />
