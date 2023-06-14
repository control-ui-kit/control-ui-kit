<x-table-row hover="none">
    <x-table-cell :colspan="$colspan" align="none">
        <div {{ $attributes->merge($classes($stacked)) }}>
            @if ($icon)<x-dynamic-component :component="$icon" :size="$iconSize" :class="$iconStyle" /><span>@endif
            @if($slot->isNotEmpty())
                {{ $slot }}
            @else
                @if($trans !== '') @lang($trans, ['records' => $records]) @else {{ $text }} @endif
            @endif
            @if ($icon)</span>@endif
        </div>
    </x-table-cell>
</x-table-row>
