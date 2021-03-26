<button type="button" {{ $attributes->merge($classes()) }}>
    <span>{{ $label }}</span>
    @if ($icon)
    <x-dynamic-component :component="$icon" :size="$iconSize" :color="$iconColor" />
    @endif
</button>
