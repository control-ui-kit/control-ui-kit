<div {{ $attributes->merge($wrapperClasses())->only(['class']) }}>
    @if ($iconLeft)
        <x-input-embed icon-left :icon="$iconLeft" :styles="$iconLeftStyles" :icon-size="$iconLeftSize" x-on:click="showToggle" />
    @endif
    <input
        name="{{ $name }}"
        type="file"
        id="{{ $id }}"
        @if($accept) accept="{{ $accept }}" @endif
        @if($multiple) multiple @endif
        @if($capture) capture="{{ $capture }}" @endif
        @if($requiredInput) required @endif
        {{ $attributes->whereDoesntStartWith(['class', 'required'])->merge($inputClasses()) }}
    />
    @if ($iconRight)
        <x-input-embed icon-right :icon="$iconRight" :styles="$iconRightStyles" :icon-size="$iconRightSize" x-on:click="showToggle" />
    @endif
</div>

