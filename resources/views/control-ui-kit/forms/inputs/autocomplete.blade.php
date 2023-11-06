@php
    [$wireModel, $wireSuffix] = $livewireAttribute($attributes->whereStartsWith('wire:model'));
@endphp
<div x-data='Components.inputAutocomplete({
         value: "{{ $value }}",
         idName: "{{ $idName }}",
         textName: "{{ $textName }}",
         subName: "{{ $subtextName }}",
         imageName: "{{ $imageName }}",
         search_url: "{{ $src }}",
         lookup_url: "{{ $lookup_src }}",
         data: @json($options ?? [], JSON_THROW_ON_ERROR)
     })'
     x-cloak
     x-modelable="value"
     class="flex flex-col items-center relative">
    <div class="flex space-x-4">
    <div {{ $attributes->merge($wrapperClasses())->only('class') }}  @click.away="close()" >
        <input name="{{ $name }}_search"
               type="text"
               id="{{ $id }}_search"
               x-model="filter"
               @mousedown="open()"
               @input.debounce.250="refreshOptions()"
               @keydown.enter.stop.prevent="selectOption()"
               @keydown.arrow-up.prevent="focusPrevOption()"
               @keydown.arrow-down.prevent="focusNextOption()"
               @if($placeholder) placeholder="{{ $placeholder }}" @endif
            {{ $attributes->except(['required', 'class'])->merge($inputClasses()) }}
        />
        <x-input-embed x-show="! show && ! is_ajax" icon-right icon="icon-chevron-down" :styles="$iconRightStyles" :icon-size="$iconRightSize" @click="toggle()"  />
        <x-input-embed x-show="show && ! is_ajax" icon-right icon="icon-chevron-up" :styles="$iconRightStyles" :icon-size="$iconRightSize" @click="toggle()"  />
    </div>
    <input type="text" name="{{ $name }}" id="{{ $id }}" x-model="value" />
    </div>
    <div x-show="isOpen()" class="absolute top-10 left-0 mt-1 max-h-64 overflow-auto z-50 bg-input border border-input focus:outline-none w-full rounded overflow-y-auto">
        <div class="flex flex-col w-full" x-show="options !== null">
            <template x-for="(option, index) in options" :key="index">
                <div @click="onOptionClick(index)"
                     :class="classOption(option.id, index)"
                     :aria-selected="focusedOptionIndex === index"
                >
                    <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:bg-input-option-hover">
                        <div class="w-6 flex flex-col items-center" x-show="option.thumbnail !== null">
                            <div class="flex relative w-5 h-5 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                                <img class="rounded-full" alt="A" x-bind:src="option.thumbnail">
                            </div>
                        </div>
                        <div class="w-full items-center flex">
                            <div class="mx-2 -mt-1">
                                <span x-text="option.text"></span>
                                <div class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500" x-text="option.sub"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <div class="flex flex-col space-y-2" x-show="is_ajax && options === null">
            <div class="flex w-full items-center px-2 pt-2">
                <span>Type To Search....</span>
            </div>
            <div class="flex w-full items-center hover:bg-input-option-hover p-2">
                <div class="flex items-center space-x-2">
                    <span>Selected : </span>
                    <span x-text="selected_text"></span>
                </div>
            </div>
        </div>
    </div>

</div>

