@props([
    'placeholder' => 'search'
])

<form wire:submit.prevent="action">
    <div class="flex relative">
        <div class="absolute flex inset-y-0 items-center left-0 pl-1 pointer-events-none">
            <x-icon.search class="text-muted p-0.5" />
        </div>
        <x-input.text
            name="{{ $name }}"
            name="{{ $id }}"
            type="search"
            placeholder="{{ $placeholder }}"
            wire:keydown.enter="action"
            {{ $attributes->merge([ 'class' => 'pl-7' ]) }}
        />
    </div>
</form>
