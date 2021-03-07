<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    @if($placeholder)placeholder="{{ $placeholder }}"@endif
    {{ $attributes->merge($classes()) }}>@if($value){{ $value }}@endif</textarea>
