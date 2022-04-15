<div class="relative"
     @clear-filters.window="clearFilters()"
     @clear-single-filter.window="clearSingleFilter($event.detail)"
     x-data="{
        showFilters: false,
        fields: {
            @foreach ($filters as $name => $filter)
            {{ $name }}: {
                selected: '{{ $filter['selected'] }}',
                reset: '{{ $filter['empty'] }}',
                toggle: {{ $filter['selected'] === $filter['empty'] ? 'false' : 'true' }},
            },
            @endforeach
        },
        clearFilters() {
            $wire.emit('clearFilters')

            for (const [key, value] of Object.entries(this.fields)) {
                this.fields[key].selected = this.fields[key].reset
                this.fields[key].toggle = false
            }

            this.showFilters = false
        },
        clearSingleFilter(filter) {
            $wire.emit('clearSingleFilter', filter)
            this.fields[filter].selected = this.fields[filter].reset
            this.fields[filter].toggle = false
         },
         updateFilters() {
            $wire.emit('updateFilters', this.fields)
            this.showFilters = false

            for (const [key, value] of Object.entries(this.fields)) {
                this.fields[key].toggle = this.fields[key].selected !== this.fields[key].reset
            }
         },
     }"
     @click.away="showFilters = false"
>

    <button class="{{ $filtersButtonClasses() }} relative group hover:border-brand-500" x-on:click="showFilters = !showFilters">
        <x-dynamic-component :component="$filtersButtonIcon()" :size="$filtersButtonIconSize()" color="text-gray-700 cursor-pointer group-hover:text-brand-500" />
    </button>

    <div  x-show="showFilters"
          class="origin-top-right absolute z-10 right-0 mt-2 min-w-[400px] w-max rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
          tabindex="-1"
    >

        {{--FILTER MENU HEADER--}}
        <div class="flex items-center justify-between p-2 bg-gray-150">
            <x-button class="w-full" x-on:click="clearFilters()">Clear</x-button>
            <span class="text-xs uppercase text-gray-600 font-bold">Filters</span>
            <x-button class="w-full" x-on:click="updateFilters()">Update</x-button>
        </div>

        {{--FILTERS--}}
        <div class="divide-y divide-gray-150">

            @foreach ($filters as $name => $filter)

                <x-table-filter :filter="$filter" />

            @endforeach

        </div>

    </div>

</div>
