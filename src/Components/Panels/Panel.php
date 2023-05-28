<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Panels;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Panel extends Component
{
    use UseThemeFile;

    protected string $component = 'panel';

    public ?string $title;
    public ?string $header;
    public ?string $footer;
    public ?string $dynamicComponent;

    public array $panelStyles = [];
    public array $widthStyles = [];
    private bool $padded;
    private bool $tiny;
    private bool $small;
    private bool $medium;
    private bool $large;
    private bool $xl;
    private bool $jumbo;
    private bool $simple;

    public function __construct(
        string $title = null,
        string $header = null,
        string $footer = null,
        string $component = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $divider = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $width = null,
        string $spacing = null,
        bool $simple = false,
        bool $stacked = false,
        bool $padded = false,
        bool $tiny = false,
        bool $small = false,
        bool $medium = false,
        bool $large = false,
        bool $xl = false,
        bool $jumbo = false
    ) {
        $this->title = $title;
        $this->header = $header;
        $this->footer = $footer;
        $this->padded = $padding ? true : $padded;
        $this->simple = $simple;
        $stacked = $simple ? true : $stacked;
        $this->dynamicComponent = $component;
        $this->tiny = $tiny;
        $this->small = $small;
        $this->medium = $medium;
        $this->large = $large;
        $this->xl = $xl;
        $this->jumbo = $jumbo;

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'divider' => $divider,
            'font' => $font,
            'padding' => $padding,
            'other' => $other,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'spacing' => $stacked ? $spacing : 'none',
            'width' => $this->getWidth($width),
        ]);

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'padding' => $padding,
            'other' => $other,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'spacing' => $stacked ? $spacing : 'none',
            'width' => $this->getWidth($width),
        ], [], null, 'simpleStyles');

        $this->setConfigStyles([
            'padding' => $padding,
            'spacing' => $spacing,
        ], [], null, 'panelStyles');

        $this->setConfigStyles([
            'width' => $this->getWidth($width),
        ], [], null, 'widthStyles');

        $this->setConfigStyles([
            'padding' => $padding,
        ], [], null, 'paddedStyles');
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.panels.panel');
    }

    public function panelClasses(): string
    {
        return $this->classList($this->panelStyles);
    }

    public function widthClasses(): string
    {
        return $this->classList($this->widthStyles);
    }

    public function noPaddingClasses(): array
    {
        if ($this->simple) {
            return $this->simpleStyles();
        }

        if ($this->padded) {
            return $this->classes();
        }

        return $this->excludePadding();
    }

    private function excludePadding(): array
    {
        $classList = $this->classList($this->props, '', [], ['padding']);

        return $classList ? ['class' => $classList] : [];
    }

    private function simpleStyles(): array
    {
        $classList = $this->classList($this->props, '', [], ['divider']);

        return $classList ? ['class' => $classList] : [];
    }

    private function getWidth(?string $override): string
    {
        if ($override) {
            return $override;
        }

        $widthMap = [
            'tiny' => $this->tiny,
            'small' => $this->small,
            'medium' => $this->medium,
            'large' => $this->large,
            'xl' => $this->xl,
            'jumbo' => $this->jumbo,
        ];

        $width = array_search(true, $widthMap, true);

        return $this->componentStyle('panel', $width ?: 'width');
    }
}
