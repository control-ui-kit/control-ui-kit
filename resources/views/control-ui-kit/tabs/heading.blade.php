<a href="#{{ $name }}-{{ $id }}" x-on:click="tab('{{ $id }}')"
   :class="{ 'border-nav-divider' : showTab == '{{ $id }}' , 'border-transparent' : showTab != '{{ $id }}'}"
   class="flex-x-1 py-2 border-b-2 border-toolbar font-medium text-sm"
   id="{{ $name }}_{{$id}}"
>{{ $slot}}</a>
