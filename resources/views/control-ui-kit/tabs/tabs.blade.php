<div id="{{ $name }}" x-data="{{ Str::camel($name) }}Data()" x-init="init()" {{ $attributes->merge($classes()) }}>

    <div class="sm:hidden">
        <select id="{{ $name }}" name="{{ $name }}" x-model="showTab"
                class="block w-full focus:border-input focus:outline-none focus:ring-brand rounded">
            @foreach($getHeadingsArray($headings) as $tab => $heading)
                <option value="{{ str_replace("#{$name}-", "", $tab) }}">{{ $heading }}</option>
            @endforeach
        </select>
    </div>

    <div class="hidden sm:block">
        <nav class="flex items-center {{ $spacing }}" aria-label="Tabs">
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
