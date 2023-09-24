<x-dynamic-component :component="'form-layout-' . $layout" :name="$name" :label="$label" :help="$help" {{ $attributes }}>
{{ $slot }}
</x-dynamic-component>
