<div id="{{ $id }}_value" class="w-40 text-center">{{ $value }}</div>

<span>{{ $min }}</span>

<input name="{{ $name }}"
       id="{{ $id }}"
       type="range"
       min="{{ $min }}"
       max="{{ $max }}"
       value="{{ $value }}"
       {{ $attributes->merge($classes()) }}
       oninput="document.getElementById('{{ $id }}_value').innerHTML = this.value"
       onchange="document.getElementById('{{ $id }}_value').innerHTML = this.value"
/>

<span>{{ $max }}</span>

