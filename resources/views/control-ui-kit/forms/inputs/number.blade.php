@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));

    if ($needsWrapper() || isset($prefix) || isset($suffix)) {
        $wrapperClassStartsWith = ['class', 'x-model'];
        $mergeInputClasses = $inputClasses();
    } else {
        $wrapperClassStartsWith = ['class', 'x-model'];
        $mergeInputClasses = $basicClasses();
    }
@endphp
<div x-data="Components.inputNumber({
        id: '{{ $id }}',
        value:@if($wireModel) @entangle($wireModel){{ $wireSuffix }}@else {{ (is_null($value) || $value === '') ? 'null' : $value }}@endif,
        decimals: {{ $decimals }},
        @if (! is_null($max))max: {{ $max }},@endif
        @if (! is_null($min))min: {{ $min }},@endif
        @if (! is_null($wireModel))wire: {{ $wireModel }} @endif
    })" x-modelable="value" {{ $attributes->merge($wrapperClasses())->whereStartsWith($wrapperClassStartsWith) }}>
    @if ($iconLeft)
        <x-input-embed icon-left :icon="$iconLeft" :styles="$iconLeftStyles" :icon-size="$iconLeftSize" />
    @elseif (isset($prefix) || $prefixText)
        <x-input-embed prefix :styles="$prefixStyles" >{{ $prefix ?? $prefixText }}</x-input-embed>
    @endif
    <input type="{{ $type }}"
           id="{{ $id }}_display"
           x-model.lazy="display"
           @if($placeholder) placeholder="{{ $placeholder }}" @endif
           @isset($min) min="{{ $min }}" @endisset
           @isset($max) max="{{ $max }}" @endisset
           @isset($step) step="{{ $step }}" @endisset
        {{ $attributes->except(['class', 'required'])->whereDoesntStartWith(['x-model', 'wire:model'])->merge($mergeInputClasses) }}
    />
    <input name="{{ $name }}"
           type="hidden"
           id="{{ $id }}"
           x-model="value"
        {{ $attributes->only('disabled') }}
    />
    @if ($iconRight)
        <x-input-embed icon-right :icon="$iconRight" :styles="$iconRightStyles" :icon-size="$iconRightSize" />
    @elseif (isset($suffix) || $suffixText)
        <x-input-embed suffix :styles="$suffixStyles" >{{ $suffix ?? $suffixText }}</x-input-embed>
    @endif
</div>
