@if (isset($sub_text) || isset($sub_url))
    <div {{ $attributes->merge($classes('flex justify-between')) }}>
        <h3>{{ $slot }}</h3>
        @isset($sub_url)
            <a href="{{ $sub_url }}" class="text-brand hover:text-brand-hover">{{ $sub_text }}</a>
        @else
            <span>{{ $sub_text }}</span>
        @endif
    </div>
@else
    <h3 {{ $attributes->merge($classes()) }}>{{ $slot }}</h3>
@endisset

