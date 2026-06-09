<canvas id="{!! $element !!}"@if(!empty($size['width'])) width="{!! $size['width'] !!}" height="{!! $size['height'] !!}"@endif>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            (function() {
                "use strict";
                var _s = getComputedStyle(document.documentElement);
                var _rc = function(c, dk) {
                    if (typeof c === 'string' && c.charAt(0) === '-') {
                        var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                        if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                        return 'rgb(' + p.join(', ') + ')';
                    }
                    return c;
                };
                var _rd = function(datasets) {
                    return datasets.map(function(d) {
                        var r = Object.assign({}, d);
                        ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                            if (!(k in r)) return;
                            r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                        });
                        ['hoverBackgroundColor'].forEach(function(k) {
                            if (!(k in r)) return;
                            r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                        });
                        return r;
                    });
                };
                var _ro = function(obj) {
                    if (typeof obj === 'string') {
                        if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                        var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                        if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                    }
                    if (typeof obj === 'object' && obj !== null) {
                        if (Array.isArray(obj)) return obj.map(_ro);
                        var r = {};
                        Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                        return r;
                    }
                    return obj;
                };
                var ctx = document.getElementById("{!! $element !!}");
                var chartType = '{!! $type !!}';
                var chartOpts = {};
                @if(!empty($optionsRaw))
                chartOpts = _ro({!! $optionsRaw !!});
                @elseif(!empty($options))
                chartOpts = _ro({!! json_encode($options) !!});
                @endif
                if (chartType === 'pie' || chartType === 'doughnut') {
                    if (!chartOpts.plugins) chartOpts.plugins = {};
                    if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                    if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                    chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                        var typeOverride = Chart.overrides[chart.config.type];
                        var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                            && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                            || Chart.defaults.plugins.legend.labels.generateLabels;
                        var labels = original.call(this, chart);
                        labels.forEach(function(label) { label.lineWidth = 0; });
                        return labels;
                    };
                }
                window.{!! $element !!} = new Chart(ctx, {
                    type: chartType,
                    data: {
                        labels: {!! json_encode($labels) !!},
                        datasets: _rd({!! json_encode($datasets) !!})
                    },
                    options: chartOpts
                });
                document.querySelectorAll('[data-chart="{!! $element !!}"]').forEach(function(el) {
                    var idx = parseInt(el.dataset.index);
                    el.addEventListener('mouseenter', function() {
                        window['{!! $element !!}'].setActiveElements([{datasetIndex:0, index:idx}]);
                        window['{!! $element !!}'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                        window['{!! $element !!}'].update();
                    });
                    el.addEventListener('mouseleave', function() {
                        window['{!! $element !!}'].setActiveElements([]);
                        window['{!! $element !!}'].tooltip.setActiveElements([]);
                        window['{!! $element !!}'].update();
                    });
                });
            })();
        });
    </script>
</canvas>
