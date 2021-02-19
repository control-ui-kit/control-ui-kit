<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Buttons;

use ControlUIKit\Traits\UseButtons;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Button extends Component
{
    use UseThemeFile, UseButtons;

    protected string $component = 'button';

    public ?string $href;
    public ?string $icon;
    public string $bstyle;
    public string $element;
    public string $iconSize;
    public string $iconStyles;
    public string $type;
    public string $role_type;
    public string $disabled;

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $cursor = null,
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
        string $type = null,
        bool $default = false,
        bool $brand = false,
        bool $danger = false,
        bool $disabled = false,
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
            'cursor' => $disabled ? '' : $cursor,
            'disabled' => $disabled ? null : '',
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow
        ], ['background', 'border', 'color'], 'button.' . $this->bstyle);

        $this->type = $this->buttonType($type, $href);
        $this->href = $href && ! $disabled ? "href=\"{$href}\"" : '';
        $this->icon = $icon === 'none' ? null : $icon;
        $this->element = $this->href ? 'a' : 'button';
        $this->disabled = $disabled ? 'disabled' : '';
        $this->role_type = $this->element === 'a' ? 'role' : 'type';
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->iconStyles = $this->style('button.' . $this->bstyle, 'icon', $iconStyle);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.buttons.button');
    }
}
