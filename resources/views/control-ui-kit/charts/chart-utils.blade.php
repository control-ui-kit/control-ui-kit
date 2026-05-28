@once('chart-utils')
@push('scripts')
<script>
    const chartColor = (v) => `rgb(${getComputedStyle(document.documentElement).getPropertyValue(v).trim()})`;
    const chartColorArr = (v) => getComputedStyle(document.documentElement).getPropertyValue(v).trim().split(/\s+/).map(Number);

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
</script>
@endpush
@endonce
