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
@if(!empty($centerText))
                var _centerText = {!! json_encode($centerText) !!};
                var _centerColor = (function(c) {
                    if (typeof c !== 'string' || c.charAt(0) !== '-') { return c; }
                    var v = _s.getPropertyValue(c).trim();
                    for (var i = 0; i < 5 && /^var\(/.test(v); i++) {
                        var mm = v.match(/^var\(\s*(--[\w-]+)(?:\s*,.*?)?\s*\)$/);
                        if (!mm) { break; }
                        v = _s.getPropertyValue(mm[1]).trim();
                    }
                    return v ? 'rgb(' + v + ')' : c;
                })(_centerText.color);
                // Resolve a Tailwind text-size class (e.g. text-xl) to a pixel font
                // size by measuring a hidden element, so the canvas font honours the
                // theme's actual rem scale. Cached per class; numbers pass through.
                var _twFontPx = (function() {
                    var cache = {};
                    return function(cls) {
                        if (typeof cls === 'number') { return cls; }
                        if (!cls) { return 16; }
                        if (cache[cls] !== undefined) { return cache[cls]; }
                        var el = document.createElement('span');
                        el.className = cls;
                        el.style.position = 'absolute';
                        el.style.visibility = 'hidden';
                        el.style.pointerEvents = 'none';
                        document.body.appendChild(el);
                        var px = parseFloat(getComputedStyle(el).fontSize) || 16;
                        document.body.removeChild(el);
                        cache[cls] = px;
                        return px;
                    };
                })();
                var _centerTextPlugin = {
                    id: 'centerText',
                    afterDraw: function(chart) {
                        var area = chart.chartArea;
                        if (!area) { return; }
                        var g = chart.ctx;
                        var cx = (area.left + area.right) / 2;
                        var cy = (area.top + area.bottom) / 2;
                        var hasLabel = _centerText.label !== undefined && _centerText.label !== null && _centerText.label !== '';
                        var valuePx = _twFontPx(_centerText.size);
                        var labelPx = _twFontPx(_centerText.labelSize);
                        g.save();
                        g.textAlign = 'center';
                        g.textBaseline = 'middle';
                        g.fillStyle = _centerColor;
                        g.font = _centerText.weight + ' ' + valuePx + 'px ' + _centerText.family;
                        g.fillText(String(_centerText.text), cx, hasLabel ? cy - (labelPx * 0.7) : cy);
                        if (hasLabel) {
                            g.font = 'normal ' + labelPx + 'px ' + _centerText.family;
                            g.fillText(String(_centerText.label), cx, cy + (valuePx * 0.5));
                        }
                        g.restore();
                    }
                };
@endif
@if(!empty($centerText))
                window.{!! $element !!} = new Chart(ctx, {
                    type: chartType,
                    data: {
                        labels: {!! json_encode($labels) !!},
                        datasets: _rd({!! json_encode($datasets) !!})
                    },
                    options: chartOpts,
                    plugins: [_centerTextPlugin]
                });
@else
                window.{!! $element !!} = new Chart(ctx, {
                    type: chartType,
                    data: {
                        labels: {!! json_encode($labels) !!},
                        datasets: _rd({!! json_encode($datasets) !!})
                    },
                    options: chartOpts
                });
@endif
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
