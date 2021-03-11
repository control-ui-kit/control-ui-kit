<td {{ $attributes->merge($classes()) }}>
    @if ($href)<a href="{{ $href }}">@endif
    @if ($icon)
        <x-dynamic-component :component="$icon" :size="$iconSize" />
    @endif
    @if ($prefix) {{ $prefix }} @endif
    @if ($value) {{ $value }} @else {{ $slot }} @endif
    @if ($suffix) {{ $suffix }} @endif
    @if ($href)</a>@endif
</td>
