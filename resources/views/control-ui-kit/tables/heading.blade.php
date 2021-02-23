@if (! $name && ! $href)
<th {{ $attributes->merge($classes()) }}>{{ $slot }}</th>
@elseif (! $name && $href)
<th {{ $attributes->merge($classes())->only('class') }}>
    <a href="{{ $href }}" {{ $attributes->except('class') }}>
        {{ $slot }}
    </a>
</th>
@else
<th {{ $attributes->merge($classes())->only('class') }}>
    <a href="{{ $href }}" {{ $attributes->except('class') }} class="{{ $sortLink }}">
        <span>{{ $slot }}</span>
        <x-dynamic-component :component="$icon" :size="$iconSize" />
    </a>
</th>
@endif
