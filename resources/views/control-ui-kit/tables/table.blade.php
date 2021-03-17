

<div class="mb-4 grid grid-cols-3">

    <x-input.search name="search" placeholder="Search..." background="bg-white" />

    @isset($filters)
        <div class="col-span-2 flex flex-wrap space-x-6 justify-end">
            {{ $filters }}
        </div>
    @endisset

</div>

<table {{ $attributes->merge($classes()) }}>
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

{{--<x-table.pagination />--}}
