<li id="list-box-item-{{ $id }}-{{ $value }}"
    role="option"
    data-text="{{ $text }}"
    @if ($subtext) data-subtext="{{ $subtext }}" @endif
    @if ($image) data-image="{{ $image }}" @endif
    @click="choose('{{ $value }}')"
    @mouseenter="selected = '{{ $value }}'"
    @mouseleave="selected = null"
    :class="{ '{{ $optionSelected() }}': selected === '{{ $value }}', '{{ $optionUnselected() }}': selected !== '{{ $value }}' }"
    class="{{ $optionClasses() }}"
>
    <div class="flex items-center space-x-2">
        @if ($image) <x-input-select.image src="{{ $image }}" /> @endif
        <x-input-select.text :styles="$textStyles" :value="$value" :text="$text" :subtext="$subtext" />
    </div>

    <div x-show="value === '{{ $value }}'"
          :class="{ '{{ $checkSelected() }}': selected === '{{ $value }}', '{{ $checkUnselected() }}': selected !== '{{ $value }}' }"
          class="{{ $checkClasses() }}"
    >
        <x-dynamic-component :component="$icon" :size="$iconSize" />
    </div>
</li>
