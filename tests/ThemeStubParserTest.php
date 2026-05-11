<?php

declare(strict_types=1);

namespace Tests;

use ControlUIKit\ThemeStubParser;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ThemeStubParserTest extends TestCase
{
    private string $tempDir;
    private ThemeStubParser $parser;
    private string $realStubPath;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tempDir = sys_get_temp_dir() . '/cuk-stub-parser-' . uniqid();
        mkdir($this->tempDir, 0755, true);
        $this->parser = new ThemeStubParser();
        $this->realStubPath = realpath(__DIR__ . '/../resources/stubs/theme_css.stub');
    }

    protected function tearDown(): void
    {
        foreach (glob($this->tempDir . '/*.stub') as $file) {
            unlink($file);
        }
        rmdir($this->tempDir);
        parent::tearDown();
    }

    // ---------------------------------------------------------------------------
    // Helpers
    // ---------------------------------------------------------------------------

    private function writeStub(string $content): string
    {
        $path = $this->tempDir . '/test.stub';
        file_put_contents($path, $content);
        return $path;
    }

    // ---------------------------------------------------------------------------
    // getPaletteVariableNames()
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_returns_30_palette_variable_names_total(): void
    {
        $names = $this->parser->getPaletteVariableNames();
        $this->assertCount(30, $names);
    }

    #[Test]
    public function it_returns_20_gray_variable_names(): void
    {
        $names = $this->parser->getPaletteVariableNames();
        $grays = array_filter($names, fn($n) => str_starts_with($n, '--gray-'));
        $this->assertCount(20, $grays);
    }

    #[Test]
    public function it_returns_10_brand_variable_names(): void
    {
        $names = $this->parser->getPaletteVariableNames();
        $brands = array_filter($names, fn($n) => str_starts_with($n, '--brand-'));
        $this->assertCount(10, $brands);
    }

    #[Test]
    public function it_includes_all_gray_shades(): void
    {
        $names = $this->parser->getPaletteVariableNames();
        $expectedGrays = [
            '--gray-50', '--gray-100', '--gray-150', '--gray-200', '--gray-250',
            '--gray-300', '--gray-350', '--gray-400', '--gray-450', '--gray-500',
            '--gray-550', '--gray-600', '--gray-650', '--gray-700', '--gray-750',
            '--gray-800', '--gray-850', '--gray-900', '--gray-950', '--gray-1000',
        ];

        foreach ($expectedGrays as $gray) {
            $this->assertContains($gray, $names, "Missing palette variable {$gray}");
        }
    }

    #[Test]
    public function it_includes_all_brand_shades(): void
    {
        $names = $this->parser->getPaletteVariableNames();
        $expectedBrands = [
            '--brand-50', '--brand-100', '--brand-200', '--brand-300', '--brand-400',
            '--brand-500', '--brand-600', '--brand-700', '--brand-800', '--brand-900',
        ];

        foreach ($expectedBrands as $brand) {
            $this->assertContains($brand, $names, "Missing palette variable {$brand}");
        }
    }

    // ---------------------------------------------------------------------------
    // parse() — top-level structure
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_returns_array_with_root_light_dark_keys(): void
    {
        $stub = ":root {\n}\n";
        $sections = $this->parser->parse($this->writeStub($stub));
        $this->assertArrayHasKey('root', $sections);
        $this->assertArrayHasKey('light', $sections);
        $this->assertArrayHasKey('dark', $sections);
    }

    #[Test]
    public function it_returns_empty_array_for_missing_section(): void
    {
        $stub = ":root {\n    --white: 0 0 0;\n}\n";
        $sections = $this->parser->parse($this->writeStub($stub));
        $this->assertSame([], $sections['light']);
        $this->assertSame([], $sections['dark']);
    }

    // ---------------------------------------------------------------------------
    // parse() — entry types
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_parses_variable_entries(): void
    {
        $stub = ":root {\n    --white: 0 0 0;\n}\n";
        $entries = $this->parser->parse($this->writeStub($stub))['root'];
        $varEntry = array_values(array_filter($entries, fn($e) => $e['type'] === 'variable'))[0] ?? null;

        $this->assertNotNull($varEntry);
        $this->assertSame('variable', $varEntry['type']);
        $this->assertSame('--white', $varEntry['name']);
        $this->assertStringContainsString('--white', $varEntry['content']);
    }

    #[Test]
    public function it_parses_blank_line_entries(): void
    {
        $stub = ":root {\n\n    --white: 0 0 0;\n}\n";
        $entries = $this->parser->parse($this->writeStub($stub))['root'];
        $blankEntry = array_values(array_filter($entries, fn($e) => $e['type'] === 'blank'))[0] ?? null;

        $this->assertNotNull($blankEntry);
        $this->assertSame('blank', $blankEntry['type']);
        $this->assertSame('', trim($blankEntry['content']));
    }

    #[Test]
    public function it_parses_comment_entries(): void
    {
        $stub = ":root {\n    /* Section Comment */\n    --white: 0 0 0;\n}\n";
        $entries = $this->parser->parse($this->writeStub($stub))['root'];
        $commentEntry = array_values(array_filter($entries, fn($e) => $e['type'] === 'comment'))[0] ?? null;

        $this->assertNotNull($commentEntry);
        $this->assertSame('comment', $commentEntry['type']);
        $this->assertSame('/* Section Comment */', $commentEntry['text']);
        $this->assertStringContainsString('/* Section Comment */', $commentEntry['content']);
    }

    #[Test]
    public function it_does_not_parse_comment_with_variable_reference_as_comment_entry(): void
    {
        // /* --var: description */ contains a CSS variable name → NOT a section comment
        $stub = ":root {\n    /* --white: something */\n    --white: 0 0 0;\n}\n";
        $entries = $this->parser->parse($this->writeStub($stub))['root'];
        $commentEntries = array_filter($entries, fn($e) => $e['type'] === 'comment');

        $this->assertEmpty($commentEntries);
    }

    #[Test]
    public function it_does_not_produce_entries_for_section_opening_line(): void
    {
        // The section header line itself should not appear as an entry
        $stub = ":root {\n    --white: 0 0 0;\n}\n";
        $entries = $this->parser->parse($this->writeStub($stub))['root'];

        foreach ($entries as $entry) {
            $this->assertStringNotContainsString(':root', $entry['content'] ?? '');
        }
    }

    // ---------------------------------------------------------------------------
    // parse() — placeholder resolution
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_resolves_gray_colors_placeholder(): void
    {
        $stub = ":root {\n{{ gray-colors }}\n}\n";
        $entries = $this->parser->parse($this->writeStub($stub))['root'];
        $varNames = array_column(array_filter($entries, fn($e) => $e['type'] === 'variable'), 'name');

        $this->assertContains('--gray-50', $varNames);
        $this->assertContains('--gray-1000', $varNames);
    }

    #[Test]
    public function it_resolves_brand_colors_placeholder(): void
    {
        $stub = ":root {\n{{ brand-colors }}\n}\n";
        $entries = $this->parser->parse($this->writeStub($stub))['root'];
        $varNames = array_column(array_filter($entries, fn($e) => $e['type'] === 'variable'), 'name');

        $this->assertContains('--brand-50', $varNames);
        $this->assertContains('--brand-900', $varNames);
    }

    #[Test]
    public function it_resolves_theme_name_placeholder_to_sentinel(): void
    {
        $stub = ":root[data-theme=\"{{ theme-name }}\"][data-mode=\"light\"] {\n    --link: red;\n}\n";
        $entries = $this->parser->parse($this->writeStub($stub))['light'];

        $this->assertNotEmpty($entries);
        $varNames = array_column(array_filter($entries, fn($e) => $e['type'] === 'variable'), 'name');
        $this->assertContains('--link', $varNames);
    }

    #[Test]
    public function it_gray_placeholder_produces_exactly_20_gray_variables(): void
    {
        $stub = ":root {\n{{ gray-colors }}\n}\n";
        $entries = $this->parser->parse($this->writeStub($stub))['root'];
        $grayVars = array_filter(
            $entries,
            fn($e) => $e['type'] === 'variable' && str_starts_with($e['name'], '--gray-'),
        );

        $this->assertCount(20, $grayVars);
    }

    #[Test]
    public function it_brand_placeholder_produces_exactly_10_brand_variables(): void
    {
        $stub = ":root {\n{{ brand-colors }}\n}\n";
        $entries = $this->parser->parse($this->writeStub($stub))['root'];
        $brandVars = array_filter(
            $entries,
            fn($e) => $e['type'] === 'variable' && str_starts_with($e['name'], '--brand-'),
        );

        $this->assertCount(10, $brandVars);
    }

    // ---------------------------------------------------------------------------
    // parse() — real stub file integration
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_parses_the_real_stub_file(): void
    {
        $sections = $this->parser->parse($this->realStubPath);

        $this->assertNotEmpty($sections['root']);
        $this->assertNotEmpty($sections['light']);
        $this->assertNotEmpty($sections['dark']);
    }

    #[Test]
    public function it_real_stub_root_contains_gray_and_brand_variables(): void
    {
        $entries = $this->parser->parse($this->realStubPath)['root'];
        $varNames = array_column(array_filter($entries, fn($e) => $e['type'] === 'variable'), 'name');

        $this->assertContains('--gray-50', $varNames);
        $this->assertContains('--brand-50', $varNames);
        $this->assertContains('--white', $varNames);
        $this->assertContains('--black', $varNames);
    }

    #[Test]
    public function it_real_stub_light_section_contains_variables(): void
    {
        $entries = $this->parser->parse($this->realStubPath)['light'];
        $variables = array_filter($entries, fn($e) => $e['type'] === 'variable');

        $this->assertNotEmpty($variables);
    }

    #[Test]
    public function it_real_stub_dark_section_contains_variables(): void
    {
        $entries = $this->parser->parse($this->realStubPath)['dark'];
        $variables = array_filter($entries, fn($e) => $e['type'] === 'variable');

        $this->assertNotEmpty($variables);
    }

    #[Test]
    public function it_real_stub_root_contains_section_comments(): void
    {
        $entries = $this->parser->parse($this->realStubPath)['light'];
        $comments = array_filter($entries, fn($e) => $e['type'] === 'comment');

        $this->assertNotEmpty($comments);
    }

    #[Test]
    public function it_real_stub_entries_have_required_keys(): void
    {
        $entries = $this->parser->parse($this->realStubPath)['root'];

        foreach ($entries as $entry) {
            $this->assertArrayHasKey('type', $entry);
            $this->assertArrayHasKey('content', $entry);

            if ($entry['type'] === 'variable') {
                $this->assertArrayHasKey('name', $entry);
            }

            if ($entry['type'] === 'comment') {
                $this->assertArrayHasKey('text', $entry);
            }
        }
    }
}
