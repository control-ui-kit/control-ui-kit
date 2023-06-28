<{{ $element }} {!! $href !!} {{ $attributes->merge($classes()) }} {{ $disabled }} {!! $action !!} {{ $role_type }}="{{ $type }}">
@if($icon)
    <x-dynamic-component :component="$icon" :size="$iconSize" :class="$iconStyles" />
    @if ($slot->isNotEmpty())
        <span>{{ $slot }}</span>
    @elseif ($text)
        <span>{{ $text }}</span>
    @endif
@else
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @elseif ($text)
        {{ $text }}
    @endif
@endif
</{{ $element }}>
