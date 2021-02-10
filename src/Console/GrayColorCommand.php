<?php

declare(strict_types=1);

namespace ControlUIKit\Console;

use ControlUIKit\ColorPalette;
use ControlUIKit\Exceptions\InvalidColorException;
use ControlUIKit\GrayColors;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

final class GrayColorCommand extends Command
{
    protected $signature = 'uikit:gray-colors {gray}';

    protected $description = 'Export gray colors.';

    protected array $grays = ['blue', 'cool', 'classic', 'true', 'warm'];

    public function handle(GrayColors $grays): int
    {
        if (! $this->argument('gray')) {
            $this->error('You must supply a gray color scale');
            return 1;
        }

        if (! $colors = $grays->getScale()) {
            $this->error('Gray color does not exist');
            return 1;
        }

        $this->info($colors);

        return 0;
    }
}
