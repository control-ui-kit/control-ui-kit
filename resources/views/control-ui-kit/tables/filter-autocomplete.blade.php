<div
    x-data="{
        onChange(value) {
            fields.{{ $name }}.toggle = fields.{{ $name }}.selected !== fields.{{ $name }}.reset
        },
        toggle() {
            fields.{{ $name }}.toggle = !fields.{{ $name }}.toggle
            fields.{{ $name }}.selected = fields.{{ $name }}.reset
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

    <x-input-autocomplete
        id="{{ $id }}"
        name="{{ $name }}"
        :type="$options['autocomplete']"
        x-on:change="onChange()"
        x-model="fields.{{ $name }}.selected"
    />

{{--    <select id="{{ $id }}" name="{{ $name }}" class="text-sm pr-8 bg-table-filters focus:outline-hidden focus:ring-0 border border-table-filters focus:border-brand text-input flex items-center shrink-0 cursor-pointer h-10 px-2.5 rounded w-max relative"--}}
{{--        {{ $attributes->whereStartsWith('wire:') }}--}}
{{--        x-on:change="onChange()"--}}
{{--        x-model="fields.{{ $name }}.selected"--}}
{{--    >--}}
{{--        <option value="">Please Select</option>--}}
{{--        @foreach ($options as $key => $value)--}}
{{--            <option value="{{ $key }}">{{ $value }}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}

</div>
