<a href="#{{ $name }}-{{ $id }}" x-on:click="tab('{{ $id }}')"
   :class="{ '{{ $active }}' : showTab == '{{ $id }}' , '{{ $inactive }}' : showTab != '{{ $id }}'}"
   {{ $attributes->merge($classes()) }}
   id="{{ $name }}_{{ $id }}">
    @if($icon)
        <x-dynamic-component component="{{ $icon }}" size="{{ $size }}" />
        <span>{{ $slot }}</span>
    @else
    {{ $slot }}
    @endif
</a>
