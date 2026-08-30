@php
    // The chevron is a sibling of the select rather than part of it, so anything that hides or
    // places the control as a whole has to go on the wrapper - x-show on the component would
    // otherwise hide the select and leave its chevron sitting there. Everything else, bindings
    // and form semantics included, stays on the select where it was.
    $wrapperAttributes = ['class', 'x-show', 'x-cloak', 'x-transition'];
@endphp
<div {{ $attributes->whereStartsWith($wrapperAttributes)->merge(['class' => 'relative ' . $buttonWidth()]) }}>

    <select id="{{ $id }}" name="{{ $name }}" {{ $attributes->whereDoesntStartWith($wrapperAttributes)->merge(['class' => $nativeClasses()]) }}>
        @if($slot->isNotEmpty())
        {{ $slot }}
        @else
        @foreach ($options as $key => $option)
        <option value="{{ $optionValue($key, $option) }}" @if ($optionValue($key, $option) == $value) selected @endif>
            {{ $text($option) }}
        </option>
        @endforeach
        @endif
    </select>

    @if ($iconClosed)
    <span class="{{ $iconClasses() }}">
        <x-dynamic-component :component="$iconClosed" :size="$iconSize" />
    </span>
    @endif

</div>
