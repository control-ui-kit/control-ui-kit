<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Text;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component
{
    use UseThemeFile;

    protected string $component = 'text';

    public string $type;

    public function __construct(
        string $color = null,
        string $font = null,
        string $other = null,
        string $size = null,
        string $type = null,

        bool $default = false,
        bool $brand = false,
        bool $danger = false,
        bool $info = false,
        bool $success = false,
        bool $muted = false,
        bool $warning = false
    ) {
        $this->type = $this->type($type, [
            'default' => $default,
            'brand' => $brand,
            'danger' => $danger,
            'info' => $info,
            'success' => $success,
            'muted' => $muted,
            'warning' => $warning,
        ]);

        $this->setConfigStyles([
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'size' => $size,
        ], ['color', 'font', 'size', 'other'], 'text.' . $this->type);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.text.text');
    }

    private array $types = [
        'default',
        'brand',
        'danger',
        'info',
        'success',
        'muted',
        'warning'
    ];

    private function type($type, $styles, $default = 'default'): string
    {
        if ($this->validType($type)) {
            return $type;
        }

        foreach ($styles as $style => $enable) {
            if ($enable) {
                return $style;
            }
        }

        return ($default === 'default') ? $this->defaultText() : '';
    }

    private function defaultText()
    {
        $primary = config($this->theme() . '.text.default-text', 'default');

        if ($this->validType($primary)) {
            return $primary;
        }

        return 'default';
    }

    private function validType($type): bool
    {
        return in_array($type, $this->types, true);
    }
}
