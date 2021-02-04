<x-input.text
    name="{{ $name }}"
    id="{{ $id }}"
    type="number"
    :value="$value"
    :placeholder="$placeholder"
    :attributes="$attributes->merge([ 'class' => 'w-20'])"
    min="0"
    max="100"
/>
