@if (isset($errors) && $errors->any())
    <x-dynamic-component
        component="alert"
        :type="$type"
        :title="$title"
        {{ $attributes }}
    >
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-dynamic-component>
@else
    <div>{{--No errors--}}</div>
@endif


