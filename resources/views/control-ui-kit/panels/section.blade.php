@if ($header)
<div>
    <x-panel-header>{{ $header }}</x-panel-header>
    <div {{ $attributes->merge($classes()) }}>{{ $slot }}</div>
</div>
@else
<div {{ $attributes->merge($classes()) }}>{{ $slot }}</div>
@endif
