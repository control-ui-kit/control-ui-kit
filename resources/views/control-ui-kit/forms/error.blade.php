@error($field, $bag)
<div {{ $attributes->merge(['class' => 'text-error mt-1']) }}>
    @if ($slot->isEmpty())
        {{ $message }}
    @else
        {{ $slot }}
    @endif
</div>
@enderror
