<div {{ $attributes->merge($classes()) }} x-cloak x-data="{ selected: '{{ $selected }}' }" x-modelable="selected">
    @foreach($options as $option)
    <label class="{{ $optionClasses() }}" :class="{ '{{ $optionSelected }}': selected === '{{ $option['value'] }}' }">
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
            <div class="{{ $helpWrapper }}" :class="{ '{{ $labelSelected }}': selected === '{{ $option['value'] }}' }">
                <span class="{{ $labelClasses() }}">{{ $option['label'] }}</span>
                <span class="{{ $helpClasses() }}">{{ $option['help'] }}</span>
            </div>
        @else
            <span class="{{ $labelClasses() }}" :class="{ '{{ $labelSelected }}': selected === '{{ $option['value'] }}' }">
                {{ $option['label'] }}
            </span>
        @endif
    </label>
    @endforeach
</div>
