<form method="POST" action="{{ $action }}">
    @csrf

    @if($bstyle)

        <x-button :bstyle="$bstyle" :icon="$icon" type="submit" {{ $attributes }}>
            {{ $slot->isEmpty() ? __('Log out') : $slot }}
        </x-button>

    @else

        <button type="submit" {{ $attributes }}>
            {{ $slot->isEmpty() ? __('Log out') : $slot }}
        </button>

    @endif

</form>
