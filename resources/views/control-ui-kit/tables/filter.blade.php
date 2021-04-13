<div class="{{ $buttonWidth() }} sm:relative table-filter" data-ref="{{ $buttonRef() }}" data-priority="{{ $priority }}"  data-label="{{ $label }}">

{{--    <input type="hidden" name="{{ $name }}" id="{{ $id }}" @if(! is_null($value)) value="{{ $value }}" @endif x-model="value" x-on:change="onValueChange()" />--}}

    <button type="button"
            {{ $attributes->merge($buttonClasses()) }}
            @keydown.arrow-up.stop.prevent="onButtonClick('{{ $buttonRef() }}')"
            @keydown.arrow-down.stop.prevent="onButtonClick('{{ $buttonRef() }}')"

{{--            aria-haspopup="listbox"--}}
{{--            :aria-expanded="open"--}}
{{--            aria-labelledby="listbox-label"--}}
{{--            aria-expanded="true"--}}
    >
        <div class="{{ $textClasses() }}">{{ $label }} <x-dynamic-component :component="$icon" :size="$iconSize" /></div>
{{--        <span class="{{ $iconClasses() }}">--}}
{{--            <x-dynamic-component :component="$icon" :size="$iconSize" />--}}
{{--        </span>--}}
    </button>

    <ul x-show="open == '{{ $buttonRef() }}'"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="{{ $listClasses() }}"
        x-max="1"
        @keydown.enter.stop.prevent="onKeyboardSelect()"
        @keydown.space.stop.prevent="onKeyboardSelect()"
{{--        @keydown.arrow-up.prevent="onArrowUp()"--}}
{{--        @keydown.arrow-down.prevent="onArrowDown()"--}}
{{--        x-ref="listbox-{{ $id }}"--}}
        tabindex="-1"
        role="listbox"
{{--        aria-labelledby="listbox-label"--}}
{{--        :aria-activedescendant="activeDescendant"--}}
{{--        aria-activedescendant=""--}}
    >
        @foreach ($options as $optionValue => $option)
            <li class="{{ $optionClasses() }}"
                role="option"
{{--                @if ($image($option)) data-image="{{ $image($option) }}" @endif--}}
{{--                @if ($value && $subtext($option)) data-subtext="{{ $subtext($option) }}" @endif--}}
{{--                data-text="{{ $text($option) }}"--}}
{{--                data-value="{{ $optionValue }}"--}}
{{--                @click="onMouseSelect({{ $activeIndex }})"--}}
{{--                @mouseenter="activeIndex = {{ $activeIndex }}"--}}
{{--                @mouseleave="activeIndex = null"--}}
{{--                :class="{ '{{ $optionActive() }}': activeIndex === {{ $activeIndex }}, '{{ $optionInactive() }}': !(activeIndex === {{ $activeIndex }}) }"--}}
            >
                <div class="flex items-center {{ $optionSpacing() }}">

                    @if ($image($option))
                        <img src="{{ $image($option) }}" alt="" class="{{ $imageClasses() }}">
                    @endif

                    <a href="{{ $href($optionValue) }}"
                        class="{{ $textClasses() }}"
{{--                          :class="{ '{{ $textActive() }}': highlightIndex === {{ $activeIndex }}, '{{ $textInactive() }}': !(highlightIndex === {{ $activeIndex }}) }"--}}
                    >{{ $text($option) }}</a>

{{--                    @if ($value && $subtext($option))--}}
{{--                        <span class="{{ $subtextClasses() }}"--}}
{{--                              :class="{ '{{ $subtextActive() }}': highlightIndex === {{ $activeIndex }}, '{{ $subtextInactive() }}': !(highlightIndex === {{ $activeIndex }}) }"--}}
{{--                        >{{ $subtext($option) }}</span>--}}
{{--                    @endif--}}

                </div>

                @if ($checkIcon && $optionValue == $value)
                    <span class="{{ $checkClasses() }} {{ $checkActive() }}"
{{--                          :class="{ '{{ $checkActive() }}': activeIndex === {{ $activeIndex }}, '{{ $checkInactive() }}': !(activeIndex === {{ $activeIndex }}) }"--}}
{{--                          x-show="highlightIndex === {{ $activeIndex }}"--}}
                    >
                    <x-dynamic-component :component="$checkIcon" :size="$checkIconSize" />
                </span>
                @endif
            </li>
            @php $activeIndex++; @endphp
        @endforeach
    </ul>
</div>
