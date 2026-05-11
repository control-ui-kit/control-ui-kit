<?php

declare(strict_types=1);

namespace Tests\Console;

use ControlUIKit\BrandColorPalette;
use ControlUIKit\GreyColors;
use PHPUnit\Framework\Attributes\Test;

class ThemeUpdaterCommandTest extends ConsoleTestCase
{
    private string $stubPath;

    protected function setUp(): void
    {
        parent::setUp();
        $this->stubPath = realpath(__DIR__ . '/../../resources/stubs/theme_css.stub');
    }

    // ---------------------------------------------------------------------------
    // Path resolution
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_errors_when_path_does_not_exist(): void
    {
        $this->artisan('uikit:theme-updater', ['--css-path' => '/nonexistent/path/that/does/not/exist'])
            ->expectsOutputToContain('Path does not exist')
            ->assertExitCode(1);
    }

    #[Test]
    public function it_errors_when_no_css_files_found_in_directory(): void
    {
        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsOutputToContain('No CSS files found')
            ->assertExitCode(1);
    }

    #[Test]
    public function it_errors_when_named_file_not_found(): void
    {
        file_put_contents($this->tempDir . '/other.css', '/* other */');

        $this->artisan('uikit:theme-updater', [
            '--name' => 'missing',
            '--css-path' => $this->tempDir,
        ])
            ->expectsOutputToContain('Theme file not found')
            ->assertExitCode(1);
    }

