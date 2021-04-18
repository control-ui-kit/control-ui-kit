<div class="flex flex-col"
     x-cloak
     x-data="Components.table({
        hasFilters: {{ isset($filters) ? 'true' : 'false' }},
        hasSearch: {{ $hideSearch ? 'false' : 'true' }},
        withFilters: '{{ $tableWrapperWithFilters() }}',
        withoutFilters: '{{ $tableWrapperWithoutFilters() }}',
      })"
     x-on:resize.window="resizeFilters()"
{{--     @ready.window="initFilters()"--}}
     @ready="initFilters()"
     x-init="init()"
     @keydown.escape="onEscape()"
{{--     @arrow-up.window.prevent="onArrowUp()"--}}
{{--     @arrow-down.window.prevent="onArrowDown()"--}}
>

    <div @click.away="onClickAway()" @click.stop="onClickAway()">

        <div class="@if (! $hideSearch) sm:grid table-grid-filters space-x-2 sm:space-x-4 @endif flex">

            @if (! $hideSearch)
            <div class="w-full sm:flex-shrink-0" x-ref="search" @click="open = false">
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
                               {{ $attributes->whereStartsWith('wire:model') }}
                        />
                    </div>
                </x-form>
            </div>
            @endif

            @isset($filters)
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
            @endisset

        </div>

        @isset($filters)
            <div class="flex justify-end">
                <div id="more-filters" x-ref="overflow" x-show="openMore" class="{{ $moreFilterClasses() }}"></div>
            </div>
        @endisset

    </div>

    @if(isset($active))
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

    <div class="{{ $tableWrapperClasses }}"
         :class="tableWrapperClasses()"
         x-ref="table">
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

{{--<x-table.pagination />--}}
