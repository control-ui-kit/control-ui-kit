<input
    name="{{ $name }}"
    type="{{ $type }}"
    id="{{ $id }}"
    @if($value)value="{{ $value }}"@endif
    @if($placeholder)placeholder="{{ $placeholder }}"@endif
    {{ $attributes->merge([ 'class' => 'text-md bg-input text-input placeholder-input ' .
                                       'border border-input ' .
                                       'p-1.5 rounded ' .
                                       'focus:border-input focus:outline-none focus:ring-brand']) }}
/>
