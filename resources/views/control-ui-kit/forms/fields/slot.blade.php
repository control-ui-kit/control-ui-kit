<x-dynamic-component :component="'form-layout-' . $layout" :name="$name" :label="$label" :help="$help" {{ $attributes }}>
    @isset($tooltip)
        <x-slot:tooltip-content>{{ $tooltip }}</x-slot:tooltip-content>
    @endisset
    {{ $slot }}
</x-dynamic-component>
