<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

/**
 * Every x-field-* component must be able to style its label inline, using the same
 * options the x-label component exposes, via label- prefixed attributes.
 *
 * The attributes travel x-field-* -> x-form-field -> x-form-layout-* -> x-label, so
 * these tests pin the whole chain rather than the layout components in isolation.
 */
class FieldLabelStylesTest extends ComponentTestCase
{
    /**
     * Every style option x-label exposes, mapped to the sentinel value used to trace it.
     */
    private const LABEL_STYLES = [
        'background' => 'lbl-bg',
        'border' => 'lbl-bd',
        'color' => 'lbl-cl',
        'font' => 'lbl-fn',
        'other' => 'lbl-ot',
        'padding' => 'lbl-pd',
        'rounded' => 'lbl-rd',
        'shadow' => 'lbl-sh',
    ];

    /**
     * Every x-field-* component, with the minimum extra attributes it needs to render.
     */
    private const FIELDS = [
        'autocomplete' => ':src="[1 => \'France\']"',
        'checkbox' => '',
        'color-picker' => '',
        'currency' => '',
        'date' => '',
        'date-range' => 'icon="none"',
        'datetime' => 'icon="none"',
        'decimal' => '',
        'email' => '',
        'file-upload' => '',
        'image-upload' => '',
        'info' => '',
        'input' => '',
        'link' => 'href="https://example.com"',
        'number' => '',
        'otc' => '',
        'password' => '',
        'percent' => '',
        'radio-group' => 'options="Yes|No"',
        'range' => '',
        'royalty' => '',
        'search' => '',
        'select' => 'options="Yes|No"',
        'slot' => '',
        'tags' => '',
        'text' => '',
        'textarea' => '',
        'time' => '',
        'toggle' => '',
        'url' => '',
    ];

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
    }

    #[Test]
    public function a_field_label_can_be_styled_inline(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="username" label="Username" label-background="lbl-bg" label-border="lbl-bd" label-color="lbl-cl" label-font="lbl-fn" label-other="lbl-ot" label-padding="lbl-pd" label-rounded="lbl-rd" label-shadow="lbl-sh" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="username" class="lbl-bg lbl-bd lbl-cl lbl-fn lbl-ot lbl-pd lbl-rd lbl-sh label-style">
                    <div class="text-style"> <span>Username</span> </div>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="username" type="text" id="username" class="background border color font other padding rounded shadow width" />
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_field_label_falls_back_to_the_theme_when_not_styled_inline(): void
    {
        $this->withViewErrors([]);

        $template = <<<'HTML'
            <x-field-text name="username" label="Username" label-color="lbl-cl" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="username" class="label-background label-border lbl-cl label-font label-other label-padding label-rounded label-shadow label-style">
                    <div class="text-style"> <span>Username</span> </div>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <input name="username" type="text" id="username" class="background border color font other padding rounded shadow width" />
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function every_layout_passes_inline_label_styles_to_the_label(): void
    {
        $this->withViewErrors([]);

        foreach (['responsive', 'stacked', 'inline'] as $layout) {
            $label = $this->labelTag($this->render('text', '', $layout));

            foreach (self::LABEL_STYLES as $style => $sentinel) {
                self::assertStringContainsString(
                    $sentinel,
                    $label,
                    "The {$layout} layout dropped label-{$style} on the way to x-label."
                );
            }
        }
    }

    #[Test]
    public function every_field_component_passes_inline_label_styles_to_the_label(): void
    {
        $this->withViewErrors([]);

        foreach (self::FIELDS as $field => $extra) {
            $label = $this->labelTag($this->render($field, $extra));

            foreach (self::LABEL_STYLES as $style => $sentinel) {
                self::assertStringContainsString(
                    $sentinel,
                    $label,
                    "x-field-{$field} dropped label-{$style} on the way to x-label."
                );
            }
        }
    }

    #[Test]
    public function inline_label_styles_do_not_leak_onto_the_input(): void
    {
        $this->withViewErrors([]);

        foreach (self::FIELDS as $field => $extra) {
            $html = $this->render($field, $extra);
            $label = $this->labelTag($html);

            foreach (self::LABEL_STYLES as $style => $sentinel) {
                self::assertSame(
                    substr_count($label, $sentinel),
                    substr_count($html, $sentinel),
                    "x-field-{$field} leaked label-{$style} outside of the label."
                );
            }
        }
    }

    private function render(string $field, string $extra, string $layout = 'responsive'): string
    {
        $styles = '';

        foreach (self::LABEL_STYLES as $style => $sentinel) {
            $styles .= " label-{$style}=\"{$sentinel}\"";
        }

        return (string) $this->blade(
            "<x-field-{$field} name=\"foo\" label=\"Foo\" layout=\"{$layout}\" {$extra}{$styles} />"
        );
    }

    private function labelTag(string $html): string
    {
        self::assertMatchesRegularExpression('/<label[^>]*>/', $html, 'No label was rendered.');

        preg_match('/<label[^>]*>/', $html, $matches);

        return $matches[0];
    }
}
