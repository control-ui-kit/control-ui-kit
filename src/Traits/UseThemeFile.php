<?php

declare(strict_types=1);

namespace ControlUIKit\Traits;

use ControlUIKit\Exceptions\ControlUIKitException;

trait UseThemeFile
{
    public array $props = [];

    private function style(string $component, string $attribute, ?string $input, ?string $keyMerge = null): string
    {
        if (is_null($input)) {
            $theme = app('control-ui-kit.theme') ;
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

            return trim($configStyle);
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
}
