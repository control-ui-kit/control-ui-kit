<canvas id="{{ $id }}" width="400" height="200">
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var _s = getComputedStyle(document.documentElement);
        var _ro = function(obj) {
            if (typeof obj === 'string') {
                if (obj.charAt(0) === '-') { var _v = _s.getPropertyValue(obj).trim(); return _v ? 'rgb(' + _v + ')' : obj; }
                var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                if (m) { var _v = _s.getPropertyValue(m[1]).trim(); return _v ? 'rgb(' + _v + ')' : obj; }
            }
            if (typeof obj === 'object' && obj !== null) {
                if (Array.isArray(obj)) return obj.map(_ro);
                var r = {};
                Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                return r;
            }
            return obj;
        };

        const ctx = document.getElementById('{{ $id }}');
        const defaultColors = @json($colors);
        const datasetsConfig = @json($datasets);

        var opts = _ro(@json($chartOptions));
        var defaultPointRadius = (opts.elements && opts.elements.point && opts.elements.point.radius !== undefined)
            ? opts.elements.point.radius : 3;

        const datasets = datasetsConfig.map(function (ds, i) {
            const dsType = ds.type || 'bar';
            const stops = ds.gradientStops || null;
            const rawColor = ds.color || defaultColors[i % defaultColors.length];
            const color = stops ? gradientColor(1, stops) : _ro(rawColor);

            const result = {
                type: dsType,
                label: ds.label,
                data: ds.data,
            };

            if (ds.yAxisID !== undefined) {
                result.yAxisID = ds.yAxisID;
            }

            if (ds.order !== undefined) {
                result.order = ds.order;
            }

            if (dsType === 'line') {
                result.fill = false;
                result.tension = 0.45;
                result.borderWidth = 2;
                result.borderColor = color;
                result.backgroundColor = color;
                result.pointRadius = ds.radius !== undefined ? ds.radius : defaultPointRadius;
                result.pointHoverRadius = ds.hoverRadius !== undefined ? ds.hoverRadius : 4;
                result.pointBorderWidth = 0;
                result.pointBackgroundColor = stops
                    ? function(ctx) { return gradientColor(ctx.dataIndex / Math.max(1, ds.data.length - 1), stops); }
                    : color;

                if (stops) {
                    result.segment = {
                        borderColor: function(ctx) {
                            return gradientColor(ctx.p0DataIndex / Math.max(1, ds.data.length - 1), stops);
                        }
                    };
                }

                if (ds.dashed) {
                    result.borderDash = Array.isArray(ds.dashed) ? ds.dashed : [5, 5];
                }
            } else {
                result.backgroundColor = color;
                result.borderColor = color;
                result.borderWidth = 0;
            }

            return result;
        });

        if (!opts.plugins) opts.plugins = {};
        if (!opts.plugins.legend) opts.plugins.legend = {};
        if (!opts.plugins.legend.labels) opts.plugins.legend.labels = {};
        opts.plugins.legend.labels.generateLabels = function(chart) {
            var labels = Chart.defaults.plugins.legend.labels.generateLabels(chart);
            labels.forEach(function(label) {
                label.lineWidth = 0;
                label.pointStyle = false;
            });
            return labels;
        };

        window.{{ $id }} = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: datasets
            },
            options: opts
        });
    });
</script>
</canvas>
