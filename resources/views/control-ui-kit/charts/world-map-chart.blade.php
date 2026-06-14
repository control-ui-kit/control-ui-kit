<div class="{{ $width }} {{ $height }}" style="position:relative;">
    <svg id="{{ $id }}" width="100%" viewBox="0 0 960 500" preserveAspectRatio="xMidYMid meet"
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
        var data = {!! $mapData() !!};

        var svg = document.getElementById(id);
        var tooltip = showTooltip ? document.getElementById(id + '_tooltip') : null;

        var proj = projection === 'mercator'
            ? mapUtils.geoMercator().scale(130).translate([480, 320])
            : projection === 'equal-earth'
                ? mapUtils.geoEqualEarth().scale(160).translate([480, 250])
                : mapUtils.geoNaturalEarth1().scale(160).translate([480, 250]);

        var path = mapUtils.geoPath().projection(proj);
        var maxVal = Object.values(data).reduce(function(m, v) { return Math.max(m, Number(v)); }, 0) || 1;

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
                var resolvedBorderColor = mapUtils.resolveColor(borderColor);
                var resolvedNoDataColor = mapUtils.resolveColor(noDataColor);
                var resolvedStops = mapUtils.resolveGradientStops(gradientStops);

                countries.features.forEach(function(feature) {
                    var numId = String(feature.id).padStart(3, '0');
                    var meta = names[numId] || {};
                    var iso2 = meta.iso2 || null;
                    var countryName = meta.name || numId;
                    var value = (iso2 && data[iso2] !== undefined) ? Number(data[iso2]) : null;

                    var fill = value === null
                        ? resolvedNoDataColor
                        : mapUtils.interpolateGradient(value / maxVal, resolvedStops);

                    var d = path(feature);
                    if (!d) return;

                    var pathEl = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                    pathEl.setAttribute('d', d);
                    pathEl.setAttribute('fill', fill);
                    pathEl.setAttribute('stroke', resolvedBorderColor);
                    pathEl.setAttribute('stroke-width', borderWidth);
                    pathEl.dataset.iso = iso2 || '';
                    pathEl.dataset.name = countryName;
                    pathEl.dataset.value = value !== null ? value : '';

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

                    svg.appendChild(pathEl);
                });
            });
    })();
    </script>
</div>
