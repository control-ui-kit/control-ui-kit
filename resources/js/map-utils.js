import * as d3geo from 'd3-geo';
import * as topojson from 'topojson-client';

const resolveVar = (v) => {
    const style = getComputedStyle(document.documentElement);
    let val = style.getPropertyValue(v).trim();
    for (let i = 0; i < 5 && /^var\(/.test(val); i++) {
        const m = val.match(/^var\(\s*(--[\w-]+)(?:\s*,.*?)?\s*\)$/);
        if (!m) break;
        val = style.getPropertyValue(m[1]).trim();
    }
    return val;
};

const resolveColor = (v) => `rgb(${resolveVar(v)})`;

const resolveColorArr = (v) => resolveVar(v).split(/\s+/).map(Number);

const resolveGradientStops = (stops) => stops.map(s => ({ t: s.t, c: resolveColorArr(s.cssVar) }));

const interpolateGradient = (t, resolvedStops) => {
    const a = resolvedStops.findLast(s => s.t <= t) ?? resolvedStops[0];
    const b = resolvedStops.find(s => s.t >= t) ?? resolvedStops[resolvedStops.length - 1];
    if (a.t === b.t) return `rgb(${a.c[0]},${a.c[1]},${a.c[2]})`;
    const u = (t - a.t) / (b.t - a.t);
    const r = Math.round(a.c[0] + (b.c[0] - a.c[0]) * u);
    const g = Math.round(a.c[1] + (b.c[1] - a.c[1]) * u);
    const bl = Math.round(a.c[2] + (b.c[2] - a.c[2]) * u);
    return `rgb(${r},${g},${bl})`;
};

window.mapUtils = {
    resolveVar,
    resolveColor,
    resolveGradientStops,
    interpolateGradient,
    geoPath: d3geo.geoPath,
    geoNaturalEarth1: d3geo.geoNaturalEarth1,
    geoMercator: d3geo.geoMercator,
    geoEqualEarth: d3geo.geoEqualEarth,
    topoFeature: topojson.feature,
};
