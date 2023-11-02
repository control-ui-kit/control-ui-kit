<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\LivewireAttributes;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Range extends Component
{
    use UseThemeFile, LivewireAttributes;

    protected string $component = 'input-range';

    public string $name;
    public string $id;
    public string $min;
    public string $max;
    public string $step;
    public string $theme;
    public string $type;
    public ?string $value;
    public bool $showMin;
    public bool $showMax;
    public bool $showValue;
    public array $minStyles;
    public array $maxStyles;
    public array $valueStyles;

    public function __construct(
        string $name,

        string $background = null,
        string $border = null,
        string $color = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $width = null,

        string $pillBackground = null,
        string $pillBorder = null,
        string $pillColor = null,
        string $pillFont = null,
        string $pillOther = null,
        string $pillPadding = null,
        string $pillRounded = null,
        string $pillShadow = null,
        string $pillWidth = null,

        string $pillMin = null,
        string $pillMax = null,
        string $pillValue = null,

        string $min = null,
        string $max = null,
        string $id = null,
        string $step = '1',
        string $value = null,

        string $type = null,
        string $size = null,

        bool $default = false,
        bool $brand = false,
        bool $danger = false,
        bool $info = false,
        bool $success = false,
        bool $muted = false,
        bool $warning = false,

        bool $xs = false,
        bool $sm = false,
        bool $md = false,
        bool $lg = false,

        bool $showMin = null,
        bool $showMax = null,
        bool $showValue = null,
        bool $hideMin = null,
        bool $hideMax = null,
        bool $hideValue = null,
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;

        $this->type = $this->type($type, [
            'default' => $default,
            'brand' => $brand,
            'danger' => $danger,
            'info' => $info,
            'success' => $success,
            'muted' => $muted,
            'warning' => $warning,
        ]);

        $size = $this->size($size, [
            'xs' => $xs,
            'sm' => $sm,
            'md' => $md,
            'lg' => $lg,
        ]);

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => $width,
        ]);

        $this->setConfigStyles([
            'pill-background' => $pillBackground,
            'pill-border' => $pillBorder,
            'pill-color' => $pillColor,
            'pill-font' => $pillFont,
            'pill-other' => $pillOther,
            'pill-min' => $pillMin,
            'pill-padding' => $pillPadding,
            'pill-rounded' => $pillRounded,
            'pill-shadow' => $pillShadow,
            'pill-width' => $pillWidth,
        ], [], null, 'minStyles');

        $this->setConfigStyles([
            'pill-background' => $pillBackground,
            'pill-border' => $pillBorder,
            'pill-color' => $pillColor,
            'pill-font' => $pillFont,
            'pill-other' => $pillOther,
            'pill-max' => $pillMax,
            'pill-padding' => $pillPadding,
            'pill-rounded' => $pillRounded,
            'pill-shadow' => $pillShadow,
            'pill-width' => $pillWidth,
        ], [], null, 'maxStyles');

        $this->setConfigStyles([
            'pill-background' => $pillBackground,
            'pill-border' => $pillBorder,
            'pill-color' => $pillColor,
            'pill-font' => $pillFont,
            'pill-other' => $pillOther,
            'pill-padding' => $pillPadding,
            'pill-rounded' => $pillRounded,
            'pill-shadow' => $pillShadow,
            'pill-value' => $pillValue,
            'pill-width' => $pillWidth,
        ], [], null, 'valueStyles');

        $this->min = $this->style($this->component, 'min', $min);
        $this->max = $this->style($this->component, 'max', $max);
        $this->step = $this->style($this->component, 'step', $step);
        $this->showMin = $this->style($this->component, 'show-min', $this->showValue($showMin, $hideMin));
        $this->showMax = $this->style($this->component, 'show-max', $this->showValue($showMax, $hideMax));
        $this->showValue = $this->style($this->component, 'show-value', $this->showValue($showValue, $hideValue));
        $value = old($name, $value ?? '');
        $this->value = $value === '' ? $this->min : $value;
        $this->theme = 'range range-' . $this->type . ' range-' . $size;
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.range');
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

    private array $sizes = [
        'xs',
        'sm',
        'md',
        'lg',
    ];

    private function size($type, $styles, $default = 'md'): string
    {
        if ($this->validSize($type)) {
            return $type;
        }

        foreach ($styles as $style => $enable) {
            if ($enable) {
                return $style;
            }
        }

        return ($default === 'md') ? $this->defaultSize() : '';
    }

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

        return ($default === 'default') ? $this->defaultStyle() : '';
    }

    private function defaultSize()
    {
        $size = config($this->theme() . '.input-range.default-size', 'md');

        if ($this->validSize($size)) {
            return $size;
        }

        return 'md';
    }

    private function defaultStyle()
    {
        $style = config($this->theme() . '.input-range.default-range', 'default');

        if ($this->validType($style)) {
            return $style;
        }

        return 'default';
    }

    private function validSize(?string $size): bool
    {
        return in_array($size, $this->sizes, true);
    }

    private function validType(?string $type): bool
    {
        return in_array($type, $this->types, true);
    }

    private function showValue(?bool $showMin, ?bool $hideMin): ?bool
    {
        if (! is_null($showMin)) {
            return $showMin;
        }

        if (! is_null($hideMin)) {
            return ! $hideMin;
        }

        return null;
    }

    public function minClasses(): string
    {
        return $this->classList($this->minStyles);
    }

    public function maxClasses(): string
    {
        return $this->classList($this->maxStyles);
    }

    public function valueClasses(): string
    {
        return $this->classList($this->valueStyles);
    }
}
