@isset($title)<div class="flex flex-col">@endisset
@isset($title)<x-title>{{ $title }}</x-title>@endisset

<div @if($styles()) {{ $attributes->merge([ 'class' => "$background $border $color $font $other $padding $rounded $shadow"]) }} @endif>
@if ($dynamicComponent)
    <x-dynamic-component component="{{ $dynamicComponent }}" />
@else
    {{ $slot }}
@endif
</div>

@isset($title)</div>@endisset
