<div class="relative " x-data="{ open: false }">
    <x-dynamic-component :component="$icon" @click.prevent="open = !open" class="cursor-pointer hover:text-brand-500" />

    <x-dropdown-menu x-show="open"
                     @click.away="open = false"
                     padding="right-0 top-0 z-40 w-max"
                     x-on:mouseleave="timeout = setTimeout(() => { open = false }, 300)"
    >
        {{ $slot }}
    </x-dropdown-menu>
</div>
