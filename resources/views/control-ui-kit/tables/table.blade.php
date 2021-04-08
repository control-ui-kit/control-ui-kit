<div class="flex flex-col space-y-4"
     x-cloak
     x-data="Components.table()"
     @ready="initFilters"
     x-init="init()"
>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        <div class="cols-1 flex-shrink-0">

            <x-form action="{{ $searchUrl() }}" method="get" name="searchfrm" id="searchfrm">
                <x-input.search
                    name="search"
                    placeholder="Search..."
                    background="bg-table-filters"
                    :value="$search"
                    onchange="document.search.submit();"
                    {{ $attributes->whereStartsWith('wire:model') }}
                />
            </x-form>

        </div>

        @isset($filters)
        <div x-ref="filterSpace"
             @click.away="open = false"
             @keydown.escape="onEscape()"
             class="col-span-1 sm:col-span-2 flex flex-col items-end mb-2"
             x-on:resize.window="onResize()"
        >
            <div
{{--                class="{{ $tableFilterClasses() }} w-max" --}}
                x-ref="filters"
                class="bg-table-filters border border-table-filters divide-x table-filters-divider inline-flex rounded-md w-max"
            >
                {{ $filters }}

                <button class="px-4 focus:outline-none focus:ring-0" id="moreButton" x-show="moreButton" @click="onMoreButtonClick()">
                    <x-icon.options />
                </button>

            </div>

            <div id="more-filters"
                 x-ref="moreFilters"
                 x-show="openMore"
                 class="bg-table-filters border border-table-filters border-table-filters divide-x table-filters-divider inline-flex rounded-md items-center mt-2 justify-end"
            ></div>
        </div>
        @endisset

    </div>

    <x-button @click="resizeFilters()">Resize Filters</x-button>

    @if($hasFilters())
    <div class="flex flex-col md:flex-row items-center justify-between text-sm">

        <div class="flex flex-row flex-wrap items-center space-x-2">
            @foreach ($activeFilters as $type => $filters)
                @foreach($filters as $value => $label)
                    <x-table.active-filter :type="$type" :value="$value" :label="$label" />
                @endforeach
            @endforeach
        </div>

{{--        <a class="{{ $clearFilterClasses() }}"--}}
        <a class="text-brand hover:text-brand-lighter flex-shrink-0 ml-2 mb-2"
            @if($clearFiltersHref) href="{{ $clearFiltersHref }}" @endif
            @if($clearFiltersEvent) {!! $clearFiltersEvent !!} @endif
        >{{ $clearFiltersText }}</a>
    </div>
    @endisset

    <table {{ $attributes->merge($classes())->whereDoesntStartWith('wire:model') }}>
        @isset($headings)
        <thead>
        <tr class="{{ $headingStyles }}">
            {{ $headings }}
        </tr>
        </thead>
        @endif
        <tbody class="{{ $bodyStyles }}">
        @if (isset($body))
        {{ $body }}
        @else
        {{ $slot }}
        @endif
        </tbody>
    </table>

</div>

{{--<x-table.pagination />--}}
