<x-dynamic-component :component="$layout" :input="$input" :help="$help" :tooltip="$tooltip" :tooltip-type="$tooltipType" :tooltip-icon="$tooltipIcon" :tooltip-position="$tooltipPosition" :underneath="$underneath" {{ $attributes }}>
    @isset($tooltipContent)
        <x-slot:tooltip-content>{{ $tooltipContent }}</x-slot:tooltip-content>
    @endisset
</x-dynamic-component>
