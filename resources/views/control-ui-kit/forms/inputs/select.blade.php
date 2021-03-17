<div x-cloak x-data="customSelect{{ Str::slug($id, '_') }}({ selectOpen: false, value: {{ $value }}, selected: {{ $value }} })" x-init="init()">
    <input type="hidden" name="{{ $name }}" id="{{ $id }}" @if($value)value="{{ $value }}"@endif x-model="value" x-on:change="changed()" />

    <div class="relative">
        <button type="button"
                x-ref="button"
                @keydown.arrow-up.stop.prevent="onButtonClick()"
                @keydown.arrow-down.stop.prevent="onButtonClick()"
                @click="onButtonClick()" aria-haspopup="listbox"
                :aria-expanded="selectOpen"
                aria-labelledby="listbox-label"
                {{ $attributes->merge($classes('flex items-center space-x-2 py-0 px-0')) }}
        >
            <span class="flex items-center w-full space-x-2">
                @if ($image)<x-input.select.image x-bind:src="image" src="{{ $imageDefault }}" />@endif
                <span x-text="text" class="ml-3 block truncate grow py-1.5"></span>
                @if ($subtext)<span x-text="subtext" class="truncate text-gray-500"></span>@endif
            </span>
            <x-input.embed icon-right :icon="$iconRightIcon" :size="$iconRightSize" class="flex-shrink-0" />
        </button>

        <div x-show="selectOpen"
             @click.away="selectOpen = false"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute mt-1 rounded-md bg-white shadow-lg z-50"
        >
            <ul @keydown.enter.stop.prevent="onOptionSelect()"
                @keydown.space.stop.prevent="onOptionSelect()"
                @keydown.escape="onEscape()"
                @keydown.arrow-up.prevent="onArrowUp()"
                @keydown.arrow-down.prevent="onArrowDown()"
                x-ref="listbox"
                tabindex="-1"
                role="listbox"
                aria-labelledby="listbox-label"
                :aria-activedescendant="activeDescendant"
                x-max="1"
                aria-activedescendant="listbox-item-1"
                {{ $attributes->merge($classes()) }}
            >
                @if ($type === 'select')
                    <li id="listbox-item-{{ $id }}-0"
                        role="option"
                        data-text="{{ $pleaseSelectText }}"
                        @if ($subtext)data-subtext=""@endif
                        @if ($image)data-image="{{ $imageDefault }}"@endif
                        @click="choose(0)"
                        @mouseenter="selected = 0"
                        @mouseleave="selected = null"
                        :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }"
                        class="text-gray-900 cursor-default select-none relative py-2 pr-9"
                    >
                        <div class="flex items-center space-x-2">
                            @if ($image)<x-input.select.image src="{{ $imageDefault }}" />@endif

                            <x-input.select.text value="0" :option="$pleaseSelectText" :text="$textName()" />
                        </div>

                        <x-input.select.checked-icon value="0" :selected-icon="$selectedIcon" :selected-icon-size="$selectedIconSize" />
                    </li>
                @endif

                @foreach ($options as $option_id => $option)
                    <li id="listbox-item-{{ $id }}-{{ $option_id }}"
                        role="option"
                        data-text="{{ is_string($option) ? $option : $option[$textName()] }}"
                        @if ($subtext)data-subtext="{{ $option[$subtext] }}"@endif
                        @if ($image)data-image="{{ $option[$image] }}"@endif
                        @click="choose({{ $option_id }})"
                        @mouseenter="selected = {{ $option_id }}"
                        @mouseleave="selected = null"
                        :class="{ 'text-white bg-gray-600': selected === {{ $option_id }}, 'text-gray-900': !(selected === {{ $option_id }}) }"
                        class="text-gray-900 cursor-default select-none relative py-2 pr-9"
                    >
                        <div class="flex items-center space-x-2">
                            @if ($image)<x-input.select.image src="{{ $option[$image] }}" />@endif
                            <x-input.select.text value="{{ $option_id }}" :option="$option" :text="$textName()"  :subtext="$subtext" />
                        </div>

                        <x-input.select.checked-icon value="{{ $option_id }}" :selected-icon="$selectedIcon" :selected-icon-size="$selectedIconSize" />
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script>
    function customSelect{{ Str::slug($id, '_') }}(options) {
        return {
            init() {
                if (this.selected !== undefined) {
                    this.text = document.getElementById('listbox-item-{{ $id }}-' + this.selected).dataset.text;
                    @if ($subtext)this.subtext = document.getElementById('listbox-item-{{ $id }}-' + this.selected).dataset.subtext;@endif
                    @if ($image)this.image = document.getElementById('listbox-item-{{ $id }}-' + this.selected).dataset.image;@endif
                }
            },
            activeDescendant: null,
            optionCount: null,
            selectOpen: false,
            selected: null,
            value: 0,
            text: '',
            @if ($subtext)subtext: '',@endif
            @if ($image)image: '',@endif
            changed() {
                this.text = document.getElementById('listbox-item-{{ $id }}-' + this.value).dataset.text;
                @if ($subtext)this.subtext = document.getElementById('listbox-item-{{ $id }}-' + this.selected).dataset.subtext;@endif
                @if ($image)this.image = document.getElementById('listbox-item-{{ $id }}-' + this.value).dataset.image;@endif
            },
            choose(option_id) {
                this.text = document.getElementById('listbox-item-{{ $id }}-' + option_id).dataset.text;
                @if ($subtext)this.subtext = document.getElementById('listbox-item-{{ $id }}-' + this.selected).dataset.subtext;@endif
                @if ($image)this.image = document.getElementById('listbox-item-{{ $id }}-' + option_id).dataset.image;@endif

                document.getElementById("{{ $id }}").value = option_id;

                this.value = option_id;
                this.selectOpen = false;
            },
            onButtonClick() {
                if (this.selectOpen) {
                    return;
                }

                this.selected = this.value;
                this.selectOpen = true;
            },
            onOptionSelect() {
                // if (this.selected !== null) {
                //     this.value = this.selected;
                // }
                //
                // this.open = false;
                // this.$refs.button.focus();
            },
            onEscape() {
                this.open = false;
                this.$refs.button.focus();
            },
            onArrowUp() {
                // todo: make this actually work on button up/down
                // this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
                // this.$refs.listbox.children[this.selected].scrollIntoView({
                //     block: 'nearest'
                // });
            },
            onArrowDown() {
                // todo: make this actually work on button up/down
                // this.selected = this.selected + 1 > this.optionCount - 1 ? 1 : this.selected + 1;
                // this.$refs.listbox.children[this.selected].scrollIntoView({
                //     block: 'nearest'
                // });
            },
            ...options,
        }
    }
</script>
