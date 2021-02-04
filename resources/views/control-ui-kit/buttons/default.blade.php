@php
$attribs = $attributes->merge([
    'class' => 'bg-button-default text-button-default border border-button-default hover:bg-button-default-hover hover:text-button-default-hover hover:border-button-default-hover'
])
@endphp

<x-button.base
    version="default"
    :href="$href"
    :icon="$icon"
    :attributes="$attribs"
>{{ $slot }}</x-button.base>
