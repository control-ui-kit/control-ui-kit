<div
    x-data="{
        show: false,
        loading: false,
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
        },
        maxWidth: '{{ $maxWidth }}',
        openModal() {
            this.show = true
            this.loading = false
            this.maxWidth = this.width(this.maxWidth)
        },
        @if($action === 'ajax')
        submitAction(form) {
            this.loading = true
            let data = new FormData(form)
            @if($fields)
            let allowed = {!! json_encode(array_map('trim', explode(',', $fields))) !!}
            let filtered = new FormData()
            for (let key of allowed) { if (data.has(key)) filtered.append(key, data.get(key)) }
            data = filtered
            @endif
            fetch(form.action, {
                method: form.method,
                body: data,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => {
                if (! response.ok) throw response
                return response.json()
            })
            .then(result => {
                this.show = false
                this.loading = false
                window.dispatchEvent(new CustomEvent('open-modal', {
                    detail: { id: '{{ $resultsModal }}', type: result.type ?? 'success', title: result.title ?? result.message ?? '', content: result.content ?? '' }
                }))
            })
            .catch(() => {
                this.show = false
                this.loading = false
                window.dispatchEvent(new CustomEvent('open-modal', {
                    detail: { id: '{{ $resultsModal }}', type: 'danger' }
                }))
            })
        },
        @endif
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
    class="fixed top-0 inset-x-0 z-100 px-0 flex items-top justify-center h-72"
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
         class="text-modal absolute top-1/2 bg-modal border border-modal rounded overflow-hidden shadow-xl transform transition-all w-11/12 sm:w-full leading-5"
         :class="{ [maxWidth]: true }"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        <form method="POST" action="{{ $route }}"@if($action === 'ajax') x-on:submit.prevent="submitAction($event.target)"@endif>
            @csrf
            @if($needsMethodSpoofing)
                @method($method)
            @endif

            <div class="p-4">
                {{ $slot }}
            </div>

            <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
                <button type="button" x-on:click="show = false">{{ $no }}</button>
                <button type="submit" :disabled="loading" x-on:click="loading = true">
                    <span x-show="!loading">{{ $yes }}</span>
                    <span x-show="loading">{{ $confirming }}</span>
                </button>
            </div>
        </form>
    </div>
</div>
@if($autoResultsModal)

    <x-modal-dialog id="{{ $resultsModal }}"
        x-on:open-modal.window="if ($event.detail.id === '{{ $resultsModal }}') { detail = { ...detail, ...$event.detail }; openModal() }">
        <x-slot name="footer">
            <button type="button" x-on:click="show = false" x-text="detail.button || '{{ $close }}'"></button>
        </x-slot>
    </x-modal-dialog>
@endif
