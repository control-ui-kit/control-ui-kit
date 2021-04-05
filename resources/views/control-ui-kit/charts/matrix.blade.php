<canvas id="{{ $id }}"></canvas>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        (function() {
            "use strict";

            var ctx = document.getElementById("{{ $id }}").getContext("2d");
            window.Matrix_{{ $id }} = new Chart(ctx, {
                type: "matrix",
                data: {
                    datasets: [{
                        label: "{{ $label }}",
                        data: {!! json_encode($data, JSON_THROW_ON_ERROR) !!},
                        backgroundColor: function (ctx) {
                            var value = ctx.dataset.data[ctx.dataIndex].v;
                            var alpha = (value - 5) / {{ $highestValue }};

                            return Color("{{ $color }}").alpha(alpha).darken(0.3).rgbString();
                        },
                        borderWidth: {
                            top: 2,
                            right: 2,
                            bottom: 2,
                            left: 2
                        },
                        width: function (ctx) {
                            var a = ctx.chart.chartArea;
                            const nt = ctx.chart.scales['x-axis-0'].ticks.length;

                            return (a.right - a.left) / nt - {{ $xMargin }};
                        },
                        height: function (ctx) {
                            var a = ctx.chart.chartArea;
                            const nt = ctx.chart.scales['y-axis-0'].ticks.length;

                            return (a.bottom - a.top) / nt - {{ $yMargin }};
                        }
                    }]
                },
                options: {
                    responsive: true,
                    showTooltips: true,
                    maintainAspectRatio: true,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        callbacks: {
                            title: function (tooltip, data) {
                                return data.datasets[0].data[tooltip[0].index].x;
                            },
                            label: function (tooltip, data) {
                                return data.datasets[0].data[tooltip.index].v + ' : ' + data.datasets[0].data[tooltip.index].y;
                            }
                        }
                    },
                    scales: {
                        xAxes: [
                            {
                                display: {{ $xVisible }},
                                type: 'time',
                                position: '{{ $xPosition }}',
                                offset: true,
                                time: {
                                    unit: 'day'
                                },
                                gridLines: {
                                    display: false
                                }
                            }
                        ],
                        yAxes: [
                            {
                                display: {{ $yVisible }},
                                type: 'category',
                                position: '{{ $yPosition }}',
                                offset: true,
                                reverse: {{ $yReverse }},
                                labels: {!! json_encode($labels) !!},
                                ticks: {
                                    maxRotation: 0,
                                    autoSkip: true,
                                    padding: 1,
                                },
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                    tickMarkLength: 0,
                                }
                            }
                        ]
                    }
                }
            });
        })();
    });
</script>