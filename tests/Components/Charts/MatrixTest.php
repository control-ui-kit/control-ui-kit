<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use Tests\Components\ComponentTestCase;

class MatrixTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function a_matrix_chart_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-matrix-chart 
                id="matrix"
                :data="[
                    ['x' => '2021-03-17', 'y' => '00:00 - 02:59', 'v' => 4046],
                    ['x' => '2021-03-17', 'y' => '03:00 - 05:59', 'v' => 4120],
                    ['x' => '2021-03-17', 'y' => '06:00 - 08:59', 'v' => 1903],

                    ['x' => '2021-03-18', 'y' => '00:00 - 02:59', 'v' => 8916],
                    ['x' => '2021-03-18', 'y' => '03:00 - 05:59', 'v' => 6777],
                    ['x' => '2021-03-18', 'y' => '06:00 - 08:59', 'v' => 234],

                    ['x' => '2021-03-19', 'y' => '00:00 - 02:59', 'v' => 7072],
                    ['x' => '2021-03-19', 'y' => '03:00 - 05:59', 'v' => 3233],
                    ['x' => '2021-03-19', 'y' => '06:00 - 08:59', 'v' => 8729],
                ]" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="matrix"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    (function() {
                        "use strict";
                        const ctx = document.getElementById('matrix').getContext('2d');
                        window.Matrix_matrix = new Chart(ctx, {
                            type: 'matrix',
                            data: {
                                datasets: [{
                                    label: 'Count',
                                    data: [{"x":"2021-03-17","y":"00:00 - 02:59","v":4046},{"x":"2021-03-17","y":"03:00 - 05:59","v":4120},{"x":"2021-03-17","y":"06:00 - 08:59","v":1903},{"x":"2021-03-18","y":"00:00 - 02:59","v":8916},{"x":"2021-03-18","y":"03:00 - 05:59","v":6777},{"x":"2021-03-18","y":"06:00 - 08:59","v":234},{"x":"2021-03-19","y":"00:00 - 02:59","v":7072},{"x":"2021-03-19","y":"03:00 - 05:59","v":3233},{"x":"2021-03-19","y":"06:00 - 08:59","v":8729}],
                                    backgroundColor(c) {
                                        const value = c.dataset.data[c.dataIndex].v;
                                        const alpha = (value - 5) / 8916;
                                        return Chart.helpers.color('green').alpha(alpha).darken(0.3).rgbString();
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

                                        return (a.right - a.left) / nt - 1;
                                    },
                                    height(c) {
                                        const a = c.chart.chartArea || {};
                                        const nt = c.chart.scales.y.ticks.length;
            
                                        return (a.bottom - a.top) / nt - 1;
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
                                                return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('LL');
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
                                        display: true,
                                        type: 'time',
                                        position: 'bottom',
                                        offset: true,
                                        time: {
                                            unit: 'day'
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        display: true,
                                        type: 'category',
                                        position: 'left',
                                        offset: true,
                                        reverse: true,
                                        labels: ["00:00 - 02:59","03:00 - 05:59","06:00 - 08:59"],
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_matrix_chart_component_with_color_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-matrix-chart 
                id="matrix"
                :data="[
                    ['x' => '2021-03-17', 'y' => '00:00 - 02:59', 'v' => 4046],
                    ['x' => '2021-03-17', 'y' => '03:00 - 05:59', 'v' => 4120],
                    ['x' => '2021-03-17', 'y' => '06:00 - 08:59', 'v' => 1903],

                    ['x' => '2021-03-18', 'y' => '00:00 - 02:59', 'v' => 8916],
                    ['x' => '2021-03-18', 'y' => '03:00 - 05:59', 'v' => 6777],
                    ['x' => '2021-03-18', 'y' => '06:00 - 08:59', 'v' => 234],

                    ['x' => '2021-03-19', 'y' => '00:00 - 02:59', 'v' => 7072],
                    ['x' => '2021-03-19', 'y' => '03:00 - 05:59', 'v' => 3233],
                    ['x' => '2021-03-19', 'y' => '06:00 - 08:59', 'v' => 8729],
                ]" color="red" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="matrix"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    (function() {
                        "use strict";
                        const ctx = document.getElementById('matrix').getContext('2d');
                        window.Matrix_matrix = new Chart(ctx, {
                            type: 'matrix',
                            data: {
                                datasets: [{
                                    label: 'Count',
                                    data: [{"x":"2021-03-17","y":"00:00 - 02:59","v":4046},{"x":"2021-03-17","y":"03:00 - 05:59","v":4120},{"x":"2021-03-17","y":"06:00 - 08:59","v":1903},{"x":"2021-03-18","y":"00:00 - 02:59","v":8916},{"x":"2021-03-18","y":"03:00 - 05:59","v":6777},{"x":"2021-03-18","y":"06:00 - 08:59","v":234},{"x":"2021-03-19","y":"00:00 - 02:59","v":7072},{"x":"2021-03-19","y":"03:00 - 05:59","v":3233},{"x":"2021-03-19","y":"06:00 - 08:59","v":8729}],
                                    backgroundColor(c) {
                                        const value = c.dataset.data[c.dataIndex].v;
                                        const alpha = (value - 5) / 8916;
                                        return Chart.helpers.color('red').alpha(alpha).darken(0.3).rgbString();
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

                                        return (a.right - a.left) / nt - 1;
                                    },
                                    height(c) {
                                        const a = c.chart.chartArea || {};
                                        const nt = c.chart.scales.y.ticks.length;
            
                                        return (a.bottom - a.top) / nt - 1;
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
                                                return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('LL');
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
                                        display: true,
                                        type: 'time',
                                        position: 'bottom',
                                        offset: true,
                                        time: {
                                            unit: 'day'
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        display: true,
                                        type: 'category',
                                        position: 'left',
                                        offset: true,
                                        reverse: true,
                                        labels: ["00:00 - 02:59","03:00 - 05:59","06:00 - 08:59"],
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_matrix_chart_component_with_format_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-matrix-chart 
                id="matrix"
                :data="[
                    ['x' => '2021-03-17', 'y' => '00:00 - 02:59', 'v' => 4046],
                    ['x' => '2021-03-17', 'y' => '03:00 - 05:59', 'v' => 4120],
                    ['x' => '2021-03-17', 'y' => '06:00 - 08:59', 'v' => 1903],

                    ['x' => '2021-03-18', 'y' => '00:00 - 02:59', 'v' => 8916],
                    ['x' => '2021-03-18', 'y' => '03:00 - 05:59', 'v' => 6777],
                    ['x' => '2021-03-18', 'y' => '06:00 - 08:59', 'v' => 234],

                    ['x' => '2021-03-19', 'y' => '00:00 - 02:59', 'v' => 7072],
                    ['x' => '2021-03-19', 'y' => '03:00 - 05:59', 'v' => 3233],
                    ['x' => '2021-03-19', 'y' => '06:00 - 08:59', 'v' => 8729],
                ]" format="DD MMM YYYY" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="matrix"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    (function() {
                        "use strict";
                        const ctx = document.getElementById('matrix').getContext('2d');
                        window.Matrix_matrix = new Chart(ctx, {
                            type: 'matrix',
                            data: {
                                datasets: [{
                                    label: 'Count',
                                    data: [{"x":"2021-03-17","y":"00:00 - 02:59","v":4046},{"x":"2021-03-17","y":"03:00 - 05:59","v":4120},{"x":"2021-03-17","y":"06:00 - 08:59","v":1903},{"x":"2021-03-18","y":"00:00 - 02:59","v":8916},{"x":"2021-03-18","y":"03:00 - 05:59","v":6777},{"x":"2021-03-18","y":"06:00 - 08:59","v":234},{"x":"2021-03-19","y":"00:00 - 02:59","v":7072},{"x":"2021-03-19","y":"03:00 - 05:59","v":3233},{"x":"2021-03-19","y":"06:00 - 08:59","v":8729}],
                                    backgroundColor(c) {
                                        const value = c.dataset.data[c.dataIndex].v;
                                        const alpha = (value - 5) / 8916;
                                        return Chart.helpers.color('green').alpha(alpha).darken(0.3).rgbString();
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

                                        return (a.right - a.left) / nt - 1;
                                    },
                                    height(c) {
                                        const a = c.chart.chartArea || {};
                                        const nt = c.chart.scales.y.ticks.length;
            
                                        return (a.bottom - a.top) / nt - 1;
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
                                                return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('DD MMM YYYY');
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
                                        display: true,
                                        type: 'time',
                                        position: 'bottom',
                                        offset: true,
                                        time: {
                                            unit: 'day'
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        display: true,
                                        type: 'category',
                                        position: 'left',
                                        offset: true,
                                        reverse: true,
                                        labels: ["00:00 - 02:59","03:00 - 05:59","06:00 - 08:59"],
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_matrix_chart_component_with_label_changes_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-matrix-chart 
                id="matrix"
                :data="[
                    ['x' => '2021-03-17', 'y' => '00:00 - 02:59', 'v' => 4046],
                    ['x' => '2021-03-17', 'y' => '03:00 - 05:59', 'v' => 4120],
                    ['x' => '2021-03-17', 'y' => '06:00 - 08:59', 'v' => 1903],

                    ['x' => '2021-03-18', 'y' => '00:00 - 02:59', 'v' => 8916],
                    ['x' => '2021-03-18', 'y' => '03:00 - 05:59', 'v' => 6777],
                    ['x' => '2021-03-18', 'y' => '06:00 - 08:59', 'v' => 234],

                    ['x' => '2021-03-19', 'y' => '00:00 - 02:59', 'v' => 7072],
                    ['x' => '2021-03-19', 'y' => '03:00 - 05:59', 'v' => 3233],
                    ['x' => '2021-03-19', 'y' => '06:00 - 08:59', 'v' => 8729],
                ]" label="Streams" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="matrix"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    (function() {
                        "use strict";
                        const ctx = document.getElementById('matrix').getContext('2d');
                        window.Matrix_matrix = new Chart(ctx, {
                            type: 'matrix',
                            data: {
                                datasets: [{
                                    label: 'Streams',
                                    data: [{"x":"2021-03-17","y":"00:00 - 02:59","v":4046},{"x":"2021-03-17","y":"03:00 - 05:59","v":4120},{"x":"2021-03-17","y":"06:00 - 08:59","v":1903},{"x":"2021-03-18","y":"00:00 - 02:59","v":8916},{"x":"2021-03-18","y":"03:00 - 05:59","v":6777},{"x":"2021-03-18","y":"06:00 - 08:59","v":234},{"x":"2021-03-19","y":"00:00 - 02:59","v":7072},{"x":"2021-03-19","y":"03:00 - 05:59","v":3233},{"x":"2021-03-19","y":"06:00 - 08:59","v":8729}],
                                    backgroundColor(c) {
                                        const value = c.dataset.data[c.dataIndex].v;
                                        const alpha = (value - 5) / 8916;
                                        return Chart.helpers.color('green').alpha(alpha).darken(0.3).rgbString();
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

                                        return (a.right - a.left) / nt - 1;
                                    },
                                    height(c) {
                                        const a = c.chart.chartArea || {};
                                        const nt = c.chart.scales.y.ticks.length;
            
                                        return (a.bottom - a.top) / nt - 1;
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
                                                return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('LL');
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
                                        display: true,
                                        type: 'time',
                                        position: 'bottom',
                                        offset: true,
                                        time: {
                                            unit: 'day'
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        display: true,
                                        type: 'category',
                                        position: 'left',
                                        offset: true,
                                        reverse: true,
                                        labels: ["00:00 - 02:59","03:00 - 05:59","06:00 - 08:59"],
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_matrix_chart_component_with_x_margin_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-matrix-chart 
                id="matrix"
                :data="[
                    ['x' => '2021-03-17', 'y' => '00:00 - 02:59', 'v' => 4046],
                    ['x' => '2021-03-17', 'y' => '03:00 - 05:59', 'v' => 4120],
                    ['x' => '2021-03-17', 'y' => '06:00 - 08:59', 'v' => 1903],

                    ['x' => '2021-03-18', 'y' => '00:00 - 02:59', 'v' => 8916],
                    ['x' => '2021-03-18', 'y' => '03:00 - 05:59', 'v' => 6777],
                    ['x' => '2021-03-18', 'y' => '06:00 - 08:59', 'v' => 234],

                    ['x' => '2021-03-19', 'y' => '00:00 - 02:59', 'v' => 7072],
                    ['x' => '2021-03-19', 'y' => '03:00 - 05:59', 'v' => 3233],
                    ['x' => '2021-03-19', 'y' => '06:00 - 08:59', 'v' => 8729],
                ]" x-margin="10" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="matrix"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    (function() {
                        "use strict";
                        const ctx = document.getElementById('matrix').getContext('2d');
                        window.Matrix_matrix = new Chart(ctx, {
                            type: 'matrix',
                            data: {
                                datasets: [{
                                    label: 'Count',
                                    data: [{"x":"2021-03-17","y":"00:00 - 02:59","v":4046},{"x":"2021-03-17","y":"03:00 - 05:59","v":4120},{"x":"2021-03-17","y":"06:00 - 08:59","v":1903},{"x":"2021-03-18","y":"00:00 - 02:59","v":8916},{"x":"2021-03-18","y":"03:00 - 05:59","v":6777},{"x":"2021-03-18","y":"06:00 - 08:59","v":234},{"x":"2021-03-19","y":"00:00 - 02:59","v":7072},{"x":"2021-03-19","y":"03:00 - 05:59","v":3233},{"x":"2021-03-19","y":"06:00 - 08:59","v":8729}],
                                    backgroundColor(c) {
                                        const value = c.dataset.data[c.dataIndex].v;
                                        const alpha = (value - 5) / 8916;
                                        return Chart.helpers.color('green').alpha(alpha).darken(0.3).rgbString();
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

                                        return (a.right - a.left) / nt - 10;
                                    },
                                    height(c) {
                                        const a = c.chart.chartArea || {};
                                        const nt = c.chart.scales.y.ticks.length;
            
                                        return (a.bottom - a.top) / nt - 1;
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
                                                return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('LL');
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
                                        display: true,
                                        type: 'time',
                                        position: 'bottom',
                                        offset: true,
                                        time: {
                                            unit: 'day'
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        display: true,
                                        type: 'category',
                                        position: 'left',
                                        offset: true,
                                        reverse: true,
                                        labels: ["00:00 - 02:59","03:00 - 05:59","06:00 - 08:59"],
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_matrix_chart_component_with_y_margin_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-matrix-chart 
                id="matrix"
                :data="[
                    ['x' => '2021-03-17', 'y' => '00:00 - 02:59', 'v' => 4046],
                    ['x' => '2021-03-17', 'y' => '03:00 - 05:59', 'v' => 4120],
                    ['x' => '2021-03-17', 'y' => '06:00 - 08:59', 'v' => 1903],

                    ['x' => '2021-03-18', 'y' => '00:00 - 02:59', 'v' => 8916],
                    ['x' => '2021-03-18', 'y' => '03:00 - 05:59', 'v' => 6777],
                    ['x' => '2021-03-18', 'y' => '06:00 - 08:59', 'v' => 234],

                    ['x' => '2021-03-19', 'y' => '00:00 - 02:59', 'v' => 7072],
                    ['x' => '2021-03-19', 'y' => '03:00 - 05:59', 'v' => 3233],
                    ['x' => '2021-03-19', 'y' => '06:00 - 08:59', 'v' => 8729],
                ]" y-margin="10" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="matrix"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    (function() {
                        "use strict";
                        const ctx = document.getElementById('matrix').getContext('2d');
                        window.Matrix_matrix = new Chart(ctx, {
                            type: 'matrix',
                            data: {
                                datasets: [{
                                    label: 'Count',
                                    data: [{"x":"2021-03-17","y":"00:00 - 02:59","v":4046},{"x":"2021-03-17","y":"03:00 - 05:59","v":4120},{"x":"2021-03-17","y":"06:00 - 08:59","v":1903},{"x":"2021-03-18","y":"00:00 - 02:59","v":8916},{"x":"2021-03-18","y":"03:00 - 05:59","v":6777},{"x":"2021-03-18","y":"06:00 - 08:59","v":234},{"x":"2021-03-19","y":"00:00 - 02:59","v":7072},{"x":"2021-03-19","y":"03:00 - 05:59","v":3233},{"x":"2021-03-19","y":"06:00 - 08:59","v":8729}],
                                    backgroundColor(c) {
                                        const value = c.dataset.data[c.dataIndex].v;
                                        const alpha = (value - 5) / 8916;
                                        return Chart.helpers.color('green').alpha(alpha).darken(0.3).rgbString();
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

                                        return (a.right - a.left) / nt - 1;
                                    },
                                    height(c) {
                                        const a = c.chart.chartArea || {};
                                        const nt = c.chart.scales.y.ticks.length;

                                        return (a.bottom - a.top) / nt - 10;
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
                                                return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('LL');
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
                                        display: true,
                                        type: 'time',
                                        position: 'bottom',
                                        offset: true,
                                        time: {
                                            unit: 'day'
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        display: true,
                                        type: 'category',
                                        position: 'left',
                                        offset: true,
                                        reverse: true,
                                        labels: ["00:00 - 02:59","03:00 - 05:59","06:00 - 08:59"],
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_matrix_chart_component_with_x_label_hidden_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-matrix-chart 
                id="matrix"
                :data="[
                    ['x' => '2021-03-17', 'y' => '00:00 - 02:59', 'v' => 4046],
                    ['x' => '2021-03-17', 'y' => '03:00 - 05:59', 'v' => 4120],
                    ['x' => '2021-03-17', 'y' => '06:00 - 08:59', 'v' => 1903],

                    ['x' => '2021-03-18', 'y' => '00:00 - 02:59', 'v' => 8916],
                    ['x' => '2021-03-18', 'y' => '03:00 - 05:59', 'v' => 6777],
                    ['x' => '2021-03-18', 'y' => '06:00 - 08:59', 'v' => 234],

                    ['x' => '2021-03-19', 'y' => '00:00 - 02:59', 'v' => 7072],
                    ['x' => '2021-03-19', 'y' => '03:00 - 05:59', 'v' => 3233],
                    ['x' => '2021-03-19', 'y' => '06:00 - 08:59', 'v' => 8729],
                ]" x-label-visible="false" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="matrix"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    (function() {
                        "use strict";
                        const ctx = document.getElementById('matrix').getContext('2d');
                        window.Matrix_matrix = new Chart(ctx, {
                            type: 'matrix',
                            data: {
                                datasets: [{
                                    label: 'Count',
                                    data: [{"x":"2021-03-17","y":"00:00 - 02:59","v":4046},{"x":"2021-03-17","y":"03:00 - 05:59","v":4120},{"x":"2021-03-17","y":"06:00 - 08:59","v":1903},{"x":"2021-03-18","y":"00:00 - 02:59","v":8916},{"x":"2021-03-18","y":"03:00 - 05:59","v":6777},{"x":"2021-03-18","y":"06:00 - 08:59","v":234},{"x":"2021-03-19","y":"00:00 - 02:59","v":7072},{"x":"2021-03-19","y":"03:00 - 05:59","v":3233},{"x":"2021-03-19","y":"06:00 - 08:59","v":8729}],
                                    backgroundColor(c) {
                                        const value = c.dataset.data[c.dataIndex].v;
                                        const alpha = (value - 5) / 8916;
                                        return Chart.helpers.color('green').alpha(alpha).darken(0.3).rgbString();
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

                                        return (a.right - a.left) / nt - 1;
                                    },
                                    height(c) {
                                        const a = c.chart.chartArea || {};
                                        const nt = c.chart.scales.y.ticks.length;
            
                                        return (a.bottom - a.top) / nt - 1;
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
                                                return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('LL');
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
                                        display: false,
                                        type: 'time',
                                        position: 'bottom',
                                        offset: true,
                                        time: {
                                            unit: 'day'
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        display: true,
                                        type: 'category',
                                        position: 'left',
                                        offset: true,
                                        reverse: true,
                                        labels: ["00:00 - 02:59","03:00 - 05:59","06:00 - 08:59"],
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function a_matrix_chart_component_with_y_label_hidden_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-matrix-chart 
                id="matrix"
                :data="[
                    ['x' => '2021-03-17', 'y' => '00:00 - 02:59', 'v' => 4046],
                    ['x' => '2021-03-17', 'y' => '03:00 - 05:59', 'v' => 4120],
                    ['x' => '2021-03-17', 'y' => '06:00 - 08:59', 'v' => 1903],

                    ['x' => '2021-03-18', 'y' => '00:00 - 02:59', 'v' => 8916],
                    ['x' => '2021-03-18', 'y' => '03:00 - 05:59', 'v' => 6777],
                    ['x' => '2021-03-18', 'y' => '06:00 - 08:59', 'v' => 234],

                    ['x' => '2021-03-19', 'y' => '00:00 - 02:59', 'v' => 7072],
                    ['x' => '2021-03-19', 'y' => '03:00 - 05:59', 'v' => 3233],
                    ['x' => '2021-03-19', 'y' => '06:00 - 08:59', 'v' => 8729],
                ]" y-label-visible="false" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="matrix"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    (function() {
                        "use strict";
                        const ctx = document.getElementById('matrix').getContext('2d');
                        window.Matrix_matrix = new Chart(ctx, {
                            type: 'matrix',
                            data: {
                                datasets: [{
                                    label: 'Count',
                                    data: [{"x":"2021-03-17","y":"00:00 - 02:59","v":4046},{"x":"2021-03-17","y":"03:00 - 05:59","v":4120},{"x":"2021-03-17","y":"06:00 - 08:59","v":1903},{"x":"2021-03-18","y":"00:00 - 02:59","v":8916},{"x":"2021-03-18","y":"03:00 - 05:59","v":6777},{"x":"2021-03-18","y":"06:00 - 08:59","v":234},{"x":"2021-03-19","y":"00:00 - 02:59","v":7072},{"x":"2021-03-19","y":"03:00 - 05:59","v":3233},{"x":"2021-03-19","y":"06:00 - 08:59","v":8729}],
                                    backgroundColor(c) {
                                        const value = c.dataset.data[c.dataIndex].v;
                                        const alpha = (value - 5) / 8916;
                                        return Chart.helpers.color('green').alpha(alpha).darken(0.3).rgbString();
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

                                        return (a.right - a.left) / nt - 1;
                                    },
                                    height(c) {
                                        const a = c.chart.chartArea || {};
                                        const nt = c.chart.scales.y.ticks.length;
            
                                        return (a.bottom - a.top) / nt - 1;
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
                                                return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('LL');
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
                                        display: true,
                                        type: 'time',
                                        position: 'bottom',
                                        offset: true,
                                        time: {
                                            unit: 'day'
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        display: false,
                                        type: 'category',
                                        position: 'left',
                                        offset: true,
                                        reverse: true,
                                        labels: ["00:00 - 02:59","03:00 - 05:59","06:00 - 08:59"],
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_matrix_chart_component_with_x_label_position_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-matrix-chart 
                id="matrix"
                :data="[
                    ['x' => '2021-03-17', 'y' => '00:00 - 02:59', 'v' => 4046],
                    ['x' => '2021-03-17', 'y' => '03:00 - 05:59', 'v' => 4120],
                    ['x' => '2021-03-17', 'y' => '06:00 - 08:59', 'v' => 1903],

                    ['x' => '2021-03-18', 'y' => '00:00 - 02:59', 'v' => 8916],
                    ['x' => '2021-03-18', 'y' => '03:00 - 05:59', 'v' => 6777],
                    ['x' => '2021-03-18', 'y' => '06:00 - 08:59', 'v' => 234],

                    ['x' => '2021-03-19', 'y' => '00:00 - 02:59', 'v' => 7072],
                    ['x' => '2021-03-19', 'y' => '03:00 - 05:59', 'v' => 3233],
                    ['x' => '2021-03-19', 'y' => '06:00 - 08:59', 'v' => 8729],
                ]" x-label-position="top" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="matrix"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    (function() {
                        "use strict";
                        const ctx = document.getElementById('matrix').getContext('2d');
                        window.Matrix_matrix = new Chart(ctx, {
                            type: 'matrix',
                            data: {
                                datasets: [{
                                    label: 'Count',
                                    data: [{"x":"2021-03-17","y":"00:00 - 02:59","v":4046},{"x":"2021-03-17","y":"03:00 - 05:59","v":4120},{"x":"2021-03-17","y":"06:00 - 08:59","v":1903},{"x":"2021-03-18","y":"00:00 - 02:59","v":8916},{"x":"2021-03-18","y":"03:00 - 05:59","v":6777},{"x":"2021-03-18","y":"06:00 - 08:59","v":234},{"x":"2021-03-19","y":"00:00 - 02:59","v":7072},{"x":"2021-03-19","y":"03:00 - 05:59","v":3233},{"x":"2021-03-19","y":"06:00 - 08:59","v":8729}],
                                    backgroundColor(c) {
                                        const value = c.dataset.data[c.dataIndex].v;
                                        const alpha = (value - 5) / 8916;
                                        return Chart.helpers.color('green').alpha(alpha).darken(0.3).rgbString();
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

                                        return (a.right - a.left) / nt - 1;
                                    },
                                    height(c) {
                                        const a = c.chart.chartArea || {};
                                        const nt = c.chart.scales.y.ticks.length;
            
                                        return (a.bottom - a.top) / nt - 1;
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
                                                return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('LL');
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
                                        display: true,
                                        type: 'time',
                                        position: 'top',
                                        offset: true,
                                        time: {
                                            unit: 'day'
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        display: true,
                                        type: 'category',
                                        position: 'left',
                                        offset: true,
                                        reverse: true,
                                        labels: ["00:00 - 02:59","03:00 - 05:59","06:00 - 08:59"],
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function a_matrix_chart_component_with_y_label_position_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-matrix-chart 
                id="matrix"
                :data="[
                    ['x' => '2021-03-17', 'y' => '00:00 - 02:59', 'v' => 4046],
                    ['x' => '2021-03-17', 'y' => '03:00 - 05:59', 'v' => 4120],
                    ['x' => '2021-03-17', 'y' => '06:00 - 08:59', 'v' => 1903],

                    ['x' => '2021-03-18', 'y' => '00:00 - 02:59', 'v' => 8916],
                    ['x' => '2021-03-18', 'y' => '03:00 - 05:59', 'v' => 6777],
                    ['x' => '2021-03-18', 'y' => '06:00 - 08:59', 'v' => 234],

                    ['x' => '2021-03-19', 'y' => '00:00 - 02:59', 'v' => 7072],
                    ['x' => '2021-03-19', 'y' => '03:00 - 05:59', 'v' => 3233],
                    ['x' => '2021-03-19', 'y' => '06:00 - 08:59', 'v' => 8729],
                ]" y-label-position="right" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="matrix"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    (function() {
                        "use strict";
                        const ctx = document.getElementById('matrix').getContext('2d');
                        window.Matrix_matrix = new Chart(ctx, {
                            type: 'matrix',
                            data: {
                                datasets: [{
                                    label: 'Count',
                                    data: [{"x":"2021-03-17","y":"00:00 - 02:59","v":4046},{"x":"2021-03-17","y":"03:00 - 05:59","v":4120},{"x":"2021-03-17","y":"06:00 - 08:59","v":1903},{"x":"2021-03-18","y":"00:00 - 02:59","v":8916},{"x":"2021-03-18","y":"03:00 - 05:59","v":6777},{"x":"2021-03-18","y":"06:00 - 08:59","v":234},{"x":"2021-03-19","y":"00:00 - 02:59","v":7072},{"x":"2021-03-19","y":"03:00 - 05:59","v":3233},{"x":"2021-03-19","y":"06:00 - 08:59","v":8729}],
                                    backgroundColor(c) {
                                        const value = c.dataset.data[c.dataIndex].v;
                                        const alpha = (value - 5) / 8916;
                                        return Chart.helpers.color('green').alpha(alpha).darken(0.3).rgbString();
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

                                        return (a.right - a.left) / nt - 1;
                                    },
                                    height(c) {
                                        const a = c.chart.chartArea || {};
                                        const nt = c.chart.scales.y.ticks.length;
            
                                        return (a.bottom - a.top) / nt - 1;
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
                                                return moment(tooltip[0].raw.x, 'YYYY-MM-DD').format('LL');
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
                                        display: true,
                                        type: 'time',
                                        position: 'bottom',
                                        offset: true,
                                        time: {
                                            unit: 'day'
                                        },
                                        grid: {
                                            display: false
                                        }
                                    },
                                    y: {
                                        display: true,
                                        type: 'category',
                                        position: 'right',
                                        offset: true,
                                        reverse: true,
                                        labels: ["00:00 - 02:59","03:00 - 05:59","06:00 - 08:59"],
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
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
