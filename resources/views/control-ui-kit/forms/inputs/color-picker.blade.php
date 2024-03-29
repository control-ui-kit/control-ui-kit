@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div x-data="Components.inputColorPicker({
        value:@if($wireModel) @entangle($wireModel){{ $wireSuffix }} @else {!! $setValue() !!}@endif,
        popup: '{{ $popup }}',
        alpha: {{ $alpha ? 'true' : 'false' }},
        editor: {{ $editor ? 'true' : 'false' }},
        onchange: '{{ addslashes($onchange) }}',
        default: '{{ $defaultColor }}',
        close: '{{ $closeButton }}',
        id: '{{ $id }}'
    })"
    x-ref="wrapper"
    x-modelable="value"
    {{ $attributes->merge($wrapperClasses())->whereStartsWith(['class', 'x-model']) }}>
    @if ($colorPosition === 'left')
        <div id="{{ $id }}_color" class="{{ $colorClasses() }}" wire:ignore></div>
    @elseif ($iconLeft)
        <x-input-embed icon-left :icon="$iconLeft" :styles="$iconLeftStyles" :icon-size="$iconLeftSize" />
    @elseif (isset($prefix) || $prefixText)
        <x-input-embed prefix :styles="$prefixStyles" >{{ $prefix ?? $prefixText }}</x-input-embed>
    @endif
    <input type="text"
           id="{{ $id }}"
           name="{{ $name }}"
           x-model.lazy="value"
           @if($placeholder) placeholder="{{ $placeholder }}" @endif
           @isset($min) min="{{ $min }}" @endisset
           @isset($max) max="{{ $max }}" @endisset
           @isset($step) step="{{ $step }}" @endisset
        {{ $attributes->whereDoesntStartWith(['x-model', 'wire:model', 'required', 'class'])->merge($inputClasses()) }}
    />
    @if ($colorPosition === 'right')
        <div id="{{ $id }}_color" class="{{ $colorClasses() }}" wire:ignore></div>
    @elseif ($iconRight)
        <x-input-embed icon-right :icon="$iconRight" :styles="$iconRightStyles" :icon-size="$iconRightSize" />
    @elseif (isset($suffix) || $suffixText)
        <x-input-embed suffix :styles="$suffixStyles" >{{ $suffix ?? $suffixText }}</x-input-embed>
    @endif
</div>
