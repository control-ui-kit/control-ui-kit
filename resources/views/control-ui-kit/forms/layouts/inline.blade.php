<div class="md:flex md:items-center md:space-x-2">
    <x-label for="{{ $name }}" class="w-full md:w-1/3 leading-2">
        <p class="text-md font-medium">{{ $label }}</p>
    </x-label>
    <div class="mt-1 md:mt-0 w-full md:w-2/3">
        <div class="w-full">
            @if ($input)
            <x-dynamic-component :component="$input" :name="$name" {{ $attributes }} />
            @else
            {{ $slot }}
            @endif
        </div>
        <x-error field="{{ $name }}"/>
    </div>
</div>
