@unless ($needsWrapper() || isset($prefix) || isset($suffix))
    <input
        name="{{ $name }}"
        type="{{ $type }}"
        id="{{ $id }}"
        @if(! is_null($value)) value="{{ $value }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @isset($min) min="{{ $min }}" @endisset
        @isset($max) max="{{ $max }}" @endisset
        @isset($step) step="{{ $step }}" @endisset
        @if($requiredInput) required @endif
        {{ $attributes->except('required')->merge($basicClasses()) }}
    />
@else
    <div {{ $attributes->merge($wrapperClasses())->only('class') }}>
        @if ($iconLeft)
            <x-input-embed icon-left :icon="$iconLeft" :styles="$iconLeftStyles" :icon-size="$iconLeftSize" />
        @elseif (isset($prefix) || $prefixText)
            <x-input-embed prefix :styles="$prefixStyles">{{ $prefix ?? $prefixText }}</x-input-embed>
        @endif
        <input name="{{ $name }}"
               type="{{ $type }}"
               id="{{ $id }}"
               @if(! is_null($value)) value="{{ $value }}" @endif
               @if($placeholder) placeholder="{{ $placeholder }}" @endif
               @isset($min) min="{{ $min }}" @endisset
               @isset($max) max="{{ $max }}" @endisset
               @isset($step) step="{{ $step }}" @endisset
               @if($requiredInput) required @endif
               {{ $attributes->except(['required', 'class'])->merge($inputClasses()) }}
        />
        @if ($iconRight)
            <x-input-embed icon-right :icon="$iconRight" :styles="$iconRightStyles" :icon-size="$iconRightSize" />
        @elseif (isset($suffix) || $suffixText)
            <x-input-embed suffix :styles="$suffixStyles">{{ $suffix ?? $suffixText }}</x-input-embed>
        @endif
    </div>
@endif


