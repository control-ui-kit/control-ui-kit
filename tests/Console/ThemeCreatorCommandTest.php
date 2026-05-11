<?php

declare(strict_types=1);

namespace Tests\Console;

use PHPUnit\Framework\Attributes\Test;

class ThemeCreatorCommandTest extends ConsoleTestCase
{
    #[Test]
    public function it_errors_when_color_option_is_missing(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--grey' => 'gray',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsOutputToContain('--color option is required')
            ->assertExitCode(1);
    }

    #[Test]
    public function it_errors_when_grey_option_is_missing(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsOutputToContain('--grey option is required')
            ->assertExitCode(1);
    }

    #[Test]
    public function it_errors_when_name_option_is_missing(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--css-path' => $this->tempDir,
        ])
            ->expectsOutputToContain('--name option is required')
            ->assertExitCode(1);
    }

    #[Test]
    public function it_errors_when_color_is_an_invalid_hex(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => 'notacolor',
            '--grey' => 'gray',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
        ])
            ->assertExitCode(1);
    }

    #[Test]
    public function it_errors_when_color_rgb_has_wrong_part_count(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '255,0',
            '--grey' => 'gray',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsOutputToContain('exactly 3 comma-separated values')
            ->assertExitCode(1);
    }

    #[Test]
    public function it_errors_when_color_rgb_has_non_integer_values(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '255,abc,0',
            '--grey' => 'gray',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsOutputToContain('Invalid RGB value')
            ->assertExitCode(1);
    }

    #[Test]
    public function it_errors_when_grey_palette_is_invalid(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'purple',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsOutputToContain("Invalid grey palette 'purple'")
            ->assertExitCode(1);
    }

    #[Test]
    public function it_errors_when_file_already_exists_without_force(): void
    {
        $filePath = $this->tempDir . '/my_theme.css';
        file_put_contents($filePath, '/* existing */');

        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsOutputToContain('Theme file already exists')
            ->expectsOutputToContain('--force')
            ->assertExitCode(1);
    }

    #[Test]
    public function it_aborts_when_user_declines_confirmation(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'no')
            ->expectsOutputToContain('Aborted')
            ->assertExitCode(0);

        $this->assertFileDoesNotExist($this->tempDir . '/my_theme.css');
    }

    #[Test]
    public function it_creates_theme_file_on_confirmation(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'yes')
            ->assertExitCode(0);

        $this->assertFileExists($this->tempDir . '/my_theme.css');
    }

    #[Test]
    public function it_creates_theme_file_with_rgb_color(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '255,0,0',
            '--grey' => 'gray',
            '--name' => 'rgb_theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'yes')
            ->assertExitCode(0);

        $this->assertFileExists($this->tempDir . '/rgb_theme.css');
    }

    #[Test]
    public function it_converts_name_to_snake_case_for_filename(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'My Brand Theme',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'yes')
            ->assertExitCode(0);

        $this->assertFileExists($this->tempDir . '/my_brand_theme.css');
    }

    #[Test]
    public function it_uses_snake_case_name_in_data_theme_attribute(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'My Brand',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'yes')
            ->assertExitCode(0);

        $content = file_get_contents($this->tempDir . '/my_brand.css');
        $this->assertStringContainsString('[data-theme="my_brand"]', $content);
    }

    #[Test]
    public function it_includes_brand_color_variables(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'test',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'yes')
            ->assertExitCode(0);

        $content = file_get_contents($this->tempDir . '/test.css');
        $this->assertStringContainsString('--brand-500:', $content);
        $this->assertStringContainsString('--brand-50:', $content);
        $this->assertStringContainsString('--brand-900:', $content);
    }

    #[Test]
    public function it_includes_grey_color_variables(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'slate',
            '--name' => 'test',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'yes')
            ->assertExitCode(0);

        $content = file_get_contents($this->tempDir . '/test.css');
        $this->assertStringContainsString('--gray-500:', $content);
        $this->assertStringContainsString('--gray-50:', $content);
        $this->assertStringContainsString('--gray-1000:', $content);
    }

    #[Test]
    public function it_overwrites_existing_file_with_force_flag(): void
    {
        $filePath = $this->tempDir . '/my_theme.css';
        file_put_contents($filePath, '/* original */');

        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
            '--force' => true,
        ])
            ->expectsConfirmation('Proceed?', 'yes')
            ->assertExitCode(0);

        $content = file_get_contents($filePath);
        $this->assertStringNotContainsString('/* original */', $content);
        $this->assertStringContainsString('--white:', $content);
    }

    #[Test]
    public function it_shows_overwrite_warning_in_preview_when_file_exists(): void
    {
        file_put_contents($this->tempDir . '/my_theme.css', '/* existing */');

        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'my_theme',
            '--css-path' => $this->tempDir,
            '--force' => true,
        ])
            ->expectsConfirmation('Proceed?', 'no')
            ->expectsOutputToContain('will overwrite')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_uses_custom_css_path(): void
    {
        $customPath = $this->tempDir . '/custom';
        mkdir($customPath);

        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'test',
            '--css-path' => $customPath,
        ])
            ->expectsConfirmation('Proceed?', 'yes')
            ->assertExitCode(0);

        $this->assertFileExists($customPath . '/test.css');
    }

    #[Test]
    public function it_creates_css_path_directory_if_not_exists(): void
    {
        $newPath = $this->tempDir . '/nested/path';

        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'test',
            '--css-path' => $newPath,
        ])
            ->expectsConfirmation('Proceed?', 'yes')
            ->assertExitCode(0);

        $this->assertFileExists($newPath . '/test.css');
    }

    #[Test]
    public function it_shows_preview_with_theme_name_and_file_path(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'preview_test',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'no')
            ->expectsOutputToContain('preview_test.css')
            ->expectsOutputToContain('Theme creation preview')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_shows_brand_hex_and_rgb_in_preview(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'test',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'no')
            ->expectsOutputToContain('#FF0000 → rgb(255, 0, 0)')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_shows_grey_palette_in_preview(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'slate',
            '--name' => 'test',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'no')
            ->expectsOutputToContain('slate')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_outputs_success_message_with_file_path(): void
    {
        $this->artisan('uikit:create-new-theme', [
            '--color' => '#FF0000',
            '--grey' => 'gray',
            '--name' => 'test',
            '--css-path' => $this->tempDir,
        ])
            ->expectsConfirmation('Proceed?', 'yes')
            ->expectsOutputToContain('Theme created: ' . $this->tempDir . '/test.css')
            ->assertExitCode(0);
    }

    #[Test]
    public function it_accepts_all_valid_grey_palettes(): void
    {
        foreach (['slate', 'gray', 'classic', 'neutral', 'stone', 'green'] as $palette) {
            $this->artisan('uikit:create-new-theme', [
                '--color' => '#FF0000',
                '--grey' => $palette,
                '--name' => "test_{$palette}",
                '--css-path' => $this->tempDir,
            ])
                ->expectsConfirmation('Proceed?', 'yes')
                ->assertExitCode(0);

            $this->assertFileExists($this->tempDir . "/test_{$palette}.css");
        }
    }
}
