<div {{ $attributes }} id="{{ $name }}" x-data="alpine()" x-init="init()">

    <div class="hidden sm:block">
        <div class="border-b border-panel">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                {{ $headings }}
            </nav>
        </div>
    </div>

    {{ $panels }}

    <script>
        const alpine = () => ({
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


