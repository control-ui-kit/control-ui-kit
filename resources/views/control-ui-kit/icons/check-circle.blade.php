<svg {{ $attributes->merge($classes('fill-current')) }} viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    @if ($attributes['title'])
        <title>{!! $attributes['title'] !!}</title>
    @endif
    <path clip-rule="evenodd" d="M12 4c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 18C6.486 22 2 17.514 2 12S6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z"/>
    <path clip-rule="evenodd" d="M11.1597 16.9272l-4.04398-4.043 1.768-1.768 1.95698 1.957 4.142-5.79903 2.034 1.452-5.857 8.20103z"/>
</svg>