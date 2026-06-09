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

        const datasets = datasetsConfig.map(function (ds, i) {
            const rawColor = ds.color || defaultColors[i % defaultColors.length];
            const color = _ro(rawColor);

            const result = {
                label: ds.label,
                data: ds.data,
                backgroundColor: color,
                borderColor: color,
                borderWidth: 0,
            };

            if (ds.stack !== undefined) {
                result.stack = ds.stack;
            }

            if (ds.order !== undefined) {
                result.order = ds.order;
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
