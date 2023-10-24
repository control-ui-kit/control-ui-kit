<div {{ $attributes->only('class')->merge(['class' => $wrapper]) }}>
    <x-label :for="is_null($for) ? $name : $for" class="{{ $labelStyle }}" :styles="$labelStyles">
        <p class="{{ $textStyle }}">
            <span>{!! $label !!}</span>
            @if ($required)
                <x-icon-star size="{{ $requiredSize }}" color="{{ $requiredColor }}" />
            @endif
        </p>
    </x-label>
    <div class="{{ $contentStyle }}">
        @if ($input && $slot->isEmpty())
            <div class="{{ $slotStyle }}">
                <x-dynamic-component :component="$input" :name="$name" {{ $attributes->except(['class', 'required']) }} />
            </div>
        @else
            <div class="{{ $slotStyle }}" {{ $attributes->except(['class', 'required']) }}>
                {{ $slot }}
            </div>
        @endif
        <x-error field="{{ $name }}" :styles="$errorStyles" />
        @if ($help)
            <p class="{{ $helpStyle }}">{!! $help !!}</p>
        @endif
    </div>
</div>
