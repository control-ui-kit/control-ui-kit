<div
    x-data="{
        @if ($attributes->has('wire:model'))
        show: @entangle($attributes->wire('model')),
        @else
        show: false,
        @endif
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
        autofocus() { let focusable = $el.querySelector('[autofocus]'); if (focusable) focusable.focus() },
        detail: {
            type: 'default',
            button: '{{ $close }}',
            yes_button: '{{ $yes }}',
            no_button: '{{ $no }}',
            yes_action: 'show = false',
            no_action: 'show = false',
        },
        maxWidth: '{{ $maxWidth }}',
        openModal() {
            this.show = true
            this.detail.button = this.detail.button ?? '{{ $close }}'
            this.detail.yes_button = this.detail.yes_button ?? '{{ $yes }}'
            this.detail.no_button = this.detail.no_button ?? '{{ $no }}'
            this.detail.yes_action = this.detail.yes_action ?? 'show = false'
            this.detail.no_action = this.detail.no_action ?? 'show = false'
            this.maxWidth = this.width(this.maxWidth)
            if (Array.isArray(this.detail.content)) {
                this.detail.content = '<p>' + this.detail.content.join('</p><p>') + '</p>';
            }
        },
        width(maxWidth) {
            switch (maxWidth) {
                case 'sm':
                    return 'sm:max-w-sm';
                case 'md':
                    return 'sm:max-w-md';
                case 'lg':
                    return 'sm:max-w-lg';
                case '2xl':
                    return 'sm:max-w-2xl';
                case 'xl':
                default:
                    return 'sm:max-w-xl';
            }
        }
    }"
    x-init="$watch('show', value => value && setTimeout(autofocus, 50))"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    id="{{ $id }}"
    class="fixed top-0 inset-x-0 z-100 sm:px-0 sm:flex sm:items-top sm:justify-center h-72"
    style="display: none;"
    {{ $attributes->except('model') }}
>
    <div x-show="show"
         class="fixed inset-0 transform transition-all"
         x-on:click="show = false"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-modal-blur opacity-75"></div>
    </div>

    <div x-show="show"
         class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all sm:w-full leading-5"
         :class="{ [maxWidth]: true }"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        {{ $slot }}
    </div>
</div>
