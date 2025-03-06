<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class PieTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function a_pie_chart_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_legend_disabled_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" legend-display="false" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":false,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_legend_position_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" legend-position="bottom" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"bottom","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_legend_alignment_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" legend-align="end" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"end","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_legend_width_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" legend-width="100" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":false,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_label_width_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-width="50" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":50,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_label_size_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-size="20" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":20,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_label_style_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-style="italic" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"italic","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_label_color_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-color="#c3c3c3" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#c3c3c3","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_label_family_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-family="sans-serif" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_label_padding_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-padding="50" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":50}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_title_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title="Chart Title" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"Chart Title","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_title_display_disabled_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-display="false" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_title_position_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-position="bottom" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"bottom","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_title_size_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-size="20" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":20,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_title_family_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-family="sans-serif" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_title_color_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-color="#c3c3c3" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#c3c3c3","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_title_style_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-stye="italic" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_title_padding_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-padding="30" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":30,"lineHeight":1.2}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_pie_chart_component_with_title_line_height_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-height="1.8" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var ctx = document.getElementById("pie_chart");
                            window.pie_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: [{"backgroundColor":["#e6194b","#3cb44b","#ffe119","#4363d8","#f58231","#911eb4","#46f0f0","#f032e6","#bcf60c","#fabebe","#008080","#e6beff"],"hoverBackgroundColor":["#ff2061","#4eea61","#ffff20","#5780ff","#ffa93f","#bc27ea","#5bffff","#ff41ff","#f4ff0f","#fff7f7","#00a6a6","#fff7ff"],"data":[40,60,100]}]
                                },
                                                    options: {"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.8}}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
