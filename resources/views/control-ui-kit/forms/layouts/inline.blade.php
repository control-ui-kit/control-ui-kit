<div class="{{ $wrapper }}">
    <x-label :for="is_null($for) ? $name : $for" class="{{ $labelWrapper }}">
        <p class="{{ $labelText }}">
            <span>{!! $label !!}</span>
            @if ($required)
                <x-icon-star size="{{ $requiredIconSize }}" color="{{ $requiredIconColor }}" />
            @endif
        </p>
        @if ($help)
            <p class="{{ $helpDesktop }}">{{ $help }}</p>
        @endif
    </x-label>
    <div class="{{ $fieldWrapper }}">
        <div class="{{ $slotWrapper }}">
            @if ($input && $slot->isEmpty())
                <x-dynamic-component :component="$input" :name="$name" {{ $attributes->except('required') }} />
            @else
                {{ $slot }}
            @endif
        </div>
        <x-error field="{{ $name }}"/>
        @if ($help)
            <p class="{{ $helpMobile }}">{{ $help }}</p>
        @endif
    </div>
</div>
