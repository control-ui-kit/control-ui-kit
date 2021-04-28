@if (! $field && ! $href)
<th {{ $attributes->merge($classes()) }}>{{ $slot }}</th>
@elseif (! $field && $href)
<th {{ $attributes->merge($classes())->only('class') }}>
    <a href="{{ $href }}" {{ $attributes->except('class') }} class="{{ $sortLink }}">{{ $slot }}</a>
</th>
@else
<th {{ $attributes->merge($classes())->only('class') }}>
    <a href="{{ $href }}" {{ $attributes->except('class') }} class="{{ $sortLink }}">
        @if (($isCurrentSort() && ($icon || $iconAlt)) || (! $isCurrentSort() && $iconAsc))
            <span>{{ $slot }}</span>
            <span class="flex items-center">
            @if ($isCurrentSort())
                @if($icon)<x-dynamic-component :component="$icon" :size="$iconSize" class="group-hover:opacity-10" />@endif
                @if($iconAlt)<x-dynamic-component :component="$iconAlt" :size="$iconSize" class="opacity-10 group-hover:opacity-100 transition-opacity absolute" />@endif
            @else
                <x-dynamic-component :component="$iconAsc" :size="$iconSize" class="opacity-30 group-hover:opacity-100 transition-opacity duration-200" />
            @endif
            </span>
        @else
            {{ $slot }}
        @endif
    </a>
</th>
@endif
