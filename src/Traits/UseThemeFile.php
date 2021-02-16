<?php

declare(strict_types=1);

namespace ControlUIKit\Traits;

use ControlUIKit\Exceptions\ControlUIKitException;

trait UseThemeFile
{
    public array $props = [];

    private function style(string $component, string $attribute, ?string $input): string
    {
        if (is_null($input)) {
            $theme = app('control-ui-kit.theme') ;
            $key = "{$theme}.{$component}.{$attribute}";

            if (! config()->has($key)) {
                throw new ControlUIKitException("Config key not found [{$key}] in [{$theme}]");
            }

            return config($key);
        }

        return ($input === 'none' ? '' : $input);
    }

    private function setConfigStyles($props): void
    {
        $this->props = $props;

        foreach ($this->props as $prop => $value) {
            $this->$prop = $this->style($this->component, $prop, $value);
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
