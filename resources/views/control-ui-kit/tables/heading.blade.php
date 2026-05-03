@if (! $field && ! $href)
    <th {{ $attributes->merge($classes()) }}>{{ $slot->isNotEmpty() ? $slot : $text }}</th>
@elseif (! $field && $href)
    <th {{ $attributes->merge($classes())->only('class') }}>
        <a href="{{ $href }}" {{ $attributes->except('class') }} class="{{ $sortable }}">{{ $slot->isNotEmpty() ? $slot : $text }}</a>
    </th>
@else
    <th {{ $attributes->merge($classes())->only('class') }}>
        <a @if($href) href="{{ $href }}" @else x-bind:href="href('{{ $field }}')" @endif {{ $attributes->except('class') }} class="{{ $sortable }}" x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false">
            @if (($isCurrentSort() && ($icon || $iconAlt)) || (! $isCurrentSort() && $iconAsc))
                <span>{{ $slot->isNotEmpty() ? $slot : $text }}</span>
                <span class="flex items-center" x-cloak>
            <x-dynamic-component x-show="orderby == '{{ $field }}' && sort == 'asc' && !hovered" :component="$iconAsc" :size="$iconSize" alt="asc" />
            <x-dynamic-component x-show="orderby == '{{ $field }}' && sort == 'asc' && hovered"  :component="$iconDesc" :size="$iconSize" alt="asc-hover" />
            <x-dynamic-component x-show="orderby == '{{ $field }}' && sort == 'desc' && !hovered" :component="$iconDesc" :size="$iconSize" alt="desc" />
            <x-dynamic-component x-show="orderby == '{{ $field }}' && sort == 'desc' && hovered"  :component="$iconAsc" :size="$iconSize" alt="desc-hover" />
            <x-dynamic-component x-show="orderby != '{{ $field }}'" :component="$iconAsc" :size="$iconSize" alt="hover" x-bind:class="hovered ? 'opacity-100' : 'opacity-30'" class="transition-opacity duration-200" />
        </span>
            @else
                {{ $slot->isNotEmpty() ? $slot : $text }}
            @endif
        </a>
    </th>
@endif
