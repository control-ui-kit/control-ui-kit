<div {{ $attributes->only('class') }}>
    <div class="{{ $wrapper }}">
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
                    <x-dynamic-component :component="$input" :name="$name" {{ $attributes->whereDoesntStartWith('error')->except(['required', 'class']) }} />
                </div>
            @else
                <div class="{{ $slotStyle }}" {{ $attributes->whereDoesntStartWith('error')->except(['required', 'class']) }}>
                    {{ $slot }}
                </div>
            @endif
            <x-error field="{{ $name }}" :styles="$errorStyles" />
        </div>
    </div>
    @if ($help)
        <p class="{{ $helpStyle }}">{{ $help }}</p>
    @endif
</div>
