<span
    :class="{
        '{{ $styles['text-selected'] }}': value === '{{ $value }}',
        '{{ $styles['text-unselected'] }}': !(value === '{{ $value }}')
    }"
    class="{{ $styles['text-styles'] }}"
>{{ $text }}</span>
@if ($subtext)
<span
    :class="{
        '{{ $styles['subtext-selected'] }}': selected === '{{ $value }}',
        '{{ $styles['subtext-unselected'] }}': !(selected === '{{ $value }}')
    }"
    class="{{ $styles['subtext-styles'] }}"
>{{ $subtext }}</span>
@endif
