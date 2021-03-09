<div x-cloak x-data="customSelect{{ Str::slug($id, '_') }}({ open: false, value: {{ $value }}, selected: {{ $value }} })" x-init="init()">
    <input type="hidden" name="{{ $name }}" id="{{ $id }}" @if($value)value="{{ $value }}"@endif x-model="value" x-on:change="changed()" />

    <div class="relative">
        <button type="button"
                x-ref="button"
                @keydown.arrow-up.stop.prevent="onButtonClick()"
                @keydown.arrow-down.stop.prevent="onButtonClick()"
                @click="onButtonClick()" aria-haspopup="listbox"
                :aria-expanded="open"
                aria-labelledby="listbox-label"
                {{ $attributes->merge($classes('flex items-center space-x-2 py-0 px-0')) }}
        >
            <span class="flex items-center w-full pl-2">
                @if ($image)
                    <img x-bind:src="image" src="{{ $imageDefault }}"
                         alt=""
                         class="flex-shrink-0 h-6 w-6 rounded-full"
                    >
                @endif
                <span x-text="title" class="ml-3 block truncate grow py-1.5"></span>
            </span>
            <x-input.embed icon-right :icon="$iconRightIcon" :size="$iconRightSize" class="flex-shrink-0" />
        </button>

        <div x-show="open"
             @click.away="open = false"
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
                        data-title="{{ $pleaseSelectText }}"
                        @if ($subtitle)
                            data-subtitle=""
                        @endif
                        @if ($image)
                            data-image="{{ $imageDefault }}"
                        @endif
                        @click="choose(0)"
                        @mouseenter="selected = 0"
                        @mouseleave="selected = null"
                        :class="{ 'text-white bg-gray-600': selected === 0, 'text-gray-900': !(selected === 0) }"
                        class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9"
                    >
                        <div class="flex items-center">
                            @if ($image)
                                <img src="{{ $imageDefault }}" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                            @endif
                            <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }"
                                  class="ml-3 block font-normal truncate"
                            >
                                {{ $pleaseSelectText }}
                            </span>
                        </div>

                        <span x-show="value === 0"
                              :class="{ 'text-white': selected === 0, 'text-gray-600': !(selected === 0) }"
                              class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600"
                              style="display: none;"
                        >
                            <x-dynamic-component :component="$selectedIcon" :size="$selectedIconSize" />
                        </span>
                    </li>
                @endif

                @foreach ($options as $option_id => $option)
                    <li id="listbox-item-{{ $id }}-{{ $option_id }}"
                        role="option"
                        data-title="{{ is_string($option) ? $option : $option[$titleName()] }}"
                        @if ($subtitle)
                            data-subtitle="{{ $option[$subtitleName] }}"
                        @endif
                        @if ($image)
                            data-image="{{ $option[$imageName] }}"
                        @endif
                        @click="choose({{ $option_id }})"
                        @mouseenter="selected = {{ $option_id }}"
                        @mouseleave="selected = null"
                        :class="{ 'text-white bg-gray-600': selected === {{ $option_id }}, 'text-gray-900': !(selected === {{ $option_id }}) }"
                        class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9"
                    >
                        <div class="flex items-center space-x-2">
                            @if ($image)
                                <img src="{{ $option[$imageName] }}" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                            @endif
                            <span :class="{ 'font-semibold': value === {{ $option_id }}, 'font-normal': !(value === {{ $option_id }}) }"
                                  class="ml-3 block font-normal truncate"
                            >
                                {{ is_string($option) ? $option : $option[$titleName()] }}
                            </span>
                            @if ($subtitle)
                                <span :class="{ 'text-gray-200': selected === {{ $option_id }}, 'text-gray-500': !(selected === {{ $option_id }}) }"
                                      class="truncate text-gray-500"
                                >
                                    {{ $option[$subtitleName] }}
                                </span>
                            @endif
                        </div>

                        <span x-show="value === {{ $option_id }}"
                              :class="{ 'text-white': selected === {{ $option_id }}, 'text-gray-600': !(selected === {{ $option_id }}) }"
                              class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600"
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
                    this.title = document.getElementById('listbox-item-{{ $id }}-' + this.selected).dataset.title;
                    @if ($subtitle)
                        this.subtitle = document.getElementById('listbox-item-{{ $id }}-' + this.selected).dataset.subtitle;
                    @endif
                    @if ($image)
                        this.image = document.getElementById('listbox-item-{{ $id }}-' + this.selected).dataset.image;
                    @endif
                }
            },
            activeDescendant: null,
            optionCount: null,
            open: false,
            selected: null,
            value: 0,
            title: '',
            @if ($subtitle)
                subtitle: '',
            @endif
            @if ($image)
                image: '',
            @endif
            changed() {
                this.title = document.getElementById('listbox-item-{{ $id }}-' + this.value).dataset.title;
                @if ($image)
                    this.image = document.getElementById('listbox-item-{{ $id }}-' + this.value).dataset.image;
                @endif
            },
            choose(option_id) {
                this.title = document.getElementById('listbox-item-{{ $id }}-' + option_id).dataset.title;
                @if ($image)
                    this.image = document.getElementById('listbox-item-{{ $id }}-' + option_id).dataset.image;
                @endif

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