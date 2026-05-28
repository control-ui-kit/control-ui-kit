<canvas id="{!! $element !!}" width="{!! $size['width'] !!}" height="{!! $size['height'] !!}">
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
                var ctx = document.getElementById("{!! $element !!}");
                window.{!! $element !!} = new Chart(ctx, {
                    type: '{!! $type !!}',
                    data: {
                        labels: {!! json_encode($labels) !!},
                        datasets: _rd({!! json_encode($datasets) !!})
                    },
                    @if(!empty($optionsRaw))
                    options: {!! $optionsRaw !!}
                    @elseif(!empty($options))
                    options: {!! json_encode($options) !!}
                    @endif
                });
            })();
        });
    </script>
</canvas>
