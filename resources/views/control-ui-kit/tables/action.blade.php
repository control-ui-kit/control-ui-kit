@if($href !== '')
<a href="{{ $href }}" {{ $attributes->merge($classes()) }}>
    <x-dynamic-component :component="$icon" />
</a>
@else
<div {{ $attributes->merge($classes($attributes->has('wire:click') || $attributes->has('x-on:click') ? 'cursor-pointer' : '')) }}>
    <x-dynamic-component :component="$icon" />
</div>
@endif
