<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Buttons;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Button extends Component
{
    use UseThemeFile;

    private const STYLES = ['default', 'brand', 'danger', 'info', 'link', 'success', 'muted', 'warning'];

    protected string $component = 'button';
    public ?string $href;
    public ?string $icon;
    public string $bstyle;
    public string $element;
    public string $iconSize;
    public string $iconStyles;

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $iconSize = null,
        string $iconStyle = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $href = null,
        string $icon = null,
        string $bstyle = null,
        bool $default = false,
        bool $brand = false,
        bool $danger = false,
        bool $info = false,
        bool $link = false,
        bool $success = false,
        bool $muted = false,
        bool $warning = false
    ) {
        $this->bstyle = $this->buttonVersion($bstyle, [
            'default' => $default,
            'brand' => $brand,
            'danger' => $danger,
            'info' => $info,
            'link' => $link,
            'success' => $success,
            'muted' => $muted,
            'warning' => $warning,
        ]);

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow
        ], ['background', 'border', 'color'], 'button.' . $this->bstyle);

        $this->href = $href ? "href=\"{$href}\"" : '';
        $this->icon = $icon === 'none' ? null : $icon;
        $this->element = $this->href ? 'a' : 'button';
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->iconStyles = $this->style('button.' . $this->bstyle, 'icon', $iconStyle);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.buttons.button');
    }

    private function buttonVersion($bstyle, $styles): string
    {
        if ($this->validStyle($bstyle)) {
            return $bstyle;
        }

        foreach ($styles as $style => $enable) {
            if ($enable) {
                return $style;
            }
        }

        return 'default';
    }

    private function validStyle($style): bool
    {
        return in_array($style, self::STYLES, true);
    }
}
