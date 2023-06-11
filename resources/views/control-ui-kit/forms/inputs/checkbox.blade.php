<input name="{{ $name }}"
       type="checkbox"
       id="{{ $id }}"
       value="{{ $value }}"
        {{ $checked }}
        @if ($disabled) disabled @endif
        {{ $attributes->merge($classes()) }} />
