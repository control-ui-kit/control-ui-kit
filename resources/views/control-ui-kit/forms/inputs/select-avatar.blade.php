<input type="text"
       name="{{ $name }}"
       id="{{ $id }}"
       @if($value)value="{{ $value }}"@endif
/>

<div x-data="customSelect({ open: false, value: 0, selected: 0 })" x-init="init()">
    <label id="listbox-label" class="block text-sm font-medium text-gray-700">
        Assigned to
    </label>
    <div class="mt-1 relative">
        <button type="button" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
            <span class="flex items-center">
                <img :src="['https://pbs.twimg.com/profile_images/1364491704817098753/V22-Luf7_400x400.jpg', 'https://pbs.twimg.com/profile_images/988775660163252226/XpgonN0X_400x400.jpg', 'https://pbs.twimg.com/profile_images/1329647526807543809/2SGvnHYV_400x400.jpg', 'https://pbs.twimg.com/profile_images/1349837426626330628/CRMNXzQJ_400x400.jpg'][value]" src="https://pbs.twimg.com/profile_images/1364491704817098753/V22-Luf7_400x400.jpg" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                <span x-text="['Elon Musk', 'Bill Gates', 'Barack Obama', 'President Biden'][value]" class="ml-3 block truncate">Arlene Mccoy</span>
            </span>
            <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </span>
        </button>

        <div x-show="open" @click.away="open = false" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 w-full rounded-md bg-white shadow-lg" style="display: none;">
            <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" class="max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm" x-max="1" aria-activedescendant="listbox-item-1">
                @foreach ($options as $option)
                    <li x-state:on="Highlighted" x-state:off="Not Highlighted" id="listbox-item-{{ $loop->index }}" role="option" @click="choose({{ $loop->index }})" @mouseenter="selected = {{ $loop->index }}" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === {{ $loop->index }}, 'text-gray-900': !(selected === {{ $loop->index }}) }" class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9">
                        <div class="flex items-center">
                            <img src="{{ $option['avatar'] }}" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                            <span x-state:on="Selected" x-state:off="Not Selected" :class="{ 'font-semibold': value === {{ $loop->index }}, 'font-normal': !(value === {{ $loop->index }}) }" class="ml-3 block font-normal truncate">
                                {{ $option['label'] }}
                            </span>
                        </div>

                        <span x-state:on="Highlighted" x-state:off="Not Highlighted" x-show="value === {{ $loop->index }}" :class="{ 'text-white': selected === {{ $loop->index }}, 'text-gray-600': !(selected === {{ $loop->index }}) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600" style="display: none;">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script>
    function customSelect(options) {
        return {
            init() {
                this.optionCount = this.$refs.listbox.children.length;
                this.$watch('selected', (value) => {
                    if (!this.open) {
                        return;
                    }

                    if (this.selected === null) {
                        this.activeDescendant = '';

                        return;
                    }

                    this.activeDescendant = this.$refs.listbox.children[this.selected].id;

                    document.getElementById("{{ $id }}").value = this.selected;
                })
            },
            activeDescendant: null,
            optionCount: null,
            open: false,
            selected: null,
            value: 0,
            choose(option) {
                this.value = option;
                this.open = false;
            },
            onButtonClick() {
                if (this.open) {
                    return;
                }

                this.selected = this.value;
                this.open = true;
                this.$nextTick(() => {
                    this.$refs.listbox.focus();
                    this.$refs.listbox.children[this.selected].scrollIntoView({
                        block: 'nearest'
                    });
                })
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
                this.selected = this.selected - 1 < 0 ? this.optionCount - 1 : this.selected - 1;
                this.$refs.listbox.children[this.selected].scrollIntoView({
                    block: 'nearest'
                });
            },
            onArrowDown() {
                this.selected = this.selected + 1 > this.optionCount - 1 ? 1 : this.selected + 1;
                this.$refs.listbox.children[this.selected].scrollIntoView({
                    block: 'nearest'
                });
            },
            ...options,
        }
    }
</script>