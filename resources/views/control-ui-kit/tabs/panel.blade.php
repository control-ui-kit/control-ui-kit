<div x-show="showTab == '{{ $id }}'" x-cloak {{ $attributes->merge(['class' => 'py-6']) }}>
    @if ($component)
    <x-dynamic-component component="{{ $component }}" />
    @else
    {{ $slot }}
    @endif
</div>
