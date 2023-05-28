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
            $except = array_merge($except, ['spacing', 'tiny', 'small', 'medium', 'large', 'xl', 'jumbo', 'width', 'divider']);
            return collect(config('themes.default.panel'))->except($except)->filter()->implode(' ');
        }

        if ($component === 'panel-stacked') {
            $except = array_merge($except, ['tiny', 'small', 'medium', 'large', 'xl', 'jumbo', 'width', 'divider']);
            return collect(config('themes.default.panel'))->except($except)->filter()->implode(' ');
        }

        return '';
    }
}
