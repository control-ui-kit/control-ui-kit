<div
{{--    x-cloak--}}
     x-data="Components.table({
{{--        hasFilters: {{ count($filters) ? 'true' : 'false' }},--}}
{{--        hasSearch: {{ $showSearch() ? 'true' : 'false' }},--}}
{{--        withFilters: '{{ $tableWrapperWithFilters() }}',--}}
{{--        withoutFilters: '{{ $tableWrapperWithoutFilters() }}',--}}
        orderby: '{{ $orderby }}',
        sort: '{{ $sort }}',
      })"
     x-init="init()"
>
    @if ($showSearch())

        <div>

            <div class="@if ($showSearch()){{ $searchBarSpacing }}@endif {{ $searchBar }}">

                @if ($showSearch())

                    <div class="{{ $searchContainer }}" x-ref="search" @click="open = false">
                        <x-form action="{{ $searchUrl() }}" method="get" name="{{ $searchFormName }}" id="{{ $searchFormName }}">
                            <div class="{{ $searchWrapperClasses() }}">
                                @if ($searchIcon())
                                <div class="{{ $searchIconClasses() }}">
                                    <x-dynamic-component :component="$searchIcon()" :size="$searchIconSize()" />
                                </div>
                                @endif
                                <input name="{{ $searchName }}"
                                       type="{{ $searchType }}"
                                       id="{{ $searchId }}"
                                       value="{{ $search }}"
                                       placeholder="{{ $searchPlaceholder }}"
                                       @if ($wireSearch)
                                       wire:model.debounce.500ms="search"
                                       wire:keydown.prevent.enter=""
                                       @else
                                       onchange="document.search.submit();"
                                       @endif
                                       class="{{ $searchInputClasses() }}"
                                       autocomplete="off"
                                       autofocus
                                    {{ $attributes->whereStartsWith('wire:') }}
                                />
                                @if ($wireSearch)
                                <div wire:loading>
                                   <x-dynamic-component component="icon-spinner" class="mr-2 text-orange-500" />
                                </div>
                                @endif
                            </div>
                        </x-form>

                    </div>

                    @if(count($filters))

                        <x-table-filters :filters="$filters" />

                    @endif

{{--                <button class="{{ $moreButtonClasses() }}">--}}
{{--                    <x-dynamic-component component="icon-download" :size="$moreButtonIconSize()" color="text-gray-700" />--}}
{{--                </button>--}}
                @endif

            </div>

        </div>

        @if($hasActiveFilters())
            <div class="{{ $activeFilterWrapperClasses() }}">
                <div class="{{ $activeFilterListClasses() }}">
                    @foreach ($activeFilters() as $filter)
                        @if ($filter['type'] === 'search')
                            <x-table-active-filter :name="$filter['name']" :label="$filter['label']" :text="$filter['text']" x-on:click="$dispatch('clear-search-filter', {{ $filter['index'] }})" />
                        @else
                            <x-table-active-filter :name="$filter['name']" :label="$filter['label']" :text="$filter['text']" x-on:click="$dispatch('clear-single-filter', '{{ $filter['name'] }}' )" />
                        @endif
                    @endforeach
                </div>

                <a class="{{ $clearFilterClasses() }} cursor-pointer"
                   x-on:click="$dispatch('clear-filters')"

{{--                   @if($clearFiltersHref) href="{{ $clearFiltersHref }}" @endif--}}
{{--                    @if($clearFiltersEvent) {!! $clearFiltersEvent !!} @endif--}}
                >{{ $clearFiltersText }}</a>

            </div>
        @endisset

    @endif

    <div class="{{ $tableWrapperClasses }}">
        <table {{ $attributes->merge($classes())->whereDoesntStartWith('wire:model') }}>
            @isset($headings)
            <thead>
            <tr class="{{ $tableHeadingsClasses() }}">
                {{ $headings }}
            </tr>
            </thead>
            @endif
            <tbody class="{{ $tableBodyClasses() }}">
            @if (isset($body))
            {{ $body }}
            @else
            {{ $slot }}
            @endif
            </tbody>
        </table>
    </div>

</div>
