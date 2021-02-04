<form method="{{ $method !== 'GET' ? 'POST' : 'GET' }}" action="{{ $route }}" {!! $uploads ? 'enctype="multipart/form-data"' : '' !!} {{ $attributes }}>
    @csrf
    @method($method)

    {{ $slot }}
</form>
