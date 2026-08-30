@php
    // Alpine writes to whatever element carries the directive, so an x-text or x-html passed to
    // the cell replaced the whole <td> - padding div and all - the moment it evaluated. The cell
    // then lost its horizontal padding and sat out of line with its heading. They belong on the
    // content, so they are lifted off the cell and carried by a span where the content goes.
    $contentBindings = $attributes->whereStartsWith(['x-text', 'x-html']);
    $attributes = $attributes->whereDoesntStartWith(['x-text', 'x-html']);
@endphp
<td {{ $attributes->merge($classes())->except('target') }}>
    @if ($actions)

        <div class="{{ $actionStyles }}">
            @if ($contentBindings->isNotEmpty())<span {{ $contentBindings }}></span>@endif
            {{ $slot }}

            @if ((isset($options) && $options->isNotEmpty()))
                <x-table-action-options>
                    {{ $options }}
                </x-table-action-options>
            @endif
        </div>

    @else

        <div class="{{ $cellPadding }}">
        @if ($href && $can) <a href="{{ $href }}" class="{{ $hrefColor }}" {{ $attributes->merge()->only('target') }}>@endif

        @if ($pillStyle || $pillName)
            <x-pill :name="$pillName" :pillStyle="$pillStyle" :styles="$pillStyles" >@if ($contentBindings->isNotEmpty())<span {{ $contentBindings }}></span>@elseif (! is_null($cellData)) {{ $cellData }} @else {{ $slot }} @endif</x-pill>
        @else
            @if ($icon) <x-dynamic-component :component="$icon" :size="$iconSize" :styles="$iconStyles()" /> @endif
            @if ($image)
                <img src="{{ $image }}"
                     class="{{ $imageClasses() }}"
                     loading="lazy"
                     @if ($imageAlt) alt="{{ $imageAlt }}" @endif
                />
            @endif
            @if ($prefix) {{ $prefix }} @endif
            @if ($contentBindings->isNotEmpty())<span {{ $contentBindings }}></span>@elseif (! is_null($cellData)) {{ $cellData }} @else {{ $slot }} @endif
            @if ($suffix) {{ $suffix }} @endif
        @endif

        @if ($href && $can) </a> @endif
        </div>

    @endif
</td>
