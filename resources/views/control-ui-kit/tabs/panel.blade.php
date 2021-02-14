<div x-show="showTab == '{{ $id }}'" x-cloak
    {{ $attributes->merge([ 'class' => "$background $color $padding $border $shadow $rounded"]) }}>
    @if ($dynamicComponent)
    <x-dynamic-component component="{{ $dynamicComponent }}" />
    @else
    {{ $slot }}
    @endif
</div>
