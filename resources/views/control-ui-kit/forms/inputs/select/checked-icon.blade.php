<span x-show="value === {{ $value }}"
      :class="{ 'text-white': selected === {{ $value }}, 'text-gray-600': !(selected === {{ $value }}) }"
      class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600"
      style="display: none;"
>
    <x-dynamic-component :component="$selectedIcon" :size="$selectedIconSize" />
</span>

