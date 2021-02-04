@php
$attribs = $attributes->merge([
    'class' => 'bg-button-muted text-button-muted border border-button-muted hover:bg-button-muted-hover hover:text-button-muted-hover hover:border-button-muted-hover'
])
@endphp

<x-button.base
    version="muted"
    :href="$href"
    :icon="$icon"
    :attributes="$attribs"
>{{ $slot }}</x-button.base>
