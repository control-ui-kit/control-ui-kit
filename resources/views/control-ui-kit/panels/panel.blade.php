@isset($title)<div class="flex flex-col {{ $widthClasses() }}">@endisset
@isset($title)<x-title>{{ $title }}</x-title>@endisset
<div {{ $attributes->merge($noPaddingClasses()) }}>
@if ($header)
    <x-panel-header>{{ $header }}</x-panel-header>
    <div class="{{ $panelClasses() }}">
@endif
@if ($dynamicComponent)
    <x-dynamic-component component="{{ $dynamicComponent }}" />
@else
    {{ $slot }}
@endif
@if ($header)
    </div>
@endif
@if ($footer)
    <x-panel-footer>{{ $footer }}</x-panel-footer>
@endif
</div>
@isset($title)</div>@endisset
