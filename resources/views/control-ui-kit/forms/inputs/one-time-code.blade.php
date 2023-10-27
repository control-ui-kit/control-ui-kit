@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div
    x-data="Components.inputOneTimeCode({
        name: '{{ $name }}',
        @for($i = 1; $i <= $digits; $i++)
        'digit_{{ $i }}': '',
        @endfor
        digits: {{ $digits }},
        value:@if($wireModel) @entangle($wireModel){{ $wireSuffix }}@else '{{ $value }}'@endif
    })"
    x-modelable="value"
    {{ $attributes->whereStartsWith(['class', 'x-model']) }}>
    <fieldset class="fs-{{ $name }}-otc">
        @for($i = 1; $i <= $digits; $i++)
            <input id="{{ $name }}-{{ $i }}" data-digit="{{ $i }}" x-model="digit_{{ $i }}" type="number" {{ $attributes->whereDoesntStartWith(['class', 'x-model', 'wire:model'])->merge($basicClasses()) }} pattern="[0-9]*" min="0" max="9" maxlength="1" @if($requiredInput) required @endif />
        @endfor
    </fieldset>
    <input type="hidden" name="{{ $name }}" id="{{ $id }}" x-model="value" />
    <style>
        fieldset.fs-{{ $name }}-otc input::-webkit-outer-spin-button, fieldset.fs-{{ $name }}-otc input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</div>
