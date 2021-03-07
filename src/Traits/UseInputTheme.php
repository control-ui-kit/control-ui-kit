<?php

declare(strict_types=1);

namespace ControlUIKit\Traits;

trait UseInputTheme
{
    use UseThemeFile;

    protected array $basicStyles;
    protected array $wrapperStyles;
    protected array $inputStyles;
    protected array $validTypes = [
        'button', 'checkbox', 'color', 'date', 'datetime-local', 'email', 'file', 'hidden', 'image', 'month', 'number',
        'password', 'radio', 'range', 'reset', 'search', 'submit', 'tel', 'text', 'time', 'url', 'week',
    ];

    private function setInputStyles(array $props, string $keyOverride, string $style, string $config, string $prefix = ''): void
    {
        $this->$style = $props;

        foreach ($this->$style as $prop => $value) {
            $this->$prop = $this->style($config, $prefix.$prop, $value, '', $keyOverride);
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
        return $this->classList($this->inputStyles);
    }

    private function isValidType(string $type): bool
    {
        return in_array($type, $this->validTypes, true);
    }
}
