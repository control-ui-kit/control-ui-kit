<div class="flex flex-col space-y-4" x-cloak x-data="Components.table()" x-init="init()" @filters.window="setupFilters">

    <input x-model="open" />

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

        <div id="filterSpace"
             @click.away="open = false"
             @keydown.escape="onEscape()"
             class="col-span-1 sm:col-span-2 flex flex-col debug flex-shrink-0"
             x-on:resize.window="onResize()"
        >

            <x-button @click="setupFilters()">Setup Filters</x-button>
            <input x-model="availableSpace" />
            <input x-model="usedSpace" />

            <div class="{{ $tableFilterClasses() }} debug" x-ref="filters"
{{--                <div class="bg-table-filters border border-table-filters divide-x table-filters-divider inline-flex rounded-md"--}}

            >
                {{ $filters }}

                <button class="px-4" x-show="moreButton" @click="onMoreButtonClick()">
                    <span>More</span>
                </button>

            </div>

            <div id="more-filters" x-ref="moreFilters"
                 x-show="openMore"
                 class="w-full flex items-center debug mt-2 justify-end">

            </div>



        </div>

        @endisset

    </div>

    @if($hasFilters())
    <div class="flex flex-col md:flex-row items-center justify-between text-sm">

        <div class="flex flex-row space-y-2 md:space-y-0 flex-wrap items-center space-x-2 mb-2 md:mb-0">
            <span>Filters :</span>

            @foreach ($activeFilters as $type => $filters)
                @foreach($filters as $value => $label)
                    <x-table.active-filter :type="$type" :value="$value" :label="$label" />
                @endforeach
            @endforeach
        </div>

{{--        <a class="{{ $clearFilterClasses() }}"--}}
        <a class="text-brand hover:text-brand-lighter"
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

<script>

    //window.dispatchEvent(new CustomEvent('filters'));

    // let filters = document.querySelectorAll('.table-filter');
    // let more = document.getElementById('more-filters');
    //
    // let count = 0;
    // Array.from(filters).forEach(function(filter) {
    //     //sum = await sumFunction(sum, rating)
    //     if (count >= 4) {
    //         more.append(filter);
    //     }
    //     count++;
    //
    //
    // })

    // console.log(filters);
</script>
