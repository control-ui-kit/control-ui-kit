<?php

declare(strict_types=1);

namespace ControlUIKit\Console;

use ControlUIKit\BrandColorPalette;
use ControlUIKit\GreyColors;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use InvalidArgumentException;

final class ThemeCreatorCommand extends Command
{
    protected $signature = 'uikit:create-new-theme
                           {--color= : Hex code (#AD28FF) or comma-separated RGB (173,40,255) of brand color}
                           {--grey= : Grey color palette to use (slate/gray/classic/neutral/stone/green)}
                           {--name= : The name of the theme}
                           {--css-path= : Output directory (defaults to resources/css)}
                           {--force : Overwrite existing file if it exists}';

    protected $description = 'Create a Control UI Kit theme CSS file.';

    private array $validGreys = ['slate', 'gray', 'classic', 'neutral', 'stone', 'green'];

    public function handle(Filesystem $filesystem, GreyColors $greys): int
    {
        if (! $this->validateOptions()) {
            return 1;
        }

        try {
            $palette = new BrandColorPalette($this->option('color'));
        } catch (InvalidArgumentException $e) {
            $this->error($e->getMessage());
            return 1;
        }

        $grey = strtolower($this->option('grey'));

        if (! in_array($grey, $this->validGreys, true)) {
            $this->error("Invalid grey palette '{$grey}'. Valid options are: " . implode(', ', $this->validGreys) . '.');
            return 1;
        }

        $cssPath = $this->option('css-path')
            ? rtrim($this->option('css-path'), '/')
            : resource_path('css');

        $name = Str::snake($this->option('name'));
        $filePath = $cssPath . '/' . $name . '.css';
        $fileExists = $filesystem->exists($filePath);

        if ($fileExists && ! $this->option('force')) {
            $this->error("Theme file already exists: {$filePath}");
            $this->line('Use --force to overwrite.');
            return 1;
        }

        if (! $this->showPreviewAndConfirm($palette, $grey, $name, $filePath, $fileExists)) {
            $this->line('Aborted.');
            return 0;
        }

        $css = str_replace(
            ['{{ theme-name }}', '{{ brand-colors }}', '{{ gray-colors }}'],
            [$name, $this->buildBrandColorBlock($palette), $this->buildGreyColorBlock($greys, $grey)],
            $filesystem->get(__DIR__ . '/../../resources/stubs/theme_css.stub'),
        );

        $filesystem->ensureDirectoryExists($cssPath);
        $filesystem->put($filePath, $css);

        $this->line('');
        $this->info("Theme created: {$filePath}");

        return 0;
    }

    private function validateOptions(): bool
    {
        if (! $this->option('color')) {
            $this->error('The --color option is required. Provide a hex code (e.g. #AD28FF) or comma-separated RGB (e.g. 173,40,255).');
            return false;
        }

        if (! $this->option('grey')) {
            $this->error('The --grey option is required. Valid options are: ' . implode(', ', $this->validGreys) . '.');
            return false;
        }

        if (! $this->option('name')) {
            $this->error('The --name option is required. This will become the theme file name.');
            return false;
        }

        return true;
    }

    private function showPreviewAndConfirm(
        BrandColorPalette $palette,
        string $grey,
        string $name,
        string $filePath,
        bool $fileExists,
    ): bool {
        $baseRgb = $palette->getBaseRgb();
        $baseHex = $palette->getBaseHex();

        $this->line('');
        $this->line('<options=bold>Theme creation preview:</>');
        $this->line("  Name   : <info>{$name}</info>");

        $fileLabel = $fileExists
            ? "  File   : <info>{$filePath}</info> <comment>(will overwrite)</comment>"
            : "  File   : <info>{$filePath}</info>";

        $this->line($fileLabel);
        $this->line("  Brand  : <info>{$baseHex} → rgb({$baseRgb[0]}, {$baseRgb[1]}, {$baseRgb[2]})</info>");
        $this->line("  Grey   : <info>{$grey}</info>");
        $this->line('');

        return $this->confirm('Proceed?', false);
    }

    private function buildBrandColorBlock(BrandColorPalette $palette): string
    {
        $lines = [];

        foreach ($palette->getPalette() as $shade => $rgb) {
            $hex = sprintf('#%02X%02X%02X', ...$rgb);
            $lines[] = "    --brand-{$shade}: {$rgb[0]} {$rgb[1]} {$rgb[2]}; /* {$hex} */";
        }

        return implode("\n", $lines);
    }

    private function buildGreyColorBlock(GreyColors $greys, string $grey): string
    {
        $lines = [];

        foreach ($greys->getData($grey) as $shade => $rgb) {
            $hex = sprintf('#%02X%02X%02X', ...$rgb);
            $lines[] = "    --gray-{$shade}: {$rgb[0]} {$rgb[1]} {$rgb[2]}; /* {$hex} */";
        }

        return implode("\n", $lines);
    }
}
