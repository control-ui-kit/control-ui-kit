<{{ $element }} {!! $href !!} {{ $attributes->merge($classes()) }}>
@if($icon)
    <x-dynamic-component :component="$icon" :size="$iconSize" :class="$iconStyles" />
    @if (! $slot->isEmpty())
        <span>{{ $slot }}</span>
    @endif
@else
    {{ $slot }}
@endif
</{{ $element }}>
