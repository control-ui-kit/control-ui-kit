<td {{ $attributes->merge($classes())->except('target') }}>
    @if ($actions)

        <div class="{{ $actionStyles }}">
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
            <x-pill :name="$pillName" :pillStyle="$pillStyle" :styles="$pillStyles" >@if (! is_null($cellData)) {{ $cellData }} @else {{ $slot }} @endif</x-pill>
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
            @if (! is_null($cellData)) {{ $cellData }} @else {{ $slot }} @endif
            @if ($suffix) {{ $suffix }} @endif
        @endif

        @if ($href && $can) </a> @endif
        </div>

    @endif
</td>
