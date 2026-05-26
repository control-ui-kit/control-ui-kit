<div
    x-data="{
        toggle() {
            if (fields.{{ $name }}.toggle) {
                fields.{{ $name }}.selected = fields.{{ $name }}.unset
            }
        }
    }"
    x-effect="fields.{{ $name }}.toggle = fields.{{ $name }}.selected !== null && fields.{{ $name }}.selected !== fields.{{ $name }}.unset"
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

    <x-input-autocomplete
        id="{{ $id }}"
        name="{{ $name }}"
        :type="$options['autocomplete']"
        :focus="$options['focus'] ?? null"
        x-model="fields.{{ $name }}.selected"
    />
</div>
