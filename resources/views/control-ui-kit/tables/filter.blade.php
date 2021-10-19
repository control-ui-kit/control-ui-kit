<div class="{{ $wrapperClasses('table-filter') }}" data-ref="{{ $buttonRef() }}" data-priority="{{ $priority }}"  data-label="{{ $label }}">

    <button type="button"
            {{ $attributes->merge($classes()) }}
            x-ref="button-{{ $buttonRef() }}"
            @click.stop="onButtonClick('{{ $buttonRef() }}')"
            aria-haspopup="listbox"
            :aria-expanded="open"
            aria-labelledby="listbox-label"
            aria-expanded="true"
    >
        <span>{{ $label }}</span>
        <span class="{{ $iconClasses() }}">
            <x-dynamic-component :component="$icon" :size="$iconSize" />
        </span>
    </button>

    <ul x-show="open == '{{ $buttonRef() }}'"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="{{ $listClasses() }}"
        x-max="1"
        @keydown.enter.stop.prevent="onKeyboardSelect()"
        @keydown.space.stop.prevent="onKeyboardSelect()"
        @keydown.arrow-up.prevent="onArrowUp()"
        @keydown.arrow-down.prevent="onArrowDown()"
        x-ref="listbox-{{ $buttonRef() }}"
        data-ref="{{ $buttonRef() }}"
        data-value="{{ $value }}"
        tabindex="-1"
        role="listbox"
        aria-labelledby="listbox-label"
        :aria-activedescendant="activeDescendant"
        aria-activedescendant=""
    >
        @foreach ($options as $optionValue => $option)
            <li class="{{ $optionClasses() }}"
                role="option"
                data-value="{{ $optionValue }}"
{{--                @click="onMouseSelect({{ $activeIndex }})"--}}
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

                    @if ($optionValue && $subtext($option))
                        <span class="{{ $subtextClasses() }}"
                              :class="{ '{{ $subtextActive() }}': highlightIndex === {{ $activeIndex }}, '{{ $subtextInactive() }}': !(highlightIndex === {{ $activeIndex }}) }"
                        >{{ $subtext($option) }}</span>
                    @endif
                </div>

                @if ($checkIcon && $optionValue == $value)
                    <span class="{{ $checkClasses() }}"
                          :class="{ '{{ $checkActive() }}': activeIndex === {{ $activeIndex }}, '{{ $checkInactive() }}': !(activeIndex === {{ $activeIndex }}) }"
                    >
                        <x-dynamic-component :component="$checkIcon" :size="$checkIconSize" />
                    </span>
                @endif
            </li>
            @php $activeIndex++; @endphp
        @endforeach
    </ul>

</div>
