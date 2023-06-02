<div class="md:flex md:items-start md:space-x-2 min-h-[2rem]">
    <x-label :for="$name" class="w-full md:w-1/3 lg:w-1/4 leading-2 space-y-2">
        <p class="font-medium flex items-center space-x-1.5 min-h-[2rem]">
            <span>{{ $label }}</span>
            @if ($required)
                <x-icon-star size="w-2 h-2 text-danger" />
            @endif
        </p>
        @if ($help)
            <p class="hidden sm:block text-xs text-muted leading-relaxed pr-2">{{ $help }}</p>
        @endif
    </x-label>
    <div class="mt-1 md:mt-0 w-full md:w-2/3 lg:w-3/4">
        <div class="min-h-[2rem] flex items-center">
            @if ($slot->isEmpty())
                <x-dynamic-component :component="$input" :name="$name" {{ $attributes }} :required="$required" />
            @else
                {{ $slot }}
            @endif
        </div>
        <x-error field="{{ $name }}"/>
        @if ($help)
            <p class="sm:hidden text-xs text-muted mt-2">{{ $help }}</p>
        @endif
    </div>
</div>
