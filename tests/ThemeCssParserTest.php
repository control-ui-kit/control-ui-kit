<?php

declare(strict_types=1);

namespace Tests;

use ControlUIKit\ThemeCssParser;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ThemeCssParserTest extends TestCase
{
    private string $tempDir;
    private ThemeCssParser $parser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tempDir = sys_get_temp_dir() . '/cuk-css-parser-' . uniqid();
        mkdir($this->tempDir, 0755, true);
        $this->parser = new ThemeCssParser();
    }

    protected function tearDown(): void
    {
        foreach (glob($this->tempDir . '/*.css') as $file) {
            unlink($file);
        }
        rmdir($this->tempDir);
        parent::tearDown();
    }

    // ---------------------------------------------------------------------------
    // Helpers
    // ---------------------------------------------------------------------------

    private function parse(string $css): array
    {
        $path = $this->tempDir . '/test.css';
        file_put_contents($path, $css);
        return $this->parser->parse($path);
    }

    // ---------------------------------------------------------------------------
    // Top-level parse() return structure
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_returns_lines_and_sections_keys(): void
    {
        $result = $this->parse(":root {\n    --white: 255 255 255;\n}\n");
        $this->assertArrayHasKey('lines', $result);
        $this->assertArrayHasKey('sections', $result);
    }

    #[Test]
    public function it_returns_all_three_section_keys(): void
    {
        $result = $this->parse('');
        $this->assertArrayHasKey('root', $result['sections']);
        $this->assertArrayHasKey('light', $result['sections']);
        $this->assertArrayHasKey('dark', $result['sections']);
    }

    #[Test]
    public function it_returns_lines_matching_file_content(): void
    {
        $css = ":root {\n    --white: 255 255 255;\n}\n";
        $result = $this->parse($css);
        $this->assertSame(explode("\n", $css), $result['lines']);
    }

    // ---------------------------------------------------------------------------
    // Section bounds detection
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_detects_root_section_start_and_end(): void
    {
        $css = ":root {\n    --white: 255 255 255;\n}\n";
        $root = $this->parse($css)['sections']['root'];
        $this->assertSame(0, $root['start']);
        $this->assertSame(2, $root['end']);
    }

    #[Test]
    public function it_detects_root_section_with_extra_space_before_brace(): void
    {
        $css = ":root  {\n    --white: 255 255 255;\n}\n";
        $root = $this->parse($css)['sections']['root'];
        $this->assertSame(0, $root['start']);
        $this->assertSame(2, $root['end']);
    }

    #[Test]
    public function it_detects_light_section(): void
    {
        $css = ":root[data-theme=\"t\"][data-mode=\"light\"] {\n    --link: red;\n}\n";
        $light = $this->parse($css)['sections']['light'];
        $this->assertSame(0, $light['start']);
        $this->assertSame(2, $light['end']);
    }

    #[Test]
    public function it_detects_dark_section(): void
    {
        $css = ":root[data-theme=\"t\"][data-mode=\"dark\"] {\n    --link: blue;\n}\n";
        $dark = $this->parse($css)['sections']['dark'];
        $this->assertSame(0, $dark['start']);
        $this->assertSame(2, $dark['end']);
    }

    #[Test]
    public function it_returns_null_start_and_end_for_missing_section(): void
    {
        $css = ":root {\n    --white: 255 255 255;\n}\n";
        $light = $this->parse($css)['sections']['light'];
        $this->assertNull($light['start']);
        $this->assertNull($light['end']);
    }

    #[Test]
    public function it_returns_empty_arrays_for_missing_section(): void
    {
        $css = ":root {\n    --white: 255 255 255;\n}\n";
        $dark = $this->parse($css)['sections']['dark'];
        $this->assertSame([], $dark['variables']);
        $this->assertSame([], $dark['comments']);
    }

    #[Test]
    public function it_does_not_match_root_when_selector_has_extra_attributes(): void
    {
        // :root[data-theme="x"] { should NOT match root — use light matcher instead
        $css = ":root[data-theme=\"x\"][data-mode=\"light\"] {\n    --link: red;\n}\n";
        $root = $this->parse($css)['sections']['root'];
        $this->assertNull($root['start']);
    }

    #[Test]
    public function it_handles_all_three_sections_in_one_file(): void
    {
        $css = implode("\n", [
            ':root {',
            '    --white: 255 255 255;',
            '}',
            ':root[data-theme="t"][data-mode="light"] {',
            '    --link: red;',
            '}',
            ':root[data-theme="t"][data-mode="dark"] {',
            '    --link: blue;',
            '}',
        ]);

        $sections = $this->parse($css)['sections'];

        $this->assertNotNull($sections['root']['start']);
        $this->assertNotNull($sections['light']['start']);
        $this->assertNotNull($sections['dark']['start']);
    }

    // ---------------------------------------------------------------------------
    // Variable extraction
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_extracts_variable_names_from_root(): void
    {
        $css = ":root {\n    --white: 255 255 255;\n    --black: 0 0 0;\n}\n";
        $variables = $this->parse($css)['sections']['root']['variables'];
        $this->assertArrayHasKey('--white', $variables);
        $this->assertArrayHasKey('--black', $variables);
    }

    #[Test]
    public function it_records_correct_line_numbers_for_variables(): void
    {
        // Line 0: ":root {"
        // Line 1: "    --white: 255 255 255;"
        // Line 2: "    --black: 0 0 0;"
        // Line 3: "}"
        $css = ":root {\n    --white: 255 255 255;\n    --black: 0 0 0;\n}\n";
        $variables = $this->parse($css)['sections']['root']['variables'];
        $this->assertSame(1, $variables['--white']);
        $this->assertSame(2, $variables['--black']);
    }

    #[Test]
    public function it_extracts_variables_from_light_section(): void
    {
        $css = ":root[data-mode=\"light\"] {\n    --link: var(--brand-500);\n}\n";
        $variables = $this->parse($css)['sections']['light']['variables'];
        $this->assertArrayHasKey('--link', $variables);
    }

    #[Test]
    public function it_handles_variable_with_padded_colon(): void
    {
        // Variables with spaces before the colon (as in theme files)
        $css = ":root {\n    --app-bg                         : var(--gray-50);\n}\n";
        $variables = $this->parse($css)['sections']['root']['variables'];
        $this->assertArrayHasKey('--app-bg', $variables);
    }

    #[Test]
    public function it_does_not_include_comment_text_as_variable(): void
    {
        // A comment containing "/* something */" should not appear in variables
        $css = ":root {\n    /* Root Comment */\n    --white: 255 255 255;\n}\n";
        $variables = $this->parse($css)['sections']['root']['variables'];
        $this->assertArrayNotHasKey('--', $variables);
        $this->assertArrayHasKey('--white', $variables);
    }

    // ---------------------------------------------------------------------------
    // Comment extraction
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_extracts_section_comments_from_root(): void
    {
        $css = ":root {\n    /* Root Comment */\n    --white: 255 255 255;\n}\n";
        $comments = $this->parse($css)['sections']['root']['comments'];
        $this->assertArrayHasKey('/* Root Comment */', $comments);
    }

    #[Test]
    public function it_records_correct_line_number_for_comment(): void
    {
        // Line 0: ":root {"
        // Line 1: "    /* Root Comment */"
        $css = ":root {\n    /* Root Comment */\n    --white: 255 255 255;\n}\n";
        $comments = $this->parse($css)['sections']['root']['comments'];
        $this->assertSame(1, $comments['/* Root Comment */']);
    }

    #[Test]
    public function it_does_not_extract_comments_containing_variable_names(): void
    {
        // A comment like "/* --var: description */" is NOT a section comment
        $css = ":root {\n    /* --white: something */\n    --white: 255 255 255;\n}\n";
        $comments = $this->parse($css)['sections']['root']['comments'];
        $this->assertEmpty($comments);
    }

    #[Test]
    public function it_does_not_extract_unclosed_comments(): void
    {
        // Does not end with */  → not a section comment
        $css = ":root {\n    /* Unclosed comment\n    --white: 255 255 255;\n}\n";
        $comments = $this->parse($css)['sections']['root']['comments'];
        $this->assertEmpty($comments);
    }

    #[Test]
    public function it_does_not_extract_double_slash_comments_as_section_comments(): void
    {
        // // style comments don't start with /*
        $css = ":root {\n    // not a section comment\n    --white: 255 255 255;\n}\n";
        $comments = $this->parse($css)['sections']['root']['comments'];
        $this->assertEmpty($comments);
    }

    // ---------------------------------------------------------------------------
    // Depth-counting (nested / preceding braces)
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_correctly_identifies_section_end_with_depth_counting(): void
    {
        // Multi-line root section: depth only reaches 0 at the final closing brace
        $css = implode("\n", [
            ':root {',
            '    --white: 255 255 255;',
            '    --black: 0 0 0;',
            '    --red: 255 0 0;',
            '}',
        ]);

        $root = $this->parse($css)['sections']['root'];
        $this->assertSame(0, $root['start']);
        $this->assertSame(4, $root['end']);
        $this->assertCount(3, $root['variables']);
    }

    #[Test]
    public function it_parses_section_when_preceded_by_other_content(): void
    {
        // Content before :root should not confuse the parser
        $css = implode("\n", [
            '/* Global theme file */',
            '',
            ':root {',
            '    --white: 255 255 255;',
            '}',
        ]);

        $root = $this->parse($css)['sections']['root'];
        $this->assertSame(2, $root['start']);
        $this->assertSame(4, $root['end']);
    }

    #[Test]
    public function it_isolates_each_section_independently(): void
    {
        $css = implode("\n", [
            ':root {',
            '    --shared: 0;',
            '}',
            ':root[data-mode="light"] {',
            '    --light-only: 1;',
            '}',
            ':root[data-mode="dark"] {',
            '    --dark-only: 2;',
            '}',
        ]);

        $sections = $this->parse($css)['sections'];

        $this->assertArrayHasKey('--shared', $sections['root']['variables']);
        $this->assertArrayNotHasKey('--shared', $sections['light']['variables']);

        $this->assertArrayHasKey('--light-only', $sections['light']['variables']);
        $this->assertArrayNotHasKey('--light-only', $sections['root']['variables']);

        $this->assertArrayHasKey('--dark-only', $sections['dark']['variables']);
        $this->assertArrayNotHasKey('--dark-only', $sections['light']['variables']);
    }
}
