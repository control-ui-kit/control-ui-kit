<div
    x-data="{
        toggle() {
            if (fields.{{ $name }}.toggle) {
                fields.{{ $name }}.toggle = false
                fields.{{ $name }}.selected = fields.{{ $name }}.unset
            } else {
                fields.{{ $name }}.toggle = true
                fields.{{ $name }}.selected = '{{ $on }}'
            }
        }
    }"
    x-effect="fields.{{ $name }}.toggle = fields.{{ $name }}.selected === '{{ $on }}'"
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

    <x-input-toggle
        id="{{ $id }}"
        name="{{ $name }}"
        on="{{ $on }}"
        off="{{ $off }}"
        x-model="fields.{{ $name }}.selected"
    />

</div>
