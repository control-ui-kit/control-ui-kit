<div {{ $attributes->merge($classes()) }}>
    <span>{{ $label }}</span>
    <x-dynamic-component :component="$icon" :size="$iconSize" :color="$iconColor" :href="$href" />
</div>
