@if ($header)
<div>
    <x-panel-header :sub-text="$sub_text" :sub-url="$sub_url">{{ $header }}</x-panel-header>
    <div {{ $attributes->merge($classes()) }}>{{ $slot }}</div>
</div>
@else
<div {{ $attributes->merge($classes()) }}>{{ $slot }}</div>
@endif
