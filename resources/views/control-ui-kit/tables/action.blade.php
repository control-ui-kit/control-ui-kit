@if($href !== '')
<a href="{{ $href }}" {{ $attributes->merge($classes()) }}>
    <x-dynamic-component :component="$icon" />
</a>
@else
<div {{ $attributes->merge($classes()) }}>
    <x-dynamic-component :component="$icon" />
</div>
@endif
