<div {{ $attributes->merge($classes()) }}>
    <span>{{ $label }}</span>
    <a href="{{ $href }}" class="{{ $iconColor }} flex items-center">
        <x-dynamic-component :component="$icon" :size="$iconSize" />
    </a>
</div>
