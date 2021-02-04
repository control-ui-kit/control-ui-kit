<{{ $element }}
    {!! $href !!}
    {{ $attributes->merge(['class' => 'flex-x-1.5 justify-center px-2 py-2 h-8 border w-max rounded-md group cursor-pointer outline-none focus:outline-none']) }}>
    @if($icon)
        <x-dynamic-component component="icon.{{ $icon }}" class="w-4 h-4 text-button-{{ $version }}-icon group-hover:text-button-{{ $version }}-icon-hover" />
        @if (! $slot->isEmpty())
        <span>{{ $slot }}</span>
        @endif
    @else
        {{ $slot }}
    @endif
</{{ $element }}>
