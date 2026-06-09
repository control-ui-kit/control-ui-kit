<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class BarTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function a_bar_chart_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_multiple_data_sets_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"},{"label":"Downloads","data":[{"x":"01\/01\/2020","y":120},{"x":"02\/01\/2020","y":165},{"x":"03\/01\/2020","y":40},{"x":"04\/01\/2020","y":32},{"x":"05\/01\/2020","y":79},{"x":"06\/01\/2020","y":203},{"x":"07\/01\/2020","y":3}],"fill":false,"borderColor":"--chart-200","backgroundColor":"--chart-200"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_custom_colours_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"red","backgroundColor":"red"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_legend_disabled_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":false,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_label_position_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_legend_alignment_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"start","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_legend_width_amended_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":false,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_label_width_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":20,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_label_size_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":24,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_label_style_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"italic","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_label_colour_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"#c3c3c3","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_label_family_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_label_padding_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":30,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_title_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"Graph Title","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_title_display_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_title_position_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"bottom","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_title_size_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":20,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_title_family_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_title_color_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"#c3c3c3","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_title_style_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_title_padding_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":20},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_title_line_height_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.8},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_point_style_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"rect"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_grid_hidden_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":false,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":false,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_axis_labels_hidden_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":false,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":false,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_x_tick_display_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_x_tick_color_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"#666"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"#666","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_x_tick_family_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_x_tick_size_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":20,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_x_tick_style_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"italic","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_x_tick_height_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.8"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_x_tick_reverse_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_x_tick_padding_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":20,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_x_tick_z_index_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":50}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_y_tick_display_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":false,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_y_tick_color_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"red"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"red","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_y_tick_family_set_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_y_tick_size_changed__can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":30,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_y_tick_style_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"italic","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_y_tick_height_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.8"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_y_tick_reverse_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":true,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_y_tick_padding_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":30,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_y_tick_z_index_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":150}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_tooltip_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"index","intersect":false,"position":"average","backgroundColor":"#222","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_tooltip_titles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"yellow","titleFont":{"family":"serif","size":14,"weight":"italic"},"titleAlign":"right","titleSpacing":20,"titleMarginBottom":20,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_tooltip_body_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"limegreen","bodyFont":{"family":"serif","size":10,"weight":"italic"},"bodyAlign":"right","bodySpacing":20,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_tooltip_footer_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"lightblue","footerFont":{"family":"serif","size":20,"weight":"italic"},"footerAlign":"right","footerSpacing":20,"footerMarginTop":40,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_bar_chart_component_with_further_tooltip_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-bar-chart id="bar_chart"
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
            <canvas id="bar_chart" width="400" height="200">
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
                            var _ro = function(obj) {
                                if (typeof obj === 'string') {
                                    if (obj.charAt(0) === '-') { return _s.getPropertyValue(obj).trim() || obj; }
                                    var m = obj.match(/^rgba?\((--[^)]+)\)$/);
                                    if (m) { return _s.getPropertyValue(m[1]).trim() || obj; }
                                }
                                if (typeof obj === 'object' && obj !== null) {
                                    if (Array.isArray(obj)) return obj.map(_ro);
                                    var r = {};
                                    Object.keys(obj).forEach(function(k) { r[k] = _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("bar_chart");
                            var chartType = 'bar';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"indexAxis":"y","plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":false,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":50,"y":50},"caretPadding":5,"caretSize":5,"cornerRadius":20,"multiKeyBackground":"purple","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"purple","borderWidth":5,"rtl":false}},"scales":{"x":{"display":true,"type":"linear","title":{"display":true,"text":"Date","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}},"y":{"display":true,"title":{"display":true,"text":"Value","color":"rgb(--chart-axis-label)"},"grid":{"display":true,"color":"rgb(--chart-grid)"},"ticks":{"display":true,"color":"rgb(--chart-axis-label)","font":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal","lineHeight":"1.2"},"reverse":false,"padding":0,"z":0}}},"elements":{"point":{"pointStyle":"circle"}}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                if (!chartOpts.plugins.legend) chartOpts.plugins.legend = {};
                                if (!chartOpts.plugins.legend.labels) chartOpts.plugins.legend.labels = {};
                                chartOpts.plugins.legend.labels.generateLabels = function(chart) {
                                    var typeOverride = Chart.overrides[chart.config.type];
                                    var original = (typeOverride && typeOverride.plugins && typeOverride.plugins.legend
                                        && typeOverride.plugins.legend.labels && typeOverride.plugins.legend.labels.generateLabels)
                                        || Chart.defaults.plugins.legend.labels.generateLabels;
                                    var labels = original.call(this, chart);
                                    labels.forEach(function(label) { label.lineWidth = 0; });
                                    return labels;
                                };
                            }
                            window.bar_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: [],
                                    datasets: _rd([{"label":"Streams","data":[{"x":"01\/01\/2020","y":60},{"x":"02\/01\/2020","y":120},{"x":"03\/01\/2020","y":70},{"x":"04\/01\/2020","y":110},{"x":"05\/01\/2020","y":80},{"x":"06\/01\/2020","y":100},{"x":"07\/01\/2020","y":90}],"fill":false,"borderColor":"--chart-100","backgroundColor":"--chart-100"}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="bar_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    window['bar_chart'].setActiveElements([{datasetIndex:0, index:idx}]);
                                    window['bar_chart'].tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    window['bar_chart'].update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    window['bar_chart'].setActiveElements([]);
                                    window['bar_chart'].tooltip.setActiveElements([]);
                                    window['bar_chart'].update();
                                });
                            });
                        })();
                    });
                </script>
            </canvas>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
