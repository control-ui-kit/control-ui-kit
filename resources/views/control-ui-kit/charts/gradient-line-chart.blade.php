<canvas id="{{ $id }}"></canvas>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('{{ $id }}');
        const datasetsConfig = @json($datasets);

        const datasets = datasetsConfig.map(function (ds) {
            const stops = ds.gradientStops || null;
            const vals = ds.values;
            return {
                label: ds.label,
                data: vals,
                fill: false,
                tension: 0.45,
                borderWidth: 2,
                borderColor: gradientColor(1, stops),
                pointRadius: 6,
                pointHoverRadius: 7,
                pointBorderWidth: 0,
                pointBackgroundColor: function (ctx) {
                    const i = ctx.dataIndex ?? 0;
                    const t = i / Math.max(1, (vals.length - 1));
                    return gradientColor(t, stops);
                },
                segment: {
                    borderColor: function (ctx) {
                        const i = ctx.p0DataIndex ?? 0;
                        const t = i / Math.max(1, (vals.length - 1));
                        return gradientColor(t, stops);
                    }
                }
            };
        });

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '--chart-tooltip-bg',
                        boxPadding: {{ $tooltipBoxPadding }},
                        boxBorderWidth: {{ $tooltipBoxBorderWidth }},
                        rtl: {{ $tooltipRtl ? 'true' : 'false' }},
                        callbacks: {
                            label: (c) => `${Number(c.parsed.y).toLocaleString()}`
                        }
                    }
                },
                interaction: { mode: 'index', intersect: false },
                scales: {
                    x: {
                        grid: { display: false },
                        border: { display: false },
                        ticks: { padding: 12, maxRotation: 0, autoSkip: true }
                    },
                    y: {
                        grid: { display: true },
                        border: { display: true },
                        ticks: {
                            padding: 12,
                            callback: (v) => Number(v).toLocaleString()
                        }
                    }
                },
                layout: { padding: { top: 10, right: 10, bottom: 0, left: 10 } },
                elements: { line: { borderJoinStyle: 'round', borderCapStyle: 'round' } }
            }
        });
    });
</script>
