<div x-cloak x-data="Components.listbox({ id: '{{ $id }}', value: '{{ $value }}' })" x-init="init()">

    <input type="text" name="{{ $name }}" id="{{ $id }}" @if($value) value="{{ $value }}" @endif x-model="value" x-on:change="onValueChange()" />

{{--    <label id="listbox-label" class="block text-sm font-medium text-gray-700" @click="$refs.button.focus()">--}}
{{--        Assigned to--}}
{{--    </label>--}}

    <div class="relative">
        <button type="button"
                {{ $attributes->merge($classes()) }}
                x-ref="button"
                @keydown.arrow-up.stop.prevent="onButtonClick()"
                @keydown.arrow-down.stop.prevent="onButtonClick()"
                @click="onButtonClick()"
                aria-haspopup="listbox"
                :aria-expanded="open"
                aria-labelledby="listbox-label"
                aria-expanded="true"
        >
            <span x-text="text" class="block truncate"></span>
            <span class="{{ $iconClasses() }}">
                <x-dynamic-component :component="$icon" :size="$iconSize" />
            </span>
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
                    data-text="{{ $option }}"
                    data-value="{{ $value }}"
                    @click="onMouseSelect({{ $activeIndex }})"
                    @mouseenter="activeIndex = {{ $activeIndex }}"
                    @mouseleave="activeIndex = null"
                    :class="{ '{{ $optionActive() }}': activeIndex === {{ $activeIndex }}, '{{ $optionInactive() }}': !(activeIndex === {{ $activeIndex }}) }"
                >
                    <span class="{{ $textClasses() }}"
                          :class="{ '{{ $textActive() }}': highlightIndex === {{ $activeIndex }}, '{{ $textInactive() }}': !(highlightIndex === {{ $activeIndex }}) }"
                    >{{ $option }}</span>

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
</div>
