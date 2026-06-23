<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class TextFieldTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.label.background', 'label-background');
        Config::set('themes.default.label.border', 'label-border');
        Config::set('themes.default.label.color', 'label-color');
        Config::set('themes.default.label.font', 'label-font');
        Config::set('themes.default.label.other', 'label-other');
        Config::set('themes.default.label.padding', 'label-padding');
        Config::set('themes.default.label.rounded', 'label-rounded');
        Config::set('themes.default.label.shadow', 'label-shadow');

        Config::set('themes.default.error.color', 'color');
        Config::set('themes.default.error.font', 'font');
        Config::set('themes.default.error.other', 'other');
        Config::set('themes.default.error.padding', 'padding');

        Config::set('themes.default.form-layout-responsive.content', 'content-style');
        Config::set('themes.default.form-layout-responsive.help', 'help-style');
        Config::set('themes.default.form-layout-responsive.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-responsive.text', 'text-style');
        Config::set('themes.default.form-layout-responsive.label', 'label-style');
        Config::set('themes.default.form-layout-responsive.required-size', 'required-size');
        Config::set('themes.default.form-layout-responsive.required-color', 'required-color');
        Config::set('themes.default.form-layout-responsive.slot', 'slot-style');
        Config::set('themes.default.form-layout-responsive.wrapper', 'wrapper');

        Config::set('themes.default.input-text.background', 'background');
        Config::set('themes.default.input-text.border', 'border');
        Config::set('themes.default.input-text.color', 'color');
        Config::set('themes.default.input-text.font', 'font');
        Config::set('themes.default.input-text.other', 'other');
        Config::set('themes.default.input-text.padding', 'padding');
        Config::set('themes.default.input-text.rounded', 'rounded');
        Config::set('themes.default.input-text.shadow', 'shadow');
        Config::set('themes.default.input-text.width', 'width');

        Config::set('themes.default.tooltip.font', 'tooltip-font');
        Config::set('themes.default.tooltip.other', 'tooltip-other');
        Config::set('themes.default.tooltip.padding', 'tooltip-padding');
        Config::set('themes.default.tooltip.rounded', 'tooltip-rounded');
        Config::set('themes.default.tooltip.shadow', 'tooltip-shadow');
        Config::set('themes.default.tooltip.default.background', 'tooltip-background');
        Config::set('themes.default.tooltip.default.border', 'tooltip-border');
        Config::set('themes.default.tooltip.default.color', 'tooltip-color');
        Config::set('themes.default.tooltip.default.arrow', 'tooltip-arrow');
    }

    #[Test]
    public function the_field_text_component_can_be_rendered(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Track</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Track</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Track</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" onclick="alert('here')" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_a_value_with_an_ampersand(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" value="Chris & Matt" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Track</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="track" type="text" id="track" value="Chris &amp; Matt" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_a_tooltip(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="Enter your full name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Track</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="block w-full" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.bottom + gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                            <template x-teleport="body">
                                <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, 0)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                    <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-b-[5px]" style="border-bottom-color: tooltip-arrow"></div>
                                    <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow">Enter your full name</div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_a_tooltip_and_custom_position(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="Enter your full name" tooltip-position="right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Track</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="block w-full" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top + r.height / 2; this.left = r.right + gap; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                            <template x-teleport="body">
                                <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(0, -50%)`" class="z-50 pointer-events-none flex flex-row items-center" role="tooltip">
                                    <div class="w-0 h-0 border-t-[5px] border-t-transparent border-b-[5px] border-b-transparent border-r-[5px]" style="border-right-color: tooltip-arrow"></div>
                                    <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow">Enter your full name</div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_tooltip_styling_can_be_overridden_via_config(): void
    {
        Config::set('themes.default.tooltip.default.background', 'custom-tooltip-bg');
        Config::set('themes.default.tooltip.default.border', 'custom-tooltip-border');
        Config::set('themes.default.tooltip.default.color', 'custom-tooltip-color');
        Config::set('themes.default.tooltip.default.arrow', 'custom-tooltip-arrow');

        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="Enter your full name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Track</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="block w-full" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.bottom + gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                            <template x-teleport="body">
                                <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, 0)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                    <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-b-[5px]" style="border-bottom-color: custom-tooltip-arrow"></div>
                                    <div class="custom-tooltip-bg custom-tooltip-border custom-tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow">Enter your full name</div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
