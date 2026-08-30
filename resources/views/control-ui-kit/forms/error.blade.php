@if ($alpine)
<div x-show="{{ $alpineHasMessage() }}" x-cloak {{ $attributes->merge($classes()) }}>
    @if ($slot->isEmpty())
        <span x-text="{{ $alpineMessage() }}"></span>
    @else
        {{ $slot }}
    @endif
</div>
@else
@error($field, $bag)
<div {{ $attributes->merge($classes()) }}>
    @if ($slot->isEmpty())
        {{ $message }}
    @else
        {{ $slot }}
    @endif
</div>
@enderror
@endif
