
@isset($filters)
<div>
    {{ $filters }}
{{--    <input type="search" class="w-1/4 p-2 border rounded outline-none" placeholder="Search" />--}}
</div>
@endisset

<table {{ $attributes->merge($classes()) }}>
    @isset($head)
    <thead>
    <tr class="{{ $headStyles }}">
        {{ $head }}
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
