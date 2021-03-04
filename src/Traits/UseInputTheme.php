<?php

declare(strict_types=1);

namespace ControlUIKit\Traits;

trait UseInputTheme
{
    use UseThemeFile;

    protected array $basicStyles;
    protected array $wrapperStyles;
    protected array $inputStyles;

    private function inputPadding(): string
    {
        $padding[] = $this->iconLeft || $this->prefix ? $this->style('input.input', 'left', null, '', $this->component . '.left') : '';
        $padding[] = $this->iconRight || $this->suffix ? $this->style('input.input', 'right', null, '', $this->component . '.right') : '';
        return collect($padding)->filter()->implode(' ');
    }

    private function setInputStyles(array $props, string $keyOverride, string $style, string $config): void
    {
        $this->$style = $props;

        foreach ($this->$style as $prop => $value) {
            $this->$prop = $this->style($config, $prop, $value, '', $keyOverride);
            $this->$style[$prop] = $this->$prop;
        }
    }

    public function basicClasses(): array
    {
        $classList = $this->classList($this->basicStyles);

        return $classList ? ['class' => $classList] : [];
    }

    public function wrapperClasses(): array
    {
        $classList = $this->classList($this->wrapperStyles);

        return $classList ? ['class' => $classList] : [];
    }

    public function inputClasses(): string
    {
        $this->inputStyles[] = $this->inputPadding();
        return $this->classList($this->inputStyles);
    }
}
