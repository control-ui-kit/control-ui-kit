@isset($title)
    <x-legend>{{ $title }}</x-legend>
@endisset

<div {{ $attributes->merge([ 'class' => "bg-panel text-panel $padding $margin $border $shadow $rounded"]) }}>
    {{ $slot }}
</div>
