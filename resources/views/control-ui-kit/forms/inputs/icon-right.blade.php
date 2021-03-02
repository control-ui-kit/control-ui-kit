<div {{ $attributes->merge($classes('flex', ['rounded', 'shadow'])) }}>
    {{ $slot }}
    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500">
        <x-dynamic-component :component="$icon" size="w-4 h-4" />
    </span>
</div>
