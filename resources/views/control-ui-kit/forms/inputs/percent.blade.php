<input name="{{ $name }}"
       type="number"
       id="{{ $id }}"
       @if($value)value="{{ $value }}"@endif
       @if($placeholder)placeholder="{{ $placeholder }}"@endif
       min="0"
       max="100"
       {{ $attributes->merge($classes()) }} />
