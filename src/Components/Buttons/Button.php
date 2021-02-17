<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Buttons;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Button extends Component
{
    use UseThemeFile;

    private const VERSIONS = ['default', 'brand', 'muted'];

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
        bool $muted = false
    ) {
        $this->bstyle = $this->buttonVersion($bstyle, $default, $brand, $muted);

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
        $this->icon = $icon;
        $this->element = $this->href ? 'a' : 'button';
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->iconStyles = $this->style('button.' . $this->bstyle, 'icon', $iconStyle);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.buttons.button');
    }

    private function buttonVersion($version, $default, $brand, $muted): string
    {
        if ($this->validVersion($version)) {
            return $version;
        }

        if ($brand) {
            return 'brand';
        }

        if ($muted) {
            return 'muted';
        }

        if ($default) {
            return 'default';
        }

        return 'default';
    }

    private function validVersion($version): bool
    {
        return in_array($version, self::VERSIONS, true);
    }
}
