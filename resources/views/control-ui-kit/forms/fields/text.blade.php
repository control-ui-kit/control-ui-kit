<x-form.layouts.inline :name="$name" :help="$help" :label="$label">
    <x-input.text
        :name="$name"
        :id="$id"
        :value="$value"
        :attributes="$attributes->merge(['class' => 'w-full'])"
    />
</x-form.layouts.inline>
