@php
    $wc = $wrapperClasses();
    $ic = $inputClasses();
    $tc = $tagClasses();
    $tcc = $tagCloseClasses();
@endphp
<div x-data='Components.inputTags({"tags": @json($tags), "maxTags": {{ $max }}})' x-modelable="tags" {{ $attributes->merge(['class' => $wc])->only(['class']) }}>
    <template x-for="(tag, index) in tags" :key="tag">
        <span{!! $tc ? ' class="'.$tc.'"' : '' !!}>
            <span x-text="tag"></span>
            <button type="button" x-on:click="removeTag(index)"{!! $tcc ? ' class="'.$tcc.'"' : '' !!}>&times;</button>
            <input type="hidden" name="{{ $name }}[]" :value="tag" />
        </span>
    </template>
    <input
        id="{{ $id }}"
        type="text"
        x-model="input"
        x-on:keydown="onKeydown($event)"
        @if ($placeholder) placeholder="{{ $placeholder }}" @endif
        {{ $attributes->except(['class'])->merge(['class' => $ic])->whereDoesntStartWith(['wire:model']) }}
    />
</div>
