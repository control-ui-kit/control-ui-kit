const _resolveVar = (v) => {
    const style = getComputedStyle(document.documentElement);
    let val = style.getPropertyValue(v).trim();
    for (let i = 0; i < 5 && /^var\(/.test(val); i++) {
        const m = val.match(/^var\(\s*(--[\w-]+)(?:\s*,.*?)?\s*\)$/);
        if (!m) break;
        val = style.getPropertyValue(m[1]).trim();
    }
    return val;
};
const chartColor = (v) => `rgb(${_resolveVar(v)})`;
const chartColorArr = (v) => _resolveVar(v).split(/\s+/).map(Number);

const _interpolateGradient = (t, resolvedStops) => {
    const a = resolvedStops.findLast(s => s.t <= t) ?? resolvedStops[0];
    const b = resolvedStops.find(s => s.t >= t) ?? resolvedStops[resolvedStops.length - 1];
    if (a.t === b.t) return `rgb(${a.c[0]},${a.c[1]},${a.c[2]})`;
    const u = (t - a.t) / (b.t - a.t);
    const r = Math.round(a.c[0] + (b.c[0] - a.c[0]) * u);
    const g = Math.round(a.c[1] + (b.c[1] - a.c[1]) * u);
    const bl = Math.round(a.c[2] + (b.c[2] - a.c[2]) * u);
    return `rgb(${r},${g},${bl})`;
};

const gradientColor = (t, stops = null) => {
    const _stops = (stops && stops.length) ? stops : [
        { t: 0.0,  cssVar: '--chart-100' },
        { t: 0.45, cssVar: '--chart-200' },
        { t: 1.0,  cssVar: '--chart-300' },
    ];
    const resolvedStops = _stops.map(s => ({ t: s.t, c: chartColorArr(s.cssVar) }));
    return _interpolateGradient(t, resolvedStops);
};

const _resolveColor = (val) => {
    if (typeof val !== 'string') return val;
    if (/^--[\w-]+$/.test(val)) return chartColor(val);
    const m = val.match(/^rgb\(\s*(--[\w-]+)\s*\)$/);
    if (m) return chartColor(m[1]);
    return val;
};

const _resolveColors = (obj) => {
    if (typeof obj === 'string') return _resolveColor(obj);
    if (Array.isArray(obj)) return obj.map(_resolveColors);
    if (obj !== null && typeof obj === 'object') {
        const out = {};
        for (const k in obj) {
            if (Object.prototype.hasOwnProperty.call(obj, k)) out[k] = _resolveColors(obj[k]);
        }
        return out;
    }
    return obj;
};

const _applyChartColors = (chart) => {
    const gridColor        = chartColor('--chart-grid');
    const legendLabelColor = chartColor('--chart-legend-label');
    const axisLabelColor   = chartColor('--chart-axis-label');
    const titleLabelColor  = chartColor('--chart-label');
    const segmentBorder    = chartColor('--chart-border');
    const tooltipBg        = chartColor('--chart-tooltip-bg');
    const tooltipText      = chartColor('--chart-tooltip-text');
    const tooltipBorder    = chartColor('--chart-tooltip-border');

    if (chart.options.scales) {
        Object.values(chart.options.scales).forEach(scale => {
            if (scale.grid) {
                scale.grid.color       = gridColor;
                scale.grid.borderColor = gridColor;
            }
            if (scale.ticks) scale.ticks.color = axisLabelColor;
            if (scale.title) scale.title.color = axisLabelColor;
        });
    }

    const type = chart.config.type;
    if (type === 'pie' || type === 'doughnut') {
        chart.data.datasets.forEach(dataset => { dataset.borderColor = segmentBorder; });
    }

    if (chart.options.plugins) {
        const leg = chart.options.plugins.legend;
        if (leg?.labels) leg.labels.color = legendLabelColor;
        const ttl = chart.options.plugins.title;
        if (ttl) ttl.color = titleLabelColor;
        const tt = chart.options.plugins.tooltip;
        if (tt) {
            tt.backgroundColor = tooltipBg;
            tt.titleColor      = tooltipText;
            tt.bodyColor       = tooltipText;
            tt.footerColor     = tooltipText;
            tt.borderColor     = tooltipBorder;
            const _border = tooltipBorder;
            tt.callbacks = tt.callbacks || {};
            tt.callbacks.labelColor = function(context) {
                const ds = context.dataset;
                const i  = context.dataIndex;
                const bg = Array.isArray(ds.backgroundColor)
                    ? ds.backgroundColor[i]
                    : (ds.backgroundColor || ds.borderColor);
                return { borderColor: _border, backgroundColor: bg, borderWidth: 1 };
            };
        }
    }
    chart.update('none');
};

if (typeof Chart !== 'undefined' && typeof Proxy !== 'undefined') {
    window.Chart = new Proxy(Chart, {
        construct: (Target, args) => {
            const chart = new Target(args[0], _resolveColors(args[1]));
            requestAnimationFrame(() => _applyChartColors(chart));
            return chart;
        }
    });

    new MutationObserver(() => {
        requestAnimationFrame(() => {
            if (typeof Chart !== 'undefined') {
                Object.values(Chart.instances).forEach(_applyChartColors);
            }
        });
    }).observe(document.documentElement, { attributes: true, attributeFilter: ['data-mode'] });
}
