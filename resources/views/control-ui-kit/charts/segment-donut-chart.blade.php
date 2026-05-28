<canvas id="{{ $id }}"></canvas>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paletteDefaults = ['--chart-100', '--chart-200', '--chart-300', '--chart-400', '--chart-500', '--chart-600', '--chart-700'];
        const palette = @json($colors ?: []);
        const segmentCount = {{ count($values) }};
        const resolvedColors = Array.from({ length: segmentCount }, (_, i) => {
            return chartColor(palette[i] ?? paletteDefaults[i % paletteDefaults.length]);
        });

        const chart = window['{{ $id }}'] = new Chart(document.getElementById('{{ $id }}'), {
            type: 'doughnut',
            data: {
                labels: @json($labels),
                datasets: [{
                    data: @json($values),
                    backgroundColor: resolvedColors,
                    borderWidth: 0,
                    hoverOffset: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: false,
                cutout: '{{ $cutout }}%',
                layout: { padding: 8 },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        callbacks: {
                            label: (c) => ` ${c.label}: ${Number(c.raw).toLocaleString()}`
                        }
                    }
                }
            }
        });

        document.querySelectorAll('[data-chart="{{ $id }}"]').forEach(function (el) {
            const index = parseInt(el.dataset.index);
            el.addEventListener('mouseenter', function () {
                chart.setActiveElements([{ datasetIndex: 0, index }]);
                chart.tooltip.setActiveElements([{ datasetIndex: 0, index }], { x: 0, y: 0 });
                chart.update();
            });
            el.addEventListener('mouseleave', function () {
                chart.setActiveElements([]);
                chart.tooltip.setActiveElements([]);
                chart.update();
            });
        });
    });
</script>
