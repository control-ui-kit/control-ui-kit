<x-table.row>
    <x-table.cell colspan="100%">
        <div {{ $attributes->merge($classes($stacked)) }}>
            @if ($icon)<x-dynamic-component :component="$icon" :size="$iconSize" :class="$iconStyle" /><span>@endif
            @if($slot->isEmpty()) {{ $text }} @else {{ $slot }} @endif
            @if ($icon)</span>@endif
        </div>
    </x-table.cell>
</x-table.row>
