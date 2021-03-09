<td {{ $attributes->merge($classes()) }}>
    @if ($prefix) {{ $prefix }} @endif
    @if ($value) {{ $value }} @else {{ $slot }} @endif
    @if ($suffix) {{ $suffix }} @endif
</td>
