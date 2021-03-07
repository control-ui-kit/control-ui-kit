<div {{ $attributes->merge($classes()) }}>
    @if ($icon)<x-dynamic-component :component="$icon" :size="$size" />
    @elseif($slot->isNotEmpty())
    {{ $slot }}
    @endif
</div>
