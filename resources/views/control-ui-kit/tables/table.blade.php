<div class="flex flex-col"
     x-cloak
     x-data="Components.table({
        hasFilters: {{ isset($filters) ? 'true' : 'false' }},
        hasSearch: {{ $hideSearch ? 'false' : 'true' }}
     })"
     x-on:resize.window="resizeFilters()"
     @ready="initFilters"
     x-init="init()"
     @filter.window="onButtonClick($event.detail)"
{{--     @click.away="onClickAway()"--}}
     @keydown.escape="onEscape()"
>
    <div @click.away="onClickAway()" @click.stop="onClickAway()">

        <div class="@if (! $hideSearch) sm:grid table-grid-filters space-x-2 sm:space-x-4 @endif flex">

            @if (! $hideSearch)
            <div class="w-full sm:flex-shrink-0" x-ref="search" @click="open = false">
                <x-form action="{{ $searchUrl() }}" method="get" name="searchfrm" id="searchfrm">
                    <x-input.search
                        name="search"
                        placeholder="Search..."
                        background="bg-table-filters"
                        input-background="bg-table-filters"
                        :value="$search"
                        onchange="document.search.submit();"
                        {{ $attributes->whereStartsWith('wire:model') }}
                    />
                </x-form>
            </div>
            @endif

            @isset($filters)
            <div x-ref="container"
                 class="@if (! $hideSearch) flex-grow items-end @endif flex-grow w-auto flex flex-col items-end"
            >
                <div
    {{--                class="{{ $tableFilterClasses() }} w-max"--}}
                    x-ref="filters"
                    class="bg-table-filters inline-flex border border-table-filters divide-x table-filters-divider rounded w-max"
                >
                    {{ $filters }}

                    <button class="px-4 h-9 focus:outline-none focus:ring-0 text-input-option"
                            x-ref="more"
                            x-show="moreButton"
                            @click="onMoreButtonClicked()"
                    >
                        <x-icon.filter />
                    </button>

                </div>
            </div>
            @endisset

        </div>

        @isset($filters)
            <div class="flex justify-end">
                <div id="more-filters"
                     x-ref="overflow"
                     x-show="openMore"
                     class="w-full sm:w-auto mt-2 sm:mt-4 bg-table-filters border border-table-filters border-table-filters divide-x table-filters-divider inline-flex rounded-md items-center justify-end flex-wrap"
                ></div>
            </div>
        @endisset

    </div>

    @if($hasFilters())
    <div class="flex flex-row justify-between text-sm min-w-full mt-2 sm:mt-4">

        <div class="flex flex-row flex-wrap items-center">
            @foreach ($activeFilters as $type => $filters)
                @foreach($filters as $value => $label)
                    <x-table.active-filter :type="$type" :value="$value" :label="$label" />
                @endforeach
            @endforeach
        </div>

{{--        <a class="{{ $clearFilterClasses() }}"--}}
        <a class="text-brand hover:text-brand-lighter flex-shrink-0 ml-2 pt-0.5"
            @if($clearFiltersHref) href="{{ $clearFiltersHref }}" @endif
            @if($clearFiltersEvent) {!! $clearFiltersEvent !!} @endif
        >{{ $clearFiltersText }}</a>
    </div>
    @endisset

    <div class="overflow-x-auto border border-table rounded @if($hasFilters()) mt-2 @else mt-2 sm:mt-4 @endif" x-ref="table">
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

</div>

{{--<x-table.pagination />--}}
