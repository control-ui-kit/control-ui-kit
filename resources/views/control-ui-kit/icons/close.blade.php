<svg {{ $attributes->merge($classes('fill-current')) }} viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    @if ($attributes['title'])
        <title>{!! $attributes['title'] !!}</title>
    @endif
    <path clip-rule="evenodd" d="M19.5669 5.29918L18.2677 4l-6.7008 6.7008L4.86608 4 3.56689 5.29918 10.2677 12l-6.70081 6.7008L4.86608 20l6.70082-6.7008L18.2677 20l1.2992-1.2992L12.8661 12l6.7008-6.70082z"/>
</svg>
