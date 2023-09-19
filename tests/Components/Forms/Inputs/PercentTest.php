<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class PercentTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-percent.background', 'background');
        Config::set('themes.default.input-percent.border', 'border');
        Config::set('themes.default.input-percent.color', 'color');
        Config::set('themes.default.input-percent.font', 'font');
        Config::set('themes.default.input-percent.other', 'other');
        Config::set('themes.default.input-percent.padding', 'padding');
        Config::set('themes.default.input-percent.rounded', 'rounded');
        Config::set('themes.default.input-percent.shadow', 'shadow');
        Config::set('themes.default.input-percent.width', 'width');

        Config::set('themes.default.input-percent.default', '');
        Config::set('themes.default.input-percent.icon-right', 'icon-percent');
        Config::set('themes.default.input-percent.icon-left', 'none');
        Config::set('themes.default.input-percent.min', null);
        Config::set('themes.default.input-percent.max', null);

        Config::set('themes.default.input-percent.prefix-text', '');
        Config::set('themes.default.input-percent.type', 'number');

        Config::set('themes.default.input-percent.font', 'percent-font');
        Config::set('themes.default.input-percent.input-font', 'percent-input-font');

        Config::set('themes.default.input.decimals', '');
        Config::set('themes.default.input.default', '');
        Config::set('themes.default.input.type', 'text');
        Config::set('themes.default.input.icon-left', '');
        Config::set('themes.default.input.icon-right', '');
        Config::set('themes.default.input.min', null);
        Config::set('themes.default.input.max', null);
        Config::set('themes.default.input.prefix-text', '');
        Config::set('themes.default.input.step', '');
        Config::set('themes.default.input.suffix-text', '');

        Config::set('themes.default.input.background', 'background');
        Config::set('themes.default.input.border', 'border');
        Config::set('themes.default.input.color', 'color');
        Config::set('themes.default.input.font', 'font');
        Config::set('themes.default.input.other', 'other');
        Config::set('themes.default.input.padding', 'padding');
        Config::set('themes.default.input.rounded', 'rounded');
        Config::set('themes.default.input.shadow', 'shadow');
        Config::set('themes.default.input.width', 'width');

        Config::set('themes.default.input.input-background', 'input-background');
        Config::set('themes.default.input.input-border', 'input-border');
        Config::set('themes.default.input.input-color', 'input-color');
        Config::set('themes.default.input.input-font', 'input-font');
        Config::set('themes.default.input.input-other', 'input-other');
        Config::set('themes.default.input.input-padding', 'input-padding');
        Config::set('themes.default.input.input-rounded', 'input-rounded');
        Config::set('themes.default.input.input-shadow', 'input-shadow');

        Config::set('themes.default.input.icon-left-background', 'icon-left-background');
        Config::set('themes.default.input.icon-left-border', 'icon-left-border');
        Config::set('themes.default.input.icon-left-color', 'icon-left-color');
        Config::set('themes.default.input.icon-left-other', 'icon-left-other');
        Config::set('themes.default.input.icon-left-padding', 'icon-left-padding');
        Config::set('themes.default.input.icon-left-rounded', 'icon-left-rounded');
        Config::set('themes.default.input.icon-left-shadow', 'icon-left-shadow');
        Config::set('themes.default.input.icon-left-size', 'icon-left-size');

        Config::set('themes.default.input.icon-right-background', 'icon-right-background');
        Config::set('themes.default.input.icon-right-border', 'icon-right-border');
        Config::set('themes.default.input.icon-right-color', 'icon-right-color');
        Config::set('themes.default.input.icon-right-other', 'icon-right-other');
        Config::set('themes.default.input.icon-right-padding', 'icon-right-padding');
        Config::set('themes.default.input.icon-right-rounded', 'icon-right-rounded');
        Config::set('themes.default.input.icon-right-shadow', 'icon-right-shadow');
        Config::set('themes.default.input.icon-right-size', 'icon-right-size');

        Config::set('themes.default.input.prefix-background', 'prefix-background');
        Config::set('themes.default.input.prefix-border', 'prefix-border');
        Config::set('themes.default.input.prefix-color', 'prefix-color');
        Config::set('themes.default.input.prefix-font', 'prefix-font');
        Config::set('themes.default.input.prefix-other', 'prefix-other');
        Config::set('themes.default.input.prefix-padding', 'prefix-padding');
        Config::set('themes.default.input.prefix-rounded', 'prefix-rounded');
        Config::set('themes.default.input.prefix-shadow', 'prefix-shadow');

        Config::set('themes.default.input.suffix-background', 'suffix-background');
        Config::set('themes.default.input.suffix-border', 'suffix-border');
        Config::set('themes.default.input.suffix-color', 'suffix-color');
        Config::set('themes.default.input.suffix-font', 'suffix-font');
        Config::set('themes.default.input.suffix-other', 'suffix-other');
        Config::set('themes.default.input.suffix-padding', 'suffix-padding');
        Config::set('themes.default.input.suffix-rounded', 'suffix-rounded');
        Config::set('themes.default.input.suffix-shadow', 'suffix-shadow');

        Config::set('themes.default.input.wrapper-background', 'wrapper-background');
        Config::set('themes.default.input.wrapper-border', 'wrapper-border');
        Config::set('themes.default.input.wrapper-color', 'wrapper-color');
        Config::set('themes.default.input.wrapper-font', 'wrapper-font');
        Config::set('themes.default.input.wrapper-other', 'wrapper-other');
        Config::set('themes.default.input.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.input.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.input.wrapper-shadow', 'wrapper-shadow');
        Config::set('themes.default.input.wrapper-width', 'wrapper-width');
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-percent name="value" value="50" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: 50, decimals: 2, })" x-modelable="value" class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow wrapper-width">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" class="input-background input-border input-color percent-input-font input-other input-padding input-rounded input-shadow" />
                <input name="value" type="hidden" id="value" x-model="value" />
                <div class="icon-right-background icon-right-border icon-right-color icon-right-other icon-right-padding icon-right-rounded icon-right-shadow">
                    <svg class="icon-right-size fill-current" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0z"/>
                            <g>
                                <path d="M7 10.999c2.205 0 4-1.793 4-3.999 0-2.206-1.795-4-4-4S3 4.794 3 7c0 2.205 1.795 3.999 4 3.999zM7 5c1.104 0 2 .898 2 2 0 1.103-.896 1.999-2 1.999S5 8.103 5 7c0-1.102.896-2 2-2zM17 13c-2.205 0-4 1.794-4 4s1.795 4 4 4 4-1.794 4-4-1.795-4-4-4zm0 6c-1.104 0-2-.897-2-2 0-1.102.896-2 2-2s2 .898 2 2c0 1.103-.896 2-2 2zM3.29257 19.29303L19.29212 3.29348l1.4135 1.4135L4.70606 20.70651z"/>
                                </g>
                            </svg>
                        </div>
                    </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_no_icon(): void
    {
        Config::set('themes.default.input-percent.icon-right', 'none');

        $template = <<<'HTML'
            <x-input-percent name="value" value="50" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: 50, decimals: 2, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" class="background border color percent-font other padding rounded shadow width" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_no_styles_and_no_icon(): void
    {
        Config::set('themes.default.input-percent.icon-right', 'none');

        $template = <<<'HTML'
            <x-input-percent name="value" value="50" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: 50, decimals: 2, })" x-modelable="value">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_can_be_rendered_with_inline_styles_and_no_icon(): void
    {
        Config::set('themes.default.input-percent.icon-right', 'none');

        $template = <<<'HTML'
            <x-input-percent name="value" value="50" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" width="9" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: 50, decimals: 2, })" x-modelable="value" class="9">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" class="1 2 3 4 5 6 7 8 9" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_with_defaults_can_be_disabled_inline(): void
    {
        Config::set('themes.default.input-percent.icon-right', 'none');
        Config::set('themes.default.input-percent.step', 2);
        Config::set('themes.default.input-percent.min', 2);
        Config::set('themes.default.input-percent.max', 2);

        $template = <<<'HTML'
            <x-input-percent name="value" value="50" step="none" min="none" max="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: 50, decimals: 2, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="value_display" x-model.lazy="display" class="background border color percent-font other padding rounded shadow width" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_with_custom_class_can_be_rendered(): void
    {
        Config::set('themes.default.input-percent.icon-right', 'none');

        $template = <<<'HTML'
            <x-input-percent name="value" value="9" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: 9, decimals: 2, })" x-modelable="value" class="wrapper-width float-right">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" class="background border color percent-font other padding rounded shadow width" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_percent_component_with_custom_attribute_can_be_rendered(): void
    {
        Config::set('themes.default.input-percent.icon-right', 'none');

        $template = <<<'HTML'
            <x-input-percent name="value" value="9" onblur="console.log(this)" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputNumber({ id: 'value', value: 9, decimals: 2, })" x-modelable="value" class="wrapper-width">
                <input type="number" id="value_display" x-model.lazy="display" step="0.01" class="background border color percent-font other padding rounded shadow width" onblur="console.log(this)" />
                <input name="value" type="hidden" id="value" x-model="value" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
