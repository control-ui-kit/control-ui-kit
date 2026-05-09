<div {{ $attributes->only('class') }}>
    <div class="{{ $wrapper }}">
        <x-label :for="is_null($for) ? $name : $for" class="{{ $labelStyle }}" :styles="$labelStyles">
            <p class="{{ $textStyle }}">
                <span>{!! $label !!}</span>
                @if ($required)
                    <x-icon-star size="{{ $requiredSize }}" color="{{ $requiredColor }}" />
                @endif
                @if ($tooltip)
                    <span
                        x-data="{
                            open: false,
                            top: 0,
                            left: 0,
                            show(btn) {
                                const r = btn.getBoundingClientRect();
                                this.top = r.bottom + 6;
                                this.left = r.left;
                                if (this.left + 288 > window.innerWidth) {
                                    this.left = window.innerWidth - 296;
                                }
                                this.open = true;
                            }
                        }"
                        class="inline-block ml-1 align-middle"
                    >
                        <button
                            type="button"
                            @click.stop.prevent="open ? open = false : show($el)"
                            @keydown.escape.window="open = false"
                            class="text-muted hover:text-brand focus:outline-none"
                            aria-label="More information"
                        >
                            <x-icon-info-circle size="h-4 w-4" />
                        </button>
                        <template x-teleport="body">
                            <div
                                x-show="open"
                                @click.outside="open = false"
                                @keydown.escape.window="open = false"
                                @scroll.window="open = false"
                                role="tooltip"
                                :style="{ top: top + 'px', left: left + 'px' }"
                                class="fixed z-50 w-72 rounded border border-panel bg-panel p-3 text-sm text-panel shadow-lg"
                            >
                                {!! $tooltip !!}
                            </div>
                        </template>
                    </span>
                @endif
            </p>
            @if ($help)
                <p class="{{ $helpStyle }}">{!! $help !!}</p>
            @endif
        </x-label>
        <div class="{{ $contentStyle }}">
            @if ($input && $slot->isEmpty())
                <div class="{{ $slotStyle }}">
                    <x-dynamic-component :component="$input" :name="$name" {{ $attributes->whereDoesntStartWith('error')->except(['required', 'class']) }} />
                </div>
            @else
                <div class="{{ $slotStyle }}" {{ $attributes->whereDoesntStartWith('error')->except(['required', 'class']) }}>
                    {{ $slot }}
                </div>
            @endif
            <x-error field="{{ $name }}" :styles="$errorStyles" />
            @if ($underneath)
                <p class="{{ $underneathStyle }}">{!! $underneath !!}</p>
            @endif
        </div>
    </div>
</div>
