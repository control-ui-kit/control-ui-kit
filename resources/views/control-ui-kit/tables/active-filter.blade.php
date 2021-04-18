<div {{ $attributes->merge($classes()) }}>
    <span>{{ $label }}</span>
    <a href="{{ $href }}" class="flex items-center focus:outline-none focus:ring-0">
        <x-dynamic-component :component="$icon" :styles="$iconStyles()" />
    </a>
</div>
