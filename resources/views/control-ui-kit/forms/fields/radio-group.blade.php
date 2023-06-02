<x-field :name="$name" :help="$help" :label="$label" {{ $attributes }}>

    <div class="rounded border border-input bg-input divide-y divide-input w-full"
         x-data="{ selected: '{{ $selected }}' }"
    >

        @foreach($options as $option)
        <label class="relative p-4 flex cursor-pointer space-x-4 items-start"
            :class="{ 'bg-input-item': selected === '{{ $option['value'] }}' }"
        >
            <div class="flex items-center h-5">
                <x-input-radio :name="$option['name']" :id="$option['id']" value="{{ $option['value'] }}" :checked="$option['checked']" x-model="selected" />
            </div>
            <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'text-brand': selected === '{{ $option['value'] }}' }">
                <span class="block text-sm font-medium">{{ $option['label'] }}</span>
                @if($option['help'])
                <span class="block text-xs text-muted">
                    {{ $option['help'] }}
                </span>
                @endif
            </div>
        </label>
        @endforeach

    </div>

</x-field>
