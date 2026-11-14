<?php

declare(strict_types=1);

namespace Tests\Components\Tooltips;

use Illuminate\Support\HtmlString;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class TooltipHtmlableTest extends ComponentTestCase
{
    private const HTML = '<strong>Title</strong><br><img src="/a.png" alt="">';
    private const ESCAPED = '&lt;strong&gt;Title&lt;/strong&gt;&lt;br&gt;&lt;img src=&quot;/a.png&quot; alt=&quot;&quot;&gt;';

    protected function setUp(): void
    {
        parent::setUp();

        $this->withViewErrors([]);
    }

    #[Test]
    public function a_tooltip_renders_an_htmlable_text_unescaped(): void
    {
        $html = $this->render('<x-tooltip :text="$tip"><button>Hover</button></x-tooltip>', new HtmlString(self::HTML));

        self::assertStringContainsString(self::HTML, $html);
    }

    #[Test]
    public function a_tooltip_still_escapes_a_plain_string_text(): void
    {
        $html = $this->render('<x-tooltip :text="$tip"><button>Hover</button></x-tooltip>', self::HTML);

        self::assertStringContainsString(self::ESCAPED, $html);
        self::assertStringNotContainsString('<strong>Title', $html);
    }

    public static function fields(): array
    {
        return [
            'text, icon' => ['<x-field-text name="a" label="A" :tooltip="$tip" />'],
            'text, field' => ['<x-field-text name="a" label="A" tooltip-type="field" :tooltip="$tip" />'],
            'text, input' => ['<x-field-text name="a" label="A" tooltip-type="input" :tooltip="$tip" />'],
            'textarea' => ['<x-field-textarea name="a" label="A" :tooltip="$tip" />'],
            'checkbox' => ['<x-field-checkbox name="a" label="A" :tooltip="$tip" />'],
            'select' => ['<x-field-select name="a" label="A" :options="[]" :tooltip="$tip" />'],
            'autocomplete' => ['<x-field-autocomplete name="a" label="A" :src="[]" :tooltip="$tip" />'],
            'link' => ['<x-field-link name="a" label="A" :tooltip="$tip" />'],
            'radio group' => ['<x-field-radio-group name="a" label="A" options="Yes|No" :tooltip="$tip" />'],
            'form field' => ['<x-form-field name="a" label="A" input="text" :tooltip="$tip" />'],
            'stacked layout' => ['<x-form-layout-stacked name="a" label="A" input="input-text" :tooltip="$tip" />'],
            'inline layout' => ['<x-form-layout-inline name="a" label="A" input="input-text" :tooltip="$tip" />'],
            'responsive layout' => ['<x-form-layout-responsive name="a" label="A" input="input-text" :tooltip="$tip" />'],
        ];
    }

    #[Test]
    #[DataProvider('fields')]
    public function a_field_renders_an_htmlable_tooltip_unescaped(string $template): void
    {
        $html = $this->render($template, new HtmlString(self::HTML));

        self::assertStringContainsString(self::HTML, $html);
    }

    #[Test]
    #[DataProvider('fields')]
    public function a_field_still_escapes_a_plain_string_tooltip(string $template): void
    {
        $html = $this->render($template, self::HTML);

        self::assertStringContainsString(self::ESCAPED, $html);
        self::assertStringNotContainsString('<strong>Title', $html);
    }

    private function render(string $template, mixed $tip): string
    {
        return (string) $this->blade($template, ['tip' => $tip]);
    }
}
