<?php

declare(strict_types=1);

namespace Tests\Components\Tooltips;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class TooltipTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.tooltip.font', 'font');
        Config::set('themes.default.tooltip.other', 'other');
        Config::set('themes.default.tooltip.padding', 'padding');
        Config::set('themes.default.tooltip.rounded', 'rounded');
        Config::set('themes.default.tooltip.shadow', 'shadow');
        Config::set('themes.default.tooltip.width', 'width');

        Config::set('themes.default.tooltip.default.background', 'background-default');
        Config::set('themes.default.tooltip.default.border', 'border-default');
        Config::set('themes.default.tooltip.default.color', 'color-default');
        Config::set('themes.default.tooltip.default.arrow', 'arrow-default');

        Config::set('themes.default.tooltip.brand.background', 'background-brand');
        Config::set('themes.default.tooltip.brand.border', 'border-brand');
        Config::set('themes.default.tooltip.brand.color', 'color-brand');
        Config::set('themes.default.tooltip.brand.arrow', 'arrow-brand');

        Config::set('themes.default.tooltip.danger.background', 'background-danger');
        Config::set('themes.default.tooltip.danger.border', 'border-danger');
        Config::set('themes.default.tooltip.danger.color', 'color-danger');
        Config::set('themes.default.tooltip.danger.arrow', 'arrow-danger');

        Config::set('themes.default.tooltip.info.background', 'background-info');
        Config::set('themes.default.tooltip.info.border', 'border-info');
        Config::set('themes.default.tooltip.info.color', 'color-info');
        Config::set('themes.default.tooltip.info.arrow', 'arrow-info');

        Config::set('themes.default.tooltip.muted.background', 'background-muted');
        Config::set('themes.default.tooltip.muted.border', 'border-muted');
        Config::set('themes.default.tooltip.muted.color', 'color-muted');
        Config::set('themes.default.tooltip.muted.arrow', 'arrow-muted');

        Config::set('themes.default.tooltip.success.background', 'background-success');
        Config::set('themes.default.tooltip.success.border', 'border-success');
        Config::set('themes.default.tooltip.success.color', 'color-success');
        Config::set('themes.default.tooltip.success.arrow', 'arrow-success');

        Config::set('themes.default.tooltip.warning.background', 'background-warning');
        Config::set('themes.default.tooltip.warning.border', 'border-warning');
        Config::set('themes.default.tooltip.warning.color', 'color-warning');
        Config::set('themes.default.tooltip.warning.arrow', 'arrow-warning');
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World">
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-default border-default color-default font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-default;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_top_position(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" position="top">
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-default border-default color-default font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-default;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_bottom_position(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" position="bottom">
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.bottom + gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, 0)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-b-[5px]" :style="`border-bottom-color: arrow-default;transform:translateX(${nudge}px)`"></div>
                        <div class="background-default border-default color-default font other padding rounded shadow width">Hello World</div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_left_position(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" position="left">
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top + r.height / 2; this.left = r.left - gap; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.top, 0) - Math.max(b.bottom - window.innerHeight + edge, 0); const limit = Math.max(b.height / 2 - edge, 0); this.top += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-100%, -50%)`" class="z-50 pointer-events-none flex flex-row items-center" role="tooltip">
                        <div class="background-default border-default color-default font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-t-[5px] border-t-transparent border-b-[5px] border-b-transparent border-l-[5px]" :style="`border-left-color: arrow-default;transform:translateY(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_right_position(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" position="right">
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top + r.height / 2; this.left = r.right + gap; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.top, 0) - Math.max(b.bottom - window.innerHeight + edge, 0); const limit = Math.max(b.height / 2 - edge, 0); this.top += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(0, -50%)`" class="z-50 pointer-events-none flex flex-row items-center" role="tooltip">
                        <div class="w-0 h-0 border-t-[5px] border-t-transparent border-b-[5px] border-b-transparent border-r-[5px]" :style="`border-right-color: arrow-default;transform:translateY(${nudge}px)`"></div>
                        <div class="background-default border-default color-default font other padding rounded shadow width">Hello World</div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_default_type_shorthand(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" default>
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-default border-default color-default font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-default;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_brand_type_shorthand(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" brand>
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-brand border-brand color-brand font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-brand;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_danger_type_shorthand(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" danger>
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-danger border-danger color-danger font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-danger;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_info_type_shorthand(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" info>
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-info border-info color-info font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-info;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_muted_type_shorthand(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" muted>
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-muted border-muted color-muted font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-muted;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_success_type_shorthand(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" success>
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-success border-success color-success font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-success;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_warning_type_shorthand(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" warning>
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-warning border-warning color-warning font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-warning;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_type_attribute(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" type="danger">
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-danger border-danger color-danger font other padding rounded shadow width">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-danger;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" arrow="10">
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="1 2 3 4 5 6 7 8 9">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: 10;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_a_custom_width(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" width="max-w-lg">
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-default border-default color-default font other padding rounded shadow max-w-lg">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-default;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_shipped_theme_wraps_tooltip_text_within_a_responsive_width(): void
    {
        $theme = require __DIR__ . '/../../../config/themes/default.php';

        self::assertSame('whitespace-normal wrap-break-word', $theme['tooltip']['other']);
        self::assertSame('max-w-[min(20rem,calc(100vw-1rem))]', $theme['tooltip']['width']);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="Hello World" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none">
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="">Hello World</div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-default;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_html_content(): void
    {
        $template = <<<'HTML'
            <x-tooltip text="<strong>Bold</strong> and <em>more</em>">
                <button>Hover me</button>
            </x-tooltip>
            HTML;

        $expected = <<<'HTML'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-default border-default color-default font other padding rounded shadow width"><strong>Bold</strong> and <em>more</em></div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-default;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_tooltip_component_can_be_rendered_with_a_text_slot(): void
    {
        $template = <<<'TIP'
            <x-tooltip position="top">
                <x-slot name="text">
                    HTML Tooltip <br />
                    with line break
                </x-slot>
                <button>Hover me</button>
            </x-tooltip>
            TIP;

        $expected = <<<'TIP'
            <div class="inline-block" x-data="{ open: false, top: 0, left: 0, nudge: 0, tip: null, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.nudge = 0; this.open = true; this.$nextTick(this.constrain.bind(this)); }, constrain() { if (! this.tip) { return; } const b = this.tip.getBoundingClientRect(), edge = 8; if (! b.width) { return; } const shift = Math.max(edge - b.left, 0) - Math.max(b.right - window.innerWidth + edge, 0); const limit = Math.max(b.width / 2 - edge, 0); this.left += shift; this.nudge = Math.min(Math.max(-shift, -limit), limit); }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                <button>Hover me</button>
                <template x-teleport="body">
                    <div x-show="open" x-init="tip = $el" :style="`position:fixed;top:0;left:0;transform:translate(${left}px, ${top}px) translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                        <div class="background-default border-default color-default font other padding rounded shadow width">
                            HTML Tooltip
                            <br />
                            with line break
                        </div>
                        <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" :style="`border-top-color: arrow-default;transform:translateX(${nudge}px)`"></div>
                    </div>
                </template>
            </div>
            TIP;

        $this->assertComponentRenders($expected, $template);
    }
}
