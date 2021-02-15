<?php

declare(strict_types=1);

namespace ControlUIKit\Traits;

trait UseThemeFile
{
    private function style(string $component, string $attribute, ?string $input): string
    {
        if (is_null($input)) {
            return config(app('control-ui-kit.theme') . ".{$component}.{$attribute}");
        }

        return ($input === 'none' ? '' : $input);
    }
}
