<?php

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class RangeTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-range.default-range', 'brand');
        Config::set('themes.default.input-range.default-size', 'md');
        Config::set('themes.default.input-range.min', 1);
        Config::set('themes.default.input-range.max', 100);
        Config::set('themes.default.input-range.step', 1);

        Config::set('themes.default.input-range.show-max', false);
        Config::set('themes.default.input-range.show-min', false);
        Config::set('themes.default.input-range.show-value', false);

        Config::set('themes.default.input-range.background', 'background');
        Config::set('themes.default.input-range.border', 'border');
        Config::set('themes.default.input-range.color', 'color');
        Config::set('themes.default.input-range.other', 'other');
        Config::set('themes.default.input-range.padding', 'padding');
        Config::set('themes.default.input-range.rounded', 'rounded');
        Config::set('themes.default.input-range.shadow', 'shadow');
        Config::set('themes.default.input-range.width', 'width');

        Config::set('themes.default.input-range.pill-background', 'pill-background');
        Config::set('themes.default.input-range.pill-border', 'pill-border');
        Config::set('themes.default.input-range.pill-color', 'pill-color');
        Config::set('themes.default.input-range.pill-font', 'pill-font');
        Config::set('themes.default.input-range.pill-other', 'pill-other');
        Config::set('themes.default.input-range.pill-padding', 'pill-padding');
        Config::set('themes.default.input-range.pill-rounded', 'pill-rounded');
        Config::set('themes.default.input-range.pill-shadow', 'pill-shadow');
        Config::set('themes.default.input-range.pill-width', 'pill-width');
        Config::set('themes.default.input-range.pill-min', 'pill-min');
        Config::set('themes.default.input-range.pill-max', 'pill-max');
        Config::set('themes.default.input-range.pill-value', 'pill-value');
    }

    #[Test]
    public function an_input_range_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_mix_max_and_value(): void
    {
        Config::set('themes.default.input-range.show-max', true);
        Config::set('themes.default.input-range.show-min', true);
        Config::set('themes.default.input-range.show-value', true);

        $template = <<<'HTML'
            <x-input-range name="number" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <div class="pill-background pill-border pill-color pill-font pill-other pill-min pill-padding pill-rounded pill-shadow pill-width">1</div>
                <div class="pill-background pill-border pill-color pill-font pill-other pill-padding pill-rounded pill-shadow pill-value pill-width"> <span x-html="value">1</span> </div>
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
                <div class="pill-background pill-border pill-color pill-font pill-other pill-max pill-padding pill-rounded pill-shadow pill-width">100</div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_inline_styles(): void
    {
        Config::set('themes.default.input-range.show-max', true);
        Config::set('themes.default.input-range.show-min', true);
        Config::set('themes.default.input-range.show-value', true);

        $template = <<<'HTML'
            <x-input-range
                name="number"
                background="1"
                border="2"
                color="3"
                other="4"
                padding="5"
                rounded="6"
                shadow="7"
                width="8"
                pill-background="10"
                pill-border="11"
                pill-color="12"
                pill-font="13"
                pill-other="14"
                pill-padding="15"
                pill-rounded="16"
                pill-shadow="17"
                pill-width="18"
                pill-min="20"
                pill-max="30"
                pill-value="40"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="1 2 3 4 5 6 7 8">
                <div class="10 11 12 13 14 20 15 16 17 18">1</div>
                <div class="10 11 12 13 14 15 16 17 40 18"> <span x-html="value">1</span> </div>
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
                <div class="10 11 12 13 14 30 15 16 17 18">100</div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_no_styles(): void
    {
        Config::set('themes.default.input-range.show-max', true);
        Config::set('themes.default.input-range.show-min', true);
        Config::set('themes.default.input-range.show-value', true);

        $template = <<<'HTML'
            <x-input-range
                name="number"
                background="none"
                border="none"
                color="none"
                other="none"
                padding="none"
                rounded="none"
                shadow="none"
                width="none"
                pill-background="none"
                pill-border="none"
                pill-color="none"
                pill-font="none"
                pill-other="none"
                pill-padding="none"
                pill-rounded="none"
                pill-shadow="none"
                pill-width="none"
                pill-min="none"
                pill-max="none"
                pill-value="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value">
                <div class="">1</div>
                <div class=""> <span x-html="value">1</span> </div>
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
                <div class="">100</div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_brand_style(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" brand />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_default_style(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" default />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-default range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_danger_style(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" danger />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-danger range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_info_style(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" info />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-info range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_success_style(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" success />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-success range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_muted_style(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" muted />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-muted range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_warning_style(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" warning />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-warning range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_type_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" type="muted" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-muted range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_without_default_range(): void
    {
        Config::set('themes.default.input-range.default-range', null);

        $template = <<<'HTML'
            <x-input-range name="number" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-default range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_xs_size(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" xs />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-xs" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_sm_size(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" sm />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-sm" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_md_size(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" md />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_lg_size(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" lg />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-lg" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_size_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" size="xs" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-xs" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_without_default_size(): void
    {
        Config::set('themes.default.input-range.default-size', null);

        $template = <<<'HTML'
            <x-input-range name="number" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_min_and_max_attributes(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" min="5" max="10" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '5'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="5" max="10" step="1" value="5" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    #[Test]
    public function an_input_range_component_can_be_rendered_with_step_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" step="2" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="2" value="1" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width float-right">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" onclick="alert('here')" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" onclick="alert('here')" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_min_shown(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" show-min />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <div class="pill-background pill-border pill-color pill-font pill-other pill-min pill-padding pill-rounded pill-shadow pill-width">1</div>
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_min_hidden(): void
    {
        Config::set('themes.default.input-range.show-min', true);

        $template = <<<'HTML'
            <x-input-range name="number" hide-min />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_max_shown(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" show-max />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
                <div class="pill-background pill-border pill-color pill-font pill-other pill-max pill-padding pill-rounded pill-shadow pill-width">100</div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_max_hidden(): void
    {
        Config::set('themes.default.input-range.show-max', true);

        $template = <<<'HTML'
            <x-input-range name="number" hide-max />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_value_shown(): void
    {
        $template = <<<'HTML'
            <x-input-range name="number" show-value value="6" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '6'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <div class="pill-background pill-border pill-color pill-font pill-other pill-padding pill-rounded pill-shadow pill-value pill-width"> <span x-html="value">6</span> </div>
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="6" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_input_range_component_can_be_rendered_with_value_hidden(): void
    {
        Config::set('themes.default.input-range.show-value', true);

        $template = <<<'HTML'
            <x-input-range name="number" hide-value />
            HTML;

        $expected = <<<'HTML'
            <div x-data="Components.inputRange({ id: 'number', value: '1'})" x-modelable="value" class="background border color other padding rounded shadow width">
                <input type="range" x-model="value" name="number" id="number" min="1" max="100" step="1" value="1" class="range range-brand range-md" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
