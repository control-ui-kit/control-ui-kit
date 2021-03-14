<span {{ $attributes->merge($classes()) }}>
    @if ($slot->isNotEmpty()) {{ $slot }} @else {{ $name }} @endif
</span>
