<div {{ $attributes->merge($classes()) }}>
    <div class="flex">
        @if ($icon)
        <div class="flex-shrink-0 mr-3">
            <x-dynamic-component :component="$icon" :size="$iconSize" :color="$iconColor" />
        </div>
        @endif
        <div class="flex flex-col space-y-2">
            @if ($title)
            <h3 class="{{ $titleClasses() }}">
                {{ $title }}
            </h3>
            @endif
            <div class="{{ $textClasses() }}">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
