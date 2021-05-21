<?php

namespace ControlUIKit\Helpers;

class ComponentStyles
{
    public function get(string $component, $except = null): string
    {
        if (! is_array($except)) {
            $except = [$except];
        }

        if ($component === 'panel') {
            $except[] = 'stacked';
            return collect(config('themes.default.panel'))->except($except)->implode(" ");
        }

        if ($component === 'panel-stacked') {
            return collect(config('themes.default.panel'))->except($except)->implode(" ");
        }
    }
}
