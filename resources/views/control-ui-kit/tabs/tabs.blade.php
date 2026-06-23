<div id="{{ $name }}" x-data="{{ Str::camel($name) }}Data()" x-init="init()" {{ $attributes->merge($classes()) }}>

    <div class="{{ $breakpoint }}:hidden">
        <x-input-select native :name="$name" :options="$getSelectOptions($headings)" :value="$selected" :show-please-select="false" x-model="showTab" button-width="w-full" />
    </div>

    <div class="hidden {{ $breakpoint }}:block overflow-x-auto">
        <nav class="flex items-center flex-wrap {{ $spacing }}" aria-label="Tabs">
            {{ $headings }}
        </nav>
    </div>

    {{ $panels }}

    <script>
        const {{ Str::camel($name) }}Data = () => ({
            name: '{{ $name }}',
            showTab: @if($selected) '{{ $selected }}' @else document.querySelector('#{{ $name }} a').id.replace('{{ $name }}_', '') @endif,
            tab(id) {
                this.showTab = id;
            },
            init() {
                if (window.location.hash) {
                    let name = '#{{ $name }}-';
                    if (window.location.hash.indexOf(name) !== -1) {
                        let tab = window.location.hash.replace(name, '');
                        if (document.querySelector('#{{ $name }} #{{ $name }}_' + tab)) {
                            this.showTab = tab;
                        }
                    }
                }
            }
        });
    </script>

</div>
