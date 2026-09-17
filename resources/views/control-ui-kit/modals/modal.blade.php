<div
    x-data="{
        @if ($attributes->has('wire:model'))
        show: @entangle($attributes->wire('model')),
        @else
        show: false,
        @endif
        @include('control-ui-kit::control-ui-kit.modals.partials.focus-trap')
        @include('control-ui-kit::control-ui-kit.modals.partials.scroll-lock')
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
            this.maxWidth = this.width(this.detail.width ?? this.maxWidth)
            if (Array.isArray(this.detail.content)) {
                this.detail.content = '<p>' + this.detail.content.join('</p><p>') + '</p>';
            }
        },
        @include('control-ui-kit::control-ui-kit.modals.partials.max-width')
    }"
    x-init="$watch('show', value => value && setTimeout(autofocus, 50))"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    id="{{ $id }}"
    class="{{ $overlay }}"
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
         class="{{ $panel }}"
         :class="{ [maxWidth]: true }"
         role="dialog"
         aria-modal="true"
         tabindex="-1"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        {{ $slot }}
    </div>
</div>
