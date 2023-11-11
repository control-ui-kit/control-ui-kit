@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div x-data='Components.inputAutocomplete({
         value: "{{ $value }}",
         filter: "{{ $selected }}",
         config: @json($optionConfig ?? [], JSON_THROW_ON_ERROR),
         ajax: @json($ajaxConfig ?? [], JSON_THROW_ON_ERROR),
         conditionals: @json($conditionalStyles ?? [], JSON_THROW_ON_ERROR),
         data: @json($options ?? [], JSON_THROW_ON_ERROR)
     })'
     x-cloak
     x-modelable="value"
     {{ $attributes->merge(['class' => $basicClasses()])->only('class') }}>
    <div class="{{ $wrapperClasses() }}" @click.away="close()">
        <input name="{{ $name }}_search"
               type="text"
               id="{{ $id }}_search"
               x-model="filter"
               @mousedown="open()"
               @focus="open()"
               @input.debounce.250="refreshOptions()"
               @keydown.escape="close()"
               @keydown.tab="close()"
               @keydown.enter.stop.prevent="selectOption()"
               @keydown.arrow-up.prevent="focusPrevOption()"
               @keydown.arrow-down.prevent="focusNextOption()"
               @if($placeholder) placeholder="{{ $placeholder }}" @endif
            {{ $attributes->except(['required', 'class'])->merge(['class' => $inputClasses()]) }}
        />
        <x-input-embed x-show="! show && ! isAjax" icon-right :icon="$iconOpen" :styles="$iconStyles" :icon-size="$iconSize" @click="toggle()"  />
        <x-input-embed x-show="show && ! isAjax" icon-right :icon="$iconClose" :styles="$iconStyles" :icon-size="$iconSize" @click="toggle()"  />
    </div>
    <input type="hidden" name="{{ $name }}" id="{{ $id }}" x-model="value" />
    <div x-show="isOpen()" class="{{ $dropdownClasses() }}">
        <div x-show="options !== null">
            <template x-for="(option, index) in options" :key="index">
                <div @click="onOptionClick(index)"
                     :class="classOption(option.id, index)"
                     :aria-selected="focusedOptionIndex === index"
                >
                    <div class="{{ $optionClasses() }}" :class="classText(option.id, index)">
                        <img class="{{ $imageClasses() }}" x-bind:src="option.image" x-show="option.image !== null">
                        <div class="{{ $textClasses() }}">
                            <span x-text="option.text"></span>
                            <div class="{{ $subtextClasses() }}" :class="classSubtext(option.id, index)" x-text="option.sub"></div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div x-show="noResults">
            <div class="{{ $promptClasses() }}">
                {{ $noResultsText }} '<span x-text="filter"></span>'
            </div>
        </div>
        <div x-show="isAjax && options === null">
            <div class="{{ $promptClasses() }}">
                <span>{{ $promptText }}</span>
            </div>
            <div class="{{ $selectedClasses() }}">
                <span>{{ $selectedText }}</span>
                <span>:</span>
                <span x-text="selectedText"></span>
            </div>
        </div>
    </div>
</div>

