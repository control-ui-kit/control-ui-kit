<div class="{{ $wrapperClasses() }}">
    <div @class(['flex-1', 'flex items-center' => $image])>
        @if ($image)
            <div class="{{ $imageContainerClasses() }}">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" class="{{ $imageStyle ?: $imageClasses() }}">
            </div>
        @elseif ($icon)
            <div class="{{ $iconContainerClasses() }}">
                <x-dynamic-component :component="$icon" size="{{ $iconClasses() }}"/>
            </div>
        @endif
        <div class="{{ $containerClasses() }}">
            <p class="{{ $titleClasses() }}">{{ $title }}</p>
            @if ($current > 1000000000)
                @php $fullNumber = $prefix . number_format((float) $current, 0) . $suffix; $current /= 1000000000; $suffix = 'B'; $decimals = 2 @endphp
                <x-tooltip :text="$fullNumber">
                    <p class="{{ $numberClasses() }} cursor-help">
                        {{ $prefix }}{{ number_format((float) $current, $decimals) }}{{ $suffix }}
                    </p>
                </x-tooltip>
            @else
                <p class="{{ $numberClasses() }}">
                    {{ $prefix }}{{ number_format((float) $current, $decimals) }}{{ $suffix }}
                </p>
            @endif
            @if ($increase)
                <p class="{{ $increaseClasses() }}">@if ($increaseIcon && $hideDifferenceIcon !== 'true')
                        <x-dynamic-component :component="$increaseIcon" :class="$differenceIconClasses()"/>
                    @endif+{{ $increase }}</p>
            @elseif ($decrease)
                <p class="{{ $decreaseClasses() }}">@if ($decreaseIcon && $hideDifferenceIcon !== 'true')
                        <x-dynamic-component :component="$decreaseIcon" :class="$differenceIconClasses()"/>
                        @endif-{{ $decrease }}</p>
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
