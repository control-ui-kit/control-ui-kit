@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>

    <div class="p-4">

        <x-alert type="default" x-show="detail.type == 'default'">
            @isset($title) {{ $title }} @else <div x-html="detail.title"></div> @endif
        </x-alert>

        <x-alert type="brand" x-show="detail.type == 'brand'">
            @isset($title) {{ $title }} @else <div x-html="detail.title"></div> @endif
        </x-alert>

        <x-alert type="danger" x-show="detail.type == 'danger'">
            @isset($title) {{ $title }} @else <div x-html="detail.title"></div> @endif
        </x-alert>

        <x-alert type="info" x-show="detail.type == 'info'">
            @isset($title) {{ $title }} @else <div x-html="detail.title"></div> @endif
        </x-alert>

        <x-alert type="success" x-show="detail.type == 'success'">
            @isset($title) {{ $title }} @else <div x-html="detail.title"></div> @endif
        </x-alert>

        <x-alert type="warning" x-show="detail.type == 'warning'">
            @isset($title) {{ $title }} @else <div x-html="detail.title"></div> @endif
        </x-alert>

        <div class="pt-4 text-sm">
            @isset($content) {{ $content }} @else <div x-html="detail.content" class="flex-y-2"></div> @endif
        </div>

    </div>

    <div class="flex items-center space-x-2 justify-end border-t border-modal text-right bg-modal-footer px-4 py-3">
        {{ $footer }}
    </div>

</x-modal>
