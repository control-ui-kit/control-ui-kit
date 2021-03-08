<td {{ $attributes->merge($classes()) }}>
    @if ($value) {{ $value }} @else {{ $slot }} @endif
</td>
