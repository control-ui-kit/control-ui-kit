<?php

namespace ControlUIKit\Traits;

trait UseButtons
{
    use UseThemeFile;

    private array $styles = [
        'default',
        'brand',
        'danger',
        'info',
        'link',
        'success',
        'muted',
        'warning'
    ];

    private function buttonVersion($bstyle, $styles, $default = 'primary'): string
    {
        if ($this->validStyle($bstyle)) {
            return $bstyle;
        }

        foreach ($styles as $style => $enable) {
            if ($enable) {
                return $style;
            }
        }

        return ($default === 'primary') ? $this->primaryButton() : '';
    }

    private function primaryButton()
    {
        $primary = config($this->theme() . '.button.primary-button', 'default');

        if ($this->validStyle($primary)) {
            return $primary;
        }

        return 'default';
    }

    private function validStyle($style): bool
    {
        return in_array($style, $this->styles, true);
    }

    private function buttonType($type, $href): string
    {
        return (! $href && in_array($type, ['submit', 'reset'])) ? $type : 'button';
    }
}
