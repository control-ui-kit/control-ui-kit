<?php

declare(strict_types=1);

namespace ControlUIKit\Console;

use ControlUIKit\ColorPalette;
use ControlUIKit\Exceptions\InvalidColorException;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

final class BrandColorCommand extends Command
{
    protected $signature = 'uikit:brand-colors {color}';

    protected $description = 'Export brand colors based on supplied hex color.';

    public function handle(): int
    {
        if (! $this->argument('color')) {
            $this->error('You must supply a color');
            return 1;
        }

        try {
            $palette = app(ColorPalette::class, ['color' => $this->argument('color')])->createPalette();
        } catch (InvalidColorException $e) {
            $this->error('The color specified is invalid.');
            return 1;
        }

        $this->info($this->brandColors($palette));

        return 0;
    }

    private function brandColors($palette): string
    {
        return <<< SASS
\$brand-50: {$palette['brand-50']};
\$brand-100: {$palette['brand-100']};
\$brand-200: {$palette['brand-200']};
\$brand-300: {$palette['brand-300']};
\$brand-400: {$palette['brand-400']};
\$brand-500: {$palette['brand-500']};
\$brand-600: {$palette['brand-600']};
\$brand-700: {$palette['brand-700']};
\$brand-800: {$palette['brand-800']};
\$brand-900: {$palette['brand-900']};
SASS;
    }
}
