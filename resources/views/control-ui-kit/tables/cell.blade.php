<td {{ $attributes->merge($classes())->except('target') }}>
    @if ($href) <a href="{{ $href }}" class="inline-block" {{ $attributes->merge()->only('target') }}> @endif
    @if ($pillStyle || $pillName)
        <x-pill :name="$pillName" :pillStyle="$pillStyle" :styles="$pillStyles" >@if ($cellData) {{ $cellData }} @else {{ $slot }} @endif</x-pill>
    @else
        @if ($icon) <x-dynamic-component :component="$icon" :size="$iconSize" :styles="$iconStyles" /> @endif
        @if ($image)
            <img src="{{ $image }}"
                 @if ($imageStyle) class="{{ $imageStyle }}" @endif
                 @if ($imageAlt) alt="{{ $imageAlt }}" @endif
            />
        @endif
        @if ($prefix) {{ $prefix }} @endif
        @if ($cellData) {{ $cellData }} @else {{ $slot }} @endif
        @if ($suffix) {{ $suffix }} @endif
    @endif

    @if ($href) </a> @endif
</td>
