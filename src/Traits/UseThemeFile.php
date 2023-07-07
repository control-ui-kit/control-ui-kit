<?php

declare(strict_types=1);

namespace ControlUIKit\Traits;

use ControlUIKit\Exceptions\ControlUIKitException;

trait UseThemeFile
{
    public array $props = [];

    private function theme()
    {
        if (! app()->has('control-ui-kit.theme')) {
            app()->singleton('control-ui-kit.theme', function() {
                return 'themes.default';
            });
        }

        return app('control-ui-kit.theme');
    }

    private function appendStyles($input): ?string
    {
        if (is_null($input)) {
            return null;
        }

        $append = str_starts_with($input, '...');
        return $append ? ' ' . trim(str_replace('...', '', $input)) : '';
    }

    private function style(string $component, string $attribute, ?string $input, ?string $keyMerge = null, ?string $keyOverride = null): string
    {
        $append_input = $this->appendStyles($input);

        if ($append_input || is_null($input)) {
            $theme = $this->theme();
            $key = "{$theme}.{$component}.{$attribute}";

            if ($component === 'dropdown') {
                ray($key);
            }

            $configStyle = $this->componentStyle($component, $attribute);

            if ($keyOverride) {

                $key = "{$theme}.{$keyOverride}.{$attribute}";

                if (config()->has($key)) {
                    $configStyle = config($key) !== '' ? config($key) : $configStyle;
                }
            }

            if ($keyMerge) {

                $key = "{$theme}.{$keyMerge}.{$attribute}";

                if (! config()->has($key)) {
                    throw new ControlUIKitException("Merge config key not found [{$key}] in [{$theme}]");
                }

                $configStyle .= ($configStyle === config($key)) ? '' : ' ' . config($key);
            }

            return is_null($configStyle) && is_null($append_input) ? '' : trim($configStyle . $append_input);
        }

        return ($input === 'none' ? '' : $input);
    }

    private function setConfigStyles(array $props, array $merge = [], string $config = null, $array = 'props'): void
    {
        $this->$array = $props;

        foreach ($this->$array as $prop => $value) {
            $keyMerge = ($config && count($merge) && in_array($prop, $merge, true)) ? $config : null;

            $this->$prop = $this->style($this->component, $prop, $value, $keyMerge);
            $this->$array[$prop] = $this->$prop;
        }
    }

    public function classes(string $class = '', array $only = [], array $except = []): array
    {
        $classList = $this->classList($this->props, $class, $only, $except);

        return $classList ? ['class' => $classList] : [];
    }

    public function classList(array $classes, string $merge = '', array $only = [], array $except = []): string
    {
        $collect = collect($classes)->filter()->unique();

        if ($only) {
            $collect = $collect->only($only);
        }

        if ($except) {
            $collect = $collect->except($except);
        }

        $collect[] = $merge;

        return trim($collect->implode(' '));
    }

    private function align(?string $align, bool $left, bool $center, bool $right): ?string
    {
        if ($align === '') {
            return '';
        }

        if ($align === 'right' || $align === 'text-right' || $right) {
            return 'text-right';
        }

        if ($align === 'center' || $align === 'text-center' || $center) {
            return 'text-center';
        }

        if ($align === 'left' || $align === 'text-left' || $left) {
            return 'text-left';
        }

        return null;
    }

    private function cleanDirection($direction): string
    {
        if (isset($direction) && strtolower($direction) === 'desc') {
            return 'desc';
        }

        return 'asc';
    }

    private function componentStyle($component, $attribute)
    {
        $theme = $this->theme();
        $key = "{$theme}.{$component}.{$attribute}";

        if (! config()->has($key)) {
            throw new ControlUIKitException("Config key not found [{$key}] in [{$theme}]");
        }

        return config($key);
    }
}
