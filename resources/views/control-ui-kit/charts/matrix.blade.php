<canvas id="{{ $id }}"></canvas>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        (function() {
            "use strict";
            const ctx = document.getElementById('{{ $id }}').getContext('2d');
            window.Matrix_{{ $id }} = new Chart(ctx, {
                type: 'matrix',
                data: {
                    datasets: [{
                        label: '{{ $label }}',
                        data: {!! json_encode($data, JSON_THROW_ON_ERROR) !!},
                        backgroundColor(c) {
                            const value = c.dataset.data[c.dataIndex].v;
                            const alpha = (value - 5) / {{ $highestValue }};
                            return Chart.helpers.color('{{ $color }}').alpha(alpha).darken(0.3).rgbString();
                        },
                        borderWidth: {
                            top: 2,
                            right: 2,
                            bottom: 2,
                            left: 2
                        },
                        width(c) {
                            const a = c.chart.chartArea || {};
                            const nt = c.chart.scales.x.ticks.length;

                            return (a.right - a.left) / nt - {{ $xMargin }};
                        },
                        height(c) {
                            const a = c.chart.chartArea || {};
                            const nt = c.chart.scales.y.ticks.length;

                            return (a.bottom - a.top) / nt - {{ $yMargin }};
                        }
                    }]
                },
                options: {
                    responsive: true,
                    showTooltips: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true,
                            displayColors: false,
                            callbacks: {
                                title: function (tooltip) {
                                    return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('{{ $format }}');
                                },
                                label: function (tooltip) {
                                    return tooltip.raw.y;
                                },
                                footer: function (tooltip) {
                                    return tooltip[0].dataset.label + ': ' + tooltip[0].raw.v;
                                }
                            }
                        }
                    },
                    tooltips: {
                        enabled: true,
                        callbacks: {
                            label: function(tooltipItem, data) {
                                return data.datasets[tooltipItem.datasetIndex].label + ' : ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                            }
                        }
                    },
                    scales: {
                        x: {
                            display: {{ $xVisible }},
                            type: 'time',
                            position: '{{ $xPosition }}',
                            offset: true,
                            time: {
                                unit: 'day'
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            display: {{ $yVisible }},
                            type: 'category',
                            position: '{{ $yPosition }}',
                            offset: true,
                            reverse: {{ $yReverse }},
                            labels: {!! json_encode($labels) !!},
                            ticks: {
                                maxRotation: 0,
                                autoSkip: true,
                                padding: 1
                            },
                            grid: {
                                display: false,
                                drawBorder: false,
                                tickMarkLength: 0,
                            }
                        }
                    }
                }
            });
        })();
    });
</script>
