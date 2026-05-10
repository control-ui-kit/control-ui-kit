@php
    $tc = $trackClasses();
    $bc = $barClasses();
    $lc = $labelClasses();
@endphp
<div x-data='Components.progressBar({"value": {{ $value }}, "min": {{ $min }}, "max": {{ $max }}})' x-modelable="value" {{ $attributes->merge(['class' => $tc])->only(['class']) }}>
    <div :style="'width: ' + percentage + '%'"{!! $bc ? ' class="'.$bc.'"' : '' !!}></div>
    @if ($showValue)
        <span{!! $lc ? ' class="'.$lc.'"' : '' !!} x-text="percentage + '%'"></span>
    @endif
</div>
