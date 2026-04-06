<div class="relative"
     x-data="{
         showFilters: false,
         fields: {
             @foreach ($filters as $name => $filter)
             @if ($filter['type'] !== 'search')
             {{ $name }}: {
                 original: '{{ $filter['selected'] ?: '' }}',
                 selected: '{{ $filter['selected'] ?: '' }}',
                 unset: '{{ $filter['unset'] }}',
                 toggle: {{ $filter['selected'] === $filter['unset'] ? 'false' : 'true' }},
             },
             @endif
             @endforeach
         },
         clearFilters() {
             let params = new URLSearchParams()
             Object.keys(this.fields).forEach(field => {
                 if (this.fields[field].selected) {
                     params.append(field, this.fields[field].unset)
                 }
             })
             window.location.search = params.toString()
         },
         updateFilters() {
             let params = new URLSearchParams()
             Object.keys(this.fields).forEach(field => {
                 if (this.fields[field].selected) {
                     params.append(field, this.fields[field].selected)
                 }
             })
             window.location.search = params.toString()
         },
         clickAway() {
             Object.keys(this.fields).forEach(field => {
                 this.fields[field].selected = this.fields[field].original
                 this.fields[field].toggle = this.fields[field].selected !== this.fields[field].unset
             })
             this.showFilters = false
         }
     }"
     @click.away="clickAway()"
>

    <button class="{{ $filtersButtonClasses() }} relative group border-button-default hover:border-button-default-hover text-button-default hover:text-button-default-hover cursor-pointer" x-on:click="showFilters = !showFilters">
        <x-dynamic-component :component="$filtersButtonIcon()" :size="$filtersButtonIconSize()" />
    </button>

    <div  x-show="showFilters"
          class="origin-top-right absolute z-10 right-0 mt-2 min-w-[400px] w-max rounded-md shadow-md bg-panel border border-panel overflow-hidden"
          tabindex="-1"
          x-cloak
    >

        {{--FILTER MENU HEADER--}}
        <div class="flex items-center justify-between p-2 bg-panel-header">
            <x-button class="w-full" x-on:click="clearFilters()">Clear</x-button>
            <span class="text-xs uppercase text-gray-600 font-bold">Filters</span>
            <x-button class="w-full" x-on:click="updateFilters()">Update</x-button>
        </div>

        {{--FILTERS--}}
        <div class="divide-y divide-gray-150">

            @foreach ($filters as $name => $filter)

                @if($filter['type'] !== 'search')

                    <x-table-filter :filter="$filter" />

                @endif

            @endforeach

        </div>

    </div>

</div>
