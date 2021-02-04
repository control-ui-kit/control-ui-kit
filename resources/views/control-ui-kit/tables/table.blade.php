

<div>
    {{ $filters ?? 'not set' }}
{{--    <input type="search" class="w-1/4 p-2 border rounded outline-none" placeholder="Search" />--}}
</div>

<div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded border border-table">
    <table class="table-fixed data-table min-w-full text-left">
        <thead>
        <tr class="items-center uppercase bg-table-header border-b border-table-divider">
            {{ $head ?? 'not set' }}
        </tr>
        </thead>

        <tbody class="divide-y divide-table-divider">
        {{ $body ?? 'not set'  }}
        </tbody>
    </table>
</div>
