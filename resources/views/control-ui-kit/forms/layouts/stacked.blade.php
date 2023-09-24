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
        <div class="{{ $slotStyle }}">
            @if ($input && $slot->isEmpty())
                <x-dynamic-component :component="$input" :name="$name" {{ $attributes->except('required') }} />
            @else
                {{ $slot }}
            @endif
        </div>
        <x-error field="{{ $name }}" :styles="$errorStyles" />
        @if ($help)
            <p class="{{ $helpStyle }}">{{ $help }}</p>
        @endif
    </div>
</div>
