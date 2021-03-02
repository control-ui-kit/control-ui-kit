<input name="{{ $name }}"
       type="number"
       id="{{ $id }}"
       @if($value)value="{{ $value }}"@endif
       @isset($min)min="{{ $min }}"@endif
       @isset($max)max="{{ $max }}"@endif
       @isset($step)step="{{ $step }}"@endif
       @if($placeholder)placeholder="{{ $placeholder }}"@endif
       {{ $attributes->merge($classes()) }} />
