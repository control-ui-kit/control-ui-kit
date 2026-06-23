@php
    [$posTop, $posLeft] = match($position) {
        'bottom' => ['r.bottom + gap', 'r.left + r.width / 2'],
        'left'   => ['r.top + r.height / 2', 'r.left - gap'],
        'right'  => ['r.top + r.height / 2', 'r.right + gap'],
        default  => ['r.top - gap', 'r.left + r.width / 2'],
    };
    $transform = match($position) {
        'bottom' => 'translate(-50%, 0)',
        'left'   => 'translate(-100%, -50%)',
        'right'  => 'translate(0, -50%)',
        default  => 'translate(-50%, -100%)',
    };
    $isHorizontal = in_array($position, ['left', 'right']);
@endphp
<div class="{{ $wrapper }}"
     x-data="{
         open: false,
         top: 0,
         left: 0,
         show(el) {
             const r = el.getBoundingClientRect(), gap = 4;
             this.top = {{ $posTop }};
             this.left = {{ $posLeft }};
             this.open = true;
         },
         hide() {
             this.open = false;
         }
     }"
     @mouseenter="show($el)" @mouseleave="hide()">
    {{ $slot }}
    <template x-teleport="body">
        <div x-show="open"
             :style="`position:fixed;top:${top}px;left:${left}px;transform:{{ $transform }}`"
             class="z-50 pointer-events-none flex {{ $isHorizontal ? 'flex-row' : 'flex-col' }} items-center"
             role="tooltip">
            @if ($position === 'bottom')
                <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-b-[5px]"
                     style="border-bottom-color: {{ $arrow }}"></div>
            @elseif ($position === 'right')
                <div class="w-0 h-0 border-t-[5px] border-t-transparent border-b-[5px] border-b-transparent border-r-[5px]"
                     style="border-right-color: {{ $arrow }}"></div>
            @endif
            <div class="{{ $tooltipClasses() }}">{{ $text }}</div>
            @if ($position === 'left')
                <div class="w-0 h-0 border-t-[5px] border-t-transparent border-b-[5px] border-b-transparent border-l-[5px]"
                     style="border-left-color: {{ $arrow }}"></div>
            @elseif ($position !== 'bottom' && $position !== 'right')
                <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]"
                     style="border-top-color: {{ $arrow }}"></div>
            @endif
        </div>
    </template>
</div>
