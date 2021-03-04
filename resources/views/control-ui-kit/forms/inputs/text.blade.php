@unless ($needsWrapper())
    <input
        name="{{ $name }}"
        type="text"
        id="{{ $id }}"
        @if($value)value="{{ $value }}"@endif
        @if($placeholder)placeholder="{{ $placeholder }}"@endif
        {{ $attributes->merge($basicClasses()) }}
    />
@else
    <div {{ $attributes->merge($wrapperClasses()) }}>
        @if ($iconLeft)<x-input.embed position="left" :icon="$iconLeft" :icon-size="$iconSize" :styles="$iconStyles" />
        @elseif ($prefix)<x-input.embed position="left" :styles="$prefixStyles" >@unless($prefix === 'slot'){{ $prefix }}@else{{ $slot }}@endif</x-input.embed>
        @endif
        <input name="{{ $name }}"
               type="text"
               id="{{ $id }}"
               @if($value)value="{{ $value }}"@endif
               @if($placeholder)placeholder="{{ $placeholder }}"@endif
               class="{{ $inputClasses() }}"
        />
        @if ($iconRight)<x-input.embed position="right" :icon="$iconRight" :icon-size="$iconSize" :styles="$iconStyles" />
        @elseif ($suffix)<x-input.embed position="right" :styles="$suffixStyles">@unless($suffix === 'slot'){{ $suffix }}@else{{ $slot }}@endif</x-input.embed>
        @endif
    </div>
@endif


