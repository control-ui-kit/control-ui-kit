<label for="{{ $for }}" {{ $attributes->merge($classes()) }}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        {{ $fallback }}
    @endif
</label>
