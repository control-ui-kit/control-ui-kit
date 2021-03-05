@unless ($needsWrapper() || isset($prefix) || isset($suffix))
    <input
        name="{{ $name }}"
        type="text"
        id="{{ $id }}"
        @if($value)value="{{ $value }}"@endif
        @if($placeholder)placeholder="{{ $placeholder }}"@endif
        {{ $attributes->merge($basicClasses()) }}
    />
@else
    <div {{ $attributes->merge($wrapperClasses())->only('class') }}>
        @if ($iconLeft)
            <x-input.embed position="left" :icon="$iconLeft" :icon-size="$iconSize" :styles="$iconStyles" />
        @elseif (isset($prefix) || $prefixText)
            <x-input.embed position="left" :styles="$prefixStyles" >{{ $prefixText ?? $prefix }}</x-input.embed>
        @endif
        <input name="{{ $name }}"
               type="text"
               id="{{ $id }}"
               @if($value)value="{{ $value }}"@endif
               @if($placeholder)placeholder="{{ $placeholder }}"@endif
               class="{{ $inputClasses() }}"
               {{ $attributes->except('class') }}
        />
        @if ($iconRight)
                <x-input.embed position="right" :icon="$iconRight" :icon-size="$iconSize" :styles="$iconStyles" />
        @elseif (isset($suffix) || $suffixText)
                <x-input.embed position="right" :styles="$suffixStyles" >{{ $suffixText ?? $suffix }}</x-input.embed>
        @endif
    </div>
@endif


