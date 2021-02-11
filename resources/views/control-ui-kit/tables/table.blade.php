
@isset($filters)
<div>
    {{ $filters }}
{{--    <input type="search" class="w-1/4 p-2 border rounded outline-none" placeholder="Search" />--}}
</div>
@endisset

<div {{ $attributes->merge([ 'class' => "align-middle min-w-full overflow-x-auto overflow-hidden $padding $margin $border $shadow $rounded"]) }}>
    <table class="table-fixed data-table min-w-full text-left">
        @isset($head)
        <thead>
        <tr class="items-center uppercase bg-table-header border-b border-table-divider">
            {{ $head }}
        </tr>
        </thead>
        @endisset

        <tbody class="divide-y divide-table-divider bg-table">
        @if ($body)
        {{ $body }}
        @else
        {{ $slot }}
        @endif
        </tbody>
    </table>
</div>
