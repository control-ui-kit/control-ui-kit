@props([
    'right' => false,
    'center' => false,
])

@php
if ($right) {
    $align = 'text-right';
} elseif ($center) {
    $align = 'text-center';
} else {
    $align = 'text-left';
}
@endphp

<td {{ $attributes->merge(['class' => 'px-2 py-2 whitespace-no-wrap leading-5 ' . $align]) }}>
    {{ $slot }}
</td>
