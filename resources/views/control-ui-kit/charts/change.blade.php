<div class="{{ $wrapperClasses() }}">
    <div @class(['flex-1', 'flex items-center' => $image])>
        @if ($image)
            <div class="{{ $imageContainerClasses() }}">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" class="{{ $imageStyle ?: $imageClasses() }}">
            </div>
        @elseif ($icon)
            <div class="{{ $iconContainerClasses() }}">
                <x-dynamic-component :component="$icon" size="{{ $iconClasses() }}" />
            </div>
        @endif
        <div class="{{ $containerClasses() }}">
            <p class="{{ $titleClasses() }}">{{ $title }}</p>
            <p class="{{ $numberClasses() }}">
                {{ number_format((float) $current) }}
            </p>
            @if ($increase)
                <p class="{{ $increaseClasses() }}">@if ($increaseIcon && $hideDifferenceIcon !== 'true')<x-dynamic-component :component="$increaseIcon" :class="$differenceIconClasses()" /> @endif+{{ $increase }}</p>
            @elseif ($decrease)
                <p class="{{ $decreaseClasses() }}">@if ($decreaseIcon && $hideDifferenceIcon !== 'true')<x-dynamic-component :component="$decreaseIcon" :class="$differenceIconClasses()" /> @endif-{{ $decrease }}</p>
            @elseif ($previous !== null)
                <p class="text-muted text-xs">{{ trans('control-ui-kit::control-ui-kit.change-chart.no-change') }}</p>
            @endif
        </div>
    </div>

    @if ($link && $linkText)
        <div class="{{ $linkContainerClasses() }}">
            <a href="{{ $link }}" class="{{ $linkClasses() }}">{{ $linkText }}</a>
        </div>
    @endif
</div>
