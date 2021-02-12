<a href="#{{ $name }}-{{ $id }}" x-on:click="tab('{{ $id }}')"
   :class="{ 'border-brand hover:text-gray-700 hover:border-gray-300' : showTab == '{{ $id }}' , 'border-transparent' : showTab != '{{ $id }}'}"
   {{ $attributes->merge(['class' => "flex items-center space-x-2 py-1.5 border-b-2 font-medium"]) }}
   id="{{ $name }}_{{$id}}"
>
    @if($icon)
        <x-dynamic-component component="{{ $icon }}" size="{{ $size }}" />
        <span>{{ $slot }}</span>
    @else
    {{ $slot }}
    @endif
</a>
