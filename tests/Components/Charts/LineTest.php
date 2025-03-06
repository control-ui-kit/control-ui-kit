<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class LineTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function a_line_chart_component_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_multiple_data_sets_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_custom_colours_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_legend_disabled_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":false,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_label_position_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"bottom","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_legend_alignment_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"start","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_legend_width_amended_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":false,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_label_width_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":20,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_label_size_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":24,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_label_style_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"italic","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_label_colour_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#c3c3c3","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_label_family_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_label_padding_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":30}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_title_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"Graph Title","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_title_display_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_title_position_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"bottom","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_title_size_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":20,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_title_family_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_title_color_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#c3c3c3","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_title_style_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_title_padding_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":20,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_title_line_height_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.8},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_point_style_changed_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"rect"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_grid_hidden_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":false,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":false,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_axis_labels_hidden_can_be_rendered(): void
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":false,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":false,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_x_tick_display_changed_can_be_rendered(): void
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
                ]" x-tick-display="true" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_x_tick_color_changed_can_be_rendered(): void
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
                ]" x-tick-color="#666" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_x_tick_family_changed_can_be_rendered(): void
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
                ]" x-tick-family="serif" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_x_tick_size_changed_can_be_rendered(): void
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
                ]" x-tick-size="20" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":20,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_x_tick_style_changed_can_be_rendered(): void
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
                ]" x-tick-style="italic" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"italic","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_x_tick_height_changed_can_be_rendered(): void
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
                ]" x-tick-height="1.8" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.8","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_x_tick_reverse_changed_can_be_rendered(): void
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
                ]" x-tick-reverse="false" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_x_tick_padding_changed_can_be_rendered(): void
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
                ]" x-tick-padding="20" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":20,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_x_tick_z_index_changed_can_be_rendered(): void
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
                ]" x-tick-z-index="50" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":50}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_y_tick_display_changed_can_be_rendered(): void
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
                ]" y-tick-display="false" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":false,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_y_tick_color_changed_can_be_rendered(): void
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
                ]" y-tick-color="red" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"red","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_y_tick_family_set_can_be_rendered(): void
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
                ]" y-tick-family="serif" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_y_tick_size_changed__can_be_rendered(): void
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
                ]" y-tick-size="30" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":30,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_y_tick_style_changed_can_be_rendered(): void
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
                ]" y-tick-style="italic" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"italic","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_y_tick_height_changed_can_be_rendered(): void
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
                ]" y-tick-height="1.8" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.8","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_y_tick_reverse_changed_can_be_rendered(): void
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
                ]" y-tick-reverse="true" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":true,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_y_tick_padding_changed_can_be_rendered(): void
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
                ]" y-tick-padding="30" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":30,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_y_tick_z_index_changed_can_be_rendered(): void
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
                ]" y-tick-z-index="150" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":150}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_tooltip_styles_changed_can_be_rendered(): void
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
                ]" tooltip-enabled="true" tooltip-mode="index" tooltip-intersect="true" tooltip-position="average" tooltip-background-color="#222" />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"index","intersect":false,"position":"average","backgroundColor":"#222","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_tooltip_titles_changed_can_be_rendered(): void
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
                ]" tooltip-title-family="serif"
                   tooltip-title-size="14"
                   tooltip-title-style="italic"
                   tooltip-title-color="yellow"
                   tooltip-title-align="right"
                   tooltip-title-spacing="20"
                   tooltip-title-margin-bottom="20"
                />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"serif","titleFontSize":14,"titleFontStyle":"italic","titleFontColor":"yellow","titleAlign":"right","titleSpacing":20,"titleMarginBottom":20,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_tooltip_body_styles_changed_can_be_rendered(): void
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
                ]" tooltip-body-family="serif"
                   tooltip-body-size="10"
                   tooltip-body-style="italic"
                   tooltip-body-color="limegreen"
                   tooltip-body-align="right"
                   tooltip-body-spacing="20"
                />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"serif","bodyFontSize":10,"bodyFontStyle":"italic","bodyFontColor":"limegreen","bodyAlign":"right","bodySpacing":20,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_tooltip_footer_styles_changed_can_be_rendered(): void
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
                ]" tooltip-footer-family="serif"
                   tooltip-footer-size="20"
                   tooltip-footer-style="italic"
                   tooltip-footer-color="lightblue"
                   tooltip-footer-align="right"
                   tooltip-footer-spacing="20"
                   tooltip-footer-margin-top="40"
                />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"serif","footerFontSize":20,"footerFontStyle":"italic","footerFontColor":"lightblue","footerAlign":"right","footerSpacing":20,"footerMarginTop":40,"xPadding":6,"yPadding":6,"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"#fff","displayColors":true,"borderColor":"rgba(0, 0, 0, 0)","borderWidth":0,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_line_chart_component_with_further_tooltip_styles_changed_can_be_rendered(): void
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
                ]" tooltip-x-padding="50"
                   tooltip-y-padding="50"
                   tooltip-caret-padding="5"
                   tooltip-caret-size="5"
                   tooltip-corner-radius="20"
                   tooltip-multi-key-background="purple"
                   tooltip-display-colors="true"
                   tooltip-border-color="purple"
                   tooltip-border-width="5"
                   tooltip-rtl="false"
                />
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
                                                    options: {"responsive":true,"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2},"scales":{"xAxes":[{"display":true,"type":"time","time":{"format":"DD\/MM\/YYYY","tooltipFormat":"ll"},"scaleLabel":{"display":true,"labelString":"Date"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}],"yAxes":[{"display":true,"scaleLabel":{"display":true,"labelString":"Value"},"gridLines":{"display":true,"color":"rgba(0, 0, 0, 0.1)"},"ticks":{"display":true,"fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontSize":12,"fontStyle":"normal","lineHeight":"1.2","reverse":false,"padding":0,"z":0}}]},"elements":{"point":{"pointStyle":"circle"}},"tooltips":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgba(0, 0, 0, 0.8)","titleFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","titleFontSize":12,"titleFontStyle":"bold","titleFontColor":"#fff","titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","bodyFontSize":12,"bodyFontStyle":"normal","bodyFontColor":"#fff","bodyAlign":"left","bodySpacing":2,"footerFontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","footerFontSize":12,"footerFontStyle":"bold","footerFontColor":"#fff","footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"xPadding":50,"yPadding":50,"caretPadding":5,"caretSize":5,"cornerRadius":20,"multiKeyBackground":"purple","displayColors":true,"borderColor":"purple","borderWidth":5,"rtl":true},"showLines":true,"spanGaps":false}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
