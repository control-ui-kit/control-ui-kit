<input
    name="{{ $name }}"
    type="checkbox"
    id="{{ $id }}"
    value="{{ $value }}"
    {{ $checked }}
    {{ $attributes->merge([ 'class' => 'h-4 w-4 bg-input text-brand focus:ring-brand cursor-pointer border-input']) }}
/>