    #[Test]
    public function it_processes_a_direct_css_file_path(): void
    {
        $path = $this->writeThemeCss('direct');

        $this->artisan('uikit:theme-updater', ['--css-path' => $path])
            ->expectsOutputToContain('up to date')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_processes_named_file_in_directory(): void
    {
        $this->writeThemeCss('named_theme');
        $this->writeThemeCss('other_theme');

        $this->artisan('uikit:theme-updater', [
            '--name' => 'named_theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsOutputToContain('named_theme.css')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_processes_all_css_files_in_directory(): void
    {
        $this->writeThemeCss('theme_one');
        $this->writeThemeCss('theme_two');

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsOutputToContain('theme_one.css')
            ->expectsOutputToContain('theme_two.css')
            ->assertExitCode(0);
    }

    // ---------------------------------------------------------------------------
    // Up-to-date detection
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_reports_up_to_date_when_all_variables_present(): void
    {
        $this->writeThemeCss('complete');

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsOutputToContain('up to date')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_reports_extra_variables_on_up_to_date_file(): void
    {
        $path = $this->writeThemeCss('with_extras');

        // Inject a custom variable not in the stub
        $content = file_get_contents($path);
        $content = str_replace(
            ':root {',
            ":root {\n    --my-custom-extra: 255 0 0;",
            $content,
        );
        file_put_contents($path, $content);

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsOutputToContain('extra variable')
            ->assertExitCode(0);
    }

    // ---------------------------------------------------------------------------
    // Missing variable detection and insertion
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_detects_missing_root_variable_and_reports_it(): void
    {
        $path = $this->writeThemeCss('test');
        $this->removeLineContaining($path, '--chart-900:');

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsOutputToContain('missing variable')
            ->expectsOutputToContain('--chart-900')
            ->expectsConfirmation('Apply changes to this file?', 'no')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_inserts_missing_root_variable_on_confirm(): void
    {
        $path = $this->writeThemeCss('test');
        $this->removeLineContaining($path, '--chart-900:');

        $contentBefore = file_get_contents($path);
        $this->assertStringNotContainsString('--chart-900:', $contentBefore);

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsConfirmation('Apply changes to this file?', 'yes')
            ->assertExitCode(0);

        $contentAfter = file_get_contents($path);
        $this->assertStringContainsString('--chart-900:', $contentAfter);
    }

    #[Test]
    public function it_does_not_modify_file_when_user_skips(): void
    {
        $path = $this->writeThemeCss('test');
        $this->removeLineContaining($path, '--chart-900:');

        $contentBefore = file_get_contents($path);

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsConfirmation('Apply changes to this file?', 'no')
            ->expectsOutputToContain('Skipped')
            ->assertExitCode(0);

        $this->assertSame($contentBefore, file_get_contents($path));
    }

    #[Test]
    public function it_inserts_missing_light_mode_variable_on_confirm(): void
    {
        $path = $this->writeThemeCss('test');
        // Light/dark section vars use padded colons: `--app-bg     : ...`, so match by name only
        $this->removeLineContaining($path, '--app-bg');

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsConfirmation('Apply changes to this file?', 'yes')
            ->assertExitCode(0);

        $this->assertStringContainsString('--app-bg', file_get_contents($path));
    }

    #[Test]
    public function it_inserts_missing_dark_mode_variable_on_confirm(): void
    {
        $path = $this->writeThemeCss('test');
        $content = file_get_contents($path);

        $darkStart = strpos($content, '[data-mode="dark"]');
        $this->assertNotFalse($darkStart, 'dark section should exist in generated theme');

        // Remove the first --app-bg occurrence in the dark section only
        $darkSection = substr($content, $darkStart);
        $modified = preg_replace('/\n    --app-bg\s.*/', '', $darkSection, 1);
        file_put_contents($path, substr($content, 0, $darkStart) . $modified);

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsConfirmation('Apply changes to this file?', 'yes')
            ->assertExitCode(0);

        $updatedContent = file_get_contents($path);
        $updatedDark = substr($updatedContent, strpos($updatedContent, '[data-mode="dark"]'));
        $this->assertStringContainsString('--app-bg', $updatedDark);
    }

    #[Test]
    public function it_inserts_variable_at_correct_stub_ordered_position(): void
    {
        $path = $this->writeThemeCss('test');
        $this->removeLineContaining($path, '--chart-800:');

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsConfirmation('Apply changes to this file?', 'yes')
            ->assertExitCode(0);

        $content = file_get_contents($path);
        $pos800 = strpos($content, '--chart-800:');
        $pos900 = strpos($content, '--chart-900:');

        $this->assertNotFalse($pos800);
        $this->assertGreaterThan($pos800, $pos900, '--chart-800 should appear before --chart-900');
    }

    // ---------------------------------------------------------------------------
    // Palette variables
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_reports_palette_warning_when_gray_variable_missing(): void
    {
        $path = $this->writeThemeCss('test');
        $this->removeLineContaining($path, '--gray-50:');

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsConfirmation('Apply changes to this file?', 'no')
            ->expectsOutputToContain('Palette variables missing')
            ->expectsOutputToContain('--gray-50')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_reports_palette_warning_when_brand_variable_missing(): void
    {
        $path = $this->writeThemeCss('test');
        $this->removeLineContaining($path, '--brand-500:');

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsConfirmation('Apply changes to this file?', 'no')
            ->expectsOutputToContain('Palette variables missing')
            ->expectsOutputToContain('--brand-500')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_does_not_auto_insert_missing_palette_variables(): void
    {
        $path = $this->writeThemeCss('test');
        $this->removeLineContaining($path, '--gray-50:');

        $contentBefore = file_get_contents($path);

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsConfirmation('Apply changes to this file?', 'yes')
            ->expectsOutputToContain('Nothing to insert')
            ->assertExitCode(0);

        // --gray-50 should still be absent (not auto-inserted)
        $this->assertStringNotContainsString('--gray-50:', file_get_contents($path));
    }

    // ---------------------------------------------------------------------------
    // Extra variables
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_reports_extra_variables_not_in_stub(): void
    {
        $path = $this->writeThemeCss('test');
        $content = str_replace(
            ':root {',
            ":root {\n    --my-extra-var: 1 2 3;",
            file_get_contents($path),
        );
        file_put_contents($path, $content);

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsOutputToContain('extra variable')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_does_not_remove_extra_variables(): void
    {
        $path = $this->writeThemeCss('test');
        $content = str_replace(
            ':root {',
            ":root {\n    --my-extra-var: 1 2 3;",
            file_get_contents($path),
        );
        file_put_contents($path, $content);

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->assertExitCode(0);

        $this->assertStringContainsString('--my-extra-var:', file_get_contents($path));
    }

    // ---------------------------------------------------------------------------
    // Section not found
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_reports_section_not_found_and_continues(): void
    {
        // Build a CSS that has only :root, no light/dark sections
        $css = ":root {\n    --white: 255 255 255;\n    --black: 0 0 0;\n}\n";
        $path = $this->tempDir . '/partial.css';
        file_put_contents($path, $css);

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsConfirmation('Apply changes to this file?', 'yes')
            ->expectsOutputToContain('section not found')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_outputs_nothing_to_insert_when_only_section_warnings(): void
    {
        // File that's missing the dark section entirely (dark vars are reported as
        // missing but cannot be inserted since the section doesn't exist). Root and
        // light sections are complete so no non-palette insertions are possible.
        $css = $this->buildThemeCss('nosection');

        // Truncate everything from the start of the dark-mode :root[ line onward
        $darkPos = strpos($css, '[data-mode="dark"]');
        if ($darkPos !== false) {
            $lineStart = strrpos(substr($css, 0, $darkPos), "\n");
            $css = substr($css, 0, $lineStart) . "\n";
        }

        file_put_contents($this->tempDir . '/nosection.css', $css);

        $this->artisan('uikit:theme-updater', ['--css-path' => $this->tempDir])
            ->expectsConfirmation('Apply changes to this file?', 'yes')
            ->expectsOutputToContain('section not found')
            ->expectsOutputToContain('Nothing to insert')
            ->assertExitCode(0);
    }

    // ---------------------------------------------------------------------------
    // Helpers
    // ---------------------------------------------------------------------------

    private function buildThemeCss(string $themeName = 'test'): string
    {
        $stub = file_get_contents($this->stubPath);

        $palette = new BrandColorPalette('#FF0000');
        $greys = new GreyColors();

        $brandLines = [];
        foreach ($palette->getPalette() as $shade => $rgb) {
            $hex = sprintf('#%02X%02X%02X', ...$rgb);
            $brandLines[] = "    --brand-{$shade}: {$rgb[0]} {$rgb[1]} {$rgb[2]}; /* {$hex} */";
        }

        $greyData = $greys->getData('gray');
        $greyLines = [];
        foreach ($greyData as $shade => $rgb) {
            $hex = sprintf('#%02X%02X%02X', ...$rgb);
            $greyLines[] = "    --gray-{$shade}: {$rgb[0]} {$rgb[1]} {$rgb[2]}; /* {$hex} */";
        }

        return str_replace(
            ['{{ theme-name }}', '{{ brand-colors }}', '{{ gray-colors }}'],
            [$themeName, implode("\n", $brandLines), implode("\n", $greyLines)],
            $stub,
        );
    }

    private function writeThemeCss(string $name = 'test'): string
    {
        $path = $this->tempDir . '/' . $name . '.css';
        file_put_contents($path, $this->buildThemeCss($name));
        return $path;
    }

    private function removeLineContaining(string $filePath, string $needle): void
    {
        $lines = file($filePath, FILE_IGNORE_NEW_LINES);
        $filtered = array_filter($lines, fn($line) => ! str_contains($line, $needle));
        file_put_contents($filePath, implode("\n", $filtered));
    }
}
