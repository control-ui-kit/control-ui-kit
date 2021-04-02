<span x-data="Components.toggle({ on: '{{ $on }}', off: '{{ $off }}', value: '{{ $value }}' })" {{ $attributes->merge($classes()) }}>
    <button type="button"
            :class="{ '{{ $baseStateOn() }}': value == on, '{{ $baseStateOff() }}': value == off }"
            class="{{ $baseClasses() }}"
            @click.prevent="toggle()"
    >
        <span :class="{ '{{ $switchStateOn() }}': value == on, '{{ $switchStateOff() }}': value == off }" class="{{ $switchClasses() }}"></span>
    </button>
    <input type="hidden" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" x-model="value" />
</span>
