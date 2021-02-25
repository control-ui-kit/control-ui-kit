<?php

declare(strict_types=1);

namespace ControlUIKit\Traits;

use ControlUIKit\Exceptions\ControlUIKitException;

trait UseThemeFile
{
    public array $props = [];

    private function theme()
    {
        return app('control-ui-kit.theme');
    }

    private function appendStyles($input): string
    {
        if (is_null($input)) {
            return '';
        }

        $append = strpos($input, '...') === 0;
        return $append ? ' ' . trim(str_replace('...', '', $input)) : '';
    }

    private function style(string $component, string $attribute, ?string $input, ?string $keyMerge = null): string
    {
        $append_input = $this->appendStyles($input);

        if ($append_input || is_null($input)) {
            $theme = $this->theme();
            $key = "{$theme}.{$component}.{$attribute}";

            if (! config()->has($key)) {
                throw new ControlUIKitException("Config key not found [{$key}] in [{$theme}]");
            }

            $configStyle = config($key);

            if ($keyMerge) {

                $key = "{$theme}.{$keyMerge}.{$attribute}";

                if (! config()->has($key)) {
                    throw new ControlUIKitException("Config key not found [{$key}] in [{$theme}]");
                }

                $configStyle .= ' ' . config($key);

            }

            return trim($configStyle . $append_input);
        }

        return ($input === 'none' ? '' : $input);
    }

    private function setConfigStyles(array $props, array $merge = [], string $config = null): void
    {
        $this->props = $props;

        foreach ($this->props as $prop => $value) {
            $keyMerge = ($config && count($merge) && in_array($prop, $merge, true)) ? $config : null;

            $this->$prop = $this->style($this->component, $prop, $value, $keyMerge);
            $this->props[$prop] = $this->$prop;
        }
    }

    public function classes(string $class = ''): array
    {
        $this->props[] = $class;
        $class = trim(collect($this->props)->filter()->implode(' '));
        return $class ? ['class' => $class] : [];
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
}
