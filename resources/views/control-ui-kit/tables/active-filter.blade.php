<div {{ $attributes->merge($classes())->only('class')  }}>
    <div>
        <span class="text-active-filter/60">{{ $label }}:</span>
        <span class="text-active-filter">{{ $text }}</span>
    </div>
    <a @if ($href) href="{{ $href }}" @endif class="flex items-center focus:outline-none focus:ring-0 cursor-pointer" {{ $attributes->except('class') }}>
        <x-dynamic-component :component="$icon" :styles="$iconStyles()" />
    </a>
</div>
