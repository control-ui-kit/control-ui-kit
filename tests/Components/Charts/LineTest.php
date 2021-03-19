<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class LineTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function a_chart_line_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_multiple_data_sets_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ], [
                            'label' => 'Downloads',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 120],
                                ['x' => '02/01/2020', 'y' => 165],
                                ['x' => '03/01/2020', 'y' => 40],
                                ['x' => '04/01/2020', 'y' => 32],
                                ['x' => '05/01/2020', 'y' => 79],
                                ['x' => '06/01/2020', 'y' => 203],
                                ['x' => '07/01/2020', 'y' => 3]
                            ]
                        ]
                    ]
                ]" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"},{"label":"Downloads","data":[{"x":"01\/01\/2020","y":120},{"x":"02\/01\/2020","y":165},{"x":"03\/01\/2020","y":40},{"x":"04\/01\/2020","y":32},{"x":"05\/01\/2020","y":79},{"x":"06\/01\/2020","y":203},{"x":"07\/01\/2020","y":3}],"fill":false,"borderColor":"#3cb44b","backgroundColor":"#3cb44b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_custom_colours_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" 
                :colors="['red', 'green', 'blue']" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"red","backgroundColor":"red"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_legend_disabled_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]"
                legend-display="false" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":false,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_label_position_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]"
                legend-position="bottom" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"bottom","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_legend_alignment_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" legend-align="start" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"start","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_legend_width_amended_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" legend-width="100" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":false,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_label_width_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" label-width="20" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":20,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_label_size_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" label-size="24" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":24,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_label_style_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" label-style="italic" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"italic","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_label_colour_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" label-color="#c3c3c3" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#c3c3c3","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_label_family_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" label-family="sans-serif" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_label_padding_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" label-padding="30" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":30}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_title_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" title="Graph Title" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"Graph Title","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_title_display_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" title-display="false" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_title_position_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" title-position="bottom" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"bottom","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_title_size_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" title-size="20" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":20,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_title_family_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" title-family="sans-serif" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_title_color_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" title-color="#c3c3c3" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#c3c3c3","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_title_style_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" title-style="bold" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_title_padding_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" title-padding="20" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":20,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_title_line_height_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" title-height="1.8" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.8},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_point_style_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" point-style="rect" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"rect"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_grid_hidden_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" hide-grid />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":false}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"value"},"gridLines":{"display":false}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function a_chart_line_component_with_axis_labels_hidden_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-line-chart id="line_chart" 
                :data="[
                    'items' => [
                        [
                            'label' => 'Streams',
                            'data' => [
                                ['x' => '01/01/2020', 'y' => 60],
                                ['x' => '02/01/2020', 'y' => 120],
                                ['x' => '03/01/2020', 'y' => 70],
                                ['x' => '04/01/2020', 'y' => 110],
                                ['x' => '05/01/2020', 'y' => 80],
                                ['x' => '06/01/2020', 'y' => 100],
                                ['x' => '07/01/2020', 'y' => 90]
                            ]
                        ]
                    ]
                ]" hide-axis />
            HTML;

        $expected = <<<'HTML'
            <canvas id="line_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("line_chart");
                            window.line_chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [],
                                    datasets: [{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"#e6194b","backgroundColor":"#e6194b"}]
                                },
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":false,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true}}],"yAxes":[{"display":false,"scaleLabel":{"display":false,"labelString":"value"},"gridLines":{"display":true}}]},"elements":{"point":{"pointStyle":"circle"}},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
