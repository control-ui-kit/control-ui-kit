<span x-data="{{ $name }}UiToggle()" {{ $attributes }}>
    <button type="button"
            :class="{ 'bg-input-brand': value == on, 'bg-input-muted': value == off }"
            class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand focus:ring-offset-input"
            @click.prevent="toggle()"
    >
        <span :class="{ 'translate-x-5': value == on, 'translate-x-0': value == off }"
              class="pointer-events-none translate-x-0 inline-block h-5 w-5 rounded-full bg-input shadow transform ring-0 transition ease-in-out duration-200"></span>
    </button>
    <x-input.hidden :name="$name" :id="$id" :value="$value" x-model="value" />
    <script>
        const {{ $name }}UiToggle = () => ({
            value: '{{ $value }}',
            on: '{{ $on }}',
            off: '{{ $off }}',
            toggle() {
                this.value = (this.value === this.on) ? this.off : this.on;
            }
        });
    </script>
</span>
