
@if ($showAlways || $paginator->hasPages())

    @if ($wire)
        @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)
    @endif

    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mt-2 sm:mt-4">

    <div class="{{ $wrapperClasses }}">

        <div class="{{ $resultsClasses }}">
            <span>{!! __('Display') !!} #</span>
            <select id="limit" name="limit" wire:model="limit" class="{{ $limitClasses }}">
                @foreach ([5, 10, 25, 50, 100, 200] as $value)
                    <option value="{{ $value }}" @if (! $wire && $value === $limit) selected @endif>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
            <span></span>
            @if ($paginator->total() === 0)
            <span>{!! __('No Results') !!}</span>
            @else
            <span>{!! __('Results') !!}</span>
            <span class="font-medium">{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}</span>
            <span>{!! __('of') !!}</span>
            <span class="font-medium">{{ $paginator->total() }}</span>
            @endif
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
                <a @if ($wire) wire:click="previousPage('{{ $paginator->getPageName() }}')"
                   @else href="{{ $paginator->previousPageUrl() }}"
                   @endif
                   rel="prev" class="{{ $buttonClasses }}" aria-label="{{ __('pagination.previous') }}">
                    <x-dynamic-component :component="$iconPrevious" :size="$iconSize" />
                </a>
            @endif

            {{-- Pagination Elements --}}
            <div class="{{ $pageNumberClasses }}">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if ($element === '...')
                    <div aria-disabled="true">
                        <span class="bg-paginate-disabled hover:bg-paginate-disabled-hover border border-paginate-disabled hover:border-paginate-disabled-hover text-paginate-disabled hover:text-paginate-disabled-hover font-medium text-sm relative inline-flex items-center justify-center cursor-default rounded h-9 w-9">
                            ...
                        </span>
                    </div>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($wire)<div wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page{{ $page }}">@endif
                        @if ($page === $paginator->currentPage())
                            <div aria-current="page">
                                <span class="{{ $buttonActive }}">{{ $page }}</span>
                            </div>
                        @else
                            <a @if ($wire) wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                               @else href="{{ $url }}"
                               @endif
                               class="{{ $buttonClasses }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif

                        @if ($wire)</div>@endif
                    @endforeach
                @endif
            @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a @if ($wire) wire:click="nextPage('{{ $paginator->getPageName() }}')"
                   @else href="{{ $paginator->nextPageUrl() }}"
                   @endif
                   rel="next" class="{{ $buttonClasses }}" aria-label="{{ __('pagination.next') }}">
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
