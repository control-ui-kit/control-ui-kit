<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tooltips;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tooltip extends Component
{
    use UseThemeFile;

    protected string $component = 'tooltip';

    public string $text;
    public string $position;
    public string $type;
    public string $arrow;
    public string $wrapper;

    public array $tooltipStyles;

    private array $types = [
        'default',
        'brand',
        'danger',
        'info',
        'success',
        'muted',
        'warning',
    ];

    public function __construct(
        string $text,
        ?string $position = null,
        ?string $type = null,
        string $wrapper = 'inline-block',
        ?string $background = null,
        ?string $border = null,
        ?string $color = null,
        ?string $font = null,
        ?string $other = null,
        ?string $padding = null,
        ?string $rounded = null,
        ?string $shadow = null,
        ?string $arrow = null,
        bool $default = false,
        bool $brand = false,
        bool $danger = false,
        bool $info = false,
        bool $success = false,
        bool $muted = false,
        bool $warning = false,
    ) {
        $this->text = $text;
        $this->position = $this->style($this->component, 'position', $position) ?: 'top';
        $this->wrapper = $wrapper;

        $this->type = $this->resolveType($type, [
            'default' => $default,
            'brand'   => $brand,
            'danger'  => $danger,
            'info'    => $info,
            'success' => $success,
            'muted'   => $muted,
            'warning' => $warning,
        ]);

        $this->setConfigStyles([
            'background' => $background,
            'border'     => $border,
            'color'      => $color,
            'font'       => $font,
            'other'      => $other,
            'padding'    => $padding,
            'rounded'    => $rounded,
            'shadow'     => $shadow,
        ], ['background', 'border', 'color'], 'tooltip.' . $this->type, 'tooltipStyles');

        $this->arrow = $this->style('tooltip.' . $this->type, 'arrow', $arrow);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.tooltips.tooltip');
    }

    public function tooltipClasses(): string
    {
        return $this->classList($this->tooltipStyles);
    }

    private function resolveType(?string $type, array $styles): string
    {
        if ($type !== null && in_array($type, $this->types, true)) {
            return $type;
        }

        foreach ($styles as $style => $enabled) {
            if ($enabled) {
                return $style;
            }
        }

        return 'default';
    }
}
