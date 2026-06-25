<x-form-field :layout="$layout" input="checkbox" :name="$name" :help="$help" :label="$label" {{ $attributes }}>
    @isset($tooltip)
        <x-slot:tooltip-content>{{ $tooltip }}</x-slot:tooltip-content>
    @endisset
</x-form-field>
