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
                    <div class="text-style"> <span>Track</span> </div>
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
                    <div class="text-style"> <span>Track</span> </div>
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
                    <div class="text-style"> <span>Track</span> </div>
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
                    <div class="text-style"> <span>Track</span> </div>
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
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="Enter your full name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style">
                        <span>Track</span>
                        <div class="ml-auto float-right" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <svg class="h-4 w-4 fill-current text-muted" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M12 4c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 18C6.486 22 2 17.515 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10c0 5.515-4.486 10-10 10z"/>
                                    <path clip-rule="evenodd" d="M13 15h-2v-3h1c1.103 0 2-.897 2-2 0-1.104-.897-2-2-2s-2 .896-2 2H8c0-2.206 1.794-4 4-4s4 1.794 4 4c0 1.86-1.277 3.428-3 3.874V15zM13.25 17c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25z"/>
                                    </svg>
                                    <template x-teleport="body">
                                        <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                            <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow">Enter your full name</div>
                                            <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" style="border-top-color: tooltip-arrow"></div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </label>
                        <div class="content-style">
                            <div class="slot-style">
                                <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                            </div>
                        </div>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_a_tooltip_using_a_custom_icon(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="Enter your full name" tooltip-icon="icon-info-circle" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style">
                        <span>Track</span>
                        <div class="ml-auto float-right" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <svg class="h-4 w-4 fill-current text-muted" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M12 4c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 18C6.486 22 2 17.515 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10c0 5.515-4.486 10-10 10z"/>
                                    <path clip-rule="evenodd" d="M13 15v-4c0-.552-.448-1-1-1h-2v2h1v3H9v2h6v-2h-2zM13.25 8c0 .69-.56 1.25-1.25 1.25S10.75 8.69 10.75 8s.56-1.25 1.25-1.25 1.25.56 1.25 1.25z"/>
                                    </svg>
                                    <template x-teleport="body">
                                        <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                            <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow">Enter your full name</div>
                                            <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" style="border-top-color: tooltip-arrow"></div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </label>
                        <div class="content-style">
                            <div class="slot-style">
                                <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                            </div>
                        </div>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_an_input_tooltip(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="Enter your full name" tooltip-type="input" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style"> <span>Track</span> </div>
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
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_an_input_tooltip_and_custom_position(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="Enter your full name" tooltip-type="input" tooltip-position="right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style"> <span>Track</span> </div>
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
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_input_tooltip_styling_can_be_overridden_via_config(): void
    {
        Config::set('themes.default.tooltip.default.background', 'custom-tooltip-bg');
        Config::set('themes.default.tooltip.default.border', 'custom-tooltip-border');
        Config::set('themes.default.tooltip.default.color', 'custom-tooltip-color');
        Config::set('themes.default.tooltip.default.arrow', 'custom-tooltip-arrow');

        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="Enter your full name" tooltip-type="input" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style"> <span>Track</span> </div>
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
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_renders_an_html_tooltip_for_the_icon_type(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="<strong>Full</strong> name" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style">
                        <span>Track</span>
                        <div class="ml-auto float-right" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <svg class="h-4 w-4 fill-current text-muted" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M12 4c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 18C6.486 22 2 17.515 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10c0 5.515-4.486 10-10 10z"/>
                                    <path clip-rule="evenodd" d="M13 15h-2v-3h1c1.103 0 2-.897 2-2 0-1.104-.897-2-2-2s-2 .896-2 2H8c0-2.206 1.794-4 4-4s4 1.794 4 4c0 1.86-1.277 3.428-3 3.874V15zM13.25 17c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25z"/>
                                    </svg>
                                    <template x-teleport="body">
                                        <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                            <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow"><strong>Full</strong> name</div>
                                            <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" style="border-top-color: tooltip-arrow"></div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </label>
                        <div class="content-style">
                            <div class="slot-style">
                                <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                            </div>
                        </div>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_renders_an_html_tooltip_passed_as_a_bound_attribute(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" :tooltip="$tip" tooltip-type="input" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style"> <span>Track</span> </div>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="block w-full" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.bottom + gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                            <template x-teleport="body">
                                <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, 0)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                    <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-b-[5px]" style="border-bottom-color: tooltip-arrow"></div>
                                    <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow"><strong>Full</strong> name</div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template, ['tip' => '<strong>Full</strong> name']);
    }

    #[Test]
    public function the_field_text_component_renders_an_html_tooltip_for_the_field_type(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="<strong>Full</strong> name" tooltip-type="field" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style">
                        <span>Track</span>
                        <div class="ml-auto float-right" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <svg class="h-4 w-4 fill-current text-muted" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M12 4c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 18C6.486 22 2 17.515 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10c0 5.515-4.486 10-10 10z"/>
                                    <path clip-rule="evenodd" d="M13 15h-2v-3h1c1.103 0 2-.897 2-2 0-1.104-.897-2-2-2s-2 .896-2 2H8c0-2.206 1.794-4 4-4s4 1.794 4 4c0 1.86-1.277 3.428-3 3.874V15zM13.25 17c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25z"/>
                                    </svg>
                                    <template x-teleport="body">
                                        <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                            <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow"><strong>Full</strong> name</div>
                                            <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" style="border-top-color: tooltip-arrow"></div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </label>
                        <div class="content-style">
                            <div class="slot-style">
                                <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                            </div>
                        </div>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_renders_an_html_tooltip_for_the_input_type(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" tooltip="<strong>Full</strong> name" tooltip-type="input" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="track" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style"> <span>Track</span> </div>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="block w-full" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.bottom + gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                            <template x-teleport="body">
                                <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, 0)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                    <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-b-[5px]" style="border-bottom-color: tooltip-arrow"></div>
                                    <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow"><strong>Full</strong> name</div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_a_tooltip_slot(): void
    {
        $this->withViewErrors([]);

        $template = <<<'TIP'
            <x-field-text name="city" label="City"><x-slot:tooltip>Start typing the name of your city</x-slot:tooltip></x-field-text>
            TIP;

        $expected = <<<'TIP'
            <div class="wrapper">
                <label for="city" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style">
                        <span>City</span>
                        <div class="ml-auto float-right" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <svg class="h-4 w-4 fill-current text-muted" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M12 4c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 18C6.486 22 2 17.515 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10c0 5.515-4.486 10-10 10z"/>
                                    <path clip-rule="evenodd" d="M13 15h-2v-3h1c1.103 0 2-.897 2-2 0-1.104-.897-2-2-2s-2 .896-2 2H8c0-2.206 1.794-4 4-4s4 1.794 4 4c0 1.86-1.277 3.428-3 3.874V15zM13.25 17c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25z"/>
                                    </svg>
                                    <template x-teleport="body">
                                        <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                            <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow">Start typing the name of your city</div>
                                            <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" style="border-top-color: tooltip-arrow"></div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </label>
                        <div class="content-style">
                            <div class="slot-style">
                                <input name="city" type="text" id="city" class="background border color font other padding rounded shadow width" />
                            </div>
                        </div>
                    </div>
            TIP;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_an_html_tooltip_slot(): void
    {
        $this->withViewErrors([]);

        $template = <<<'TIP'
            <x-field-text name="pc" label="PC"><x-slot:tooltip><strong>First line</strong><br />Second line</x-slot:tooltip></x-field-text>
            TIP;

        $expected = <<<'TIP'
            <div class="wrapper">
                <label for="pc" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style">
                        <span>PC</span>
                        <div class="ml-auto float-right" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <svg class="h-4 w-4 fill-current text-muted" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M12 4c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 18C6.486 22 2 17.515 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10c0 5.515-4.486 10-10 10z"/>
                                    <path clip-rule="evenodd" d="M13 15h-2v-3h1c1.103 0 2-.897 2-2 0-1.104-.897-2-2-2s-2 .896-2 2H8c0-2.206 1.794-4 4-4s4 1.794 4 4c0 1.86-1.277 3.428-3 3.874V15zM13.25 17c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25z"/>
                                    </svg>
                                    <template x-teleport="body">
                                        <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                            <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow">
                                                <strong>First line</strong>
                                                <br />
                                                Second line
                                            </div>
                                            <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" style="border-top-color: tooltip-arrow"></div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </label>
                        <div class="content-style">
                            <div class="slot-style">
                                <input name="pc" type="text" id="pc" class="background border color font other padding rounded shadow width" />
                            </div>
                        </div>
                    </div>
            TIP;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_an_image_tooltip_slot(): void
    {
        $this->withViewErrors([]);

        $template = <<<'TIP'
            <x-field-text name="place" label="Place"><x-slot:tooltip>HTML Tooltip <br /><img src="http://loremflickr.com/400/400" alt="Placeholder" class="w-32 h-24 object-cover"></x-slot:tooltip></x-field-text>
            TIP;

        $expected = <<<'TIP'
            <div class="wrapper">
                <label for="place" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style">
                        <span>Place</span>
                        <div class="ml-auto float-right" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.top - gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <svg class="h-4 w-4 fill-current text-muted" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M12 4c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zm0 18C6.486 22 2 17.515 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10c0 5.515-4.486 10-10 10z"/>
                                    <path clip-rule="evenodd" d="M13 15h-2v-3h1c1.103 0 2-.897 2-2 0-1.104-.897-2-2-2s-2 .896-2 2H8c0-2.206 1.794-4 4-4s4 1.794 4 4c0 1.86-1.277 3.428-3 3.874V15zM13.25 17c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25z"/>
                                    </svg>
                                    <template x-teleport="body">
                                        <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, -100%)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                            <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow">
                                                HTML Tooltip
                                                <br />
                                                <img src="http://loremflickr.com/400/400" alt="Placeholder" class="w-32 h-24 object-cover">
                                            </div>
                                            <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-t-[5px]" style="border-top-color: tooltip-arrow"></div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </label>
                        <div class="content-style">
                            <div class="slot-style">
                                <input name="place" type="text" id="place" class="background border color font other padding rounded shadow width" />
                            </div>
                        </div>
                    </div>
            TIP;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_text_component_can_be_rendered_with_an_input_type_tooltip_slot(): void
    {
        $this->withViewErrors([]);

        $template = <<<'TIP'
            <x-field-text name="city" label="City" tooltip-type="input"><x-slot:tooltip>Start typing</x-slot:tooltip></x-field-text>
            TIP;

        $expected = <<<'TIP'
            <div class="wrapper">
                <label for="city" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style"> <span>City</span> </div>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div class="block w-full" x-data="{ open: false, top: 0, left: 0, show(el) { const r = el.getBoundingClientRect(), gap = 4; this.top = r.bottom + gap; this.left = r.left + r.width / 2; this.open = true; }, hide() { this.open = false; } }" @mouseenter="show($el)" @mouseleave="hide()">
                            <input name="city" type="text" id="city" class="background border color font other padding rounded shadow width" />
                            <template x-teleport="body">
                                <div x-show="open" :style="`position:fixed;top:${top}px;left:${left}px;transform:translate(-50%, 0)`" class="z-50 pointer-events-none flex flex-col items-center" role="tooltip">
                                    <div class="w-0 h-0 border-l-[5px] border-l-transparent border-r-[5px] border-r-transparent border-b-[5px]" style="border-bottom-color: tooltip-arrow"></div>
                                    <div class="tooltip-background tooltip-border tooltip-color tooltip-font tooltip-other tooltip-padding tooltip-rounded tooltip-shadow">Start typing</div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            TIP;

        $this->assertComponentRenders($expected, $template);
    }
}
