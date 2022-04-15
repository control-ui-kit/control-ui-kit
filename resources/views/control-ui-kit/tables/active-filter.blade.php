<div {{ $attributes->merge($classes())->only('class')  }}>
    <span>{{ $label }}</span>
    <a @if ($href) href="{{ $href }}" @endif class="flex items-center focus:outline-none focus:ring-0 cursor-pointer" {{ $attributes->except('class') }}>
        <x-dynamic-component :component="$icon" :styles="$iconStyles()" />
    </a>
</div>
