@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div x-data="Components.inputToggle({
        value:@if($wireModel) @entangle($wireModel){{ $wireSuffix }}@else @js($value, JSON_UNESCAPED_SLASHES)@endif,
        on: @js($on, JSON_UNESCAPED_SLASHES),
        off: @js($off, JSON_UNESCAPED_SLASHES)
    })"
    x-modelable="value"
    {{ $attributes->merge($classes()) }}>
    <button type="button"
            :class="{ '{{ $baseStateOn() }}': value == on, '{{ $baseStateOff() }}': value == off }"
            class="{{ $baseClasses() }}"
            @click.prevent="flipToggle()"
    >
        <span :class="{ '{{ $switchStateOn() }}': value == on, '{{ $switchStateOff() }}': value == off }" class="{{ $switchClasses() }}"></span>
    </button>
    <input type="hidden" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" x-model="value" />
</div>
