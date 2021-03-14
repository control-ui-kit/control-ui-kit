<span :class="{ 'font-semibold': value === {{ $value }}, 'font-normal': !(value === {{ $value }}) }" class="ml-3 block font-normal truncate">
    {{ $usingOptionArray() ? $option[$text] : $option }}
</span>
@if ($subtext && $usingOptionArray())
    <span :class="{ 'text-gray-200': selected === {{ $value }}, 'text-gray-500': !(selected === {{ $value }}) }" class="truncate text-gray-500">
        {{ $option[$subtext] }}
    </span>
@endif