<?php

declare(strict_types=1);

namespace ControlUIKit\Console;

use ControlUIKit\ColorPalette;
use ControlUIKit\Exceptions\InvalidColorException;
use ControlUIKit\GrayColors;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

final class ThemeCommand extends Command
{
    protected $signature = 'uikit:create-theme
                            {--color= : Hex code of primary color}
                            {--gray= : Gray color palette to use (blue/cool/classic/true/warm)}
                            {--name= : The name of the theme}
                            {--force : Overwrite existing file if it exists}';

    protected $description = 'Create a Control UI Kit theme SCSS file.';

    protected array $palette = [
        'brand-lightest' => '#FDEACB',
        'brand-lighter' =>'#F6AB65',
        'brand-light' =>'#EC883E',
        'brand-default' => '#E15404',
        'brand-dark' => '#C13C02',
        'brand-darker'=> '#A22802',
        'brand-darkest' => '#6C0D00',
    ];

    protected array $grays = ['blue', 'cool', 'classic', 'true', 'warm'];

    protected string $destination_theme;

    public function handle(Filesystem $filesystem, GrayColors $grays): int
    {
        $this->setDestination();

        if ($this->stopOnError()) {
            return 1;
        }

        $this->copyFiles($filesystem, $grays);

        $this->line('Successfully published the your theme');
        $this->line('');
        $this->info($this->destination_theme . '... created successfully');

        return 0;
    }

    private function setDestination(): void
    {
        $this->destination_theme = resource_path('sass/' . ($this->option('name') ?? 'theme') . '.scss');
        \File::ensureDirectoryExists(resource_path('sass'));
    }

    private function copyFiles(Filesystem $filesystem, GrayColors $grays): void
    {
        $filesystem->put($this->destination_theme, $this->getThemeStub($filesystem, $grays));
        $filesystem->put(resource_path('sass/_functions.scss'), $this->getFunctionsStub($filesystem));
    }

    private function stopOnError(): bool
    {
        if ($this->option('color') && ! $this->buildColorPalette()) {
            return true;
        }

        if (\File::exists($this->destination_theme) && ! $this->option('force')) {
            $this->error('Theme already exists. Use --force to overwrite');
            return true;
        }

        return false;
    }

    private function getThemeStub(Filesystem $filesystem, GrayColors $grays): string
    {
        return str_replace(
            ['{{ brand-colors }}', '{{ gray-colors }}'],
            [$this->brandColors(), $grays->getScale($this->option('gray'))],
            $filesystem->get(__DIR__ . '/../../resources/stubs/theme.stub'),
        );
    }

    private function getFunctionsStub(Filesystem $filesystem): string
    {
        return $filesystem->get(__DIR__ . '/../../resources/stubs/functions.stub');
    }

    private function buildColorPalette(): bool
    {
        try {
            $this->palette = app(ColorPalette::class, ['color' => $this->option('color')])->createPalette();
            return true;
        } catch (InvalidColorException $e) {
            $this->error('The color specified is invalid.');
            return false;
        }
    }

    private function brandColors(): string
    {
        return <<< SASS
\$brand-lightest: {$this->palette['brand-lightest']};
\$brand-lighter: {$this->palette['brand-lighter']};
\$brand-light: {$this->palette['brand-light']};
\$brand-default: {$this->palette['brand-default']};
\$brand-dark: {$this->palette['brand-dark']};
\$brand-darker: {$this->palette['brand-darker']};
\$brand-darkest: {$this->palette['brand-darkest']};
SASS;
    }
}
