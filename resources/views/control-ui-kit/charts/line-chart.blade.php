<canvas id="{{ $id }}" width="400" height="200">
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var _s = getComputedStyle(document.documentElement);
        var _ro = function(obj) {
            if (typeof obj === 'string') {
                if (obj.charAt(0) === '-') { var _v = _s.getPropertyValue(obj).trim(); return _v ? 'rgb(' + _v + ')' : obj; }
                var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                if (m) { var _v = _s.getPropertyValue(m[1]).trim(); return _v ? 'rgb(' + _v + ')' : obj; }
                var ma = obj.match(/^rgba\(\s*(--[\w-]+)\s*,\s*([0-9.]+)\s*\)$/);
                if (ma) { var _va = _s.getPropertyValue(ma[1]).trim(); return _va ? 'rgba(' + _va.split(/\s+/).join(',') + ',' + ma[2] + ')' : obj; }
            }
            if (typeof obj === 'object' && obj !== null) {
                if (Array.isArray(obj)) return obj.map(_ro);
                var r = {};
                Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
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
            const stops = ds.gradientStops || null;
            const rawColor = ds.color || defaultColors[i % defaultColors.length];
            const color = stops ? gradientColor(1, stops) : _ro(rawColor);

            var pointBgColor;
            if (ds.pointColor) {
                pointBgColor = _ro(ds.pointColor);
            } else if (stops) {
                pointBgColor = function(ctx) { return gradientColor(ctx.dataIndex / Math.max(1, ds.data.length - 1), stops); };
            } else {
                pointBgColor = color;
            }

            var fillValue = false;
            var bgColor = color;
            if (ds.cssVarGradient) {
                fillValue = true;
                bgColor = function(context) {
                    var chart = context.chart;
                    var chartArea = chart.chartArea;
                    if (!chartArea) { return null; }
                    var rgb = getComputedStyle(document.documentElement).getPropertyValue(ds.cssVarGradient).trim();
                    var c = rgb.split(/\s+/).join(',');
                    var gradient = chart.ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                    gradient.addColorStop(0, 'rgba(' + c + ',0.45)');
                    gradient.addColorStop(1, 'rgba(' + c + ',0.05)');
                    return gradient;
                };
            } else if (ds.fillGradient) {
                fillValue = true;
                bgColor = function(context) {
                    var chart = context.chart;
                    var chartArea = chart.chartArea;
                    if (!chartArea) { return null; }
                    var gradient = chart.ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                    ds.fillGradient.forEach(function(stop) {
                        var stopColor;
                        if (stop.cssVar) {
                            var rgb = getComputedStyle(document.documentElement).getPropertyValue(stop.cssVar).trim();
                            stopColor = 'rgba(' + rgb.split(/\s+/).join(',') + ',' + (stop.alpha !== undefined ? stop.alpha : 1) + ')';
                        } else {
                            stopColor = stop.color;
                        }
                        gradient.addColorStop(stop.t, stopColor);
                    });
                    return gradient;
                };
            } else if (ds.fill !== undefined) {
                fillValue = ds.fill;
            }

            const result = {
                label: ds.label,
                data: ds.data,
                fill: fillValue,
                tension: 0.45,
                borderWidth: 2,
                borderColor: color,
                backgroundColor: bgColor,
                pointRadius: ds.radius !== undefined ? ds.radius : defaultPointRadius,
                pointHoverRadius: ds.hoverRadius !== undefined ? ds.hoverRadius : 4,
                pointBorderWidth: 0,
                pointBackgroundColor: pointBgColor,
            };

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

            return result;
        });

        if (!opts.plugins) opts.plugins = {};
        if (!opts.plugins.tooltip) opts.plugins.tooltip = {};
        if (!opts.plugins.tooltip.callbacks) opts.plugins.tooltip.callbacks = {};
        opts.plugins.tooltip.callbacks.labelColor = function(context) {
            var ds = datasetsConfig[context.datasetIndex];
            if (ds && ds.tooltipColor) {
                var tc = _ro(ds.tooltipColor);
                return { borderColor: tc, backgroundColor: tc };
            }
            return {
                borderColor: context.dataset.borderColor,
                backgroundColor: typeof context.dataset.backgroundColor === 'function'
                    ? context.dataset.borderColor
                    : context.dataset.backgroundColor
            };
        };

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
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: datasets
            },
            options: opts
        });
    });
</script>
</canvas>
