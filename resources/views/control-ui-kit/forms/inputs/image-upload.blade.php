@php
    $pc = $previewClasses();
    $wc = $wrapperClasses()['class'] ?? '';
@endphp
<div x-data="Components.inputImageUpload()" {{ $attributes->merge(['class' => $containerClass])->only(['class']) }}>
    @if ($display === 'above')
        <img x-show="src" x-cloak :src="src"{!! $pc ? ' class="'.$pc.'"' : '' !!} />
    @endif
    <div{!! $wc ? ' class="'.$wc.'"' : '' !!}>
        <input
            name="{{ $name }}"
            type="file"
            id="{{ $id }}"
            @if ($accept) accept="{{ $accept }}" @endif
            @if ($capture) capture="{{ $capture }}" @endif
            @if ($requiredInput) required @endif
            x-on:change="previewImage($event)"
            {{ $attributes->whereDoesntStartWith(['class', 'required'])->merge($inputClasses()) }}
        />
    </div>
    @if ($display !== 'above')
        <img x-show="src" x-cloak :src="src"{!! $pc ? ' class="'.$pc.'"' : '' !!} />
    @endif
</div>
