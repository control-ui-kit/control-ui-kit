<?php

declare(strict_types=1);

namespace Tests\Components\Forms;

use Illuminate\Support\Js;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

/**
 * A value handed to a field has to reach the browser encoded exactly once.
 *
 * Blade runs every named attribute it cannot match to a constructor argument of the
 * receiving component through sanitizeComponentAttribute(), which html-escapes it. The
 * fields pass the value on to x-form-field, so unless x-form-field takes the value as a
 * constructor argument the string is escaped there and then escaped again by the input
 * that renders it - "We'll" reaches the browser as "We&#039;ll" rather than "We'll".
 */
class FieldValueEncodingTest extends ComponentTestCase
{
    private const VALUE = 'We\'ll "Be" Ok & Go <b>';

    public static function htmlFields(): array
    {
        return [
            'info' => ['<x-field-info label="L" :value="$value" />'],
            'input' => ['<x-field-input name="n" label="L" :value="$value" />'],
            'text' => ['<x-field-text name="n" label="L" :value="$value" />'],
            'textarea' => ['<x-field-textarea name="n" label="L" :value="$value" />'],
            'email' => ['<x-field-email name="n" label="L" :value="$value" />'],
            'password' => ['<x-field-password name="n" label="L" :value="$value" />'],
            'search' => ['<x-field-search name="n" label="L" :value="$value" />'],
            'link' => ['<x-field-link label="L" href="/x" :value="$value" />'],
            'select' => ['<x-field-select name="n" label="L" :options="[]" :value="$value" />'],
        ];
    }

    #[Test]
    #[DataProvider('htmlFields')]
    public function a_field_value_is_html_escaped_exactly_once(string $template): void
    {
        $this->withViewErrors([]);

        $rendered = (string) $this->blade($template, ['value' => self::VALUE]);

        $once = htmlspecialchars(self::VALUE, ENT_QUOTES);
        $twice = htmlspecialchars($once, ENT_QUOTES);

        self::assertStringContainsString($once, $rendered, 'The value should be escaped once');
        self::assertStringNotContainsString($twice, $rendered, 'The value should not be escaped twice');
    }

    public static function alpineFields(): array
    {
        return [
            'url' => ['<x-field-url name="n" label="L" :value="$value" />'],
            'autocomplete' => ['<x-field-autocomplete name="n" label="L" :src="[]" :value="$value" />'],
            'select' => ['<x-field-select name="n" label="L" :options="[]" :value="$value" />'],
            'radio-group' => ['<x-field-radio-group name="n" label="L" options="Yes|No" :value="$value" />'],
        ];
    }

    /**
     * Values handed to Alpine sit in a javascript literal inside an html attribute, so they
     * have to survive both the html parser and the javascript one - @js covers both.
     */
    #[Test]
    #[DataProvider('alpineFields')]
    public function an_alpine_field_value_is_encoded_for_javascript(string $template): void
    {
        $this->withViewErrors([]);

        $rendered = (string) $this->blade($template, ['value' => self::VALUE]);

        self::assertStringContainsString(
            (string) Js::from(self::VALUE, JSON_UNESCAPED_SLASHES),
            $rendered
        );
    }

    #[Test]
    public function a_tags_field_value_is_encoded_for_javascript(): void
    {
        $this->withViewErrors([]);

        $rendered = (string) $this->blade(
            '<x-field-tags name="n" label="L" :value="$value" />',
            ['value' => self::VALUE]
        );

        self::assertStringContainsString(
            trim(json_encode([self::VALUE], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT), '[]'),
            $rendered
        );
    }

    #[Test]
    public function a_textarea_field_value_round_trips(): void
    {
        $this->withViewErrors([]);

        $rendered = (string) $this->blade(
            '<x-field-textarea name="n" label="L" :value="$value" />',
            ['value' => self::VALUE]
        );

        self::assertSame(1, preg_match('/<textarea[^>]*>(.*)<\/textarea>/s', $rendered, $matches));
        self::assertSame(self::VALUE, html_entity_decode($matches[1], ENT_QUOTES));
    }

    #[Test]
    public function an_input_field_value_round_trips(): void
    {
        $this->withViewErrors([]);

        $rendered = (string) $this->blade(
            '<x-field-input name="n" label="L" :value="$value" />',
            ['value' => self::VALUE]
        );

        self::assertSame(1, preg_match('/<input[^>]*\svalue="([^"]*)"/', $rendered, $matches));
        self::assertSame(self::VALUE, html_entity_decode($matches[1], ENT_QUOTES));
    }

    /**
     * An entity the caller typed themselves is data, not markup, and has to survive as text.
     * This is what the old e($value, false) workaround in the input views could not do.
     */
    #[Test]
    public function a_value_that_is_itself_an_html_entity_survives(): void
    {
        $this->withViewErrors([]);

        $rendered = (string) $this->blade(
            '<x-field-input name="n" label="L" :value="$value" />',
            ['value' => 'AT&amp;T']
        );

        self::assertSame(1, preg_match('/<input[^>]*\svalue="([^"]*)"/', $rendered, $matches));
        self::assertSame('AT&amp;T', html_entity_decode($matches[1], ENT_QUOTES));
    }
}
