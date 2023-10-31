<select id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => $buttonClasses()]) }}>
    @foreach ($options as $key => $option)
    <option value="{{ $optionValue($key, $option) }}" @if ($optionValue($key, $option) == $value) selected @endif>
        {{ $text($option) }}
    </option>
    @endforeach
</select>
