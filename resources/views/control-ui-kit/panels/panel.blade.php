@isset($title)<div class="flex flex-col">@endisset
@isset($title)<x-title>{{ $title }}</x-title>@endisset

<div {{ $attributes->merge([ 'class' => "$background $color $padding $border $shadow $rounded"]) }}>
    @if ($dynamicComponent)
        <x-dynamic-component component="{{ $dynamicComponent }}" />
    @else
        {{ $slot }}
    @endif
</div>

@isset($title)</div>@endisset
