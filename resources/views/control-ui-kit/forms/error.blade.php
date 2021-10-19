@error($field, $bag)
<div {{ $attributes->merge($classes()) }}>
    @if ($slot->isEmpty())
        {{ $message }}
    @else
        {{ $slot }}
    @endif
</div>
@enderror
