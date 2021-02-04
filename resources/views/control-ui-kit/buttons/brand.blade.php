@php
$attribs = $attributes->merge([
    'class' => 'bg-button-brand text-button-brand border border-button-brand hover:bg-button-brand-hover hover:text-button-brand-hover hover:border-button-brand-hover'
])
@endphp

<x-button.base
    version="brand"
    :href="$href"
    :icon="$icon"
    :attributes="$attribs"
>{{ $slot }}</x-button.base>
