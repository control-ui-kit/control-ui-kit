<div
    x-data="{
        show: false,
        loading: false,
        @include('control-ui-kit::control-ui-kit.modals.partials.focus-trap')
        @include('control-ui-kit::control-ui-kit.modals.partials.scroll-lock')
        detail: {
            type: '{{ $type }}',
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
            let allowed = {!! json_encode(array_map('trim', explode(',', $fields)), JSON_THROW_ON_ERROR) !!}
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
        <form method="POST" action="{{ $route }}" class="{{ $form }}"
              @if($action === 'ajax') x-on:submit.prevent="submitAction($event.target)"@endif>
            @csrf
            @if($needsMethodSpoofing)
                @method($method)
            @endif

            @isset($title)
                <div class="{{ $titleClass }}">
                    <x-alert type="default" x-show="detail.type == 'default'">{{ $title }}</x-alert>
                    <x-alert type="brand" x-show="detail.type == 'brand'">{{ $title }}</x-alert>
                    <x-alert type="danger" x-show="detail.type == 'danger'">{{ $title }}</x-alert>
                    <x-alert type="info" x-show="detail.type == 'info'">{{ $title }}</x-alert>
                    <x-alert type="success" x-show="detail.type == 'success'">{{ $title }}</x-alert>
                    <x-alert type="warning" x-show="detail.type == 'warning'">{{ $title }}</x-alert>
                </div>
            @endisset

            <div class="{{ $body }} text-sm leading-6">
                {{ $slot }}
            </div>

            <div
                class="{{ $footer }}">
                <x-button type="submit" x-bind:disabled="loading" width="min-w-20 space-x-0!" :single-click="false">
                    <span x-show="!loading">{{ $yes }}</span>
                    <span x-show="loading">{{ $confirming }}</span>
                </x-button>
                <x-button type="button" x-on:click="show = false" width="min-w-20 space-x-0!">{{ $no }}</x-button>
            </div>
        </form>
    </div>
</div>

@if($autoResultsModal)
    <x-modal-dialog
        id="{{ $resultsModal }}"
        x-on:open-modal.window="if ($event.detail.id === '{{ $resultsModal }}') { detail = { ...detail, ...$event.detail }; openModal() }"
    >
        <x-slot name="footer">
            <x-button type="button" x-on:click="show = false" x-text="detail.button || '{{ $close }}'"></x-button>
        </x-slot>
    </x-modal-dialog>
@endif
