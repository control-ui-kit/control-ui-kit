<div class="py-3 align-center sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:py-5">
    <x-label for="{{ $name }}" class="block sm:mt-px leading-2 debug">
        <p class="text-md font-medium debug">{{ $label }}</p>
        @if ($help) <p class="text-base text-muted debug">{{ $help }}</p> @endif
    </x-label>
    <div class="mt-1 sm:mt-0 sm:col-span-2 debug">
        <div class="max-w-xl">
            {{ $slot }}
        </div>
        <x-error field="{{ $name }}"/>
    </div>
</div>
