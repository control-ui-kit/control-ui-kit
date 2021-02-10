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
\$brand-lightest: {$palette['brand-lightest']};
\$brand-lighter: {$palette['brand-lighter']};
\$brand-light: {$palette['brand-light']};
\$brand-default: {$palette['brand-default']};
\$brand-dark: {$palette['brand-dark']};
\$brand-darker: {$palette['brand-darker']};
\$brand-darkest: {$palette['brand-darkest']};
SASS;
    }
}
