<select
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes->merge($classes()) }}>
    @foreach ($options as $option)
        <option value="{{ $option['value'] }}"
            {{ $selected($option['value']) }}
        >{{ $option['label'] }}</option>
    @endforeach
</select>
