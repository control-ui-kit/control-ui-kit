<div x-cloak x-data="Components.listbox({ id: '{{ $id }}', value: '{{ $value }}' })" x-init="init()">

    <input type="hidden" name="{{ $name }}" id="{{ $id }}" @if($value) value="{{ $value }}" @endif x-model="value" x-on:change="onValueChange()" />

{{--    <label id="listbox-label" class="block text-sm font-medium text-gray-700" @click="$refs.button.focus()">--}}
{{--        Assigned to--}}
{{--    </label>--}}

    <div class="mt-1 relative">
        <button type="button"
                {{ $attributes->merge($classes()) }}
{{--                class="bg-white relative w-full border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"--}}
                x-ref="button"
                @keydown.arrow-up.stop.prevent="onButtonClick()"
                @keydown.arrow-down.stop.prevent="onButtonClick()"
                @click="onButtonClick()"
                aria-haspopup="listbox"
                :aria-expanded="open"
                aria-labelledby="listbox-label"
                aria-expanded="true"
        >
            <span x-text="text" class="block truncate" />
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <x-icon.chevron-down />
            </span>
        </button>

        <ul x-show="open"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm z-50"
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

            @php $activeIndex = 0 @endphp

            @foreach ($options as $value => $option)

            <li class="cursor-default select-none relative py-2 pl-3 pr-9 text-gray-900"
                role="option"
                data-text="{{ $option }}"
                data-value="{{ $value }}"
                @click="onMouseSelect({{ $activeIndex }})"
                @mouseenter="activeIndex = {{ $activeIndex }}"
                @mouseleave="activeIndex = null"
                :class="{ 'text-white bg-gray-600': activeIndex === {{ $activeIndex }}, 'text-gray-900': !(activeIndex === {{ $activeIndex }}) }"
            >
                <span class="block truncate font-normal"
                      :class="{ 'font-semibold': highlightIndex === {{ $activeIndex }}, 'font-normal': !(highlightIndex === {{ $activeIndex }}) }">
                    {{ $option }}
                </span>

                <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                      :class="{ 'text-white': activeIndex === {{ $activeIndex }}, 'text-indigo-600': !(activeIndex === {{ $activeIndex }}) }"
                      x-show="highlightIndex === {{ $activeIndex }}"
                >
                    <x-icon.check />
                </span>
            </li>

                @php $activeIndex++; @endphp
            @endforeach

        </ul>

    </div>
</div>
