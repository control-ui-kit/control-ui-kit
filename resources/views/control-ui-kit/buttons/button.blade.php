<{{ $element }} {!! $href !!} {{ $attributes->merge($classes()) }} {{ $disabled }} {{ $role_type }}="{{ $type }}">
@if($icon)
    <x-dynamic-component :component="$icon" :size="$iconSize" :class="$iconStyles" />
    @if (! $slot->isEmpty())
        <span>{{ $slot }}</span>
    @endif
@else
    {{ $slot }}
@endif
</{{ $element }}>
