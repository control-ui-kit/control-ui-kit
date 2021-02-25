@if (! $field && ! $href)
<th {{ $attributes->merge($classes()) }}>{{ $slot }}</th>
@elseif (! $field && $href)
<th {{ $attributes->merge($classes())->only('class') }}>
    <a href="{{ $href }}" {{ $attributes->except('class') }}>{{ $slot }}</a>
</th>
@else
<th {{ $attributes->merge($classes())->only('class') }}>
    <a href="{{ $href }}" {{ $attributes->except('class') }} class="{{ $sortLink }}">
        <span>{{ $slot }}</span>
        <span class="relative flex items-center">
        @if ($isCurrentSort())
            <x-dynamic-component :component="$icon" :size="$iconSize" class="group-hover:opacity-0" />
            <x-dynamic-component :component="$iconAlt" :size="$iconSize" class="opacity-0 group-hover:opacity-100 absolute" />
        @else
            <x-dynamic-component :component="$iconAsc" :size="$iconSize" class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute" />
        @endif
        </span>
    </a>
</th>
@endif
