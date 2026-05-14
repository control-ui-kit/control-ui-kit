<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActiveFilter extends Component
{
    use UseThemeFile;

    protected string $component = 'table-active-filter';

    public ?string $href = null;
    public string $label;
    public string $icon;
    private array $iconStyles;
    public string $text;

    public function __construct(
        string $label,
        string $text,
        ?string $name = null,
        ?string $resetValue = null,
        ?string $href = null,

        ?string $background = null,
        ?string $border = null,
        ?string $color = null,
        ?string $font = null,
        ?string $other = null,
        ?string $padding = null,
        ?string $rounded = null,
        ?string $shadow = null,

        ?string $icon = null,
        ?string $iconBackground = null,
        ?string $iconBorder = null,
        ?string $iconColor = null,
        ?string $iconOther = null,
        ?string $iconPadding = null,
        ?string $iconRounded = null,
        ?string $iconShadow = null,
        ?string $iconSize = null
    ) {
        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);

        $this->setConfigStyles([
            'icon-background' => $iconBackground,
            'icon-border' => $iconBorder,
            'icon-color' => $iconColor,
            'icon-other' => $iconOther,
            'icon-padding' => $iconPadding,
            'icon-rounded' => $iconRounded,
            'icon-shadow' => $iconShadow,
            'icon-size' => $iconSize,
        ], [], null, 'iconStyles');

        $this->label = $label;
        $this->text = $text;
        $this->href = $href;

        $this->icon = $this->style($this->component, 'icon', $icon);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.tables.active-filter');
    }

    public function iconStyles($styles = []): array
    {
        foreach ($this->iconStyles as $key => $value) {
            $styles[substr($key, 5)] = $value;
        }

        return $styles;
    }
}
