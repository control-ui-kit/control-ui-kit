@once('chart-utils-js')
@push('scripts')
<script src="{{ url('control-ui-kit/javascript/chart-utils.js?v=1.0.0') }}"></script>
@endpush
@endonce
<canvas id="{{ $id }}"></canvas>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stops = @json($gradientStops ?: null);
        const values = @json($values);
        const count = values.length;
        const barColors = Array.from({ length: count }, (_, i) => gradientColor(i / Math.max(1, count - 1), stops));

        new Chart(document.getElementById('{{ $id }}'), {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: @json($label),
                    data: values,
                    backgroundColor: barColors,
                    borderWidth: 0,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        callbacks: {
                            label: (c) => ` ${Number(c.parsed.y).toLocaleString()} streams`
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        border: { display: false },
                        ticks: { padding: 8 }
                    },
                    y: {
                        grid: { display: true },
                        border: { display: false },
                        ticks: {
                            padding: 12,
                            callback: (v) => Number(v).toLocaleString()
                        }
                    }
                },
                layout: { padding: { top: 10, right: 10, bottom: 0, left: 10 } }
            }
        });
    });
</script>
