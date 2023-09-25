@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div {{ $attributes->merge($wrapperClasses())->only(['class', 'x-model']) }}
    x-data="Components.inputUrl({
        value:@if($wireModel) @entangle($wireModel){{ $wireSuffix }}@else {!! $value !!}@endif,
        prefix: {!! $urlPrefix !!}
    })"
    x-modelable="value">
    @if ($iconLeft)
        <x-input-embed icon-left :icon="$iconLeft" :styles="$iconLeftStyles" :icon-size="$iconLeftSize" />
    @elseif (isset($prefix) || $prefixText)
        <x-input-embed prefix :styles="$prefixStyles" >{{ $prefix ?? $prefixText }}</x-input-embed>
    @endif
    <input name="{{ $name }}"
           type="{{ $type }}"
           id="{{ $id }}"
           x-model.lazy="value"
           @if($placeholder) placeholder="{{ $placeholder }}" @endif
           @isset($min) min="{{ $min }}" @endisset
           @isset($max) max="{{ $max }}" @endisset
           @isset($step) step="{{ $step }}" @endisset
        {{ $attributes->whereDoesntStartWith(['x-model', 'wire:model', 'class', 'required'])->merge($inputClasses()) }}
    />
    @if ($iconRight)
        <x-input-embed icon-right :icon="$iconRight" :styles="$iconRightStyles" :icon-size="$iconRightSize" />
    @elseif (isset($suffix) || $suffixText)
        <x-input-embed suffix :styles="$suffixStyles" >{{ $suffix ?? $suffixText }}</x-input-embed>
    @endif
</div>


