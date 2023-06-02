<label @if ($for) for="{{ $for }}" @endif {{ $attributes->merge($classes()) }}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        {{ $fallback }}
    @endif
</label>
