<td {{ $attributes->merge($classes()) }}>
    @if ($href)<a href="{{ $href }}" class="inline-block">@endif
    @if ($icon) <x-dynamic-component :component="$icon" :size="$iconSize" :class="$iconStyle" /> @endif
    @if ($image)
        <img src="{{ $image }}"
             @if ($imageStyle) class="{{ $imageStyle }}" @endif
             @if ($imageAlt) alt="{{ $imageAlt }}" @endif
        />
    @endif
    @if ($prefix) {{ $prefix }} @endif
    @if ($value) {{ $value }} @else {{ $slot }} @endif
    @if ($suffix) {{ $suffix }} @endif
    @if ($href)</a>@endif
</td>
