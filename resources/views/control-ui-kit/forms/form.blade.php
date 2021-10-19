<form method="{{ $method !== 'GET' ? 'POST' : 'GET' }}" action="{{ $action }}" {!! $uploads ? 'enctype="multipart/form-data"' : '' !!} {{ $attributes }}>
    @if ($method !== 'GET')
        @csrf
        @method($method)
    @endif
    {{ $slot }}
</form>
