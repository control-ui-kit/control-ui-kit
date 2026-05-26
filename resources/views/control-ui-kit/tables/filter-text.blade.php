<div
    x-data="{
        onChange() {
            fields.{{ $name }}.toggle = fields.{{ $name }}.selected !== fields.{{ $name }}.unset
        },
        toggle() {
            fields.{{ $name }}.toggle = !fields.{{ $name }}.toggle
            fields.{{ $name }}.selected = fields.{{ $name }}.unset
        }
    }"
    class="text-sm flex justify-between items-center mr-2"
>
    <div class="flex space-x-2 items-center m-4">
        <x-input-checkbox
            name="{{ $name }}_toggle"
            x-model="fields.{{ $name }}.toggle"
            x-on:click="toggle()"
        />
        <label for="{{ $name }}_toggle" class="cursor-pointer">{{ $label }}</label>
    </div>

    <input id="{{ $id }}" name="{{ $name }}" type="text"
           class="{{ $filterTextClasses() }}"
           {{ $attributes->whereStartsWith('wire:') }}
           x-model="fields.{{ $name }}.selected"
           x-on:change="onChange()"
    />

</div>
