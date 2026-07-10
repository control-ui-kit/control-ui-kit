<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use ControlUIKit\Components\Charts\Pie;
use PHPUnit\Framework\Attributes\Test;
use ReflectionMethod;
use Tests\Components\ComponentTestCase;

class PieTest extends ComponentTestCase
{
    protected function setUp(): void
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":false,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"end","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":false,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":50,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":20,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"italic","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"#c3c3c3","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":50,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"Chart Title","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"bottom","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":20,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"#c3c3c3","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":30},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.8},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
    public function a_pie_chart_component_with_values_and_labels_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :values="[40, 60, 100]"
                :labels="['Male', 'Female', 'Unknown']" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
    public function a_pie_chart_component_can_be_rendered_responsive(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                :data="[
                    'Male'    => 40,
                    'Female'  => 60,
                    'Unknown' => 100
                ]"
                responsive="true" />
            HTML;

        $expected = <<<'HTML'
            <canvas id="pie_chart">
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
                                    Object.keys(obj).forEach(function(k) { r[k] = (k === 'tooltip') ? obj[k] : _ro(obj[k]); });
                                    return r;
                                }
                                return obj;
                            };
                            var ctx = document.getElementById("pie_chart");
                            var chartType = 'pie';
                            var chartOpts = {};
                                            chartOpts = _ro({"responsive":true,"maintainAspectRatio":true,"aspectRatio":2,"plugins":{"legend":{"display":true,"position":"bottom","align":"center","fullSize":true,"reverse":false,"labels":{"boxWidth":40,"color":"rgb(--chart-legend-label)","font":{"size":12,"weight":"normal","family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif"},"padding":10,"borderWidth":0}},"title":{"display":false,"text":"","position":"top","color":"rgb(--chart-label)","font":{"size":12,"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","weight":"bold","lineHeight":1.2},"padding":10},"tooltip":{"enabled":true,"mode":"nearest","intersect":true,"position":"average","backgroundColor":"rgb(--chart-tooltip-bg)","titleColor":"rgb(--chart-tooltip-text)","titleFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"titleAlign":"left","titleSpacing":2,"titleMarginBottom":6,"bodyColor":"rgb(--chart-tooltip-text)","bodyFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"normal"},"bodyAlign":"left","bodySpacing":2,"footerColor":"rgb(--chart-tooltip-text)","footerFont":{"family":"'Helvetica Neue', 'Helvetica', 'Arial', sans-serif","size":12,"weight":"bold"},"footerAlign":"left","footerSpacing":2,"footerMarginTop":6,"padding":{"x":6,"y":6},"caretPadding":2,"caretSize":5,"cornerRadius":6,"multiKeyBackground":"rgb(--chart-tooltip-text)","displayColors":true,"boxPadding":4,"boxBorderWidth":0,"borderColor":"rgb(--chart-tooltip-border)","borderWidth":1,"rtl":false}},"animation":{"duration":1000,"easing":"easeInOutQuart","animateRotate":true,"animateScale":false},"layout":{"padding":0}});
                                            if (chartType === 'pie' || chartType === 'doughnut') {
                                if (!chartOpts.plugins) chartOpts.plugins = {};
                                // Hide the tooltip for segments with a blank label (e.g. the
                                // gauge's max/track segment) so only labelled data reacts to
                                // hover. Author-supplied filters are left untouched.
                                if (!chartOpts.plugins.tooltip) chartOpts.plugins.tooltip = {};
                                if (typeof chartOpts.plugins.tooltip.filter !== 'function') {
                                    chartOpts.plugins.tooltip.filter = function(item) {
                                        var label = item.chart.data.labels[item.dataIndex];
                                        return label !== undefined && label !== null && String(label).trim() !== '';
                                    };
                                }
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
                            window.pie_chart = new Chart(ctx, {
                                type: chartType,
                                data: {
                                    labels: ["Male","Female","Unknown"],
                                    datasets: _rd([{"backgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"hoverBackgroundColor":["--chart-100","--chart-200","--chart-300","--chart-400","--chart-500","--chart-600","--chart-700","--chart-800","--chart-900","--chart-1000","--chart-1100","--chart-1200"],"borderColor":"--chart-border","borderWidth":2,"hoverOffset":4,"data":[40,60,100]}])
                                },
                                options: chartOpts
                            });
                            document.querySelectorAll('[data-chart="pie_chart"]').forEach(function(el) {
                                var idx = parseInt(el.dataset.index);
                                el.addEventListener('mouseenter', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.getDataVisibility === 'function' && !chart.getDataVisibility(idx)) return;
                                    chart.setActiveElements([{datasetIndex:0, index:idx}]);
                                    chart.tooltip.setActiveElements([{datasetIndex:0, index:idx}], {x:0,y:0});
                                    chart.update();
                                });
                                el.addEventListener('mouseleave', function() {
                                    var chart = window['pie_chart'];
                                    chart.setActiveElements([]);
                                    chart.tooltip.setActiveElements([]);
                                    chart.update();
                                });
                                el.addEventListener('click', function() {
                                    var chart = window['pie_chart'];
                                    if (typeof chart.toggleDataVisibility !== 'function') return;
                                    chart.toggleDataVisibility(idx);
                                    chart.update();
                                    var hidden = !chart.getDataVisibility(idx);
                                    el.style.opacity = hidden ? '0.4' : '';
                                    el.style.textDecoration = hidden ? 'line-through' : '';
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
    public function a_pie_chart_renders_with_fixed_size_when_not_responsive(): void
    {
        $template = <<<'HTML'
            <x-pie-chart
                id="pie_chart"
                responsive="false"
                :data="['Male' => 40, 'Female' => 60]" />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('id="pie_chart"', $rendered);
    }

    #[Test]
    public function a_pie_chart_can_be_created_from_values_and_labels_arrays(): void
    {
        $component = new Pie(
            id: 'pie_chart',
            values: [40, 60],
            labels: ['Male', 'Female'],
        );

        $this->assertSame(['Male' => 40, 'Female' => 60], $component->data);
    }

    #[Test]
    public function a_pie_chart_accepts_custom_colors_array(): void
    {
        $colors = ['#ff0000', '#00ff00', '#0000ff'];

        $component = new Pie(
            id: 'pie_chart',
            data: ['A' => 1, 'B' => 2, 'C' => 3],
            colors: $colors,
        );

        $this->assertSame($colors, $component->colors);
    }

    #[Test]
    public function pie_chart_color_luminance_handles_six_char_hex(): void
    {
        $component = new Pie(id: 'pie_chart', data: ['A' => 1]);

        $method = new ReflectionMethod(Pie::class, 'colorLuminance');
        $method->setAccessible(true);

        $result = $method->invoke($component, '#ff0000', 0.2);

        $this->assertStringStartsWith('#', $result);
        $this->assertSame(7, strlen($result));
    }

    #[Test]
    public function pie_chart_color_luminance_handles_short_hex(): void
    {
        $component = new Pie(id: 'pie_chart', data: ['A' => 1]);

        $method = new ReflectionMethod(Pie::class, 'colorLuminance');
        $method->setAccessible(true);

        $result = $method->invoke($component, '#f00', 0.2);

        $this->assertStringStartsWith('#', $result);
        $this->assertSame(7, strlen($result));
    }

    #[Test]
    public function pie_chart_resolve_data_returns_empty_array_when_no_data_provided(): void
    {
        $component = new Pie(id: 'pie_chart');

        $this->assertSame([], $component->data);
    }

    #[Test]
    public function pie_chart_invalid_legend_position_falls_back_to_left(): void
    {
        $component = new Pie(id: 'pie_chart', data: ['A' => 1], legendPosition: 'invalid');

        $this->assertSame('left', $component->legendPosition);
    }

    #[Test]
    public function pie_chart_invalid_legend_align_falls_back_to_center(): void
    {
        $component = new Pie(id: 'pie_chart', data: ['A' => 1], legendAlign: 'invalid');

        $this->assertSame('center', $component->legendAlign);
    }
}
