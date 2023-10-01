<div x-data="Components.inputColorPicker({
        value:{{ $value ? "'" . $value . "'" : 'null' }},
        popup: '{{ $popup }}',
        alpha: {{ $alpha ? 'true' : 'false' }},
        editor: {{ $editor ? 'true' : 'false' }},
        button: {{ $cancelButton ? 'true' : 'false' }},
        onchange: '{{ addslashes($onchange) }}',
    })"
    x-ref="wrapper"
    x-modelable="value"
    {{ $attributes->merge($classes()) }}
>
    <input
        name="{{ $name }}"
        type="text"
        id="{{ $id }}"
        @if($placeholder)placeholder="{{ $placeholder }}"@endif
        x-model.lazy="value"
        x-ref="picker"
        class="{{ $inputClasses() }}"
    />
    <div x-ref="color" class="{{ $colorClasses() }}"></div>
</div>
