<div class="{{ $width }}" style="position:relative;">
    <svg id="{{ $id }}" width="100%" viewBox="0 0 960 500" preserveAspectRatio="xMidYMid meet" class="{{ $height }}"
         @if($backgroundColor !== 'transparent') style="display:block;background-color:rgb(var({{ $backgroundColor }}));" @else style="display:block;" @endif></svg>
    @if($showTooltip === 'true')
    <div id="{{ $id }}_tooltip" style="position:absolute;pointer-events:none;display:none;white-space:nowrap;background-color:rgb(var({{ $tooltipBackground }}));color:rgb(var({{ $tooltipColor }}));border:1px solid rgb(var({{ $tooltipBorder }}));"
         class="{{ $tooltipFont }} {{ $tooltipPadding }} {{ $tooltipRounded }}"></div>
    @endif
    <script>
    (function() {
        var id = '{{ $id }}';
        var gradientStops = {!! $mapGradientStops() !!};
        var noDataColor = '{{ $noDataColor }}';
        var borderColor = '{{ $borderColor }}';
        var borderWidth = {{ $borderWidth }};
        var showTooltip = {{ $showTooltip === 'true' ? 'true' : 'false' }};
        var tooltipLabel = '{{ $label }}';
        var projection = '{{ $projection }}';
        var numberFormat = '{{ $numberFormat }}';
        var url = {!! json_encode($url, JSON_UNESCAPED_SLASHES) !!};
        var urlTarget = '{{ $urlTarget }}';
        var data = {!! $mapData() !!};

        // Open a country link like a native <a>: build a real anchor with the
        // configured target and dispatch a click that carries the keyboard
        // modifiers from the original event, so Cmd/Ctrl+Click (new tab),
        // Shift+Click (new window) etc. are honoured by the browser as usual.
        var openCountryLink = function(href, e) {
            var a = document.createElement('a');
            a.href = href;
            a.target = urlTarget;
            a.rel = 'noopener';
            document.body.appendChild(a);
            a.dispatchEvent(new MouseEvent('click', {
                bubbles: false,
                cancelable: true,
                view: window,
                button: 0,
                ctrlKey: e.ctrlKey,
                metaKey: e.metaKey,
                shiftKey: e.shiftKey,
                altKey: e.altKey
            }));
            document.body.removeChild(a);
        };

        var svg = document.getElementById(id);
        var tooltip = showTooltip ? document.getElementById(id + '_tooltip') : null;

        var proj = projection === 'mercator'
            ? mapUtils.geoMercator().scale(130).translate([480, 320])
            : projection === 'equal-earth'
                ? mapUtils.geoEqualEarth().scale(160).translate([480, 250])
                : mapUtils.geoNaturalEarth1().scale(160).translate([480, 250]);

        var path = mapUtils.geoPath().projection(proj);
        var maxVal = Object.values(data).reduce(function(m, v) {
            var n = (v !== null && typeof v === 'object') ? Number(v.value) : Number(v);
            return Math.max(m, isNaN(n) ? 0 : n);
        }, 0) || 1;

        fetch('{{ url("control-ui-kit/map-data/world-110m.json") }}')
            .then(function(r) { return r.json(); })
            .then(function(world) {
                return fetch('{{ url("control-ui-kit/map-data/world-country-names.json") }}')
                    .then(function(r) { return r.json(); })
                    .then(function(names) { return { world: world, names: names }; });
            })
            .then(function(res) {
                var countries = mapUtils.topoFeature(res.world, res.world.objects.countries);
                var names = res.names;

                countries.features.forEach(function(feature) {
                    var numId = String(feature.id).padStart(3, '0');
                    var meta = names[numId] || {};
                    var iso2 = meta.iso2 || null;
                    var countryName = meta.name || numId;
                    var entry = (iso2 && data[iso2] !== undefined) ? data[iso2] : null;
                    var isObject = entry !== null && typeof entry === 'object';
                    var value = entry === null ? null : (isObject ? (entry.value !== undefined ? Number(entry.value) : null) : Number(entry));
                    var rowId = isObject && entry.id !== undefined && entry.id !== null ? entry.id : '';

                    var d = path(feature);
                    if (!d) return;

                    var pathEl = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                    pathEl.setAttribute('d', d);
                    pathEl.setAttribute('stroke-width', borderWidth);
                    pathEl.dataset.iso = iso2 || '';
                    pathEl.dataset.name = countryName;
                    pathEl.dataset.value = value !== null ? value : '';
                    pathEl.dataset.id = rowId;

                    if (showTooltip && tooltip) {
                        pathEl.addEventListener('mousemove', function(e) {
                            var rect = svg.getBoundingClientRect();
                            var val = pathEl.dataset.value;
                            var displayValue = val !== ''
                                ? (numberFormat !== '' ? Number(val).toLocaleString(undefined, {maximumFractionDigits: parseInt(numberFormat)}) : val)
                                : '—';
                            if (tooltipLabel !== '') {
                                var titleEl = document.createElement('div');
                                titleEl.style.fontWeight = '600';
                                titleEl.style.marginBottom = '2px';
                                titleEl.textContent = pathEl.dataset.name;
                                var bodyEl = document.createElement('div');
                                bodyEl.textContent = tooltipLabel + ': ' + displayValue;
                                tooltip.innerHTML = '';
                                tooltip.appendChild(titleEl);
                                tooltip.appendChild(bodyEl);
                            } else {
                                tooltip.textContent = pathEl.dataset.name + ': ' + displayValue;
                            }
                            tooltip.style.display = 'block';
                            tooltip.style.left = (e.clientX - rect.left + 10) + 'px';
                            tooltip.style.top = (e.clientY - rect.top - 28) + 'px';
                        });
                        pathEl.addEventListener('mouseleave', function() {
                            tooltip.style.display = 'none';
                        });
                    }

                    if (url !== '') {
                        pathEl.style.cursor = 'pointer';
                        pathEl.addEventListener('click', function(e) {
                            var href = url
                                .replace(/\{id\}/g, encodeURIComponent(pathEl.dataset.id))
                                .replace(/\{iso\}/g, encodeURIComponent(pathEl.dataset.iso))
                                .replace(/\{name\}/g, encodeURIComponent(pathEl.dataset.name))
                                .replace(/\{value\}/g, encodeURIComponent(pathEl.dataset.value));
                            openCountryLink(href, e);
                        });
                    }

                    svg.appendChild(pathEl);
                });

                applyColors();
            });

        // Re-resolve every country's fill and stroke from the active theme's CSS
        // variables and apply them to the already-rendered paths. Country values are
        // read back from the `data-value` set during render, so this can run any time
        // after the initial paint.
        function applyColors() {
            var resolvedBorderColor = mapUtils.resolveColor(borderColor);
            var resolvedNoDataColor = mapUtils.resolveColor(noDataColor);
            var resolvedStops = mapUtils.resolveGradientStops(gradientStops);

            svg.querySelectorAll('path').forEach(function(pathEl) {
                var val = pathEl.dataset.value;
                pathEl.setAttribute('fill', val === ''
                    ? resolvedNoDataColor
                    : mapUtils.interpolateGradient(Number(val) / maxVal, resolvedStops));
                pathEl.setAttribute('stroke', resolvedBorderColor);
            });
        }

        // SVG fills/strokes are baked at render time, so they don't follow CSS variable
        // changes the way the ocean and tooltip (which reference vars live) do. Watch
        // <html> for theme/mode changes and repaint so the choropleth tracks light/dark
        // toggles without a page refresh. Self-disconnects once the chart is gone.
        var themeObserver = new MutationObserver(function() {
            if (!document.getElementById(id)) {
                themeObserver.disconnect();
                return;
            }
            applyColors();
        });
        themeObserver.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['data-mode', 'data-ui-theme', 'class']
        });
    })();
    </script>
</div>
