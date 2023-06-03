@if (! $field && ! $href)
<th {{ $attributes->merge($classes()) }}>{{ $slot->isNotEmpty() ? $slot : $text }}</th>
@elseif (! $field && $href)
<th {{ $attributes->merge($classes())->only('class') }}>
    <a href="{{ $href }}" {{ $attributes->except('class') }} class="{{ $sortable }}">{{ $slot->isNotEmpty() ? $slot : $text }}</a>
</th>
@else
<th {{ $attributes->merge($classes())->only('class') }}>
    <a @if($href) href="{{ $href }}" @endif {{ $attributes->except('class') }} class="{{ $sortable }}"
       @if ($wire) wire:click="sortBy('{{ $field }}')" @endif
        x-on:click="sortBy('{{ $field }}')"
    >
        @if (($isCurrentSort() && ($icon || $iconAlt)) || (! $isCurrentSort() && $iconAsc))
        <span>{{ $slot->isNotEmpty() ? $slot : $text }}</span>
        <span class="flex items-center" x-cloak>
            <x-dynamic-component x-show="orderby == '{{ $field }}' && sort == 'asc'" :component="$iconAsc" :size="$iconSize" alt="asc" />
            <x-dynamic-component x-show="orderby == '{{ $field }}' && sort == 'desc'"  :component="$iconDesc" :size="$iconSize" alt="desc" />
            <x-dynamic-component x-show="orderby != '{{ $field }}'"  :component="$iconAsc" :size="$iconSize" alt="hover" class="opacity-30 group-hover:opacity-100 transition-opacity duration-200" />
        </span>
        @else
        {{ $slot->isNotEmpty() ? $slot : $text }}
        @endif
    </a>
</th>
@endif
