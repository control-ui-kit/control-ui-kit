<input name="{{ $name }}"
       type="checkbox"
       id="{{ $id }}"
       value="{{ $value }}"
        {{ $checked }}
        {{ $attributes->merge($classes()) }} />
