<div x-cloak x-data="customSelect{{ Str::slug($id, '_') }}({ open: false, value: {{ $value }}, selected: {{ $value }} })" x-init="init()">

    <input type="text" name="{{ $name }}" id="{{ $id }}" @if($value)value="{{ $value }}"@endif x-model="value" x-on:change="changed()" class="mb-3" />
    <p class="py-2"><strong>Type:</strong> {{ $type }}</p>

    <label id="listbox-label" class="block text-sm font-medium text-gray-700">
        Assigned to
    </label>
    <div class="mt-1 relative">
        <button type="button"
                x-ref="button"
                @keydown.arrow-up.stop.prevent="onButtonClick()"
                @keydown.arrow-down.stop.prevent="onButtonClick()"
                @click="onButtonClick()" aria-haspopup="listbox"
                :aria-expanded="open"
                aria-labelledby="listbox-label"
                class="bg-white relative w-full border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-gray-500 focus:border-gray-500 sm:text-sm"
                aria-expanded="true"
        >
            <span x-text="mainText" class="block truncate"></span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <x-dynamic-component :component="$chevronIcon" :size="$chevronIconSize" />
            </span>
        </button>
        <div x-show="open"
             @click.away="open = false"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute mt-1 w-full rounded-md bg-white shadow-lg z-50"
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
                class="max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                x-max="1"
                aria-activedescendant=""
            >
                @if ($type === "select")
                    <li id="listbox-item-{{ $id }}-0"
                        role="option"
                        data-label="Please Select ..."
                        @click="choose(0)"
                        @mouseenter="selected = 0"
                        @mouseleave="selected = null"
                        :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }"
                        class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9"
                    >
                        <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }"
                              class="font-normal block truncate"
                        >
                            Please Select ...
                        </span>
                        <span x-show="value === 0"
                              :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }"
                              class="text-gray-600 absolute inset-y-0 right-0 flex items-center pr-4"
                              style="display: none;"
                        >
                            <x-dynamic-component :component="$selectedIcon" :size="$selectedIconSize" />
                        </span>
                    </li>
                @endif

                @foreach ($options as $option_id => $option)
                    <li id="listbox-item-{{ $id }}-{{ $option_id }}"
                        role="option"
                        data-label="{{ $option['label'] }}"
                        @click="choose({{ $option_id }})"
                        @mouseenter="selected = {{ $option_id }}"
                        @mouseleave="selected = null"
                        :class="{ 'text-white bg-gray-600': selected === {{ $option_id }}, 'text-gray-900': !(selected === {{ $option_id }}) }"
                        class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9"
                    >
                        <span :class="{ 'font-semibold': value === {{ $option_id }}, 'font-normal': !(value === {{ $option_id }}) }"
                              class="font-normal block truncate"
                        >
                            {{ $option['label'] }}
                        </span>
                        <span x-show="value === {{ $option_id }}"
                              :class="{ 'text-white': selected === {{ $option_id }}, 'text-gray-600': !(selected === {{ $option_id }}) }"
                              class="text-gray-600 absolute inset-y-0 right-0 flex items-center pr-4"
                              style="display: none;"
                        >
                            <x-dynamic-component :component="$selectedIcon" :size="$selectedIconSize" />
                        </span>
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
                    this.mainText = document.getElementById('listbox-item-{{ $id }}-' + this.selected).dataset.label;
                }
            },
            activeDescendant: null,
            optionCount: null,
            open: false,
            selected: null,
            value: 0,
            mainText: '',
            changed() {
                this.mainText = document.getElementById('listbox-item-{{ $id }}-' + this.value).dataset.label;
            },
            choose(option_id) {
                this.mainText = document.getElementById('listbox-item-{{ $id }}-' + option_id).dataset.label;

                document.getElementById("{{ $id }}").value = option_id;

                this.value = option_id;
                this.open = false;
            },
            onButtonClick() {
                if (this.open) {
                    return;
                }

                this.selected = this.value;
                this.open = true;
            },
            onOptionSelect() {
                if (this.selected !== null) {
                    this.value = this.selected;
                }

                this.open = false;
                this.$refs.button.focus();
            },
            onEscape() {
                this.open = false;
                this.$refs.button.focus();
            },
            onArrowUp() {
                // todo: make this actually work on button up/down
                this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
                this.$refs.listbox.children[this.selected].scrollIntoView({
                    block: 'nearest'
                });
            },
            onArrowDown() {
                // todo: make this actually work on button up/down
                this.selected = this.selected + 1 > this.optionCount - 1 ? 1 : this.selected + 1;
                this.$refs.listbox.children[this.selected].scrollIntoView({
                    block: 'nearest'
                });
            },
            ...options,
        }
    }
</script>