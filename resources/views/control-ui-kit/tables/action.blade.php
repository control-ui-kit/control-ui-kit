@if($can)
    @if($href)
        <a href="{{ $href }}" {{ $attributes->merge($classes()) }}>
            <x-dynamic-component :component="$icon" size="w-4.5 h-4.5" />
        </a>
    @else
        <div {{ $attributes->merge($classes($attributes->has('wire:click') || $attributes->has('x-on:click') ? 'cursor-pointer' : '')) }}>
            <x-dynamic-component :component="$icon" size="w-4.5 h-4.5" />
        </div>
    @endif
@endif
