<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class DonutTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function a_donut_chart_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_legend_disabled_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" legend-display="false" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":false,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_legend_position_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" legend-position="bottom" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_legend_alignment_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" legend-align="end" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"end","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_legend_width_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" legend-width="100" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":false,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_label_width_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-width="50" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":50,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_label_size_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-size="20" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":20,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_label_style_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-style="italic" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"italic","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_label_color_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-color="#c3c3c3" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#c3c3c3","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_label_family_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-family="sans-serif" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_label_padding_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" label-padding="50" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":50}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_title_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title="Chart Title" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"Chart Title","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_title_display_disabled_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-display="false" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_title_position_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-position="bottom" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"bottom","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_title_size_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-size="20" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":20,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_title_family_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-family="sans-serif" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_title_color_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-color="#c3c3c3" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#c3c3c3","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_title_style_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-stye="italic" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_title_padding_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-padding="30" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":30,"lineHeight":1.2}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_donut_chart_component_with_title_line_height_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-donut-chart
                id="donut_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]" title-height="1.8" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="donut_chart" width="400" height="200">
                <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                        (function() {
                            "use strict";
                            var _s = getComputedStyle(document.documentElement);
                            var _rc = function(c, dk) {
                                if (typeof c === 'string' && c.charAt(0) === '-') {
                                    var p = _s.getPropertyValue(c).trim().split(/\s+/).map(Number);
                                    if (dk) { p = p.map(function(v) { return Math.round(v * (1 + dk)); }); }
                                    return 'rgb(' + p.join(', ') + ')';
                                }
                                return c;
                            };
                            var _rd = function(datasets) {
                                return datasets.map(function(d) {
                                    var r = Object.assign({}, d);
                                    ['borderColor', 'backgroundColor', 'hoverBorderColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0); }) : _rc(r[k], 0);
                                    });
                                    ['hoverBackgroundColor'].forEach(function(k) {
                                        if (!(k in r)) return;
                                        r[k] = Array.isArray(r[k]) ? r[k].map(function(c) { return _rc(c, 0.3); }) : _rc(r[k], 0.3);
                                    });
                                    return r;
                                });
                            };
                            var ctx = document.getElementById("donut_chart");
                            window.donut_chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"data":[40,60,100]}])
                                },
                                                    options: {"plugins":{"legend":{"display":true,"position":"left","align":"center","fullWidth":true,"reverse":false,"labels":{"boxWidth":40,"fontSize":12,"fontStyle":"normal","fontColor":"#666","fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","padding":10}},"title":{"display":false,"text":"","position":"top","fontSize":12,"fontFamily":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","fontColor":"#666","fontStyle":"bold","padding":10,"lineHeight":1.8}},"cutout":"70%"}
                                                });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
