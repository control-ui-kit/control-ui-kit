@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div {{ $attributes->merge($wrapperClasses())->only(['class']) }}
    x-cloak
    x-data="Components.inputPassword()"
    >
    @if ($iconLeft)
        <x-input-embed x-show="type == 'password'" icon-left :icon="$iconLeft" :styles="$iconLeftStyles" :icon-size="$iconLeftSize" x-on:click="showToggle" />
        <x-input-embed x-show="type == 'text'" icon-left :icon="$iconLeftShow" :styles="$iconLeftStyles" :icon-size="$iconLeftSize" x-on:click="showToggle" />
    @endif
    <input name="{{ $name }}"
           id="{{ $id }}"
           x-bind:type="type"
           value="{{ $value }}"
           @if($placeholder) placeholder="{{ $placeholder }}" @endif
           @isset($min) min="{{ $min }}" @endisset
           @isset($max) max="{{ $max }}" @endisset
           @isset($step) step="{{ $step }}" @endisset
        {{ $attributes->whereDoesntStartWith(['class', 'required'])->merge($inputClasses()) }}
    />
    @if ($iconRight)
        <x-input-embed x-show="type == 'password'" icon-left :icon="$iconRight" :styles="$iconRightStyles" :icon-size="$iconRightSize" x-on:click="showToggle" />
        <x-input-embed x-show="type == 'text'" icon-Right :icon="$iconRightShow" :styles="$iconRightStyles" :icon-size="$iconRightSize" x-on:click="showToggle" />
    @endif
</div>


