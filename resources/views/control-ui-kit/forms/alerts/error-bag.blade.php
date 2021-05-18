@if (! is_null($bag))
    @php $errors = $bag; @endphp
@endif

@if ($errors->any())
    <x-dynamic-component component="alert" :type="$type" title="There were {{ $errors->count() }} errors with your submission" {{ $attributes }}>
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-dynamic-component>
@endif

