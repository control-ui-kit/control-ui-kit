<div class="{{ $wrapperClasses() }}">
    <dt>
        @if ($image)

            <div class="{{ $imageContainerClasses() }}">
                <img src="{{ $image }}" alt="Image" class="{{ $imageClasses() }}">
            </div>

        @elseif ($icon)

            <div class="{{ $iconContainerClasses() }}">
                <x-dynamic-component :component="$icon" size="{{ $iconClasses() }}" />
            </div>

        @endif
        <p class="{{ $titleClasses() }}">{{ $title }}</p>
    </dt>
    <dd class="{{ $containerClasses() }}">
        <p class="{{ $numberClasses() }}">
            {{ number_format($current) }}
        </p>
        @if ($increase)

            <p class="{{ $increaseClasses() }}">
                <x-dynamic-component :component="$increaseIcon" :class="$differenceIconClasses()" />
                <span class="sr-only">Increased by</span> {{ $increase }}
            </p>

        @elseif ($decrease)

            <p class="{{ $decreaseClasses() }}">
                <x-dynamic-component :component="$decreaseIcon" :class="$differenceIconClasses()" />
                <span class="sr-only">Decreased by</span> {{ $decrease }}
            </p>

        @endif

        @if ($link && $linkText)

            <div class="{{ $linkContainerClasses() }}">
                <a href="{{ $link }}" class="{{ $linkClasses() }}">{{ $linkText }}</a>
            </div>

        @endif
    </dd>
</div>