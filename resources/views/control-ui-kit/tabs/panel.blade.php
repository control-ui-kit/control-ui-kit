<div x-show="showTab == '{{ $id }}'" x-cloak
    {{ $attributes->merge($classes()) }}>
    @if ($dynamicComponent)
    <x-dynamic-component component="{{ $dynamicComponent }}" />
    @else
    {{ $slot }}
    @endif
</div>
