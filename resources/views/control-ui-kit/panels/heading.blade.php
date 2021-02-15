<h3 {{ $attributes }} @if ($styles()) {{ $attributes->merge(['class' => $styles()]) }} @endif>{{ $slot }}</h3>
