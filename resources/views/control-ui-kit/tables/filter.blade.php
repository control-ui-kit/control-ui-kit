<div x-data="{ show: false }">
    <button type="button" {{ $attributes->merge($classes()) }} @click="show = !show">
        <span>{{ $label }}</span>
        @if ($icon)
        <x-dynamic-component :component="$icon" :size="$iconSize" :color="$iconColor" />
        @endif
    </button>
    <div x-show="show" class="absolute flex flex-col z-50 shadow-md rounded bg-nav-option border border-nav">
        {{ $slot }}
    </div>
</div>
