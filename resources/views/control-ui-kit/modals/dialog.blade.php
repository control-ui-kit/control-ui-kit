@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>

    <div class="flex-y-2">

        <div class="text-lg border-b border-modal px-2 py-2 bg-modal-header">
            {{ $title }}
        </div>

        <div class="px-4 py-2">
            {{ $content }}
        </div>

        <div class="flex-x-2 justify-end border-t border-modal text-right bg-modal-footer px-2 py-2">
            {{ $footer }}
        </div>

    </div>

</x-modal>
