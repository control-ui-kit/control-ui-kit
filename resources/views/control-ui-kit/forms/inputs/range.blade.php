@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div x-data="Components.inputRange({
    id: '{{ $id }}',
    value:@if($wireModel) @entangle($wireModel){{ $wireSuffix }}@else '{{ $value }}'@endif
})"
     x-modelable="value"
    {{ $attributes->merge($classes())->whereStartsWith(['class', 'x-model']) }}>
    @if($showMin)
    <div class="{{ $minClasses() }}">{{ $min }}</div>
    @endif
    @if($showValue)
    <div class="{{ $valueClasses() }}">
        <span x-html="value">{{ $value }}</span>
    </div>
    @endif
    <input
        type="range"
        x-model="value"
        name="{{ $name }}"
        id="{{ $id }}"
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        @if ($value) value="{{ $value }}" @endif
        class="{{ $theme }}"
        {{ $attributes->merge($classes())->whereDoesntStartWith(['class', 'x-model']) }}
    />
    @if($showMax)
    <div class="{{ $maxClasses() }}">{{ $max }}</div>
    @endif
</div>

