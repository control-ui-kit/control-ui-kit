<select
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes->merge([ 'class' => 'text-md bg-input text-input border border-input p-1.5 rounded ' .
                                       'focus:border-input focus:outline-none focus:ring-brand' ]) }}
>
    @foreach ($options as $option)
        <option value="{{ $option['value'] }}"
            {{ $selected($option['value']) }}
        >{{ $option['label'] }}</option>
    @endforeach
</select>
