<form method="POST" action="{{ $action }}">
    @csrf

    @if($bstyle)

        <x-button :bstyle="$bstyle" :icon="$icon" type="submit" {{ $attributes }}>
            {{ ! $iconOnly && $slot->isEmpty() ? __('Log Out') : $slot }}
        </x-button>

    @else

        <button type="submit" {{ $attributes }}>
            {{ ! $iconOnly && $slot->isEmpty() ? __('Log Out') : $slot }}
        </button>

    @endif

</form>
