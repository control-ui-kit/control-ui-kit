
<div class="flex flex-col space-y-4">

    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0">

        <div class="w-full md:w-1/3">
            <x-input.search name="search" placeholder="Search..." background="bg-table-filters" {{ $attributes->whereStartsWith('wire:model') }} />
        </div>

        @isset($filters)
            <div class="w-full md:w-2/3 flex justify-end">
                <span class="{{ $tableFilterClasses() }}">
                {{ $filters }}
                </span>
            </div>
        @endisset

    </div>

    @isset($active)
    <div class="flex items-center justify-between text-sm">

        <div class="flex flex-wrap items-center space-x-2">
            <span>Filters :</span>
            {{ $active }}
        </div>

        <a class="{{ $clearFilterClasses() }}"
            @if($clearFiltersHref) href="{{ $clearFiltersHref }}" @endif
            @if($clearFiltersEvent) {!! $clearFiltersEvent !!} @endif
        >{{ $clearFiltersText }}</a>
    </div>
    @endif

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
