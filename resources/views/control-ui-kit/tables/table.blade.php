<div x-cloak
     x-data="Components.table({
        hasFilters: {{ isset($filters) && $filters->isNotEmpty() ? 'true' : 'false' }},
        hasSearch: {{ $showSearch() ? 'true' : 'false' }},
        withFilters: '{{ $tableWrapperWithFilters() }}',
        withoutFilters: '{{ $tableWrapperWithoutFilters() }}',
        orderby: '{{ $orderby }}',
        sort: '{{ $sort }}',
      })"
     x-on:resize.window="resizeFilters()"
     x-on:resize.window="resizeFilters()"
     @ready="initFilters()"
     x-init="init()"
     @keydown.escape="onEscape()"
>
    @if ((isset($filters) && $filters->isNotEmpty()) || $showSearch())

        <div @click.away="onClickAway()" @click.stop="onClickAway()">

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
                                {{ $attributes->whereStartsWith('wire:') }}
                            />
                            @if ($wireSearch)
                            <div wire:loading>
                               loading
                            </div>
                            @endif
                        </div>
                    </x-form>
                </div>
                @endif

                @if(isset($filters) && $filters->isNotEmpty())
                    <div x-ref="container" class="{{ $tableFiltersContainer() }}">
                        <div class="{{ $tableFiltersClasses() }}" x-ref="filters">
                            {{ $filters }}
                            <div>
                                <button class="{{ $moreButtonClasses() }}" x-ref="more" x-show="moreButton" @click="onMoreButtonClicked()">
                                    <x-dynamic-component :component="$moreButtonIcon()" :size="$moreButtonIconSize()" />
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="{{ $tableFiltersEmpty() }}"></div>
                @endif

            </div>

            @if(isset($filters) && $filters->isNotEmpty())
                <div class="{{ $moreFiltersWrapper() }}">
                    <div id="more-filters" x-ref="overflow" x-show="openMore" class="{{ $moreFiltersClasses() }}">
                        {{ $filters }}
                    </div>
                </div>
            @endif

        </div>

        @if(isset($active) && $active->isNotEmpty())
            <div class="{{ $activeFilterWrapperClasses() }}">
                <div class="{{ $activeFilterListClasses() }}" x-ref="active">
                    {{ $active }}
                </div>

                <a class="{{ $clearFilterClasses() }}"
                   @if($clearFiltersHref) href="{{ $clearFiltersHref }}" @endif
                @if($clearFiltersEvent) {!! $clearFiltersEvent !!} @endif
                >{{ $clearFiltersText }}</a>

            </div>
        @else
            <div x-ref="active"></div>
        @endisset

    @endif

    <div class="{{ $tableWrapperClasses }}" :class="tableWrapperClasses()" x-ref="table">
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
