@if ($errors->any())
    <div class="bg-error p-4 mx-6 mb-6 rounded shadow">
        <div class="flex">
            <div class="flex-shrink-0">
                <x-icon.status-danger />
            </div>
            <div class="ml-3">
                <h3 class="leading-5 font-medium">
                    There were {{ $errors->count() }} errors with your submission
                </h3>
                <div class="mt-2 leading-5">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif