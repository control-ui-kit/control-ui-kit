<div {{ $attributes->only('class')->merge(['class' => $wrapper]) }}>
    <x-label :for="is_null($for) ? $name : $for" class="{{ $labelStyle }}" :styles="$labelStyles">
        <div class="{{ $textStyle }}">
            <span>{!! $label !!}</span>
            @if ($required)
                <x-icon-star size="{{ $requiredSize }}" color="{{ $requiredColor }}" />
            @endif
            @if (($tooltip || isset($tooltipContent)) && in_array($tooltipType, ['icon', 'field'], true))
                <x-tooltip :text="$tooltip" wrapper="ml-auto float-right">
                    @isset($tooltipContent)
                        <x-slot:text>{{ $tooltipContent }}</x-slot:text>
                    @endisset
                    <x-dynamic-component :component="$tooltipIcon" size="h-4 w-4" class="text-muted" />
                </x-tooltip>
            @endif
        </div>
        @if ($help)
            <p class="{{ $helpStyle }}">{!! $help !!}</p>
        @endif
    </x-label>
    <div class="{{ $contentStyle }}">
        @if ($input && $slot->isEmpty())
            <div class="{{ $slotStyle }}">
                @if (($tooltip || isset($tooltipContent)) && $tooltipType === 'input')
                    <x-tooltip :text="$tooltip" :position="$tooltipPosition" wrapper="block w-full">
                        @isset($tooltipContent)
                            <x-slot:text>{{ $tooltipContent }}</x-slot:text>
                        @endisset
                        <x-dynamic-component :component="$input" :name="$name" {{ $attributes->except(['class', 'required']) }} />
                    </x-tooltip>
                @else
                    <x-dynamic-component :component="$input" :name="$name" {{ $attributes->except(['class', 'required']) }} />
                @endif
            </div>
        @else
            <div class="{{ $slotStyle }}" {{ $attributes->except(['class', 'required']) }}>
            {{ $slot }}
            </div>
        @endif
        <x-error field="{{ $name }}" :styles="$errorStyles" />
        @if ($help)
            <p class="{{ $helpMobile }}">{!! $help !!}</p>
        @endif
        @if ($underneath)
            <p class="{{ $underneathStyle }}">{!! $underneath !!}</p>
        @endif
    </div>
</div>
