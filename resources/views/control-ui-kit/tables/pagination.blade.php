
@if ($showAlways || $paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mt-2 sm:mt-4">

{{--    --}}{{-- Mobile Pagination --}}
{{--    <div class="flex justify-between flex-1 sm:hidden">--}}
{{--        @if ($paginator->onFirstPage())--}}
{{--            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">--}}
{{--                {!! __('pagination.previous') !!}--}}
{{--            </span>--}}
{{--        @else--}}
{{--            <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">--}}
{{--                {!! __('pagination.previous') !!}--}}
{{--            </a>--}}
{{--        @endif--}}

{{--        @if ($paginator->hasMorePages())--}}
{{--            <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">--}}
{{--                {!! __('pagination.next') !!}--}}
{{--            </a>--}}
{{--        @else--}}
{{--            <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">--}}
{{--                {!! __('pagination.next') !!}--}}
{{--            </span>--}}
{{--        @endif--}}
{{--    </div>--}}

    {{-- Full Pagination --}}
    <div class="{{ $wrapperClasses }}">

        <div class="{{ $resultsClasses }}">
            <span>{!! __('Display') !!}</span>
            <x-input.select name="limit" :options="['5', '10', '25', '50', '100', '200']" required value="100" icon="" button-width="w-auto" />
            <span>{!! __('Results') !!}</span>
            <span class="font-medium">{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}</span>
            <span>{!! __('of') !!}</span>
            <span class="font-medium">{{ $paginator->total() }}</span>
        </div>

        <div class="{{ $buttonContainer }}">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <span class="{{ $buttonDisabled }}" aria-hidden="true">
                        <x-dynamic-component :component="$iconPrevious" :size="$iconSize" />
                    </span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="{{ $buttonClasses }}" aria-label="{{ __('pagination.previous') }}">
                    <x-dynamic-component :component="$iconPrevious" :size="$iconSize" />
                </a>
            @endif

            {{-- Pagination Elements --}}
            <div class="hidden sm:block px-0.5">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span class="{{ $buttonDisabled }}">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page === $paginator->currentPage())
                            <span aria-current="page">
                                <span class="{{ $buttonActive }}">{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $url }}" class="{{ $buttonClasses }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="{{ $buttonClasses }}" aria-label="{{ __('pagination.next') }}">
                    <x-dynamic-component :component="$iconNext" :size="$iconSize" />
                </a>
            @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span class="{{ $buttonDisabled }}" aria-hidden="true">
                        <x-dynamic-component :component="$iconNext" :size="$iconSize" />
                    </span>
                </span>
            @endif
        </div>
    </div>
</nav>
@endif
