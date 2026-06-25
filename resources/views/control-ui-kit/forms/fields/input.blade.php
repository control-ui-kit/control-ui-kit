<x-form-field :layout="$layout" input="input" :name="$name" :help="$help" :label="$label" {{ $attributes }} :value="$slot->isNotEmpty() ? $slot : $value">
    @isset($tooltip)
        <x-slot:tooltip-content>{{ $tooltip }}</x-slot:tooltip-content>
    @endisset
</x-form-field>
