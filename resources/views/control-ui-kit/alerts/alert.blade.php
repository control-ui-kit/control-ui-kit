<div {{ $attributes->merge($classes()) }}>
    <div class="flex">
        @if ($icon)
        <div class="shrink-0 mr-3">
            <x-dynamic-component :component="$icon" :size="$iconSize" :color="$iconColor" />
        </div>
        @endif
        <div class="flex flex-col space-y-2">
            @if ($title)
            <h3 class="{{ $titleClasses() }}">
                {{ $title }}
            </h3>
            @endif
            @if ($text || $slot->isNotEmpty())
            <div class="{{ $textClasses() }}">
                @if ($text) {{ $text }}
                @else {{ $slot }}
                @endif
            </div>
            @endif
            @if($urls)
            <div class="flex items-center space-x-3">
                @foreach ($urls as $url)
                <a href="{{ $url['url'] }}" class="{{ $urlClasses() }}">
                    {{ $url['text'] }}
                </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
