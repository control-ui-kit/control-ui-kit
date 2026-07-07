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
                        Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
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
@if(!empty($cutoutBreakpoints))
                var _cutoutBps = {!! json_encode($cutoutBreakpoints) !!};
                var _cutoutWidths = { sm: 640, md: 768, lg: 1024, xl: 1280, '2xl': 1536 };
                var _pickCutout = function() {
                    var w = window.innerWidth;
                    var val = _cutoutBps.base;
                    ['sm', 'md', 'lg', 'xl', '2xl'].forEach(function(bp) {
                        if (_cutoutBps[bp] !== undefined && w >= _cutoutWidths[bp]) { val = _cutoutBps[bp]; }
                    });
                    return val;
                };
                chartOpts.cutout = _pickCutout();
@endif
                window.{!! $element !!} = new Chart(ctx, {
                    type: chartType,
                    data: {
                        labels: {!! json_encode($labels) !!},
                        datasets: _rd({!! json_encode($datasets) !!})
                    },
                    options: chartOpts
                });
@if(!empty($cutoutBreakpoints))
                window.addEventListener('resize', function() {
                    var chart = window['{!! $element !!}'];
                    var next = _pickCutout();
                    if (chart.options.cutout !== next) { chart.options.cutout = next; chart.update(); }
                });
@endif
                document.querySelectorAll('[data-chart="{!! $element !!}"]').forEach(function(el) {
                    var idx = parseInt(el.dataset.index);
                    el.addEventListener('mouseenter', function() {
                        var chart = window['{!! $element !!}'];
                        if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                        chart.setActiveElements([{datasetIndex:0, index:idx}]);
                        chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                        chart.update();
                    });
                    el.addEventListener('mouseleave', function() {
                        var chart = window['{!! $element !!}'];
                        chart.setActiveElements([]);
                        chart.tooltip.setActiveElements([]);
                        chart.update();
                    });
                    el.addEventListener('click', function() {
                        var chart = window['{!! $element !!}'];
                        if (typeof chart.toggleDataVisibility !== 'function') return;
                        chart.toggleDataVisibility(idx);
                        chart.update();
                        var hidden = !chart.getDataVisibility(idx);
                        el.style.opacity = hidden ? '0.4' : '';
                        el.style.textDecoration = hidden ? 'line-through' : '';
                    });
                });
            })();
        });
    </script>
</canvas>
