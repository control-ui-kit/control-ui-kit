<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Progress;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Bar extends Component
{
    use UseThemeFile;

    protected string $component = 'progress-bar';

    public float $value;
    public float $min;
    public float $max;
    public bool $animated;
    public bool $showValue;
    public string $barStyle;

    private array $trackStyles = [];
    private array $barStyles = [];
    private array $labelStyles = [];

    private array $styles = ['brand', 'info', 'success', 'danger', 'warning', 'muted'];

    public function __construct(
        string $value = null,
        string $min = null,
        string $max = null,
        bool $animated = false,
        bool $showValue = false,
        string $size = null,
        string $barStyle = null,

        bool $brand = false,
        bool $info = false,
        bool $success = false,
        bool $danger = false,
        bool $warning = false,
        bool $muted = false,

        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $width = null,

        string $barBackground = null,
        string $barOther = null,
        string $barRounded = null,

        string $labelColor = null,
        string $labelFont = null,
        string $labelOther = null,
    ) {
        $this->value = $value !== null ? (float) $value : 0.0;
        $this->min = $min !== null ? (float) $min : 0.0;
        $this->max = $max !== null ? (float) $max : 100.0;
        $this->animated = $animated;
        $this->showValue = $showValue;

        $this->barStyle = $this->resolveBarStyle($barStyle, [
            'brand' => $brand,
            'info' => $info,
            'success' => $success,
            'danger' => $danger,
            'warning' => $warning,
            'muted' => $muted,
        ]);

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => $width,
        ], [], null, 'trackStyles');

        $sizeClass = $this->resolveSize($size);
        if ($sizeClass) {
            $this->trackStyles[] = $sizeClass;
        }

        $this->setConfigStyles([
            'bar-background' => $barBackground,
            'bar-other' => $barOther,
            'bar-rounded' => $barRounded,
        ], ['bar-background'], $this->component . '.' . $this->barStyle, 'barStyles');

        if ($animated) {
            $animatedClass = $this->style($this->component, 'bar-animated', null);
            if ($animatedClass) {
                $this->barStyles[] = $animatedClass;
            }
        }

        $this->setConfigStyles([
            'label-color' => $labelColor,
            'label-font' => $labelFont,
            'label-other' => $labelOther,
        ], ['label-color'], $this->component . '.' . $this->barStyle, 'labelStyles');
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.progress.bar');
    }

    public function trackClasses(): string
    {
        return $this->classList($this->trackStyles);
    }

    public function barClasses(): string
    {
        return $this->classList($this->barStyles);
    }

    public function labelClasses(): string
    {
        return $this->classList($this->labelStyles);
    }

    private function resolveBarStyle(?string $barStyle, array $flags): string
    {
        if (in_array($barStyle, $this->styles, true)) {
            return $barStyle;
        }

        foreach ($flags as $style => $enabled) {
            if ($enabled) {
                return $style;
            }
        }

        return 'brand';
    }

    private function resolveSize(?string $size): string
    {
        $resolved = (string) $this->style($this->component, 'size', $size);

        if ($resolved === '') {
            return '';
        }

        if (in_array($resolved, ['xs', 'sm', 'md', 'lg', 'xl'], true)) {
            return (string) ($this->style($this->component, 'size-' . $resolved, null) ?? '');
        }

        return $resolved;
    }
}
