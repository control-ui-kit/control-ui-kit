@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div x-cloak
     x-data="Components.inputSelect({
         id: '{{ $id }}',
         value:@if($wireModel) @entangle($wireModel){{ $wireSuffix }}@else {!! $jsonValue() !!}@endif
     })"
     x-init="init()"
     x-modelable="value"
    {{ $attributes->merge(['class' => $buttonWidth() . ' relative'])->whereDoesntStartWith(['wire:model']) }}>
    <input type="hidden" name="{{ $name }}" id="{{ $id }}" @if(! is_null($value)) value="{{ $value }}" @endif x-model="value" x-on:change="onValueChange()" />
    <button type="button"
            class="{{ $buttonClasses() }}"
            x-ref="button"
            @keydown.arrow-up.stop.prevent="onButtonClick()"
            @keydown.arrow-down.stop.prevent="onButtonClick()"
            @click="onButtonClick()"
            aria-haspopup="listbox"
            :aria-expanded="open"
            aria-labelledby="listbox-label"
            aria-expanded="true"
    >
        <div class="flex items-center">
            <img x-show="image !== undefined" :src="image" class="{{ $imageClasses() }}">
            <span x-text="text" class="{{ $textClasses() }}"></span>
            <span x-text="subtext" class="{{ $subtextClasses() }}"></span>
        </div>
        @if ($icon)
        <span class="{{ $iconClasses() }}">
            <x-dynamic-component :component="$icon" :size="$iconSize" />
        </span>
        @endif
    </button>

    <ul x-show="open"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="{{ $listClasses() }}"
        x-max="1"
        @click.away="open = false"
        @keydown.enter.stop.prevent="onKeyboardSelect()"
        @keydown.space.stop.prevent="onKeyboardSelect()"
        @keydown.escape="onEscape()"
        @keydown.arrow-up.prevent="onArrowUp()"
        @keydown.arrow-down.prevent="onArrowDown()"
        x-ref="listbox-{{ $id }}"
        tabindex="-1"
        role="listbox"
        aria-labelledby="listbox-label"
        :aria-activedescendant="activeDescendant"
        aria-activedescendant=""
    >
        @foreach ($options as $value => $option)
            <li class="{{ $optionClasses() }}"
                role="option"
                @if ($image($option)) data-image="{{ $image($option) }}" @endif
                @if ($value && $subtext($option)) data-subtext="{{ $subtext($option) }}" @endif
                data-text="{{ $text($option) }}"
                data-value="{{ $optionValue($value, $option) }}"
                @click="onMouseSelect({{ $activeIndex }})"
                @mouseenter="activeIndex = {{ $activeIndex }}"
                @mouseleave="activeIndex = null"
                :class="{ '{{ $optionActive() }}': activeIndex === {{ $activeIndex }}, '{{ $optionInactive() }}': !(activeIndex === {{ $activeIndex }}) }"
            >
                <div class="flex items-center {{ $optionSpacing() }}">

                    @if ($image($option))
                    <img src="{{ $image($option) }}" alt="" class="{{ $imageClasses() }}">
                    @endif

                    <span class="{{ $textClasses() }}"
                          :class="{ '{{ $textActive() }}': highlightIndex === {{ $activeIndex }}, '{{ $textInactive() }}': !(highlightIndex === {{ $activeIndex }}) }"
                    >{{ $text($option) }}</span>

                    @if ($value && $subtext($option))
                    <span class="{{ $subtextClasses() }}"
                          :class="{ '{{ $subtextActive() }}': highlightIndex === {{ $activeIndex }}, '{{ $subtextInactive() }}': !(highlightIndex === {{ $activeIndex }}) }"
                    >{{ $subtext($option) }}</span>
                    @endif

                </div>

                @if ($checkIcon)
                <span class="{{ $checkClasses() }}"
                      :class="{ '{{ $checkActive() }}': activeIndex === {{ $activeIndex }}, '{{ $checkInactive() }}': !(activeIndex === {{ $activeIndex }}) }"
                      x-show="highlightIndex === {{ $activeIndex }}"
                >
                    <x-dynamic-component :component="$checkIcon" :size="$checkIconSize" />
                </span>
                @endif
            </li>
            @php $activeIndex++; @endphp
        @endforeach
    </ul>
</div>
