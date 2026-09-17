@props(['id' => null, 'maxWidth' => null, 'body' => null, 'footerClass' => null, 'titleClass' => null, 'scroll' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" :scroll="$scroll" {{ $attributes }}>

    <div class="{{ $titleClass }}">

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

    </div>

    <div class="{{ $body }} text-sm">
        @isset($content) {{ $content }} @else <div x-html="detail.content" class="leading-6"></div> @endif
    </div>

    <div class="{{ $footerClass }}">
        {{ $footer }}
    </div>

</x-modal>
