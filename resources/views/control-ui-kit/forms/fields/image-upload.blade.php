<x-form-field :layout="$layout" input="image-upload" :name="$name" :help="$help" :label="$label" :value="$value" {{ $attributes }}>
    @isset($tooltip)
        <x-slot:tooltip-content>{{ $tooltip }}</x-slot:tooltip-content>
    @endisset
</x-form-field>
