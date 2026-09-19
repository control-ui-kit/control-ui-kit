@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div {{ $attributes->merge($classes()) }} x-cloak x-data="{ selected:@if($wireModel) @entangle($wireModel){{ $wireSuffix }} @else @js($selected, JSON_UNESCAPED_SLASHES)@endif }" x-modelable="selected">
    @foreach($options as $option)
    <label class="{{ $optionClasses() }}" :class="{ '{{ $optionSelected }}': selected === @js($option['value'], JSON_UNESCAPED_SLASHES) }">
        <div class="{{ $radioClasses() }}">
            <x-input-radio
                :name="$option['name']"
                :id="$option['id']"
                :styles="$inputRadioStyles"
                value="{{ $option['value'] }}"
                x-model="selected"
                {{ $attributes->whereStartsWith(['wire:model', 'input-']) }}
            />
        </div>
        @if($option['help'])
            <div class="{{ $helpWrapper }}" :class="{ '{{ $labelSelected }}': selected === @js($option['value'], JSON_UNESCAPED_SLASHES) }">
                <span class="{{ $labelClasses() }}">{{ $option['label'] }}</span>
                <span class="{{ $helpClasses() }}">{{ $option['help'] }}</span>
            </div>
        @else
            <span class="{{ $labelClasses() }}" :class="{ '{{ $labelSelected }}': selected === @js($option['value'], JSON_UNESCAPED_SLASHES) }">
                {{ $option['label'] }}
            </span>
        @endif
    </label>
    @endforeach
</div>
