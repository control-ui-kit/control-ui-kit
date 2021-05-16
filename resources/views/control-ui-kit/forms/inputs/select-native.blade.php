<select id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge($classes()) }}>
    @foreach ($options as $value => $option)
    <option value="{{ $optionValue($value, $option) }}">{{ $text($option) }}</option>
    @endforeach
</select>
