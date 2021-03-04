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

    private function style(string $component, string $attribute, ?string $input, ?string $keyMerge = null, ?string $keyOverride = null): string
    {
        if (is_null($input)) {

            $theme = $this->theme();
            $key = "{$theme}.{$component}.{$attribute}";

            if (! config()->has($key)) {
                throw new ControlUIKitException("Config key not found [{$key}] in [{$theme}]");
            }

            $configStyle = config($key);

            if ($keyOverride) {

                $key = "{$theme}.{$keyOverride}.{$attribute}";

                if (config()->has($key)) {
                    $configStyle = config($key) !== '' ? config($key) : $configStyle;
                    //throw new ControlUIKitException("Config key not found [{$key}] in [{$theme}]");
                }


            }

            if ($keyMerge) {

                $key = "{$theme}.{$keyMerge}.{$attribute}";

                if (! config()->has($key)) {
                    throw new ControlUIKitException("Config key not found [{$key}] in [{$theme}]");
                }

                $configStyle .= ($configStyle === config($key)) ? '' : ' ' . config($key);
            }

            return trim($configStyle);
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

    public function classes(string $class = '', array $only = []): array
    {
        $classList = $this->classList($this->props, $class, $only);

        return $classList ? ['class' => $classList] : [];
    }

    public function classList(array $classes, string $merge = '', array $only = []): string
    {
        $collect = collect($classes)->filter()->unique();

        if ($only) {
            $collect = $collect->only($only);
        }

        $collect[] = $merge;

        return trim($collect->implode(' '));
    }
}
