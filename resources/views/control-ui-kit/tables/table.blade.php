<div
    x-data="{
        orderby: '{{ $orderby }}',
        sort: '{{ $sort }}',
        href: function(name) {
            return '{{ $pageUrl() }}?orderby=' + name + '&sort=' + (name == this.orderby ? (this.sort == 'asc' ? 'desc' : 'asc') : 'asc');
        },
    }"
>
    @if ($showSearch())

        <div>

            <div class="@if ($showSearch()){{ $searchBarSpacing }}@endif {{ $searchBar }}">

                @if ($showSearch())

                    <div class="{{ $searchContainer }}">
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
                                       onchange="document.search.submit();"
                                       class="{{ $searchInputClasses() }}"
                                       autocomplete="off"
                                       autofocus
                                    {{ $attributes->whereStartsWith('wire:') }}
                                />
                            </div>
                        </x-form>

                    </div>

                    @if(count($filters))

                        <x-table-filters :filters="$filters" />

                    @endif

                @endif

            </div>

        </div>

        @if($hasActiveFilters())
            <div class="{{ $activeFilterWrapperClasses() }}">
                <div class="{{ $activeFilterListClasses() }}">
                    @foreach ($activeFilters() as $filter)
                        @if ($filter['type'] === 'search')
                            <x-table-active-filter :name="$filter['name']" :label="$filter['label']" :text="$filter['text']" :href="$pageUrl() . '?clear-search=' . $filter['text']" />
                        @else
                            <x-table-active-filter :name="$filter['name']" :label="$filter['label']" :text="$filter['text']" :href="$pageUrl() . '?' . $filter['name'] . '=' . $filter['unset']" />
                        @endif
                    @endforeach
                </div>

                <a class="{{ $clearFilterClasses() }} cursor-pointer"
                   href="{{ $clearFiltersHref }}">
                    {{ $clearFiltersText }}
                </a>

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
