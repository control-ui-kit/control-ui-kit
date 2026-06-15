<?php

declare(strict_types=1);

namespace Tests\Components\Buttons;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ButtonGroupItemTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.button.primary-button', 'default');

        Config::set('themes.default.button-group-item.background', 'background');
        Config::set('themes.default.button-group-item.border', 'border');
        Config::set('themes.default.button-group-item.color', 'color');
        Config::set('themes.default.button-group-item.cursor', 'cursor');
        Config::set('themes.default.button-group-item.disabled', 'disabled');
        Config::set('themes.default.button-group-item.active', '');
        Config::set('themes.default.button-group-item.font', 'font');
        Config::set('themes.default.button-group-item.icon-size', 'icon-size');
        Config::set('themes.default.button-group-item.other', 'other');
        Config::set('themes.default.button-group-item.padding', 'padding');
        Config::set('themes.default.button-group-item.rounded', 'rounded');
        Config::set('themes.default.button-group-item.rounded-first', 'rounded-first');
        Config::set('themes.default.button-group-item.rounded-last', 'rounded-last');
        Config::set('themes.default.button-group-item.rounded-middle', 'rounded-middle');
        Config::set('themes.default.button-group-item.shadow', 'shadow');
        Config::set('themes.default.button-group-item.width', 'width');
        Config::set('themes.default.button-group-item.margin', 'margin-non-first');

        Config::set('themes.default.button-group-item.default.background', 'default-background');
        Config::set('themes.default.button-group-item.default.border', 'default-border');
        Config::set('themes.default.button-group-item.default.color', 'default-color');
        Config::set('themes.default.button-group-item.default.icon', 'default-icon');
        Config::set('themes.default.button-group-item.default.active', 'default-active');

        Config::set('themes.default.button-group-item.brand.background', 'brand-background');
        Config::set('themes.default.button-group-item.brand.border', 'brand-border');
        Config::set('themes.default.button-group-item.brand.color', 'brand-color');
        Config::set('themes.default.button-group-item.brand.icon', 'brand-icon');
        Config::set('themes.default.button-group-item.brand.active', 'brand-active');

        Config::set('themes.default.button-group-item.danger.background', 'danger-background');
        Config::set('themes.default.button-group-item.danger.border', 'danger-border');
        Config::set('themes.default.button-group-item.danger.color', 'danger-color');
        Config::set('themes.default.button-group-item.danger.icon', 'danger-icon');
        Config::set('themes.default.button-group-item.danger.active', 'danger-active');
    }

    // ---------------------------------------------------------------------------
    // Position-aware rounding
    // ---------------------------------------------------------------------------

    #[Test]
    public function a_middle_item_uses_rounded_middle(): void
    {
        $template = <<<'HTML'
            <x-button-group-item text="Middle" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded-middle shadow width margin-non-first" type="button"> Middle </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_first_item_uses_rounded_first(): void
    {
        $template = <<<'HTML'
            <x-button-group-item first text="First" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded-first shadow width" type="button"> First </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_last_item_uses_rounded_last(): void
    {
        $template = <<<'HTML'
            <x-button-group-item last text="Last" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded-last shadow width margin-non-first" type="button"> Last </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_standalone_item_first_and_last_uses_base_rounded(): void
    {
        $template = <<<'HTML'
            <x-button-group-item first last text="Standalone" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded shadow width" type="button"> Standalone </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function explicit_rounded_overrides_position_rounding(): void
    {
        $template = <<<'HTML'
            <x-button-group-item first rounded="rounded-custom" text="Custom" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded-custom shadow width" type="button"> Custom </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    // ---------------------------------------------------------------------------
    // Style variants
    // ---------------------------------------------------------------------------

    #[Test]
    public function a_brand_item_uses_brand_variant_styles(): void
    {
        $template = <<<'HTML'
            <x-button-group-item brand text="Brand" />
            HTML;

        $expected = <<<'HTML'
            <button class="background brand-background border brand-border color brand-color cursor font other padding rounded-middle shadow width margin-non-first" type="button"> Brand </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_danger_item_uses_danger_variant_styles(): void
    {
        $template = <<<'HTML'
            <x-button-group-item danger text="Danger" />
            HTML;

        $expected = <<<'HTML'
            <button class="background danger-background border danger-border color danger-color cursor font other padding rounded-middle shadow width margin-non-first" type="button"> Danger </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    // ---------------------------------------------------------------------------
    // Rendering variations
    // ---------------------------------------------------------------------------

    #[Test]
    public function a_button_group_item_renders_as_anchor_when_href_given(): void
    {
        $template = <<<'HTML'
            <x-button-group-item href="https://example.com" text="Link" />
            HTML;

        $expected = <<<'HTML'
            <a href="https://example.com" class="background default-background border default-border color default-color cursor font other padding rounded-middle shadow width margin-non-first" role="button"> Link </a>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_button_group_item_renders_slot_content(): void
    {
        $template = <<<'HTML'
            <x-button-group-item>Click Me</x-button-group-item>
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor font other padding rounded-middle shadow width margin-non-first" type="button"> Click Me </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_disabled_button_group_item_applies_disabled_styles(): void
    {
        $template = <<<'HTML'
            <x-button-group-item disabled text="Disabled" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color disabled font other padding rounded-middle shadow width margin-non-first" disabled type="button"> Disabled </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_disabled_anchor_item_strips_href(): void
    {
        $template = <<<'HTML'
            <x-button-group-item href="https://example.com" disabled text="Disabled" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color disabled font other padding rounded-middle shadow width margin-non-first" disabled type="button"> Disabled </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    // ---------------------------------------------------------------------------
    // Active state
    // ---------------------------------------------------------------------------

    #[Test]
    public function an_active_item_applies_active_variant_styles(): void
    {
        $template = <<<'HTML'
            <x-button-group-item active text="Active" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor default-active font other padding rounded-middle shadow width margin-non-first" aria-pressed="true" type="button"> Active </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_active_brand_item_applies_brand_active_styles(): void
    {
        $template = <<<'HTML'
            <x-button-group-item brand active text="Brand Active" />
            HTML;

        $expected = <<<'HTML'
            <button class="background brand-background border brand-border color brand-color cursor brand-active font other padding rounded-middle shadow width margin-non-first" aria-pressed="true" type="button"> Brand Active </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function an_active_first_item_has_no_negative_margin(): void
    {
        $template = <<<'HTML'
            <x-button-group-item first active text="Active First" />
            HTML;

        $expected = <<<'HTML'
            <button class="background default-background border default-border color default-color cursor default-active font other padding rounded-first shadow width" aria-pressed="true" type="button"> Active First </button>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_button_group_item_renders_translated_text(): void
    {
        $template = <<<'HTML'
            <x-button-group-item first last trans="control-ui-kit::control-ui-kit.change-chart.no-change" />
            HTML;

        $rendered = (string) $this->blade($template);

        $this->assertStringContainsString('No Change', $rendered);
    }
}
